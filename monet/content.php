<?php
/**
 * The template for displaying posts within the loop.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
<div class="inside-article">

<div class="b-container">
<!-- Repeater Field -->
<div class="blog-item-01 blog-item1">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()): the_post_thumbnail(array( 452, 237 )); else: ?>
<img width="452" height="237" src="https://www.monet.asia/wp-content/uploads/admin/logo_monet.svg" alt="monet">
<?php endif; ?>
</a>
</div>

<div class="blog-item-02 blog-item1">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php echo mb_substr(get_the_excerpt(), 0, 400); ?></p>

<?php if( current_user_can('administrator') ) : ?>
<span style="color: red;"><?php $terms = get_the_terms($post->ID, 'contentgroup'); if ( $terms ) { echo ''.$terms[0]->name.''; } ?></span>
<?php endif; ?>

</div>
<!-- Repeater Field -->
</div>

</div>
</article>
