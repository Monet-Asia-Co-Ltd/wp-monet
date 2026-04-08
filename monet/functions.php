<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '3.2.1' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = generate_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// Add editor styles to the block editor.
		add_theme_support( 'editor-styles' );

		$editor_styles = apply_filters(
			'generate_editor_styles',
			array(
				'assets/css/admin/block-editor.css',
			)
		);

		add_editor_style( $editor_styles );
	}
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';

/* 【管理画面】管理画面にもファビコンを表示 */
function admin_favicon() {
 echo '<link rel="shortcut icon" type="image/x-icon" href="/wp-content/uploads/favicon_monet.ico" />';
}
add_action('admin_head', 'admin_favicon');
/* 【管理画面】管理画面にもファビコンを表示 */

/* 携帯分岐 */
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return isset($_SERVER['HTTP_USER_AGENT']) && preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

//Remove the blogcard css (Classic Editor)
add_filter('use_block_editor_for_post', '__return_false', 10);

remove_action( 'embed_footer', 'print_embed_sharing_dialog' );

//svg
add_filter('upload_mimes', 'set_mime_types');
function set_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

//imgタグにloading属性を自動で加える
function img_add_loading($html, $id, $alt, $title, $align, $size) {
    return str_replace('/>','loading="lazy" />',$html);
}
add_filter('get_image_tag','img_add_loading', 10, 6);

//Remove Text Editor Quick Button
function custom_quicktags_settings( $qtInit ) {
  $qtInit['buttons'] = ',';
  return $qtInit;
}
add_filter( 'quicktags_settings', 'custom_quicktags_settings' );

//Add Text Editor Quick Button
if ( !function_exists( 'add_quicktags_to_text_editor' ) ):
function add_quicktags_to_text_editor() {
  if (wp_script_is('quicktags')){?>
    <script>
      QTags.addButton('b','b','<b>','</b>');
      QTags.addButton('h2','h2','<h2>','</h2>');
      QTags.addButton('h3','h3','<h3>','</h3>');
      QTags.addButton('h4','h4','<h4>','</h4>');
      QTags.addButton('category','Category (Orange)','<div class="lp-link"><a href="[category_url id=]"></a></div>','');
      QTags.addButton('brand','Brand (Green)','<div class="brand-link"><a href="[category_url id=]"></a></div>','');
      QTags.addButton('text','Text Link','<a href="[category_url id=]"></a>','');
      QTags.addButton('table','Table','<table class="product-term-box">\n<thead><tr>\n<th style="width: 25%;">Head 1</th>\n<th style="width: 25%;">Head 2</th>\n<th style="width: 25%;">Head 3</th>\n<th style="width: 25%;">Head 4</th>\n</tr></thead>\n\n<tr>\n<td></td>\n<td></td>\n<td></td>\n<td></td>\n</tr>\n\n<tr>\n<td></td>\n<td></td>\n<td></td>\n<td></td>\n</tr>\n\n<tr>\n<td></td>\n<td></td>\n<td></td>\n<td></td>\n</tr>\n\n<tr>\n<td></td>\n<td></td>\n<td></td>\n<td></td>\n</tr>\n</table>','');
      QTags.addButton('ul1','Ul','<ul>\n<li></li>\n<li></li>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
      QTags.addButton('ol1','Ol','<ol>\n<li></li>\n<li></li>\n<li></li>\n<li></li>\n<li></li>\n</ol>','');
      QTags.addButton('img1','Img500','<img src="https://www.monet.asia/wp-content/ccmt/co_000_00.jpg" alt="" width="500" height="" loading="lazy" />','');
      QTags.addButton('img2','Img900','<img src="https://www.monet.asia/wp-content/ccmt/co_000_00.jpg" alt="" width="900" height="" loading="lazy" />','');
      QTags.addButton('i50','I50','<div class="b-container">\n<div class="item-50">\n</div>\n\n<div class="item-50">\n</div>\n</div>','');
      QTags.addButton('i33','I33','<div class="b-container">\n<div class="item-33">\n</div>\n\n<div class="item-33">\n</div>\n\n<div class="item-33">\n</div>\n</div>','');
      QTags.addButton('i25','I25','<div class="b-container">\n<div class="item-25">\n</div>\n\n<div class="item-25">\n</div>\n\n<div class="item-25">\n</div>\n\n<div class="item-25">\n</div>\n</div>','');
      QTags.addButton('i20','I20','<div class="b-container">\n<div class="item-20">\n</div>\n\n<div class="item-20">\n</div>\n\n<div class="item-20">\n</div>\n\n<div class="item-20">\n</div>\n\n<div class="item-20">\n</div>\n</div>','');
      QTags.addButton('feature','Feature','<h3>คุณสมบัติ</h3>\n<ul>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
      QTags.addButton('usage','Usage','<h3>การใช้งาน</h3>\n<ul>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
      QTags.addButton('caution','Caution','<h3>ข้อควรระวัง</h3>\n<ul>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
      QTags.addButton('howtouse','How','<h2>วิธีการใช้งาน</h2>\n<ul>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
      QTags.addButton('advice','Advice','<h2>คำแนะนำ</h2>\n<ul>\n<li></li>\n<li></li>\n<li></li>\n</ul>','');
          </script>
  <?php
  }
}
endif;
add_action( 'admin_print_footer_scripts', 'add_quicktags_to_text_editor', 20 );

//Remove Toolbar Button
function remove_wp_nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'wp-logo' ); //WordPressロゴ
    $wp_admin_bar->remove_node( 'updates' ); //更新通知アイコン
    $wp_admin_bar->remove_node( 'comments' ); // コメント
    $wp_admin_bar->remove_node( 'customize' ); // カスタマイズ（ウェブサイト側）
    $wp_admin_bar->remove_node( 'new-content' ); //新規
    $wp_admin_bar->remove_node( 'user-info' ); //マイアカウント → プロフィール
    $wp_admin_bar->remove_node( 'edit-profile' ); //マイアカウント → プロフィール編集
    $wp_admin_bar->remove_node( 'search' ); //検索（ウェブサイト側）
}
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );

// CSS.JSの除外
function dc_dq_style_script() {
  wp_dequeue_style( 'classic-theme-styles' );
  wp_dequeue_style( 'global-styles' );
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'generate-font-icons' );
  wp_dequeue_script( 'generate-menu' );
  wp_dequeue_script( 'generate-classlist' );
  wp_dequeue_script( 'generate-back-to-top' );
  wp_dequeue_script( 'pdf-embedder' );
  if ( !is_page( array( '107','401236','1086297','6740345') ) && !is_singular( 'product' ) ) {
    wp_dequeue_style( 'contact-form-7' );
    wp_dequeue_script( 'contact-form-7' );
    wp_dequeue_script( 'google-invisible-recaptcha' );
    wp_dequeue_script( 'google-recaptcha' );
    wp_dequeue_script( 'wpcf7-recaptcha' );
  }
}
add_action( 'wp_enqueue_scripts', 'dc_dq_style_script',100 );

//カスタム投稿のカテゴリー：カテゴリー選択ボックスで一つだけしか選択できないようにする。 วิธีการนำเข้า
add_action( 'admin_print_footer_scripts', 'select_to_radio_import_method' );
function select_to_radio_import_method() {
    ?>
    <script type="text/javascript">
    jQuery( function( $ ) {
        // 投稿画面
        $( '#taxonomy-import_method input[type=checkbox]' ).each( function() {
            $( this ).replaceWith( $( this ).clone().attr( 'type', 'radio' ) );
        } );

        // 一覧画面
        var import_method_checklist = $( '.import_method-checklist input[type=checkbox]' );
        import_method_checklist.click( function() {
          $( this ).closest( '.import_method-checklist' ).find( ' input[type=checkbox]' ).not(this).prop( 'checked', false );
        } );
    } );
    </script>
    <?php
}

//カスタム投稿のカテゴリー：カテゴリー選択ボックスで一つだけしか選択できないようにする。 Price Source
add_action( 'admin_print_footer_scripts', 'select_to_radio_price_source' );
function select_to_radio_price_source() {
    ?>
    <script type="text/javascript">
    jQuery( function( $ ) {
        // 投稿画面
        $( '#taxonomy-price_source input[type=checkbox]' ).each( function() {
            $( this ).replaceWith( $( this ).clone().attr( 'type', 'radio' ) );
        } );

        // 一覧画面
        var price_source_checklist = $( '.price_source-checklist input[type=checkbox]' );
        price_source_checklist.click( function() {
          $( this ).closest( '.price_source-checklist' ).find( ' input[type=checkbox]' ).not(this).prop( 'checked', false );
        } );
    } );
    </script>
    <?php
}

// category short code
function shortcode_category_url($atts) {
  extract(shortcode_atts(array(
    'id' => 0,
  ), $atts));
  return $id ? get_category_link($id) : '';
}
add_shortcode('category_url', 'shortcode_category_url');

// css for admin or shop manager 
function mytheme_admin_enqueue() {
    if ( current_user_can( 'administrator' ) ) {
        // 管理者用のCSS
        wp_enqueue_style( 'my_admin_css', get_template_directory_uri() . '/assets/css/my-admin-style.css' );
    } else {
        // 管理者以外のユーザー用のCSS
        wp_enqueue_style( 'my_non_admin_css', get_template_directory_uri() . '/assets/css/my-non-admin-style.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'mytheme_admin_enqueue' );


/* Custom Fields to Return in the ElasticSearch Results */
function my_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {  
    $query->set('search_fields', array(
        'post_title',
        'taxonomies' => array( 'c', 'brand' ),
        'meta' => array( 
            'part_number',
            'order_code_trusco',
            'title_en',
            )));
    }
  }
}
add_action('pre_get_posts','my_search_filter',1);

function epio_blog_add_custom_field_ep_weighting( $fields, $post_type ) {
    if ( 'product' === $post_type ) {
        if ( empty( $fields['meta'] ) ) {
            $fields['meta'] = array(
                'label'    => 'Custom Fields',
                'children' => array(),
            );
        }
        // Change my_custom_field here to what you need.
        $key = 'meta.order_code_trusco.value';
        $fields['meta']['children'][ $key ] = array(
            'key'   => $key,
            'label' => __( 'Order Code', 'textdomain' ),
        );

        $key = 'meta.part_number.value';
        $fields['meta']['children'][ $key ] = array(
            'key'   => $key,
            'label' => __( 'Part Number', 'textdomain' ),
        );

        $key = 'meta.title_en.value';
        $fields['meta']['children'][ $key ] = array(
            'key'   => $key,
            'label' => __( 'Title En', 'textdomain' ),
        );
    }

    return $fields;
}
add_filter(
    'ep_weighting_fields_for_post_type',
    'epio_blog_add_custom_field_ep_weighting',
    10,
    2
);

/* brandとcの値を含むカスタムURLに対応するリライトルールを追加 */
function add_custom_rewrite_rule() {
    add_rewrite_rule(
        '^brand/([^/]*)/c/([^/]*)/?$', // URLパターン
        'index.php?brand=$matches[1]&c=$matches[2]', // クエリ変数
        'top' // ルールの優先度
    );
}
add_action('init', 'add_custom_rewrite_rule', 10, 0);

/* brandとcという新しいクエリ変数をWordPressに登録 */
function add_custom_query_vars($vars) {
    $vars[] = 'brand';
    $vars[] = 'c';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

/* カスタムテンプレートをロード */
function load_custom_template() {
    $brand = get_query_var('brand');
    $c = get_query_var('c');

    if ($brand && $c) {
        include(get_template_directory() . '/taxonomy-brand-c.php');
        exit;
    }
}
add_action('template_redirect', 'load_custom_template');

/* サイト内の製品一覧を全てorderbyをmenu_orderの順にする */
function my_custom_orderby($query) {
    if ($query->is_search() && !is_admin() ) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'my_custom_orderby');

// コンタクトフォーム送信前にhiddenフィールドに値を設定するJavaScriptを追加
add_action('wp_footer', 'add_custom_js_to_cf7');
function add_custom_js_to_cf7() {
    if (is_singular()) {
        global $post;
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var orderCodeTrusco = '<?php echo get_post_meta($post->ID, 'order_code_trusco', true); ?>';
                var partNumber = '<?php echo get_post_meta($post->ID, 'part_number', true); ?>';
                var pageTitle = '<?php echo get_the_title($post->ID); ?>';
                var pageUrl = '<?php echo get_permalink($post->ID); ?>';

                document.getElementById('order_code_trusco').value = orderCodeTrusco;
                document.getElementById('part_number').value = partNumber;
                document.getElementById('page_title').value = pageTitle;
                document.getElementById('page_url').value = pageUrl;
            });
        </script>
        <?php
    }
}

// エディタがログイン後にトップへリダイレクト
add_action('admin_init', 'redirect_subscribers_to_home');
add_action('wp_loaded', 'redirect_subscribers_to_home');
function redirect_subscribers_to_home() {
    if (current_user_can('subscriber') && is_admin()) {
        wp_redirect(home_url());
        exit;
    }
}
add_filter('login_redirect', 'redirect_subscribers_after_login', 10, 3);
function redirect_subscribers_after_login($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles) && in_array('subscriber', $user->roles)) {
        return home_url();
    }
    return $redirect_to;
}