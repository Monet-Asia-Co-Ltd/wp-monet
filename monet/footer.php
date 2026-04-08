<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="right-display">
<?php
$line_icon_url = get_site_url() . '/wp-content/uploads/line-icon.svg';
?>

<a class="button-l2" href="https://page.line.me/?accountId=monet.asia">
    <img
        width="45"
        height="45"
        src="<?php echo esc_url( $line_icon_url ); ?>"
        alt="LINE"
        data-lazy-src="<?php echo esc_url( $line_icon_url ); ?>"
        data-ll-status="loaded"
        class="entered lazyloaded"
    >
    <noscript>
        <img
            width="45"
            height="45"
            loading="lazy"
            src="<?php echo esc_url( $line_icon_url ); ?>"
            alt="LINE"
        >
    </noscript>
</a>
</div>
	</div>
</div>

<?php
/**
 * generate_before_footer hook.
 *
 * @since 0.1
 */
do_action( 'generate_before_footer' );
?>

<div <?php generate_do_attr( 'footer' ); ?>>
	<?php
	/**
	 * generate_before_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_before_footer_content' );

	/**
	 * generate_footer hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_footer_widgets - 5
	 * @hooked generate_construct_footer - 10
	 */
	do_action( 'generate_footer' );

	/**
	 * generate_after_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_after_footer_content' );
	?>
</div>

<?php
/**
 * generate_after_footer hook.
 *
 * @since 2.1
 */
do_action( 'generate_after_footer' );

wp_footer();
?>

<?php if ( is_singular('product') ): ?>
<?php if(is_mobile()): ?>
<?php else: ?>
<!-- slick Product -->
<link rel="stylesheet" href="<?php echo get_theme_file_uri('/dist/css/swiper.css'); ?>">
<script src="<?php echo get_theme_file_uri('/dist/js/swiper.js'); ?>"></script>

<script>
var swiper = new Swiper('.swiper-container', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  slidesPerView: 5,
  spaceBetween: 30,
  initialSlide: 2,
  slidesPerGroup: 5,
  loopFillGroupWithBlank: true,
  scrollbar: {
      el: '.swiper-scrollbar',
      hide: true,
  },
});
</script>
<!-- slick Product -->

<!-- pdf Product -->
<?php if(have_rows('pdf_repeater')): ?>
<link rel='stylesheet' id='pdfemb_embed_pdf_css-css' href='<?php echo plugins_url('/PDFEmbedder-premium/css/pdfemb-embed-pdf-5.0.2.css?ver=5.0.2'); ?>' media='all' />
<script type='text/javascript' src='<?php echo includes_url('/js/jquery/jquery.min.js?ver=3.6.1'); ?>' id='jquery-core-js'></script>
<script type='text/javascript' src='<?php echo includes_url('/js/jquery/jquery-migrate.min.js?ver=3.3.2'); ?>' id='jquery-migrate-js'></script>
<script type='text/javascript' id='pdfemb_embed_pdf_js-js-extra'>
/* <![CDATA[ */
var pdfemb_trans = {
"worker_src":"https:\/\/env-monetasia-premiummonet.kinsta.cloud\/wp-content\/plugins\/PDFEmbedder-premium\/js\/pdfjs\/pdf.worker.min.js",
"cmap_url":"https:\/\/env-monetasia-premiummonet.kinsta.cloud\/wp-content\/plugins\/PDFEmbedder-premium\/js\/pdfjs\/cmaps\/",
"objectL10n":{
"loading":"Loading...",
"page":"Page",
"zoom":"Zoom",
"prev":"Previous page",
"next":"Next page",
"zoomin":"Zoom In",
"zoomout":"Zoom Out",
"secure":"Secure",
"download":"Download PDF",
"fullscreen":"Full Screen",
"domainerror":"Error: URL to the PDF file must be on exactly the same domain as the current web page.",
"clickhereinfo":"Click here for more info",
"widthheightinvalid":"PDF page width or height are invalid",
"viewinfullscreen":"View in Full Screen"
},
"continousscroll":"1",
"poweredby":"",
"ajaxurl":"https:\/\/env-monetasia-premiummonet.kinsta.cloud\/wp-admin\/admin-ajax.php"
};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo plugins_url('/PDFEmbedder-premium/js/all-pdfemb-premium-5.0.2.min.js?ver=5.0.2'); ?>' id='pdfemb_embed_pdf_js-js'></script>
<script type='text/javascript' src='<?php echo plugins_url('/PDFEmbedder-premium/js/pdfjs/pdf-5.0.2.min.js?ver=5.0.2'); ?>' id='pdfemb_pdf_js-js'></script>
<?php endif; ?>
<!-- pdf Product -->

<?php endif; ?>

<?php endif; ?>


<?php if ( is_singular( 'post' ) ): ?>
<!-- mokuji -->
<script type="text/javascript">
jQuery(function($) {
    var idcount = 1;
    var toc = '';
    var currentlevel = 0;
    jQuery("article h2,article h3", this).each(function() {
        this.id = "toc-" + idcount;
        idcount++;
        var level = 0;
        if (this.nodeName.toLowerCase() == "h2") {
            level = 1;
        } else if (this.nodeName.toLowerCase() == "h3") {
            level = 2;
        }
        while (currentlevel < level) {
            toc += "<ol>";
            currentlevel++;
        }
        while (currentlevel > level) {
            toc += "</ol>";
            currentlevel--;
        }
        toc += '<li><a href="#' + this.id + '">' + jQuery(this).html() + "</a></li>\n";
    });
    while (currentlevel > 0) {
        toc += "</ol></div>";
        currentlevel--;
    }
    if (jQuery("article h2")[0]) {
        jQuery("#toc").html('<div class="toc-in"><div class="mokuji">สารบัญ</div>'+ toc);
    }
});
</script>
<!-- mokuji -->
<?php endif; ?>
</body>
</html>