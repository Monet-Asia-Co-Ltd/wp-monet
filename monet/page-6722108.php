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
<input id="input" placeholder="Order Code"></input>
<button id="btn">Click</button>
<p><a id="output" href="">Product URL</a></p>
<script>
function outputBtn(){
  output.textContent = "https://env-monetasia-premiummonet.kinsta.cloud/product/" + input.value; // ⑤
  output.innerHTML = "https://env-monetasia-premiummonet.kinsta.cloud/product/" + input.value;   // ⑥
  output.href = "https://env-monetasia-premiummonet.kinsta.cloud/product/" + input.value;
}
  
window.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input');   // ①
    const output = document.getElementById('output'); // ②
    const btn = document.getElementById('btn');       // ③
    btn.addEventListener('click',outputBtn,false);    // ④
});
</script>
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
