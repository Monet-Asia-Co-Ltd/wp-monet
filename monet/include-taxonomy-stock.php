<div class="related-item">

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
<p><?php the_title(); ?></p>
<p><?php $term = get_the_terms($post->ID,'brand'); echo $term[0]->name; ?></p>
<?php if( get_field('order_code_trusco') ): ?>
<p><?php the_field('order_code_trusco'); ?></p>
<?php endif; ?>
<p><?php the_field('part_number'); ?></p>

<?php include("include-taxonomy-price.php"); ?>

</a>
</div>
