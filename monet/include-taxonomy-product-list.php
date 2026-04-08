<h2 class="top-h2">รายชื่อสินค้า <?php single_term_title(); ?></h2>

<div class="c-container">
<?php
$queried_object = get_queried_object();
if ($queried_object instanceof WP_Term) {
    $taxonomyname = $queried_object->taxonomy;

    $args = array(
        'orderby' => array(
            'menu_order' => 'ASC',
            'ID' => 'ASC', // menu_order が同じ場合に ID 昇順
        ),
        'post_type' => array('product'), 
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomyname,
                'field' => 'slug',
                'terms' => $queried_object->slug,
            ),
        ),
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'posts_per_page' => 40
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
?>
<?php include("include-taxonomy-product.php"); ?>
<?php endwhile;  wp_reset_postdata(); endif;} ?>
</div>
<?php include("include-taxonomy-pagination.php"); ?>