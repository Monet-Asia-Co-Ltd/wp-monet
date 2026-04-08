<?php
$brand_renishaw = array( 'renishaw' );
$brand_idec     = array( 'idec' );
$str   = get_field( 'trusco_price' );
$price = floatval( str_replace( ',', '', $str ) );

if ( has_term( $brand_renishaw, 'brand' ) ) {
    $multiplier = 1.00;
} elseif ( has_term( $brand_idec, 'brand' ) ) {
    $multiplier = 1.10;
} else {
    $multiplier = 1.30;
}

$final = $price * $multiplier * 1.07;
echo '฿' . number_format( $final );
?>