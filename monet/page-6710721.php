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
<ul>
  <?php $args = array(
    'numberposts' => 100, //表示する記事の数
    'post_type' => 'lp', //投稿タイプ名
    'orderby' => 'date',
    'order' => 'ASC'

    // 条件を追加する場合はここに追記
  );
  $customPosts = get_posts($args);
  if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
  ?>
  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php endforeach; ?>
  <?php else : //記事が無い場合 ?>
  <p>Sorry, no posts matched your criteria.</p>
  <?php endif;
  wp_reset_postdata(); //クエリのリセット ?>
</ul>
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
