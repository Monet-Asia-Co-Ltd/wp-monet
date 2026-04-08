<?php
$unit_price_raw = 0;

/* =========================
   単価（生値）を算出
========================= */
if ( $price_type === 'special' ) {

    // special_price は税込み
    $str = get_field('special_price');
    $unit_price_raw = floatval(str_replace(',', '', $str));

}
elseif ( $price_type === 'msm' ) {

    $msm_raw    = get_field('msm_selling_price');
    $trusco_raw = get_field('trusco_price');

    $msm_price    = floatval(str_replace(',', '', $msm_raw));
    $trusco_price = floatval(str_replace(',', '', $trusco_raw));

    if ( $msm_price * 0.95 < $trusco_price * 1.1 ) {
        $unit_price_raw = $trusco_price * 1.1;
    } else {
        $unit_price_raw = $msm_price * 0.95;
    }

    // VAT 7%
    $unit_price_raw *= 1.07;

}
elseif ( $price_type === 'trusco' ) {

    $str   = get_field('trusco_price');
    $price = floatval(str_replace(',', '', $str));

    if ( has_term( array('renishaw'), 'brand' ) ) {
        $multiplier = 1.00;
    } elseif ( has_term( array('idec'), 'brand' ) ) {
        $multiplier = 1.10;
    } else {
        $multiplier = 1.30;
    }

    $unit_price_raw = $price * $multiplier * 1.07;

}
elseif ( $price_type === '2510' ) {

    $str = get_field('2510_price');
    $unit_price_raw = floatval(str_replace(',', '', $str)) * 1.07;
}

/* =========================
   丸め（ここで1回だけ）
========================= */
$unit_price = round($unit_price_raw);

/* =========================
   ロット計算
========================= */
$order_unit  = intval( get_field('order_unit') );
$total_price = $order_unit * $unit_price;
?>


<?php if ( $order_unit && $unit_price ): ?>
<p style="margin-bottom: 10px;">สินค้าจำหน่ายเป็นล็อต
(<?php echo esc_html($order_unit); ?> ชิ้น
= ฿<?php echo number_format($total_price); ?>)</p>
<?php endif; ?>