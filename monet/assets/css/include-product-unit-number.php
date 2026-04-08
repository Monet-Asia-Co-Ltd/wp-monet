<?php
$unit_price = 0;

if ( $price_type === 'special' ) {

    $str = get_field('special_price');
    $unit_price = floatval(str_replace(',', '', $str));

}
elseif ( $price_type === 'msm' ) {

    $msm_raw    = get_field('msm_selling_price');
    $trusco_raw = get_field('trusco_price');

    $msm_price    = floatval(str_replace(',', '', $msm_raw));
    $trusco_price = floatval(str_replace(',', '', $trusco_raw));

    if ( $msm_price * 0.95 < $trusco_price * 1.1 ) {
        $unit_price = $trusco_price * 1.1;
    } else {
        $unit_price = $msm_price * 0.95;
    }

    $unit_price *= 1.07;

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

    $unit_price = $price * $multiplier * 1.07;

}
elseif ( $price_type === '2510' ) {

    $str = get_field('2510_price');
    $unit_price = floatval(str_replace(',', '', $str)) * 1.07;

}
?>
<?php
$single_unit_number = intval( get_field('single_unit_number') );
$total_price = $single_unit_number * $unit_price;
?>

<?php if ( $single_unit_number && $unit_price ): ?>
สินค้าจำหน่ายเป็นล็อต
(<?php echo esc_html($single_unit_number); ?> ชิ้น
= <?php echo number_format($total_price); ?> บาท)
<?php endif; ?>