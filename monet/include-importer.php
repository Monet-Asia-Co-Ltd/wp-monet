<?php if ( has_term( 'threebond', 'brand' ) ): ?>
    THREEBOND TH
<?php elseif ( ! empty( get_field( 'th_stock' ) ) ): ?>
    TRUSCO
<?php else: ?>
<?php
// サプライヤーが決まっていれば表示（ただし term_id=116179 は除外）
$terms = get_the_terms( get_the_ID(), 'supplier' );
$term  = null;
if ( $terms && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $t ) {
        if ( (int) $t->term_id !== 116179 ) {
            $term = $t;
            break;
        }
    }
}

if ( $term ) {
    if ( (int) $term->term_id === 119185 ) {
        // 特別ルール: term_id=119185 の場合
        echo 'CHUKOH CHEMICAL TH';
    } else {
        $raw_name = $term->name;
        if ( $raw_name !== '' ) {
            // "S-" 接頭辞を外して大文字化。なければそのまま出力
            if ( stripos( $raw_name, 'S-' ) === 0 ) {
                $name = strtoupper( substr( $raw_name, 2 ) );
            } else {
                $name = $raw_name;
            }
            echo esc_html( $name );
        }
    }
}
?>
<?php endif; ?>