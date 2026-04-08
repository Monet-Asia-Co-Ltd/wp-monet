<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<div <?php generate_do_attr( 'content' ); ?>>
<main <?php generate_do_attr( 'main' ); ?>>


<div id="container" class="wrapper">
<main>
<?php if (have_posts()): ?>
<?php if (!$_GET['s']) { ?>
<p>Search keyword not entered<p>
<?php } else { ?>
<h1 class="page-title">ผลการค้นหาสำหรับ "<?php echo esc_html($_GET['s']); ?>" ทั้งหมด <?php echo $wp_query->found_posts; ?> รายการ</h1>


<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1; // 現在のページ番号を取得

if ($paged == 1) { // 1ページ目のみ表示
    $keyword = esc_html($_GET['s']);
    
    // タクソノミー 'c' のタームを取得
    $terms_c = get_terms(array(
        'taxonomy' => 'c', // タクソノミーのスラッグ
        'name__like' => $keyword,
        'fields' => 'all',
        'hide_empty' => false,
    ));
    
    // タクソノミー 'brand' の親タームを取得
    $terms_brand = get_terms(array(
        'taxonomy' => 'brand', // タクソノミーのスラッグ
        'name__like' => $keyword,
        'fields' => 'all',
        'hide_empty' => false,
        'parent' => 0, // 親タームのみを取得
    ));
    
    // タクソノミー 'c' のタームを表示
    if (!empty($terms_c) && !is_wp_error($terms_c)) :
        echo '<h2>รายชื่อหมวดหมู่ ' . esc_html($keyword) . '</h2>';
        echo '<div class="c-container">';
        foreach ($terms_c as $term) : 
            $product_category_icon = get_field('product_category_icon', $term->taxonomy . '_' . $term->term_id);
            ?>
            <div class="category-item">
                <a href="<?php echo get_term_link($term); ?>">
                    <?php if ($product_category_icon): ?>
                        <div class="c-container">
                            <div class="category-item-img">
                                <img width="51" height="51" loading="lazy" src="<?php echo esc_url($product_category_icon); ?>" alt="<?php echo esc_attr($term->name); ?>">
                            </div>
                            <div class="category-item-title">
                                <p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
                            </div>
                        </div>
                    <?php else : ?>
                        <p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
                    <?php endif; ?>
                </a>
            </div>
        <?php endforeach;
        echo '</div>';
    endif;

    // タクソノミー 'brand' の親タームを表示
    if (!empty($terms_brand) && !is_wp_error($terms_brand)) :
        echo '<h2>รายชื่อแบรนด์ ' . esc_html($keyword) . '</h2>';
        echo '<div class="c-container">';
        foreach ($terms_brand as $term) : 
            $brand_img = get_field('brand_img', $term->taxonomy . '_' . $term->term_id);
            ?>
            <div class="brand-item">
                <a href="<?php echo get_term_link($term); ?>">
                    <?php if ($brand_img): ?>
                        <div class="c-container">
                            <div class="brand-item-img">
                                <img width="211" height="50" loading="lazy" src="<?php echo esc_url($brand_img); ?>" alt="<?php echo esc_attr($term->name); ?>">
                            </div>
                            <div class="brand-item-title">
                                <p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
                            </div>
                        </div>
                    <?php else : ?>
                        <p><?php echo mb_strlen($term->name) > 35 ? mb_substr($term->name, 0, 35) . '....' : $term->name; ?> (<?php echo $term->count; ?>)</p>
                    <?php endif; ?>
                </a>
            </div>
        <?php endforeach;
        echo '</div>';
    endif;

    // 1ページ目かつタームが存在する場合に見出しを表示
    if ((!empty($terms_c) && !is_wp_error($terms_c)) || (!empty($terms_brand) && !is_wp_error($terms_brand))) :
        echo '<h2>รายชื่อสินค้า ' . esc_html($keyword) . '</h2>';
    endif;
}
?>

<div class="c-container">
<?php while(have_posts()):the_post(); ?>
<?php include("include-taxonomy-product.php"); ?>
<?php endwhile; ?>
</div>

<div class="activity-nav col-120">
  <div class="s-pagination-strip">
  <?php
    $paginate_base = get_pagenum_link(1);
    if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
      $paginate_format = '';
      $paginate_base = add_query_arg('paged', '%#%');
    } else {
      $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
      user_trailingslashit('page/%#%/', 'paged');;
      $paginate_base .= '%_%';
    }
    echo paginate_links( array(
      'base' => $paginate_base,
      'format' => $paginate_format,
      'total' => $wp_query->max_num_pages,
      'mid_size' => 1,
      'current' => max(1, get_query_var('paged')),
    ));
  ?>
  </div>
</div>

<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
<?php } ?>
<?php else: ?>
<p>ขออภัยค่ะ ไม่พบสินค้าที่ตรงกับ "<?php echo esc_html($_GET['s']); ?>"<br>
โปรดตรวจสอบตัวสะกดว่าถูกต้องหรือไม่ หรือค้นหาโดยใช้คำที่ใกล้เคียง<br>
กรุณาลองค้นหาใหม่อีกครั้ง<br>
หาสินค้าไม่เจอ <a class="header-link" href="/358-24/">คลิก</a>เพื่อสอบถาม</p>
<?php endif; ?>
</main>
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