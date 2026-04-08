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

<?php if( current_user_can('administrator') ) : ?>
<?php $term = $wp_query->queried_object; ?>
<p style="color: red; margin: 0;">Page ID : <?php $page_id = get_queried_object_id(); echo $page_id; ?></p>
<p style="color: red; margin: 0;">Term Order : <?php $term_object = get_queried_object(); echo $term_object->term_order; ?></p>
<p style="color: red; margin: 0;">JP : <?php the_field('name_jp', $term->taxonomy . '_' . $term->term_id); ?></p>
<?php endif; ?>

<h1 class="page-title"><?php single_term_title(); ?></h1>
<?php if( get_field('name_en', $term->taxonomy . '_' . $term->term_id) ): ?><span class="sub-title-category"><?php the_field('name_en', $term->taxonomy . '_' . $term->term_id); ?></span><?php endif; ?>

<!-- Category List -->
<?php $tax = get_queried_object();
$tax_name = $tax->taxonomy;
$term_id = $tax->term_id;
$check = get_term_children($term_id, $tax_name); 
if($check): //子タームがある場合 ?>
<h2>รายชื่อหมวดหมู่ <?php single_term_title(); ?></h2>
<?php else: //子タームがない場合 ?>
<?php endif; ?>

<?php
$term_id = get_queried_object_id(); // 所属タームIDを自動判別
$termchildren = get_term_children( $term_id, $tax_name );// 所属タームIDに子タームがある場合を判別
if ( $termchildren ): //子カテゴリーを持つ場合
?>

<div class="c-container">
<?php
$taxonomy_name = get_query_var('taxonomy'); // 所属タクソノミーのIDを自動判別
$terms = get_terms( $taxonomy_name, array(
              'parent' => $term_id,
              'hide_empty' => false,
              'orderby' => 'term_order',
));
foreach ( $terms as $term ) : {
    echo "";
}
?>
<?php include("include-taxonomy-sub-category.php"); ?>
<?php endforeach; echo ''; ?>
</div>

<?php endif; ?>
<!-- Category List -->

<h2 class="top-h2">รายชื่อสินค้า <?php single_term_title(); ?></h2>
<div class="c-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php include("include-taxonomy-product.php"); ?>
<?php endwhile; endif; wp_reset_postdata();?>
</div>
<?php include("include-taxonomy-pagination.php"); ?>
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
