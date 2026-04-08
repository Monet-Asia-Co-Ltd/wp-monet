<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script>
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
  'content_group': '<?php
    if ( is_page( '' ) ) {
      the_title();
    } elseif ( is_tax( 'c' ) ) {
      echo 'CATEGORY';
    } elseif ( is_singular( array( 'lp', 'catalog' ) ) ) {
      echo 'BLOG';
    } elseif ( is_singular( array( 'post' ) ) ) {
      if ( is_object_in_term($post->ID, 'contentgroup', '') ) {
        $terms = get_the_terms($post->ID, 'contentgroup');
        if ( $terms ) {
          echo ''.$terms[0]->name.'';
        }
      } else {
        echo 'BLOG';
      }
    } elseif ( is_category( '' ) ) {
      single_cat_title();
    } elseif ( is_home( '' ) ) {
      echo 'BLOG TOP';
    } elseif ( is_singular( 'product' ) ) {
      $terms = get_the_terms($post->ID, 'brand');
      if ( $terms ) {
        echo ''.$terms[0]->name.'';
      }
    } elseif ( is_tax( 'brand' ) ) {
      $term_id = get_queried_object()->term_id;
      $ancestors = get_ancestors( $term_id, 'brand' );
      $ancestors = array_reverse($ancestors);
      if(isset($ancestors[0])){
        $top_term_id = $ancestors[0];
      }else{
        $top_term_id = $term_id;
      }
      $term = get_term( $top_term_id, 'brand' );
      echo $term->name;
    } else {
      echo '';
    }
  ?>'
});
</script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="shortcut icon" href="/wp-content/uploads/favicon_monet-1.ico">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-all.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<?php if ( is_page( '36' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-top.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-sidebar.css'); ?>">
<?php elseif ( is_page( array( 319349, 7381966 ) ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-fix.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-news1.css'); ?>">
<?php elseif ( is_page( array( 107, 6740345 ) ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-contact.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-fix.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-career.css'); ?>">
<?php elseif ( is_page( '101' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-about.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-fix.css'); ?>">
<?php elseif ( is_page( '6731538' ) ): ?>
<meta name="robots" content="noindex" />
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-post.css?v=1.0.1'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-cocomite.css'); ?>">
<?php elseif ( is_page( '405397' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-brand.css'); ?>">
<?php elseif ( is_page( '6722108' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-product-url.css'); ?>">
<?php elseif ( is_singular('product') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-product.css?v=1.0.1'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-contact.css'); ?>">
<?php if(have_rows('product_image_gallery')): ?>
<link  href="<?php echo get_theme_file_uri('fotorama/fotorama.css'); ?>" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<?php endif; ?>
<?php elseif ( is_singular('company') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-company.css'); ?>">
<?php elseif ( is_singular('cocomite') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-cocomite.css'); ?>">
<?php elseif ( is_singular('post') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-post.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-cocomite.css'); ?>">
<?php elseif ( is_tax(array('brand', 'c', 'app')) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-tex-brand.css'); ?>">
<?php elseif ( is_search() ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-tex-brand.css'); ?>">
<?php elseif ( is_category( '' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-category.css'); ?>">
<?php elseif ( is_page( '426925' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-category.css'); ?>">
<?php elseif ( is_singular('lp') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-lp.css'); ?>">
<?php elseif ( is_page( '386937' ) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-tex-brand.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-c-all.css'); ?>">
<?php elseif ( is_page(array('6750348', '6763045', '6763679', '6763700')) ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-top.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-fix.css'); ?>">
<?php elseif ( is_singular('news') ): ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-fix.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-news.css'); ?>">
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/css/page-single-post.css'); ?>">
<?php endif; ?>
</head>
<body <?php body_class(); ?> <?php generate_do_microdata( 'body' ); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
	<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * generate_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_do_skip_to_content_link - 2
	 * @hooked generate_top_bar - 5
	 * @hooked generate_add_navigation_before_header - 5
	 */
	do_action( 'generate_before_header' );

	/**
	 * generate_header hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_header - 10
	 */
	do_action( 'generate_header' );

	/**
	 * generate_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_featured_page_header - 10
	 */
	do_action( 'generate_after_header' );
	?>

	<div <?php generate_do_attr( 'page' ); ?>>
		<?php
		/**
		 * generate_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'generate_inside_site_container' );
		?>
		<div <?php generate_do_attr( 'site-content' ); ?>>

<?php if( get_field('attention_message',36) ): ?>
	<div class="tc">
			<div class="attention-message">
			<span><?php echo wp_kses_post( get_field('attention_message',36) ); ?></span>
			</div>
	</div>
<?php endif; ?>

			<?php
			/**
			 * generate_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_inside_container' );
