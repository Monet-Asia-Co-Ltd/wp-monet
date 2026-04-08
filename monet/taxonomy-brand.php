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
$is_mobile      = wp_is_mobile();

if ( current_user_can('administrator') ) :
    $term_id     = $queried_object->term_id;
    $taxonomy    = $queried_object->taxonomy;
    $official_url = get_field( 'official_url', "{$taxonomy}_{$term_id}" );
    $ob_brand_id = get_field( 'ob-b-id-01', "{$taxonomy}_{$term_id}" );
?>
    <p style="color: red; margin: 0;">
        Term ID : <?php echo esc_html( $term_id ); ?>
    </p>
    <p style="color: red; margin: 0;">
        Term Order : <?php echo esc_html( $queried_object->term_order ); ?>
    </p>
    <p style="color: red; margin: 0;">
        Official URL : 
        <a style="color: red;" href="<?php echo esc_url( $official_url ); ?>">
            <?php echo esc_html( $official_url ); ?>
        </a>
    </p>
    <p style="color: red; margin: 0;">
        OB Brand ID : <?php echo esc_html( $ob_brand_id ); ?>
    </p>
<?php endif; ?>
<?php 
$term_title = single_term_title('', false);
$name_en = get_field('name_en', $queried_object->taxonomy . '_' . $queried_object->term_id);
?>
<h1 class="page-title"><?php echo esc_html($term_title); ?><?php if( $name_en ): ?><span class="sub-title"><?php echo esc_html($name_en); ?></span><?php endif; ?></h1>

<?php 
if ( !is_paged() ) : // first page
    $brand_key_img = get_field('brand_key_img', $queried_object->taxonomy . '_' . $queried_object->term_id);
    $brand_img = get_field('brand_img', $queried_object->taxonomy . '_' . $queried_object->term_id);
?>
<!-- pagination first page -->
<?php if( $brand_key_img ): ?>
<img width="916" height="272" loading="lazy" class="fp-key" src="<?php echo esc_url($brand_key_img); ?>" alt="Key Visual <?php echo esc_attr($term_title); ?>">
<?php else : ?>
<?php if( $is_mobile && $brand_img ): ?>
<img width="300" height="80" loading="lazy" class="brand_logo" src="<?php echo esc_url($brand_img); ?>" alt="โลโก้ <?php echo esc_attr($term_title); ?>">
<?php endif; ?>
<?php endif; ?>

<?php echo wp_kses_post(term_description()); ?>

<!-- Product Banner -->
<?php if( have_rows('product_banner', $queried_object->taxonomy . '_' . $queried_object->term_id) ): ?>
<h2>สินค้าขายดี</h2>
<div class="c-container">
<?php while( have_rows('product_banner', $queried_object->taxonomy . '_' . $queried_object->term_id) ): the_row(); 
    $link = get_sub_field('url');
    $image = get_sub_field('image');
?>
<div class="brand-category-banner-item">
<a href="<?php echo esc_url($link); ?>">
<img width="444" height="132" loading="lazy" src="<?php echo esc_url($image); ?>" alt="สินค้าขายดี <?php echo esc_attr($term_title); ?>" />
</a>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- Product Banner -->

<!-- Brand Category Banner -->
<?php 
$brand_category_banner = have_rows('brand_category_banner', $queried_object->taxonomy . '_' . $queried_object->term_id);
if( $brand_category_banner ): ?>
<h2>สินค้าแนะนำ</h2>
<div class="c-container">
<?php while( have_rows('brand_category_banner', $queried_object->taxonomy . '_' . $queried_object->term_id) ): the_row(); 
    $link = get_sub_field('url');
    $term_link = get_term_link( $link );
    $brand_key_img = get_field('brand_key_img', $queried_object->taxonomy . '_' . $link);
    $term_object = get_term( $link );
    $term_title = $term_object->name;
?>
<div class="brand-category-banner-item">
<a href="<?php echo esc_url($term_link); ?>">
<img width="444" height="132" loading="lazy" src="<?php echo esc_url($brand_key_img); ?>" alt="<?php echo esc_attr($term_title); ?>" />
</a>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- Brand Category Banner -->

<!-- Additional Field -->
<?php 
$additional_field = have_rows('additional_field', $queried_object->taxonomy . '_' . $queried_object->term_id);
if( $additional_field ): ?>
<?php while( have_rows('additional_field', $queried_object->taxonomy . '_' . $queried_object->term_id) ): the_row(); 
$text_editor = get_sub_field('text_editor');
?>
<div class="category-link-box">
<?php echo $text_editor; ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<!-- Additional Field -->

<!-- pagination first page -->
<?php endif; ?>

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
              'hide_empty' => false,
              'orderby' => 'term_order',
));
foreach ( $terms as $term ) : 
    $term_finish_model = get_field('term_finish_model', $term->taxonomy . '_' . $term->term_id);
    $product_category_icon = get_field('product_category_icon', $term->taxonomy . '_' . $term->term_id);
    if( !$term_finish_model ): ?>

<div class="category-item">
<a href="<?php echo get_term_link( $term ); ?>">
<?php if( $product_category_icon ): ?>
<div class="c-container">
<div class="category-item-img">
<img width="51" height="51" loading="lazy" src="<?php echo esc_url($product_category_icon); ?>" alt="<?php echo esc_attr($term->name); ?>">
</div>
<div class="category-item-title">
<p><?php $trimmed_name = preg_replace('/แบรนด์.*/', '', $term->name); echo mb_strlen($trimmed_name) > 35 ? mb_substr($trimmed_name, 0, 35) . '....' : $trimmed_name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
</div>
</div>
<?php else : ?>
<p><?php $trimmed_name = preg_replace('/แบรนด์.*/', '', $term->name); echo mb_strlen($trimmed_name) > 35 ? mb_substr($trimmed_name, 0, 35) . '....' : $trimmed_name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
<?php endif; ?>
</a>
</div>
<?php endif; ?>
<?php endforeach; ?>
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
