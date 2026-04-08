<!-- Product -->

<!-- Category List -->

<?php $tax = get_queried_object();
$tax_name = $tax->taxonomy;
$term_id = $tax->term_id;
$check = get_term_children($term_id, $tax_name);
 
if($check): //子タームがある場合 ?>
<h2>รายชื่อหมวดหมู่ <?php single_term_title(); ?></h2>
<?php else: //子タームがない場合 ?>
<?php endif; ?>

<?php
$term_id = get_queried_object_id(); // 所属タームIDを自動判別
$termchildren = get_term_children( $term_id, $tax_name );// 所属タームIDに子タームがある場合を判別
if ( $termchildren ): //子カテゴリーを持つ場合
?>

<div class="c-container">
<?php
$taxonomy_name = get_query_var('taxonomy'); // 所属タクソノミーのIDを自動判別
$terms = get_terms( $taxonomy_name, array(
              'parent' => $term_id,
              'hide_empty' => false,
              'orderby' => 'term_order',
));
foreach ( $terms as $term ) : {
    echo "";
}
?>

<!-- Finish model -->
<?php if( get_field('term_finish_model', $term->taxonomy . '_' . $term->term_id) ): ?>
<?php else: ?>
<!-- Finish model -->

<div class="category-item">
<a href="<?php echo get_term_link( $term ); ?>">

<?php if( get_field('product_category_icon', $term->taxonomy . '_' . $term->term_id) ): ?>
<div class="c-container">

<div class="category-item-img">
<img width="51" height="51" loading="lazy" src="<?php the_field('product_category_icon', $term->taxonomy . '_' . $term->term_id); ?>" alt="<?php echo $term->name; ?>">
</div>

<div class="category-item-title">
<p><?php echo $term->name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : ?><span style="color: red;"><?php echo $term->term_order; ?></span><?php endif; ?>
</div>

</div>
<?php else : ?>
<p><?php echo $term->name; ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : ?><span style="color: red;"><?php echo $term->term_order; ?></span><?php endif; ?>
<?php endif; ?>
</a>
</div>

<?php endif; ?>

<?php endforeach; echo ''; ?>
</div>

<?php endif; ?>
<!-- Category List -->

<!-- Product -->


<h2 class="top-h2">รายชื่อสินค้า <?php single_term_title(); ?></h2>


<div class="c-container">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="related-item">

<?php include("include-taxonomy.php"); ?>

<?php if( has_term('finished-model','trusco_status') ) : ?>

<!-- stock -->
<?php if( get_field('monet_stock') or get_field('th_stock') or get_field('jp_stock')): ?>

<!-- stock yes -->
<span class="trusco-status-finished-roop">เลิกผลิต</span>
<span class="trusco-status-stock-only-roop">สินค้ามีจำนวนจำกัด</span>

<?php if( get_field('next_generation_product_id') ): ?>
<span class="trusco-status-nextp-roduct-roop-3">มีรุ่นทดแทน</span>
<?php endif; ?>

<!-- stock yes -->
<?php else : ?>
<!-- stock no -->

<span class="trusco-status-finished-roop">เลิกผลิต</span>

<?php if( get_field('next_generation_product_id') ): ?>
<!-- stock no next yes-->
<span class="trusco-status-nextp-roduct-roop-2">มีรุ่นทดแทน</span>

<?php if( has_term('can-not-import','trusco_status') ) : ?>
<span class="trusco-status-can-not-import-roop-3">งดนำเข้า</span>
<?php endif; ?>

<!-- stock no next yes-->
<?php else : ?>
<!-- stock no next no-->

<?php if( has_term('can-not-import','trusco_status') ) : ?>
<span class="trusco-status-can-not-import-roop-2">งดนำเข้า</span>
<?php endif; ?>

<!-- stock no next no-->
<?php endif; ?>

<!-- stock no -->
<?php endif; ?>

<?php else : ?>

<?php if( get_field('next_generation_product_id') ): ?>
<span class="trusco-status-nextp-roduct-roop">มีรุ่นทดแทน</span>
<?php endif; ?>

<?php if( has_term('can-not-import','trusco_status') ) : ?>
<span class="trusco-status-can-not-import-roop">งดนำเข้า</span>
<?php endif; ?>

<?php endif; ?>

<?php if( get_field('monet_stock') ): ?>
<span class="trusco-stock-roop-monet">จัดส่งวันนี้</span>
<?php elseif ( get_field('th_stock') ): ?>
<span class="trusco-stock-roop-thai">จัดส่งพรุ่งนี้</span>
<?php endif; ?>

<a href="<?php the_permalink(); ?>">

<?php if(has_post_thumbnail()): the_post_thumbnail(array( 300, 300 )); else: ?>
<?php
$placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';
?>

<img
    width="100"
    height="100"
    loading="lazy"
    src="<?php echo esc_url( $placeholder_url ); ?>"
    alt="กำลังรอรูปภาพสินค้า"
    class="wp-post-image"
/>
<?php endif; ?>
<p><?php the_title(); ?> 1</p>
<p><?php $term = get_the_terms($post->ID,'brand'); echo $term[0]->name; ?></p>
<?php if( get_field('order_code_trusco') ): ?>
<p><?php echo esc_html( get_field('order_code_trusco') ); ?></p>
<?php endif; ?>
<p><?php echo esc_html( get_field('part_number') ); ?></p>
<?php if( get_field('sis_stock') ): ?>
<p><span class="stock-thai stock-style"><?php echo esc_html( get_field('sis_stock') ); ?></span></p>
<?php endif; ?>

<!-- price -->
<?php if( get_field('trusco_price') ): ?>
<!-- t-price -->
<?php if( has_term('promotion-price','trusco_status') ) : ?>
<!-- promotion -->
<div class="price-container">
<div class="sale-price-list">
฿<?php
$str = get_field('trusco_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 1.1);
?>
</div>

<div class="regular-price">
฿<?php
$str = get_field('trusco_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 1.6 *1.2);
?>
</div>
</div>
<!-- promotion -->
<?php else : ?>
<div class="price-container">
<div class="sale-price-list">
฿<?php
$str = get_field('trusco_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 1.6);
?>
</div>

<div class="regular-price">
฿<?php
$str = get_field('trusco_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 1.6 *1.2);
?>
</div>
</div>
<?php endif; ?>
<!-- t-price -->

<?php else : ?>

<!-- j-price -->
<?php if( has_term('promotion-price','trusco_status') ) : ?>
<!-- promotion -->
<div class="price-container">
<div class="sale-price-list">
฿<?php
$str = get_field('orange_book_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 0.35);
?>
</div>

<div class="regular-price">
฿<?php
$str = get_field('orange_book_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 0.5 *1.2);
?>
</div>
</div>
<!-- promotion -->
<?php else : ?>
<div class="price-container">
<div class="sale-price-list">
฿<?php
$str = get_field('orange_book_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 0.5);
?>
</div>

<div class="regular-price">
฿<?php
$str = get_field('orange_book_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 0.5 *1.2);
?>
</div>
</div>
<?php endif; ?>
<!-- j-price -->

<?php endif; ?>
<!-- price -->


</a>
</div>

<?php endwhile; endif; wp_reset_postdata();?>

</div>

<!-- ナビゲーション -->
<div class="activity-nav col-120">
  <div class="s-pagination-strip">
  <?php global $wp_rewrite;
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
      'current' => ($paged ? $paged : 1),
    ));
  ?>
  </div>
</div>
<!-- //ナビゲーション -->