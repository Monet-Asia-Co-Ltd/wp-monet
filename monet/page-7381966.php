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

<div class="r-container">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query(array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => 10,
        'orderby'     => 'date',
        'order' => 'DESC'
));
if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post();
?>

<div class="item-30">
<div class="post-box">
<a href="<?php the_permalink(); ?>">
<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
<div class="post-box-in-02">
<?php the_title(); ?>
</div>
</a>
</div>
</div>

<?php endwhile;
endif;
wp_reset_postdata(); ?>
</div>

<div class="activity-nav col-120">
  <div class="s-pagination-strip">
    <?php //ページリスト表示処理
      global $wp_rewrite;
      $paginate_base = get_pagenum_link(1);
      if ( strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks() ) {
        $paginate_format = '';
        $paginate_base   = add_query_arg('paged', '%#%');
      } else {
        $paginate_format = ( substr($paginate_base, -1, 1 ) === '/' ? '' : '/' )
                         . user_trailingslashit( 'page/%#%/', 'paged' );
        $paginate_base  .= '%_%';
      }
      echo paginate_links( array(
        'base'      => $paginate_base,               // URLのベース
        'format'    => $paginate_format,             // ページネーション構造
        'total'     => $the_query->max_num_pages,    // 全ページ数
        'mid_size'  => 2,                            // ページ番号の表示幅
        'current'   => ( $paged ? $paged : 1 ),      // 現在のページ
        'prev_text' => 'Previous',
        'next_text' => 'Next',
      ) );
    ?>
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
