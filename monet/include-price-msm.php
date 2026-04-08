฿<?php
$msm_raw    = get_field('msm_selling_price');
$trusco_raw = get_field('trusco_price');

$msm_price    = floatval(str_replace(',', '', $msm_raw));
$trusco_price = floatval(str_replace(',', '', $trusco_raw));

// =IF(msm*0.95 < trusco*1.1, trusco*1.1, msm*0.95)
if( $msm_price * 0.95 < $trusco_price * 1.1 ) {
    $final_price = $trusco_price * 1.1;
} else {
    $final_price = $msm_price * 0.95;
}

echo number_format($final_price * 1.07);
?>