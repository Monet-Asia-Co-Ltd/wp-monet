<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				while ( have_posts() ) :

					the_post();

					generate_do_template_part( 'page' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>

<div class="category-list-box">
<?php 
$my_tax = 'c';

// キャッシュキーを設定
$cache_key = 'my_tax_terms_cache';
$cached_terms = get_transient($cache_key);

if ($cached_terms === false) {
    // キャッシュが存在しない場合、タームを取得
    $parent_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => 0));
    if (!empty($parent_terms) && !is_wp_error($parent_terms)) {
        $cached_terms = array();
        foreach ($parent_terms as $parent_term) {
            // 公開された製品の数を取得
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => $my_tax,
                        'field'    => 'term_id',
                        'terms'    => $parent_term->term_id,
                    ),
                ),
            );
            $products = new WP_Query($args);
            $parent_product_count = $products->found_posts;
            wp_reset_postdata();

            if ($parent_product_count == 0) {
                continue;
            }

            $parent_term_data = array(
                'term' => $parent_term,
                'children' => array()
            );

            $child_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => $parent_term->term_id));
            if (!empty($child_terms) && !is_wp_error($child_terms)) {
                foreach ($child_terms as $child_term) {
                    $args['tax_query'][0]['terms'] = $child_term->term_id;
                    $products = new WP_Query($args);
                    $child_product_count = $products->found_posts;
                    wp_reset_postdata();

                    if ($child_product_count == 0) {
                        continue;
                    }

                    $child_term_data = array(
                        'term' => $child_term,
                        'children' => array()
                    );

                    $grandchild_terms = get_terms($my_tax, array('hide_empty' => false, 'parent' => $child_term->term_id));
                    if (!empty($grandchild_terms) && !is_wp_error($grandchild_terms)) {
                        foreach ($grandchild_terms as $grandchild_term) {
                            $args['tax_query'][0]['terms'] = $grandchild_term->term_id;
                            $products = new WP_Query($args);
                            $grandchild_product_count = $products->found_posts;
                            wp_reset_postdata();

                            if ($grandchild_product_count == 0) {
                                continue;
                            }

                            $child_term_data['children'][] = $grandchild_term;
                        }
                    }
                    $parent_term_data['children'][] = $child_term_data;
                }
            }
            $cached_terms[] = $parent_term_data;
        }
        // キャッシュを保存（1時間）
        set_transient($cache_key, $cached_terms, HOUR_IN_SECONDS);
    }
} else {
    $cached_terms = get_transient($cache_key);
}

if (!empty($cached_terms)) {
    // 親タームのリストを作成
    echo '<div class="category-list-title">';
    foreach ($cached_terms as $parent_term_data) {
        $parent_term = $parent_term_data['term'];
        $parent_term_link = get_term_link($parent_term);
        if (is_wp_error($parent_term_link)) {
            continue;
        }
        echo '<a class="a-link-icon" href="#' . esc_attr($parent_term->slug) . '">' . esc_html($parent_term->name) . '</a>';
    }
    echo '</div>';

    // 親タームとその子ターム、孫タームを表示
    echo '<div class="my_term-archive">';
    foreach ($cached_terms as $parent_term_data) {
        $parent_term = $parent_term_data['term'];
        $parent_term_link = get_term_link($parent_term);
        if (is_wp_error($parent_term_link)) {
            continue;
        }
        echo '<div id="' . esc_attr($parent_term->slug) . '"></div>';
        echo '<h2><a href="' . esc_url($parent_term_link) . '">' . esc_html($parent_term->name) . '</a></h2>';

        // 2階層目のループの上に <div class="c-container"> を追加
        $has_grandchildren = false;
        foreach ($parent_term_data['children'] as $child_term_data) {
            if (!empty($child_term_data['children'])) {
                $has_grandchildren = true;
                break;
            }
        }

        if (!$has_grandchildren) {
            echo '<div class="c-container">'; // 追加
        }

        foreach ($parent_term_data['children'] as $child_term_data) {
            $child_term = $child_term_data['term'];
            $child_term_link = get_term_link($child_term);
            if (is_wp_error($child_term_link)) {
                continue;
            }

            if (!empty($child_term_data['children'])) {
                echo '<h3><a href="' . esc_url($child_term_link) . '">' . esc_html($child_term->name) . '</a></h3>';
                echo '<div class="c-container">';
                foreach ($child_term_data['children'] as $grandchild_term) {
                    $grandchild_term_link = get_term_link($grandchild_term);
                    if (is_wp_error($grandchild_term_link)) {
                        continue;
                    }

                    $product_category_icon_id = get_term_meta($grandchild_term->term_id, 'product_category_icon', true);
                    $product_category_icon_url = wp_get_attachment_url($product_category_icon_id);

                    echo '<div class="category-item">';
                    echo '<a href="' . esc_url($grandchild_term_link) . '">';
                    echo '<div class="c-container">';
                    if ($product_category_icon_url) {
                        echo '<div class="category-item-img"><img width="51" height="51" loading="lazy" src="' . esc_url($product_category_icon_url) . '" alt="' . esc_attr($grandchild_term->name) . '"></div>';
                    }
                    echo '<div class="category-item-title"><p>' . esc_html($grandchild_term->name) . ' (' . $grandchild_term->count . ')</p></div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                // 3階層目が存在しない場合、2階層目のタームを3階層目と同じデザインで表示
                $product_category_icon_id = get_term_meta($child_term->term_id, 'product_category_icon', true);
                $product_category_icon_url = wp_get_attachment_url($product_category_icon_id);

                echo '<div class="category-item">';
                echo '<a href="' . esc_url($child_term_link) . '">';
                echo '<div class="c-container">';
                if ($product_category_icon_url) {
                    echo '<div class="category-item-img"><img width="51" height="51" loading="lazy" src="' . esc_url($product_category_icon_url) . '" alt="' . esc_attr($child_term->name) . '"></div>';
                }
                echo '<div class="category-item-title"><p>' . esc_html($child_term->name) . ' (' . $child_term->count . ')</p></div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }

        if (!$has_grandchildren) {
            echo '</div>'; // 追加
        }
    }
    echo '</div>';
}
?>
</div>

		</main>
	</div>
	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();
