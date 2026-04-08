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
 * The template used for displaying page content in page.php
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
	<div class="inside-article">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

			<header <?php generate_do_attr( 'entry-header' ); ?>>
				<?php
				/**
				 * generate_before_page_title hook.
				 *
				 * @since 2.4
				 */
				do_action( 'generate_before_page_title' );

				if ( generate_show_title() ) {
					$params = generate_get_the_title_parameters();

					the_title( $params['before'], $params['after'] );
				}

				/**
				 * generate_after_page_title hook.
				 *
				 * @since 2.4
				 */
				do_action( 'generate_after_page_title' );
				?>
			</header>
	</div>
</article>
<div class="brand-list-box">
<?php 
$terms = get_terms(array(
	'taxonomy' => 'brand',
	'orderby' => 'title', 
    'order' => 'ASC',
    'parent' => '0',
    'hide_empty' => '0',
));

if ( !empty( $terms ) && !is_wp_error( $terms ) ){    
$term_list = [];    
foreach ( $terms as $term ){
    $first_letter = strtoupper($term->name[0]);
    $term_list[$first_letter][] = $term;
}

echo '<ul class="brand-list-title">';
    foreach ( $term_list as $key=>$value ) {
        echo '<li class="brand-title-link"><a href="#' . $key . '">' . $key . '</a></li>';
    }
echo '</ul>';

echo '<ul class="my_term-archive">';
    foreach ( $term_list as $key=>$value ) {
        echo '<div id="' . $key . '"></div><h2 class="term-letter">' . $key . '</h2>';
        echo '<ul class="brand-container">';

        foreach ( $value as $term ) {
            $custom_fields = get_fields($term);
            if (is_array($custom_fields) && array_key_exists('term_finish_model', $custom_fields) && $custom_fields['term_finish_model'] ) {
                continue;
            }
            $brand_img = is_array($custom_fields) && array_key_exists('brand_img', $custom_fields) ? $custom_fields['brand_img'] : null;
            if($brand_img){
                echo '<li class="cat-item"><a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '"><div class="brand-item-img"><img width="159" height="43" loading="lazy" src="' . $brand_img . '" alt="' . $term->name . '"></div><p class="brand-item-title">' . $term->name . '</p></a></li>';
            } else {
                echo '<li class="cat-item"><a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '"><p class="brand-item-title-noimg">' . $term->name . '</p></a></li>';
            }
        }
        echo '</ul>';
    }
echo '</ul>';
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
