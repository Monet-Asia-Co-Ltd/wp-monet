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

<?php if(have_rows('recruit')): ?>
<?php while(have_rows('recruit')): the_row(); ?>
<h2><?php echo esc_html( get_sub_field('recruit_title') ); ?></h2>
<?php if(have_rows('recruit_detail')): ?>
<div class="information-list">
<dl>
<?php while(have_rows('recruit_detail')): the_row(); ?>
<div class="list-item">
<dt><?php echo esc_html( get_sub_field('title') ); ?></dt>
<dd><?php echo wp_kses_post( get_sub_field('description') ); ?></dd>
</div>
<?php endwhile; ?>
</dl>
</div>



<p class="top-newslist">
<?php echo esc_html( get_field('recruit_text') ); ?><br><br>
<a class="btn bgleft" href="<?php echo home_url( '/career/#form' ); ?>"><span><?php echo esc_html( get_field('recruit_button') ); ?></span></a>
</p>

<?php endif; ?>

<?php endwhile; ?>
<div id="form"></div>
<h2><?php echo esc_html( get_field('recruit_button') ); ?></h2>
<?php echo apply_filters('the_content', get_post_meta($post->ID, 'recruit_form', true)); ?>
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
