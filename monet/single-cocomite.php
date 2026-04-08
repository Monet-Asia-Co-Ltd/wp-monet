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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
<div class="inside-article">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<?php if( get_field('brand_key_img') ): ?>
<img width="" height="" loading="lazy" src="<?php echo esc_url( get_field('brand_key_img') ); ?>" alt="<?php the_title(); ?>">
<?php endif; ?>

<?php the_content(); ?>

<?php if( get_field('c_text_editor') ): ?>
<?php echo wp_kses_post( get_field('c_text_editor') ); ?>
<?php endif; ?>

		<?php
		/**
		 * generate_after_entry_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_footer_meta - 10
		 */
		do_action( 'generate_after_entry_content' );

		/**
		 * generate_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_content' );
		?>
	</div>
</article>

<div class="entry-content-2" itemprop="text">
<span class="cat-links">
<path d="M0 112c0-26.51 21.49-48 48-48h110.014a48 48 0 0 1 43.592 27.907l12.349 26.791A16 16 0 0 0 228.486 128H464c26.51 0 48 21.49 48 48v224c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V112z" fill-rule="nonzero"/><span class="posted_in"><?php the_category(' '); ?></span></span>

<!-- Related Posts -->
<div class="related-posts a-tag">
<p class="sub-h2">บทความเกี่ยวข้อง</p>

<?php
global $post;
$terms = get_the_terms($post->ID, 'cc');
if ($terms && !is_wp_error($terms)) {
    $term = array_shift($terms); // 最初のタームを取得
    $args = array(
        'post_type' => 'cocomite', // 投稿タイプ
        'posts_per_page' => 3, // 表示する投稿数
        'tax_query' => array(
            array(
                'taxonomy' => 'cc',
                'field' => 'slug',
                'terms' => $term->slug,
            ),
        ),
        'post__not_in' => array($post->ID), // 現在の投稿を除外
    );

    $myPosts = get_posts($args);
    if ($myPosts) : 
        foreach ($myPosts as $post) : setup_postdata($post);
?>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): 
                    the_post_thumbnail(array(800, 420)); 
                else: ?>
                    <img width="800" height="420" loading="lazy" src="https://monet.asia/wp-content/uploads/admin/logo_monet.svg" alt="monet">
                <?php endif; ?>
            </a>
            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
<?php 
        endforeach; 
    endif; 
    wp_reset_postdata(); 
}
?>

</div>
</article>
<!-- Related Posts -->




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
