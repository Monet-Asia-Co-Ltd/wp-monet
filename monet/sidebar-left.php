<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div <?php generate_do_attr( 'left-sidebar' ); ?>>
<div class="inside-left-sidebar">
<!-- Side Banner -->
<?php 
$is_singular_and_not_mobile = (is_singular( 'post' ) || is_singular('lp') || is_singular('cocomite')) && !wp_is_mobile();
if ( is_front_page() || is_page( '426925' ) || is_category( '' ) || $is_singular_and_not_mobile ) : 
    if(have_rows('side_banner_2',36)): 
        while(have_rows('side_banner_2',36)): the_row(); 
?>
<div class="img-class">
<a href="<?php echo esc_url( get_sub_field('side_url') ); ?>?utm_source=internal-link&utm_medium=click&utm_campaign=<?php echo esc_html( get_sub_field('side_event') ); ?>">
<img src="<?php echo esc_url( get_sub_field('side_image') ); ?>" alt="<?php echo esc_html( get_sub_field('side_event') ); ?>" width="300" height="120" loading="lazy" />
</a>
</div>
<?php endwhile; endif; endif; ?>
<!-- Side Banner -->

<!-- Brand Category -->
<?php if ( is_tax( 'brand' )  ): ?>
<?php if(wp_is_mobile()): ?>
<?php else: ?>

<?php
$taxonomy_name = 'brand';
$term_id = get_queried_object_id();
$term = get_term($term_id, $taxonomy_name);
$ancestors = get_ancestors($term_id, $taxonomy_name);
$ancestors = array_reverse($ancestors);
if (!empty($ancestors)) {
    foreach ($ancestors as $index => $ancestor) {
        $ancestor_term = get_term($ancestor, $taxonomy_name);
        if (!get_field('term_finish_model', $ancestor_term->taxonomy . '_' . $ancestor_term->term_id)) {
            echo '<div class="sidebar-item-side b-item-side level-' . ($index + 1) . '">';
            echo '<a href="' . get_term_link($ancestor_term) . '">';
            if (get_field('brand_img', $ancestor_term->taxonomy . '_' . $ancestor_term->term_id)) {
                echo '<img width="211" height="50" loading="lazy" src="' . get_field('brand_img', $ancestor_term->taxonomy . '_' . $ancestor_term->term_id) . '" alt="' . $ancestor_term->name . '">';
            } else {
                $term_name = preg_replace('/แบรนด์.*/u', '', $ancestor_term->name);
                echo '<p>' . $term_name . '</p>';
                echo '<p class="term-count-right">(' . $ancestor_term->count . ')</p>';
            }
            echo '</a>';
            echo '</div>';
        }
    }
}

if (!get_field('term_finish_model', $term->taxonomy . '_' . $term->term_id)) {
    echo '<div class="sidebar-item-side b-item-side level-' . (count($ancestors) + 1) . '">';
    echo '<a href="' . get_term_link($term) . '">';
    if (get_field('brand_img', $term->taxonomy . '_' . $term->term_id)) {
        echo '<img width="211" height="50" loading="lazy" src="' . get_field('brand_img', $term->taxonomy . '_' . $term->term_id) . '" alt="' . $term->name . '">';
    } else {
        $term_name = preg_replace('/แบรนด์.*/u', '', $term->name);
        echo '<p>' . $term_name . '</p>';
        echo '<p class="term-count-right">(' . $term->count . ')</p>';
    }
    echo '</a>';
    echo '</div>';
}
$child_terms = get_terms($taxonomy_name, array('parent' => $term_id, 'hide_empty' => false, 'orderby' => 'term_order', 'order' => 'ASC'));
if (empty($child_terms)) {
    $child_terms = get_terms($taxonomy_name, array('parent' => $term_id, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC'));
}
foreach ($child_terms as $child) {
    if (!get_field('term_finish_model', $child->taxonomy . '_' . $child->term_id)) {
        echo '<div class="sidebar-item-side b-item-side level-' . (count($ancestors) + 2) . '">';
        echo '<a href="' . get_term_link($child) . '">';
        $term_name = preg_replace('/แบรนด์.*/u', '', $child->name);
        echo '<p>' . $term_name . '</p>';
        echo '<p class="term-count-right">(' . $child->count . ')</p>';
        echo '</a>';
        echo '</div>';
    }
}
?>

<?php endif; ?>

<?php endif; ?>
<!-- Brand Category -->


<!-- Category -->
<?php if ( is_tax( 'c' )  ): ?>
<?php if(wp_is_mobile()): ?>
<?php else: ?>

<!-- All Category -->
<div class="sidebar-item-side b-item-side level-0">
<a href="<?php echo get_page_link(386937); ?>"><p>รายชื่อหมวดหมู่ทั้งหมด</p></a>
</div>
<!-- All Category -->


<!-- Category 1階層 3 -->
<?php
$taxonomy_name = 'c';
$term_id = get_queried_object_id(); // 現在のタームIDを取得
$term = get_term($term_id, $taxonomy_name);

$ancestors = get_ancestors($term_id, $taxonomy_name);
$ancestors = array_reverse($ancestors); // 親から順に並べ替える

// 親カテゴリを表示
if (!empty($ancestors)) {
    foreach ($ancestors as $index => $ancestor) {
        $ancestor_term = get_term($ancestor, $taxonomy_name);
        echo '<div class="sidebar-item-side b-item-side level-' . ($index + 1) . '">';
        echo '<a href="' . get_term_link($ancestor_term) . '">';
        echo '<p>' . $ancestor_term->name . '</p>';
        echo '<p class="term-count-right">(' . $ancestor_term->count . ')</p>';
        echo '</a>';
        echo '</div>';
    }
}

// 現在のカテゴリ（子カテゴリまたは孫カテゴリまたはひ孫カテゴリ）を表示
echo '<div class="sidebar-item-side b-item-side level-' . (count($ancestors) + 1) . '">';
echo '<a href="' . get_term_link($term) . '">';
echo '<p>' . $term->name . '</p>';
echo '<p class="term-count-right">(' . $term->count . ')</p>';
echo '</a>';
echo '</div>';

// ひ孫カテゴリまたはそれ以下を表示
$child_terms = get_terms($taxonomy_name, array('parent' => $term_id, 'hide_empty' => false, 'orderby' => 'term_order', 'order' => 'ASC'));
if (empty($child_terms)) {
    // term_orderが設定されていない場合は、名前でソート
    $child_terms = get_terms($taxonomy_name, array('parent' => $term_id, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC'));
}
foreach ($child_terms as $child) {
    echo '<div class="sidebar-item-side b-item-side level-' . (count($ancestors) + 2) . '">';
    echo '<a href="' . get_term_link($child) . '">';
    echo '<p>' . $child->name . '</p>';
    echo '<p class="term-count-right">(' . $child->count . ')</p>';
    echo '</a>';
    echo '</div>';
}
?>
<!-- Category 現在の階層の一つ下の階層 -->
<?php endif; ?>

<?php endif; ?>
<!-- Category -->













<!-- Product -->
<?php if ( is_singular( 'product' ) && !wp_is_mobile() ): ?>
<div class="category-container">
<?php
$post_id = get_the_ID();
$taxonomy_name = 'brand';
$terms = wp_get_post_terms($post_id, $taxonomy_name);
$deepest_term = null;
$deepest_level = -1;
foreach ($terms as $term) {
    $level = count(get_ancestors($term->term_id, $taxonomy_name));
    if ($level > $deepest_level) {
        $deepest_term = $term;
        $deepest_level = $level;
    }
}
if ($deepest_term) {
    $ancestors = get_ancestors($deepest_term->term_id, $taxonomy_name);
    $ancestors = array_reverse($ancestors);
    array_push($ancestors, $deepest_term->term_id);
    foreach ($ancestors as $index => $term_id) {
        $term = get_term($term_id, $taxonomy_name);
        if (!get_field('term_finish_model', $term->taxonomy . '_' . $term->term_id)) {
            echo '<div class="sidebar-item-side b-item-side level-' . ($index + 1) . '">';
            echo '<a href="' . get_term_link($term) . '">';
            if (get_field('brand_img', $term->taxonomy . '_' . $term->term_id)) {
                echo '<img width="211" height="50" loading="lazy" src="' . get_field('brand_img', $term->taxonomy . '_' . $term->term_id) . '" alt="' . $term->name . '">';
            } else {
                $term_name = preg_replace('/แบรนด์.*/u', '', $term->name);
                echo '<p>' . $term_name . '</p>';
                echo '<p class="term-count-right">(' . $term->count . ')</p>';
            }
            echo '</a>';
            echo '</div>';
        }
    }
}
?>
</div>



<?php elseif ( is_singular( 'company' ) && !wp_is_mobile() ): ?>

<div class="category-item-side">
<div class="category-item-img-brand">
<img width="211" height="50" loading="lazy" src="<?php echo esc_url( get_field('brand_img') ); ?>" alt="<?php the_title(); ?>">
</div>


<a href="#recommend">
<div class="category-item-menu b-item-side">
สินค้าแนะนำ
</div>
</a>

<a href="#post">
<div class="category-item-menu b-item-side">
บทความ
</div>
</a>

<a href="#catalog">
<div class="category-item-menu b-item-side">
แคตตาล็อก
</div>
</a>

<a href="#about">
<div class="category-item-menu b-item-side">
ข้อมูลบริษัท
</div>
</a>

<?php if(have_rows('bland')): ?>
<?php while(have_rows('bland')): the_row(); ?>
<a href="<?php echo esc_url( get_sub_field('url') ); ?>">
<div class="category-item-menu b-item-side">
สินค้า <?php echo esc_html( get_sub_field('name') ); ?>
</div>
</a>
<?php endwhile; ?>
<?php endif; ?>

</div>

<?php endif; ?>
<!-- Product -->

<!-- Company -->
<!-- Company -->

		<?php
		/**
		 * generate_before_left_sidebar_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_before_left_sidebar_content' );

		if ( ! dynamic_sidebar( 'sidebar-2' ) ) {
			generate_do_default_sidebar_widgets( 'left-sidebar' );
		}

		/**
		 * generate_after_left_sidebar_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_left_sidebar_content' );
		?>


	</div>
</div>
