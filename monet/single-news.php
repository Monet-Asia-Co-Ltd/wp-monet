<?php
/**
 * The Template for displaying all single posts.
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

					generate_do_template_part( 'single' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>

<div class="entry-content-2" itemprop="text">
<span class="cat-links">
<path d="M0 112c0-26.51 21.49-48 48-48h110.014a48 48 0 0 1 43.592 27.907l12.349 26.791A16 16 0 0 0 228.486 128H464c26.51 0 48 21.49 48 48v224c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V112z" fill-rule="nonzero"/><span class="posted_in"><?php the_category(' '); ?></span></span>

<!-- Related Posts -->
<div class="related-posts a-tag">
<p class="sub-h2">บทความเกี่ยวข้อง</p>

<?php
global $post;

// 現在の記事IDを取得
$current_id = get_the_ID();

// 最新3件（現在の記事を除外）
$args = array(
    'post_type'      => 'news',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post__not_in'   => array( $current_id ),
);

$myPosts = get_posts( $args );
if ( $myPosts ) :
    foreach ( $myPosts as $post ) :
        setup_postdata( $post );
?>
        <a href="<?php the_permalink(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
                // サイズはお好みで
                the_post_thumbnail( array( 800, 420 ) );
            } else {
                ?>
                <img width="800" height="420" loading="lazy"
                     src="https://monet.asia/wp-content/uploads/admin/logo_monet.svg"
                     alt="monet">
                <?php
            }
            ?>
        </a>
        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
<?php
    endforeach;
    wp_reset_postdata();
endif;
?>
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
