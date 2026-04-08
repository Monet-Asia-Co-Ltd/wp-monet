<div class="related-item">

<?php
$next_gen = get_field('next_generation_product_id');
if ( ! empty($next_gen) ) : ?>
    <span class="trusco-status-nextp-roduct-roop">มีรุ่นทดแทน</span>
<?php elseif ( has_term('finished-model', 'trusco_status') ) : ?>
    <span class="trusco-status-finished-roop">เลิกผลิต</span>
<?php endif; ?>

<?php
// 未フォーマットの生値で取得（第3引数 false）
$monet_raw = get_field('monet_stock', false, false);
$th_raw    = get_field('th_stock',    false, false);
$jp_raw    = get_field('jp_stock',    false, false);
$ktw_raw   = get_field('ktw_stock',   false, false);
$sis_raw   = get_field('sis_stock',   false, false);

// 関数の再定義を避ける
if ( ! function_exists('monet_has_stock') ) {
    function monet_has_stock($v) {
        if (is_array($v)) {
            foreach ($v as $x) {
                if (is_array($x)) {
                    if (!empty($x)) return true;
                } else {
                    $s = trim((string)$x);
                    if ($s !== '' && $s !== '0') return true;
                }
            }
            return false;
        }
        if (is_bool($v)) return $v;
        $s = trim((string)$v);
        return ($s !== '' && $s !== '0'); // '0' は在庫なし扱い
    }
}

$finished_model   = has_term('finished-model', 'trusco_status');
$is_thai_purchase = has_term('thai-purchase', 'import_method');

if ( ! $finished_model ) {
    $has_thai_stock = monet_has_stock($monet_raw)
        || monet_has_stock($th_raw)
        || monet_has_stock($ktw_raw)
        || monet_has_stock($sis_raw);

    $has_jp_stock = monet_has_stock($jp_raw)
        ;

    if ($has_thai_stock) {
        echo '<span class="trusco-stock-roop-thai">จัดส่งพรุ่งนี้</span>';
    } elseif ($has_jp_stock && ! $is_thai_purchase) {
        // thai-purchase の場合は 9 日表示を出さない
        echo '<span class="trusco-stock-roop-jp">จัดส่ง 9 วันทำการ</span>';
    }
}
?>


<a href="<?php the_permalink(); ?>">
<?php
$post_id = get_the_ID();
$thumbnail = has_post_thumbnail();
$terms = get_the_terms($post_id, 'brand');
$order_code = get_field('order_code_trusco', $post_id);
$part_number = get_field('part_number', $post_id);
?>

<?php if ($thumbnail): ?>
    <?php the_post_thumbnail([300, 300]); ?>
<?php else: ?>
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
<p><?php echo (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : 'No brand'; ?></p>
<?php if ($order_code): ?>
    <p><?php echo esc_html($order_code); ?></p>
<?php endif; ?>
<?php if ($part_number): ?>
    <p><?php echo esc_html($part_number); ?></p>
<?php endif; ?>

<!-- price -->
<?php if( has_term('finished-model','trusco_status') ) : ?>
<?php if( get_field('monet_stock') or get_field('th_stock') or get_field('jp_stock')): ?>
<?php include __DIR__ . '/include-product-price.php'; ?>
<?php endif; ?>
<?php else : ?>
<?php include __DIR__ . '/include-product-price.php'; ?>
<?php endif; ?>
<!-- price -->

<!-- stock -->
<?php include("include-taxonomy-product-list-stock.php"); ?>
<!-- stock -->
</a>
</div>