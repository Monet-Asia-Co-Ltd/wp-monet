<?php
/**
 * The template for displaying search forms in Generate
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<span class="screen-reader-text"><?php apply_filters( 'generate_search_label', _ex( 'Search for:', 'label', 'generatepress' ) ); // WPCS: XSS ok, sanitization ok. ?></span>
<div class="ep-container">
<input type="search" class="search-field" placeholder="ชื่อสินค้า, Part Number, Order Code" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr( apply_filters( 'generate_search_label', _ex( 'Search for:', 'label', 'generatepress' ) ) ); // WPCS: XSS ok, sanitization ok. ?>">
</div>
<input type="submit" class="search-submit" value="<?php echo apply_filters( 'generate_search_button', _x( 'ค้นหา', 'submit button', 'generatepress' ) ); // WPCS: XSS ok, sanitization ok. ?>">
</form>