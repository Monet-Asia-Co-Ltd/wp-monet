<?php
// 価格を事前に取得・整形（カンマ除去 → float化）
$special_price_raw = get_field('special_price');
$msm_price_raw     = get_field('msm_selling_price');
$trusco_price_raw  = get_field('trusco_price');

$special_price = floatval(str_replace(',', '', $special_price_raw));
$msm_price     = floatval(str_replace(',', '', $msm_price_raw));
$trusco_price  = floatval(str_replace(',', '', $trusco_price_raw));


// 優先順位に従って利用する価格を決定
if( $special_price > 0 ) {
    $price_type = 'special';
}
elseif( $trusco_price > 0 ) {
    // ★ ターム120736に属している場合は msm を無視して trusco を優先
    if( $msm_price > 0 && !has_term(120736, 'trusco_status') ) {
        $price_type = 'msm';
    } else {
        $price_type = 'trusco';
    }
}
else {
    $price_type = 'none';
}
?>

<?php if( $price_type === 'special' ): ?>

<!-- special-price -->
<div class="price-container">
  <div class="sale-price price-o">
    <?php include("include-price-sp.php"); ?>
  </div>
  <div class="vat-price"></div>
</div>
<!-- special-price -->

<?php elseif( $price_type === 'msm' ): ?>

<!-- msm-price -->

<?php
$msm_raw    = get_field('msm_selling_price');
$trusco_raw = get_field('trusco_price');

$msm_price    = floatval(str_replace(',', '', $msm_raw));
$trusco_price = floatval(str_replace(',', '', $trusco_raw));

// デフォルト
$sale_price_class = "sale-price";

// =IF(msm*0.95 < trusco*1.1, trusco*1.1, msm*0.95)
if ( $msm_price * 0.95 < $trusco_price * 1.1 ) {

    // trusco優先の場合（今回は class 変更なし想定）
    $sale_price_class = "sale-price";

} else {

    $final_price = $msm_price * 0.95;

    // msm優先（大きい場合）
    if ( $final_price > $trusco_price * 1.3 ) {
        $sale_price_class = "sale-price price-b";
    }
    // msm優先（小さい場合）
    else {
        $sale_price_class = "sale-price price-pp";
    }
}
?>
<div class="price-container">
  <div class="<?php echo esc_attr($sale_price_class); ?>">
      <?php include("include-price-msm.php"); ?>
  </div>
  <div class="vat-price"></div>
</div>
<!-- msm-price -->

<?php elseif( $price_type === 'trusco' ): ?>

<!-- trusco-price -->
<div class="price-container">
  <div class="sale-price price-g">
    <?php include("include-price-tr.php"); ?>
  </div>
  <div class="vat-price"></div>
</div>
<!-- trusco-price -->

<?php endif; ?>