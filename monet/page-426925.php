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
<div class="pagination">
   <div class="list-box">
       <?php
       $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       $the_query = new WP_Query( array(
           'post_status' => 'publish',
           'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
           'paged' => $paged,
           'posts_per_page' => 10, // 表示件数
           'orderby'     => 'date',
           'order' => 'DESC'
       ) );
       if ($the_query->have_posts()) :
           while ($the_query->have_posts()) : $the_query->the_post();
           ?>

<div class="b-container">
<!-- Repeater Field -->
<div class="blog-item-01">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()): the_post_thumbnail(array( 452, 237 )); else: ?>
<img width="452" height="237" src="https://www.monet.asia/wp-content/uploads/admin/logo_monet.svg" alt="monet">
<?php endif; ?>
</a>
</div>

<div class="blog-item-02">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php echo mb_substr(get_the_excerpt(), 0, 400); ?></p>

<?php if( current_user_can('administrator') ) : ?>
<span style="color: red;"><?php $terms = get_the_terms($post->ID, 'contentgroup'); if ( $terms ) { echo ''.$terms[0]->name.''; } ?></span>
<?php endif; ?>

</div>
<!-- Repeater Field -->
</div>


           <?php
           endwhile;
       else:
           echo '<div><p>No Post</p></div>';
       endif;
       ?>
   </div>
 







<div class="activity-nav col-120">
  <div class="s-pagination-strip">
       <?php //ページリスト表示処理
       global $wp_rewrite;
       $paginate_base = get_pagenum_link(1);
       if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
           $paginate_format = '';
           $paginate_base = add_query_arg('paged','%#%');
       }else{
           $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
           user_trailingslashit('page/%#%/','paged');
           $paginate_base .= '%_%';
       }
       echo paginate_links(array(
           'base' => $paginate_base,
           'format' => $paginate_format,
           'total' => $the_query->max_num_pages,
           'mid_size' => 1,
           'current' => ($paged ? $paged : 1),
           'prev_text' => 'ก่อนหน้า',
           'next_text' => 'ถัดไป »',
       ));
       ?>
   </div>
</div>

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
