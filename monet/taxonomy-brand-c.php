<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<div <?php generate_do_attr( 'content' ); ?>>
<main <?php generate_do_attr( 'main' ); ?>>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<?php
$brand_slug = get_query_var('brand');
$c_slug = get_query_var('c');
$brand_term = get_term_by('slug', $brand_slug, 'brand');
$c_term = get_term_by('slug', $c_slug, 'c');
echo '<h1>' . $c_term->name . ' แบรนด์ ' . $brand_term->name . '</h1>';
?>

<!-- Category List -->
<div class="c-container">
<?php
$brand_slug = get_query_var('brand');
$c_slug = get_query_var('c');
$brand_term = get_term_by('slug', $brand_slug, 'brand');
$c_term = get_term_by('slug', $c_slug, 'c');
$child_terms = get_terms( array(
    'taxonomy' => 'c',
    'parent'   => $c_term->term_id,
    'hide_empty' => true,
) );
foreach ( $child_terms as $child_term ) {
    $args = array(
        'post_type' => 'product',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'brand',
                'field'    => 'slug',
                'terms'    => array( $brand_term->slug ),
            ),
            array(
                'taxonomy' => 'c',
                'field'    => 'slug',
                'terms'    => array( $child_term->slug ),
            ),
        ),
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $link = esc_url( site_url() . '/brand/' . $brand_term->slug . '/c/' . $child_term->slug );
        $product_category_icon = get_field('product_category_icon', $child_term->taxonomy . '_' . $child_term->term_id);
        echo '<div class="category-item">';
        echo '<a href="' . esc_url($link) . '">';
        if( $product_category_icon ):
            echo '<div class="c-container">';
            echo '<div class="category-item-img">';
            echo '<img width="51" height="51" loading="lazy" src="' . esc_url($product_category_icon) . '" alt="' . esc_attr($child_term->name) . '">';
            echo '</div>';
            echo '<div class="category-item-title">';
            echo '<p>' . $child_term->name . ' (' . $query->found_posts . ')</p>';
            if( current_user_can('administrator') ) : $term_with_order = get_term($child_term->term_id, $child_term->taxonomy); echo '<span style="color: red;">' . $term_with_order->term_order . '</span>'; endif;
            echo '</div>';
            echo '</div>';
        else :
            echo '<p>' . $child_term->name . ' (' . $query->found_posts . ')</p>';
            if( current_user_can('administrator') ) : $term_with_order = get_term($child_term->term_id, $child_term->taxonomy); echo '<span style="color: red;">' . $term_with_order->term_order . '</span>'; endif;
        endif;
        echo '</a>';
        echo '</div>';
    }
}
?>
</div>
<!-- Category List -->

<?php
$brand_slug = get_query_var('brand');
$c_slug = get_query_var('c');
$brand_term = get_term_by('slug', $brand_slug, 'brand');
$c_term = get_term_by('slug', $c_slug, 'c');
echo '<h2 class="top-h2">รายชื่อสินค้า' . $c_term->name . ' แบรนด์ ' . $brand_term->name . '</h2>';
?>

<div class="c-container">
<?php
$brand_slug = get_query_var('brand');
$c_slug = get_query_var('c');
$brand_term = get_term_by('slug', $brand_slug, 'brand');
$c_term = get_term_by('slug', $c_slug, 'c');

if ($brand_term && $c_term) {
    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    } elseif ( get_query_var('page') ) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    $args = array(
        'orderby' => 'menu_order', 
        'order' => 'ASC',
        'post_type' => 'product', 
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'brand',
                'field'    => 'slug',
                'terms'    => array( $brand_term->slug ),
            ),
            array(
                'taxonomy' => 'c',
                'field'    => 'slug',
                'terms'    => array( $c_term->slug ),
            ),
        ),
        'paged' => $paged,
        'posts_per_page' => '40'
    );

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
?>
<?php include("include-taxonomy-product.php"); ?>
<?php } 
    wp_reset_postdata(); 
    }
}
?>
</div>
<?php if (isset($query) && $query->have_posts()) : ?>
<div class="activity-nav col-120">
  <div class="s-pagination-strip">
  <?php
    echo paginate_links(array(
        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $query->max_num_pages
    ));
  ?>
  </div>
</div>
<?php endif; ?>



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
