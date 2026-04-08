<?php
$sis_stock      = get_field('sis_stock');
$ktw_stock      = get_field('ktw_stock');
$th_stock       = get_field('th_stock');
$monet_stock    = get_field('monet_stock');
$idec_stock     = get_field('idec_stock');
$supplier_stock = get_field('supplier_stock');

$finished_model = has_term('finished-model', 'trusco_status');

if ( ! $finished_model ) :

    // --- ไทย在庫の集計 ---
    $total_stock = 0;
    foreach ( [ $th_stock, $monet_stock, $ktw_stock, $sis_stock, $supplier_stock, $idec_stock ] as $stk ) {
        if ( is_numeric( $stk ) ) {
            $total_stock += (int) $stk;
        }
    }

    // --- ไทย在庫の表示ブロック ---
    if ( $total_stock > 0 ) {
        $display_stock = (int) $total_stock;
        $formatted = number_format( $display_stock );

        if ( $display_stock === 0 ) {
            $stock_class = '';
        } elseif ( $display_stock >= 1 && $display_stock <= 4 ) {
            $stock_class = 'stock-low stock-style-list';
        } else {
            $stock_class = 'stock-high stock-style-list';
        }
        ?>
        <p>สต็อกในไทย :
            <?php if ( $display_stock === 0 ): ?>
                0
            <?php else: ?>
                <span class="<?php echo esc_attr( $stock_class ); ?>">
                    <?php echo esc_html( $formatted ); ?>
                </span>
            <?php endif; ?>
        </p>
        <?php
    }

endif;
?>