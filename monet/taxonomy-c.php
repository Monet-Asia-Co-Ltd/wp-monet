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
$queried_object = get_queried_object();
if( current_user_can('administrator') ) : 
    $term_id = $queried_object->term_id;
    $name_jp = get_field('name_jp', $queried_object->taxonomy . '_' . $queried_object->term_id);
?>
<p style="color: red; margin: 0;">Term ID : <?php echo esc_html($term_id); ?></p>
<p style="color: red; margin: 0;">Term Order : <?php echo esc_html($queried_object->term_order); ?></p>
<p style="color: red; margin: 0;">JP : <?php echo esc_html($name_jp); ?></p>
<?php endif; ?>

<?php 
$term_title = single_term_title('', false);
$name_en = get_field('name_en', $queried_object->taxonomy . '_' . $queried_object->term_id);
?>
<h1 class="page-title"><?php echo esc_html($term_title); ?><?php if( $name_en ): ?><span class="sub-title"><?php echo esc_html($name_en); ?></span><?php endif; ?></h1>

<?php if ( !is_paged() ) : ?>
<?php echo wp_kses_post(term_description()); ?>
<?php endif; ?>

<!-- Product Banner -->
<?php if( have_rows('product_banner', $queried_object->taxonomy . '_' . $queried_object->term_id) ): ?>
<h2>แบรนด์แนะนำ</h2>
<div class="c-container">
<?php while( have_rows('product_banner', $queried_object->taxonomy . '_' . $queried_object->term_id) ): the_row(); 
    $link = get_sub_field('url');
    $image = get_sub_field('image');
?>
<div class="brand-category-banner-item">
<a href="<?php echo esc_url($link); ?>">
<img width="444" height="132" loading="lazy" src="<?php echo esc_url($image); ?>" alt="แบรนด์แนะนำ <?php echo esc_attr($term_title); ?>" />
</a>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- Product Banner -->

<!-- category list -->
<?php 
$queried_object = get_queried_object();
$tax_name = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$termchildren = get_term_children( $term_id, $tax_name );
if($termchildren): ?>
<h2>รายชื่อหมวดหมู่ <?php single_term_title(); ?></h2>
<?php endif; ?>

<?php if ( $termchildren ): ?>
<div class="c-container">
<?php
$taxonomy_name = get_query_var('taxonomy');
$terms = get_terms( $taxonomy_name, array(
              'parent' => $term_id,
              'hide_empty' => true, // 非表示にするためにtrueに設定
              'orderby' => 'term_order',
));
foreach ( $terms as $term ) : 
    $product_category_icon = get_field('product_category_icon', $term->taxonomy . '_' . $term->term_id);
    if ($term->count > 0): // 製品数が0のタームを除外
?>

<div class="category-item">
<a href="<?php echo get_term_link( $term ); ?>">
<?php if( $product_category_icon ): ?>
<div class="c-container">
<div class="category-item-img">
<img width="51" height="51" loading="lazy" src="<?php echo esc_url($product_category_icon); ?>" alt="<?php echo esc_attr($term->name); ?>">
</div>
<div class="category-item-title">
<p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
</div>
</div>
<?php else : ?>
<p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
<?php endif; ?>
</a>
</div>
<?php 
    endif; // 製品数が0のタームを除外
endforeach; 
?>
</div>
<?php endif; ?>
<!-- Category List -->

<?php include("include-taxonomy-product-list.php"); ?>
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
