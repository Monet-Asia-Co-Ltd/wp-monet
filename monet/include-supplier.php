<?php
$monet = intval( get_field('monet_stock') );

// =======================================
// ▼ toriyose + KOKEN 判定
// =======================================
$is_toriyose_koken = false;

$trusco_terms = get_the_terms( get_the_ID(), 'trusco_status' );
$brand_terms  = get_the_terms( get_the_ID(), 'brand' );

if ( $trusco_terms && ! is_wp_error( $trusco_terms ) && $brand_terms && ! is_wp_error( $brand_terms ) ) {
    $is_toriyose = false;
    $is_koken    = false;

    foreach ( $trusco_terms as $t_term ) {
        if ( intval( $t_term->term_id ) === 121693 ) {
            $is_toriyose = true;
            break;
        }
    }

    foreach ( $brand_terms as $b_term ) {
        if ( intval( $b_term->term_id ) === 554 ) {
            $is_koken = true;
            break;
        }
    }

    if ( $is_toriyose && $is_koken ) {
        $is_toriyose_koken = true;
    }
}

// ▼ toriyose × KOKEN の場合は専用表示
if ( $is_toriyose_koken ) {
    echo '<span class="supplier-toriyose stock-style">อื่นๆ</span>';
    return;
}

// =======================================
// ▼ supplier 取得
// =======================================
$terms = get_the_terms( get_the_ID(), 'supplier' );

$slug     = '';
$raw_name = '';
$name     = '';

if ( $terms && ! is_wp_error( $terms ) ) {
    $term     = reset( $terms );
    $slug     = $term->slug;
    $raw_name = $term->name;

    // S-XXXX → XXXX（例：S-SIS → SIS）
    if ( stripos( $raw_name, 'S-' ) === 0 ) {
        $name = strtoupper( substr( $raw_name, 2 ) );
    }
}

// =======================================
// ▼ TRUSCO 判定
// =======================================
$is_trusco_supplier = false;

// slug で判定
if ( $slug === 's-trusco-th' || $slug === 's-trusco-jp' ) {
    $is_trusco_supplier = true;
}

// name で判定（S-TRUSCO / S-TRUSCO TH / S-TRUSCO JP）
if ( in_array( $name, ['TRUSCO', 'TRUSCO TH', 'TRUSCO JP'], true ) ) {
    $is_trusco_supplier = true;
}

// =======================================
// ▼ 通常表示
// =======================================

// TRUSCO 系はすべて TRUSCO
if ( $is_trusco_supplier ) {
    echo '<span class="supplier-tt stock-style">TRUSCO</span>';
    return;
}

// monet_stock があっても「MONET」は出さず、サプライヤー名のみ
if ( $name ) {
    echo esc_html( $name );
    return;
}

// supplier 無しの場合
echo '<span class="supplier-tt stock-style">TRUSCO</span>';
?>
