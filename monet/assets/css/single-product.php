<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
<?php
/**
 * The template for displaying single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
<div class="inside-article">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<?php if( current_user_can('administrator') ) : ?>
<span style="color: orange;"><?php the_post_thumbnail_url( 'medium' ); ?></span>
<?php endif; ?>

<div class="sub-title">
<p>
<?php
$terms = get_the_terms(get_the_ID(), 'brand');

if ($terms && !is_wp_error($terms)) {
    $term = reset($terms);
    $ancestors = get_ancestors($term->term_id, 'brand');

    if (!empty($ancestors)) {
        $top_id = end($ancestors);            // 末尾＝最上位の祖先
        $top    = get_term($top_id, 'brand');
    } else {
        $top = $term;
    }

    if (!is_wp_error($top) && $top) {
        echo '<a href="' . esc_url(get_term_link($top)) . '">' . esc_html($top->name) . '</a>';
    }
}
?>
</p>

<?php if( get_field('part_number') ): ?>
<p><?php echo esc_html( get_field('part_number') ); ?></p>
<?php endif; ?>
<h1><?php the_title(); ?></h1>
<?php if( get_field('title_en') ): ?>
<p><?php echo esc_html( get_field('title_en') ); ?></p>
<?php endif; ?>
</div>

<?php if( has_term('finished-model','trusco_status') ) : ?>
    <span class="trusco-status-finished">เลิกผลิต</span>

<?php else : ?>

    <?php if( has_term('good-design','c') ) : ?>
        <span class="trusco-status-gmark">
			<?php
			$img_url = get_site_url() . '/wp-content/uploads/logo_g-mark-2.svg';
			echo '<img src="' . esc_url($img_url) . '" alt="Good Design" width="125" height="27" loading="lazy">';
			?>
	    </span>
    <?php endif; ?>

    <?php if( has_term('additional-transportation-fee','trusco_status') ) : ?>
        <span class="trusco-status-stock-only">มีค่าขนส่ง</span>
    <?php endif; ?>

    <?php if( has_term('assembly-type','trusco_status') ) : ?>
        <span class="trusco-status-assembly-type">ประกอบเอง</span>
    <?php endif; ?>

    <?php if( has_term('100v','trusco_status') ) : ?>
        <span class="trusco-status-100v">สินค้านี้ใช้ไฟฟ้า 100V เท่านั้น</span>
    <?php endif; ?>

<?php endif; ?>


<?php if( get_field('next_generation_product_id') ): ?>
<div class="next-generation-product">
<p>สินค้ารายการนี้มีรุ่นทดแทน</p>
<?php
$url = get_field('next_generation_product_id');
if ( $url ) {
    $slug = basename(untrailingslashit($url)); // URL末尾のスラッグを取得
    $post = get_page_by_path($slug, OBJECT, 'product'); // 投稿タイプ 'product' を指定

    if ( $post ) {
        setup_postdata($post);
        include( get_template_directory() . '/embed-content.php' );
        wp_reset_postdata();
    } else {
        echo '<a href="' . esc_url($url) . '">' . esc_html($url) . '</a>';
    }
}
?>




<?php endif; ?>

		<?php
		/**
		 * generate_before_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_featured_page_header_inside_single - 10
		 */
		do_action( 'generate_before_content' );

		if ( generate_show_entry_header() ) :
			?>
			<?php
		endif;

		/**
		 * generate_after_entry_header hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_post_image - 10
		 */
		do_action( 'generate_after_entry_header' );

		$itemprop = '';

		if ( 'microdata' === generate_get_schema_type() ) {
			$itemprop = ' itemprop="text"';
		}
		?>

		<div class="entry-content"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>

<div class="b-container">
<div class="product-item">

<div class="image-container">

<?php if(have_rows('product_image_gallery')): ?>
<div class="fotorama" data-nav="thumbs">
<?php the_post_thumbnail(); ?>
<?php while(have_rows('product_image_gallery')): the_row(); ?>
<img src="<?php echo esc_url( get_sub_field('img') ); ?>" width="441" height="441" loading="lazy" alt="" class="attachment-post-thumbnail">
<?php endwhile; ?>
</div>
<?php if( has_term( array( 'mitsubishi-electric', 'fuji-electric' ), 'brand' ) ) : ?>
<div class="text2">Sample Image</div>
<?php endif; ?>
<?php else: ?>
<?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
<?php the_post_thumbnail(); ?>
<?php if( has_term( array( 'mitsubishi-electric', 'fuji-electric' ), 'brand' ) ) : ?>
<div class="text">Sample Image</div>
<?php endif; ?>
<?php else: ?><!-- アイキャッチが無い時-->
<?php
$placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';
?>
<img
    src="<?php echo esc_url( $placeholder_url ); ?>"
    alt="no image"
    width="500"
    height="50"
    loading="lazy"
/>
<?php endif; ?>

<?php endif; ?>
</div>

</div>

<div class="product-item">

<!-- price -->
<?php if( has_term('finished-model','trusco_status') ) : ?>
<?php else : ?>
<?php include __DIR__ . '/include-product-price.php'; ?>
<?php endif; ?>
<!-- price -->

<!-- unit number -->
<?php include __DIR__ . '/include-product-unit-number.php'; ?>
<!-- unit number -->

<table>
<?php if( current_user_can('administrator') ) : ?>
<tr style="color: red;">
	<th>Special Price</th>
	<td>฿<?php echo esc_html( get_field('special_price') ); ?></td>
</tr>

<tr style="color: red;">
	<th>Monet Price</th>
	<td>฿<?php
$trusco_raw   = get_field('trusco_price'); 
$trusco_price = floatval(str_replace(',', '', $trusco_raw)); // カンマ除去＋数値化
echo number_format($trusco_price * 1.3 * 1.07, 0); 
?></td>
</tr>

<tr style="color: red;">
	<th>Buying Price</th>
	<td>฿<?php echo esc_html( get_field('trusco_price') ); ?></td>
</tr>

<tr style="color: red;">
	<th>MSM Price</th>
	<td>฿<?php echo esc_html( get_field('msm_selling_price') ); ?></td>
</tr>

<tr style="color: red;">
	<th>2510 Price</th>
	<td>฿<?php echo esc_html( get_field('2510_price') ); ?></td>
</tr>

<tr style="color: orange;">
	<th>OB Price</th>
	<td>¥<?php echo esc_html( get_field('orange_book_price') ); ?></td>
</tr>

<tr style="color: orange;">
	<th>Status</th>
	<td>
<?php
    $ID = get_the_ID();
	if ( get_post_status ( $ID ) == 'draft' ) {
		echo 'draft';
	} else {
		echo 'publish';
	}
?>
	</td>
</tr>

<tr style="color: orange;">
	<th>Product ID</th>
	<td><?php the_ID(); ?></td>
</tr>

<tr style="color: orange;">
	<th>Image ID</th>
	<td>
<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id($post_id);
if ($thumbnail_id) {
    echo $thumbnail_id;
}
?>
	</td>
</tr>

<tr style="color: orange;">
	<th>Table Order</th>
	<td><?php echo esc_html( get_field('product_table_order') ); ?></td>
</tr>
<?php endif; ?>

<tr>
	<th>แบรนด์</th>
	<td>
<?php 
$terms = get_the_terms(get_the_ID(), 'brand'); 
if ( !is_wp_error($terms) && !empty($terms) ) {
    foreach ( $terms as $term ) {
        if ( $term->parent == 0 ) {
            echo esc_html( $term->name );
            break;
        }
    }
}
?>
	</td>
</tr>

<tr>
	<th>รหัสสินค้า</th>
	<td><?php echo esc_html( get_field('part_number') ); ?></td>
</tr>

<?php if( get_field('jan_code') ): ?>
<tr>
	<th>รหัสบาร์โค้ด</th>
	<td><?php echo esc_html( get_field('jan_code') ); ?></td>
</tr>
<?php endif; ?>

<tr>
	<th>รหัสสั่งซื้อ</th>
	<td>
		<?php
		$order_code = get_field( 'order_code_trusco' );
		if ( empty( $order_code ) ) {
		    $order_code = get_field( 'part_number' );
		}
		echo esc_html( $order_code );
		?>
	</td>
</tr>

<!-- stock -->
<?php if( has_term('s-ofm','supplier') ) : ?>
<?php elseif( has_term('finished-model','trusco_status') ) : ?>
<?php elseif ( 
    has_term( array('s-amp', 's-sanby', 's-artlink', 's-total-m', 's-jsr', 's-poa', 's-teeya-phaiboon', 's-sus'), 'supplier' )
    || ( has_term( 'midori-anzen', 'brand' ) && has_term( 'thai-purchase', 'import_method' ) )
) : ?>

    <?php if ( ! has_term('finished-model', 'trusco_status') ) : ?>
        <tr>
            <th>สต็อก</th>
            <td>ไทย: <span class="stock-high stock-style">100</span></td>
        </tr>
        <tr>
            <th>กำหนดการจัดส่ง</th>
            <td><span class="stock-maker stock-style">โปรดติดต่อเจ้าหน้าที่</span></td>
        </tr>
    <?php endif; ?>
<?php else : ?>

<?php
/* ----------------------------------------
 * 在庫表示用（1項目）
 * 数量 → (สต็อกใน XXX)
 * -------------------------------------- */
function monet_css_render_stock_item($label, $stock) {
    $stock_num = (int) $stock;
    $formatted = number_format($stock_num);

    // ラベル変換
    switch ($label) {
        case 'Monet':
            $label_text = '(สต็อกใน Monet)';
            break;
        case 'ไทย':
            $label_text = '(สต็อกในไทย)';
            break;
        case 'ญี่ปุ่น':
            $label_text = '(สต็อกในญี่ปุ่น)';
            break;
        default:
            $label_text = esc_html($label);
    }

    // 0 の場合
    if ($stock_num === 0) {
        return '<span class="stock-non stock-style">0</span> ' . esc_html($label_text);
    }

    // 1以上の場合
    $class = ($stock_num <= 4) ? 'stock-low' : 'stock-high';

    return '<span class="' . esc_attr($class) . ' stock-style">'
        . esc_html($formatted)
        . '</span> '
        . esc_html($label_text);
}

/* ----------------------------------------
 * 在庫取得＆数値化
 * -------------------------------------- */
$monet_stock    = (int) get_field('monet_stock');
$th_stock       = (int) get_field('th_stock');
$ktw_stock      = (int) get_field('ktw_stock');
$sis_stock      = (int) get_field('sis_stock');
$supplier_stock = (int) get_field('supplier_stock');
$idec_stock     = (int) get_field('idec_stock');
$jp_stock       = (int) get_field('jp_stock');

/* ----------------------------------------
 * ターム判定
 * -------------------------------------- */
$is_thai_purchase  = has_term('thai-purchase', 'import_method');
$is_cannot_sell    = has_term('cannot-sell', 'trusco_status');
$is_finished_model = has_term('finished-model', 'trusco_status');

/* ----------------------------------------
 * タイ在庫合算
 * -------------------------------------- */
$thai_stock = $th_stock + $ktw_stock + $sis_stock + $supplier_stock + $idec_stock;

/* ----------------------------------------
 * 121693（取り寄せ／プレオーダー）判定
 * -------------------------------------- */
$is_toriyose = false;
$trusco_terms = get_the_terms(get_the_ID(), 'trusco_status');

if (!is_wp_error($trusco_terms) && !empty($trusco_terms)) {
    foreach ($trusco_terms as $t_term) {
        if ((int) $t_term->term_id === 121693) {
            $is_toriyose = true;
            break;
        }
    }
}

/* ----------------------------------------
 * 表示開始
 * -------------------------------------- */
echo '<tr>';
echo '<th>สต็อก</th>';
echo '<td>';

/* ----------------------------------------
 * 表示ロジック
 * -------------------------------------- */

// 0. 121693（取り寄せ）かつ Monet / ไทย 在庫なし
if (
    $is_toriyose &&
    $monet_stock <= 0 &&
    $thai_stock  <= 0
) {

echo '<span class="stock-non stock-style">0</span> (สินค้าต้องพรีออเดอร์)';

// 1. Monet在庫がある場合
} elseif ($monet_stock > 0) {

    echo monet_css_render_stock_item('Monet', $monet_stock) . '<br>';
    echo monet_css_render_stock_item('ไทย', $thai_stock);

    if (!$is_thai_purchase) {
        echo '<br>' . monet_css_render_stock_item('ญี่ปุ่น', $jp_stock);
    }

// 2. Thai在庫がある場合
} elseif ($thai_stock > 0) {

    echo monet_css_render_stock_item('ไทย', $thai_stock);

    if (!$is_thai_purchase) {
        echo '<br>' . monet_css_render_stock_item('ญี่ปุ่น', $jp_stock);
    }

// 3. JP在庫のみ（販売可）
} elseif ($jp_stock > 0 && !$is_cannot_sell) {

    echo monet_css_render_stock_item('ไทย', 0);

    if (!$is_thai_purchase) {
        echo '<br>' . monet_css_render_stock_item('ญี่ปุ่น', $jp_stock);
    }

// 4. 全在庫なし（finished-model 除外）
} elseif (!$is_cannot_sell && !$is_finished_model) {

    echo monet_css_render_stock_item('ไทย', 0);

    if (!$is_thai_purchase) {
        echo '<br>' . monet_css_render_stock_item('ญี่ปุ่น', 0);
    }
}

echo '</td>';
echo '</tr>';
?>




<!-- Lead Time -->
<?php
// 在庫合計（即納分 = Monet + ไทย在庫合算）
$fast_stock  = $monet_stock + $thai_stock;
$total_stock = $fast_stock + $jp_stock;

// 輸入方法判定
$is_air  = has_term(['air', 'air-battery', 'air-regulation-product'], 'import_method');
$is_ship = has_term(['ship', 'ship-chemical'], 'import_method');

// 輸送手段によるリードタイム（日）
$jp_days = $is_air ? 9 : ($is_ship ? 30 : null);
?>

<tr>
    <th>กำหนดการจัดส่ง</th>
    <td>
        <?php if ( $total_stock === 0 ) : ?>
            <span class="stock-maker stock-style">โปรดติดต่อเจ้าหน้าที่</span>

        <?php elseif ( $jp_days === null ) : ?>
            <?php if ( $fast_stock > 0 ) : ?>
                <!-- ไทยまたはMonetの即納在庫がある -->
                <div><?php echo esc_html("ไม่เกิน {$fast_stock} ชิ้น : 3 วันทำการ"); ?></div>
                <div><?php echo esc_html(($fast_stock + 1) . " ชิ้นขึ้นไป : โปรดติดต่อเจ้าหน้าที่"); ?></div>
            <?php else : ?>
                <!-- 即納分がない場合は、問い合わせだけ -->
                <span class="stock-maker stock-style">โปรดติดต่อเจ้าหน้าที่</span>
            <?php endif; ?>

        <?php else : ?>
            <?php if ( $fast_stock > 0 ) : ?>
                <div><?php echo esc_html("ไม่เกิน {$fast_stock} ชิ้น : 3 วันทำการ"); ?></div>
            <?php endif; ?>

            <?php if ( $jp_stock > 0 ) : ?>
                <?php
                    $jp_limit = $fast_stock + $jp_stock;
                    echo '<div>' . esc_html("ไม่เกิน {$jp_limit} ชิ้น : {$jp_days} วันทำการ") . '</div>';
                ?>
            <?php endif; ?>

            <?php if ( $total_stock > 0 ) : ?>
                <?php
                    $over_limit = $fast_stock + $jp_stock + 1;
                    echo '<div>' . esc_html("{$over_limit} ชิ้นขึ้นไป : โปรดติดต่อเจ้าหน้าที่") . '</div>';
                ?>
            <?php endif; ?>
        <?php endif; ?>
    </td>
</tr>
<!-- Lead Time -->

<?php endif; ?>

<!-- stock -->

<tr>
	<th>ผู้นำเข้า</th>
	<td><?php include("include-importer.php"); ?></td>
</tr>

<!-- Import Method -->
<?php
if ( ! has_term('thai-purchase', 'import_method') ) :
?>
<tr>
	<th>วิธีการนำเข้า</th>
	<td>
		<?php
		if ( has_term(['air', 'air-battery', 'air-regulation-product'], 'import_method') ) {
			echo 'ทางแอร์';
		} elseif ( has_term(['ship', 'ship-chemical'], 'import_method') ) {
			echo 'ทางเรือ';
		}
		?>
	</td>
</tr>
<?php endif; ?>

<?php
if ( ! has_term('thai-purchase', 'import_method') ) {
	$import_method_notes = [
		'air-battery' => 'สินค้ามีแบตเตอรี่ อาจจะทำให้วันกำหนดส่งของล่าช้ากว่าที่ตกลงกัน',
		'ship-chemical' => 'สินค้ากลุ่มเคมีภัณฑ์ อาจจะทำให้วันกำหนดส่งล่าช้ากว่าที่ตกลงกัน',
		'air-regulation-product' => 'สินค้ากลุ่มเครื่องมือเครื่องมือ ชั่ง ตวง วัด อาจจะทำให้วันกำหนดส่งล่าช้ากว่าที่ตกลงกัน'
	];

	foreach ( $import_method_notes as $term => $note ) {
		if ( has_term($term, 'import_method') ) {
			echo '<tr><th>หมายเหตุ</th><td>' . esc_html($note) . '</td></tr>';
			break;
		}
	}
}
?>
<!-- Import Method -->
<tr>
	<th>ซัพพลายเออร์</th>
	<td><?php include("include-supplier.php"); ?></td>
</tr>

<?php 
$weight = get_field('weight');
$has_additional_fee = has_term('additional-transportation-fee', 'trusco_status');
$has_100v = has_term('100v', 'trusco_status');

if ( $has_additional_fee || ( $weight && $weight >= 10000 ) || $has_100v ): ?>
<tr>
	<th>คำเตือน</th>
	<td>
		<?php if ( $has_additional_fee || ( $weight && $weight >= 10000 ) ) : ?>
			<span class="status-warning stock-style">สินค้าขนาดใหญ่ / หนัก มีค่าขนส่ง</span>
		<?php endif; ?>
		<?php if ( $has_100v ) : ?>
			<span class="status-warning stock-style">สินค้ารายการนี้สำหรับไฟฟ้า 100V</span>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php
$posted_date = get_the_date('d/m/Y');
$modified_date = get_the_modified_date('d/m/Y');
?>
<tr>
	<th>Registered</th>
	<td><?php echo esc_html($posted_date); ?></td>
</tr>
<tr>
	<th>Updated</th>
	<td><?php echo esc_html($modified_date); ?></td>
</tr>
</table>

<?php if( has_term('google-translate', 'trusco_status') ): ?>
<p class="tai">เนื้อหาบางส่วนของหน้านี้ แปลโดย AI หากมีข้อสงสัยโปรดติดต่อเจ้าหน้าที่ทางแชท</p>
<?php endif; ?>

<div class="single-line">
<div class="button-line"><a class="button-l" href="https://page.line.me/?accountId=monet.asia"><div class="box-contact"><div class="button-left"><?php
$img_url = get_site_url() . '/wp-content/uploads/line-icon.svg';
echo '<img src="' . esc_url($img_url) . '" alt="LINE" width="55" height="55" loading="lazy">';
?></div><div class="button-right"> สอบถามสินค้า</div></div></a></div>
</div>
</tr>

</div>
</div>

<div class="single-product-spec">
<?php
$features = get_field('features');
if ($features) {
  $features_content = apply_filters('the_content', $features);
  if (strpos($features, '<li>') !== false) {
    echo '<ul class="product-page-list box-features">';
    echo $features_content;
    echo '</ul>';
  } else {
    echo $features_content;
  }
}
?>

<table border class="product-specification">

<?php if( get_field('specification') ): ?>
<tr>
	<th>ข้อมูลสินค้า</th>
	<td>
		<?php
		$spec = get_field('specification');
		if (strip_tags($spec) === $spec) {
		  echo wp_kses_post(nl2br($spec));
		} elseif (strpos($spec, '<li>') !== false) {
		  echo '<ul class="product-page-list">';
		  echo wp_kses_post($spec);
		  echo '</ul>';
		} else {
		  echo wp_kses_post($spec);
		}
		?>
	</td>
</tr>
<?php endif; ?>

<?php if( get_field('material') ): ?>
<tr>
	<th>วัสดุ</th>
	<td>
		<?php
		$material = get_field('material');
		if (strpos($material, '<li>') !== false) {
		  echo '<ul class="product-page-list">';
		  echo wp_kses_post($material);
		  echo '</ul>';
		} else {
		  echo wp_kses_post($material);
		}
		?>
	</td>
</tr>
<?php endif; ?>

<?php if( get_field('set') ): ?>
<tr>
	<th>อุปกรณ์ในกล่อง</th>
	<td>
		<?php
		$set = get_field('set');
		if (strpos($set, '<li>') !== false) {
		  echo '<ul class="product-page-list">';
		  echo wp_kses_post($set);
		  echo '</ul>';
		} else {
		  echo wp_kses_post($set);
		}
		?>
	</td>
</tr>
<?php endif; ?>

<tr>
	<th>น้ำหนัก</th>
	<td>
		<?php 
		$weight = get_field('weight');
		if( $weight ): 
		  if($weight >= 1000){
		    echo $weight/1000 . 'kg';
		  } else {
		    echo $weight . 'g';
		  }
		endif; 
		?>
	</td>
</tr>

<?php if( get_field('application') ): ?>
<tr>
	<th>การใช้งาน</th>
	<td>
		<?php echo wp_kses_post( get_field('application') ); ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( get_field('caution') ): ?>
<tr>
	<th>คำเตือน</th>
	<td>
		<?php
		$caution = get_field('caution');
		$has_li = strpos($caution, '<li>') !== false;
		?>
		<?php if ($has_li): ?>
		  <ul class="product-page-list">
		    <?php echo wp_kses_post($caution); ?>
		  </ul>
		<?php else: ?>
		  <?php echo wp_kses_post($caution); ?>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-thread' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Thread</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-ball-dia' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Ball diameter</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-l' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>L</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-ewl' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>EWL</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-stem-material' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Stem material</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-tip-material' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Tip material</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-holder-material' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Holder material</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>

<?php
$terms = wp_get_post_terms( $post->ID, 'pa_renishaw-centre-styli' );
if ( ! is_wp_error( $terms ) ) {
	if ( $terms ) {
        $names = array();
        echo "<tr><th>Centre styli</th><td>";
        foreach ( $terms as $term ) {
        $names[] = $term->name;
     }
     echo implode( '、 ', $names ) ;
        echo "</td></tr>";
}}?>


<tr>
	<th>ประเทศที่ผลิต</th>
	<td>
		<?php
		$terms = get_the_terms(get_the_ID(), 'country');
		if (!is_wp_error($terms) && !empty($terms)) {
		    $names = wp_list_pluck($terms, 'name');
		    echo esc_html(implode(' ', $names));
		} else {
		    echo '-';
		}
		?>
	</td>
</tr>

<?php if( get_field('orange_book_catalog_url') ): ?>
<tr>
	<th>อีแคตตาล็อก</th>
	<td>
		<a href="<?php echo esc_url( get_field('orange_book_catalog_url') ); ?>" target="_blank" rel="noopener noreferrer nofollow">Orange Book Jr. P.<?php echo esc_html( get_field('orange_book_jr_catalog_page_no') ); ?></a>
	</td>

</tr>
<?php endif; ?>

<tr>
	<th>เว็บของ Supplier</th>
	<td>
<?php
$url  = get_field('orange_book_url');
$part = get_field('part_number');

// 最上位ブランド名を取得
$brand_name = '';
$terms = get_the_terms(get_the_ID(), 'brand');
if (!empty($terms) && !is_wp_error($terms)) {
    $term = reset($terms); // 先頭のタームを基準にする
    $ancestors = get_ancestors($term->term_id, 'brand');
    $top = $ancestors ? get_term(end($ancestors), 'brand') : $term;

    if ($top && !is_wp_error($top)) {
        $brand_name = $top->name;
    }
}

if ($url) {
    printf(
        '<a href="%s" target="_blank" rel="noopener noreferrer nofollow">%s %s</a>',
        esc_url($url),
        esc_html($brand_name),
        esc_html($part)
    );
} else {
    echo '-';
}
?>
	</td>
</tr>

<?php
function display_terms_hierarchy($term_hierarchy, $parent_id = 0) {
    if (isset($term_hierarchy[$parent_id])) {
        foreach ($term_hierarchy[$parent_id] as $term) {
            $term_name = preg_replace('/แบรนด์.*/u', '', $term->name);
            $term_link = get_term_link($term);
            echo '<a href="'.esc_url($term_link).'">'.esc_html($term_name).'</a> ';
            display_terms_hierarchy($term_hierarchy, $term->term_id);
        }
    }
}
function display_terms($taxonomy) {
    global $post;
    $terms = wp_get_post_terms($post->ID, $taxonomy, array('orderby' => 'term_id', 'order' => 'ASC'));
    if ($terms) {
        echo '<span class="posted_in">';
        $term_hierarchy = array();
        foreach ($terms as $term) {
            $term_hierarchy[$term->parent][] = $term;
        }
        display_terms_hierarchy($term_hierarchy);
        echo '</span>';
    }
}
?>
<tr>
	<th>หม่วดหมู่แบรนด์</th>
	<td><?php display_terms('brand'); ?></td>
</tr>

<tr>
	<th>หม่วดหมู่สินค้า</th>
	<td><?php display_terms('c'); ?></td>
</tr>
</table>


<?php if(have_rows('pdf_repeater')): ?>
<?php while(have_rows('pdf_repeater')): the_row(); ?>
<div class="technical-drawing">
<a href="<?php echo esc_url( get_sub_field('pdf') ); ?>" class="pdfemb-viewer" style="" data-width="max" data-height="max" data-mobile-width="500"  data-scrollbar="vertical" data-download="off" data-newwindow="off" data-pagetextbox="off" data-scrolltotop="on" data-startzoom="100" data-startfpzoom="100" data-toolbar="bottom" data-toolbar-fixed="on"></a>
<div class="lp-link">
<a href="<?php echo esc_url( get_sub_field('pdf') ); ?>" download="">ดาวน์โหลด PDF</a>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>


<!-- VIDEO -->
<?php if(have_rows('video_repeater')): ?>
<?php while(have_rows('video_repeater')): the_row(); ?>
<div class="youtube postmetavideo">
<?php 
$video = get_sub_field('video');
$allowed_html = array(
    'iframe' => array(
        'src' => array(),
        'width' => array(),
        'height' => array(),
        'frameborder' => array(),
        'allowfullscreen' => array(),
    ),
);
echo wp_kses($video, $allowed_html);
?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<!-- VIDEO -->

<!-- content area -->
<?php echo apply_filters('the_content', get_post_meta($post->ID, 'content_area', true)); ?>
<!-- content area -->

<!-- Product Table  -->
<?php
// 1) 現在の投稿に紐づく 'brand' タームを取得
$terms = wp_get_post_terms( get_the_ID(), 'brand' );

// タームなし or 親タームのみのときはテーブル出力をスキップ
if ( empty( $terms ) ) {
    $show_table = false;
} else {
    // 2) 最深階層のタームを探す
    $deepest   = null;
    $max_depth = -1;
    foreach ( $terms as $t ) {
        $depth = count( get_ancestors( $t->term_id, 'brand' ) );
        if ( $depth > $max_depth ) {
            $max_depth = $depth;
            $deepest   = $t;
        }
    }
    // 子タームがある（深さ > 0）ときだけテーブル出力
    $show_table = ( $max_depth > 0 );
}

if ( $show_table ) :
    // 3) プロダクトを一括取得（ステータス除外と term 条件のみ）
    $query = new WP_Query( [
        'post_type'      => 'product',
        'posts_per_page' => 500,
        'tax_query'      => [
            'relation' => 'AND',
            [
                'taxonomy' => 'brand',
                'field'    => 'term_id',
                'terms'    => $deepest->term_id,
            ],
            [
                'taxonomy' => 'trusco_status',
                'field'    => 'slug',
                'terms'    => [ 'finished-model', 'can-not-import' ],
                'operator' => 'NOT IN',
            ],
        ],
        'fields'         => 'ids', // まずは ID のみ取得して高速化
    ] );

    if ( $query->have_posts() ) :
        // 4) フルオブジェクト化して usort で順序をつける
        $products = array_map( 'get_post', $query->posts );
        usort( $products, function( $a, $b ) {
            $ao = (int) get_post_meta( $a->ID, 'product_table_order', true );
            $bo = (int) get_post_meta( $b->ID, 'product_table_order', true );
            if ( $ao && $bo ) {
                if ( $ao !== $bo ) {
                    return $ao - $bo;
                }
                return strcasecmp( $a->post_title, $b->post_title );
            }
            if ( $ao ) {
                return -1;
            }
            if ( $bo ) {
                return 1;
            }
            return strcasecmp( $a->post_title, $b->post_title );
        } );
        ?>
        <!-- 5) テーブル出力 -->
<table class="product-term-box">
    <thead>
        <tr>
            <th>ชื่อสินค้า</th>
            <?php if ( current_user_can( 'administrator' ) ) : ?>
                <th style="width:5%; color:red;">Table Order</th>
                <th style="width:5%; color:red;">Product ID</th>
            <?php endif; ?>
            <th style="width:10%;">รูปสินค้า</th>
            <th style="width:20%;">รหัสสินค้า<br>
(รหัสสั่งซื้อ)</th>
            <th style="width:12%;">ราคา</th>
            <th style="width:8%;">สต็อก</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ( $products as $post ) : setup_postdata( $post ); ?>
        <tr>
            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
            <?php if ( current_user_can( 'administrator' ) ) : ?>
                <td style="color:red;"><?php echo esc_html( get_post_meta( get_the_ID(), 'product_table_order', true ) ); ?></td>
                <td style="color:red;"><?php the_ID(); ?></td>
            <?php endif; ?>

            <!-- 画像 -->
            <td>
				<?php
				if ( has_post_thumbnail() ) {
				    the_post_thumbnail( [50, 50] );
				} else {
				    // プレースホルダー画像のURLをPHPで生成
				    $placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';

				    echo '<img width="50" height="50" loading="lazy" src="' . esc_url( $placeholder_url ) . '" alt="กำลังรอรูปภาพสินค้า">';
				}
				?>
            </td>

            <!-- รหัสสินค้า（part_number + 改行 + order_code_trusco） -->
            <td>
                <?php
                $part  = get_field( 'part_number' );
                $ocode = get_field( 'order_code_trusco' );

                if ( $part ) {
                    echo esc_html( $part );
                }
                if ( $ocode ) {
                    echo '<br><div class="order-code">' . esc_html( $ocode ) . '</div>';
                }
                ?>
            </td>

            <!-- ราคา（価格） -->
            <td>
                <?php include __DIR__ . '/include-product-price.php'; ?>
            </td>

            <!-- สต็อก（在庫） -->
			<td style="width:8%; text-align:center;">
			    <?php
			    // ベースの配列
			    $stocks = [
			        'monet_stock',
			        'th_stock',
			        'jp_stock',
			        'ktw_stock',
			        'sis_stock',
			        'supplier_stock',
			        'idec_stock' // 追加分を維持
			    ];

			    // import_method が thai-purchase の場合 jp_stock を除外
			    if ( has_term( 'thai-purchase', 'import_method' ) ) {
			        $stocks = array_diff( $stocks, [ 'jp_stock' ] );
			    }

			    $total = 0;
			    foreach ( $stocks as $key ) {
			        $total += (int) get_field( $key );
			    }
			    $formatted = number_format( $total );

			    if ( $total === 0 ) {
			        echo '0';
			    } elseif ( $total >= 1 && $total <= 4 ) {
			        echo '<span class="stock-low stock-style">' . esc_html( $formatted ) . '</span>';
			    } else {
			        echo '<span class="stock-high stock-style">' . esc_html( $formatted ) . '</span>';
			    }
			    ?>
			</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
        <?php
        wp_reset_postdata();
    endif; // if have_posts
endif;     // if show_table
?>
<!-- Product Table -->

<div class="lp-link">
<?php $terms = get_the_terms($post->ID, 'brand'); if ( !is_wp_error($terms) && !empty($terms) ) { echo '<a href="'.esc_url(get_term_link( $terms[0]->term_id )).'">ดูสินค้าอื่นของแบรนด์ '.esc_html($terms[0]->name).'</a>'; } ?>
</div>

<?php if(wp_is_mobile()): ?>
<h2 class="product-h2">สอบถามข้อมูลสินค้า</h2>
<?php echo do_shortcode( '[contact-form-7 id="6722831" title="Contact form Product Page Mobile"]' ); ?>
<?php endif; ?>

<!-- Related Products -->
<h2 class="product-h2">สินค้าที่คล้ายกัน</h2>
<?php
// Related Products
if ( wp_is_mobile() ) : ?>

<?php
global $post;

// Determine taxonomy and deepest term (fallback from 'c' to 'brand')
$primary_tax = 'c';
$terms = wp_get_post_terms( get_queried_object_id(), $primary_tax );
$deepestTerm = false;
$maxDepth = -1;

foreach ( $terms as $term ) {
    $ancestors = get_ancestors( $term->term_id, $primary_tax );
    $depth = count( $ancestors );
    if ( $depth > $maxDepth ) {
        $deepestTerm = $term;
        $maxDepth = $depth;
    }
}

// Fallback to 'brand' taxonomy if no term in 'c'
if ( ! $deepestTerm ) {
    $primary_tax = 'brand';
    $terms = wp_get_post_terms( get_queried_object_id(), $primary_tax );
    $deepestTerm = false;
    $maxDepth = -1;
    foreach ( $terms as $term ) {
        $ancestors = get_ancestors( $term->term_id, $primary_tax );
        $depth = count( $ancestors );
        if ( $depth > $maxDepth ) {
            $deepestTerm = $term;
            $maxDepth = $depth;
        }
    }
}

if ( $deepestTerm ) :
	$args = array(
	    'numberposts'   => 12,
	    'post_type'     => 'product',
	    'taxonomy'      => $primary_tax,
	    'term'          => $deepestTerm->slug,
	    'orderby'       => 'menu_order',
	    'order'         => 'ASC',
	    'post__not_in'  => array( $post->ID ),
	    'tax_query'     => array(
	        array(
	            'taxonomy' => 'trusco_status',
	            'field'    => 'slug',
	            'terms'    => array( 'finished-model', 'can-not-import' ),
	            'operator' => 'NOT IN',
	        ),
	    ),
	);
	$myPosts = get_posts( $args );
    if ( $myPosts ) : ?>

<div class="b-container">
    <?php foreach ( $myPosts as $post ) : setup_postdata( $post ); ?>
    <div class="related-item">
        <a href="<?php the_permalink(); ?>">
					<?php
					if ( has_post_thumbnail() ) {

					    $src = get_the_post_thumbnail_url( get_the_ID(), 'full' );

					    printf(
					        '<img src="%s" width="100" height="100" loading="lazy" alt="%s">',
					        esc_url( $src ),
					        esc_attr( get_the_title() )
					    );

					} else {

					    // プレースホルダー画像 URL を動的生成
					    $placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';

					    echo '<img src="' . esc_url( $placeholder_url ) . '" '
					       . 'width="100" height="100" loading="lazy" alt="กำลังรอรูปภาพสินค้า">';
					}
					?>
            <p><?php the_title(); ?></p>
            <p><?php $brand = get_the_terms( $post->ID, 'brand' ); echo esc_html( $brand[0]->name ); ?></p>
            <?php if ( get_field( 'order_code_trusco' ) ) : ?>
            <p><?php echo esc_html( get_field( 'order_code_trusco' ) ); ?></p>
            <?php endif; ?>
            <p><?php echo esc_html( get_field( 'part_number' ) ); ?></p>
            <?php include __DIR__ . '/include-product-price.php'; ?>
            <?php include "include-taxonomy-product-list-stock.php"; ?>
        </a>
    </div>
    <?php endforeach; ?>
</div>
<?php
    endif;
    wp_reset_postdata();
endif;
?>

<?php else : // Desktop version ?>

<div class="swiper-container">
    <div class="swiper-wrapper">

    <?php
    global $post;

    // Same taxonomy logic for desktop
    $primary_tax = 'c';
    $terms = wp_get_post_terms( get_queried_object_id(), $primary_tax );
    $deepestTerm = false;
    $maxDepth = -1;
    foreach ( $terms as $term ) {
        $ancestors = get_ancestors( $term->term_id, $primary_tax );
        $depth = count( $ancestors );
        if ( $depth > $maxDepth ) {
            $deepestTerm = $term;
            $maxDepth = $depth;
        }
    }
    if ( ! $deepestTerm ) {
        $primary_tax = 'brand';
        $terms = wp_get_post_terms( get_queried_object_id(), $primary_tax );
        $deepestTerm = false;
        $maxDepth = -1;
        foreach ( $terms as $term ) {
            $ancestors = get_ancestors( $term->term_id, $primary_tax );
            $depth = count( $ancestors );
            if ( $depth > $maxDepth ) {
                $deepestTerm = $term;
                $maxDepth = $depth;
            }
        }
    }

    if ( $deepestTerm ) :
		$args = array(
		    'numberposts'   => 20,
		    'post_type'     => 'product',
		    'taxonomy'      => $primary_tax,
		    'term'          => $deepestTerm->slug,
		    'orderby'       => 'menu_order',
		    'order'         => 'ASC',
		    'post__not_in'  => array( $post->ID ),
		    'tax_query'     => array(
		        array(
		            'taxonomy' => 'trusco_status',
		            'field'    => 'slug',
		            'terms'    => array( 'finished-model', 'can-not-import' ),
		            'operator' => 'NOT IN',
		        ),
		    ),
		);
		$myPosts = get_posts( $args );
		if ( $myPosts ) :


            foreach ( $myPosts as $post ) : setup_postdata( $post ); ?>

        <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <div class="content-img">
					<?php
					if ( has_post_thumbnail() ) {

					    $src = get_the_post_thumbnail_url( get_the_ID(), 'full' );

					    printf(
					        '<img src="%s" width="100" height="100" loading="lazy" alt="%s">',
					        esc_url( $src ),
					        esc_attr( get_the_title() )
					    );

					} else {

					    // プレースホルダー画像 URL を動的生成
					    $placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';

					    echo '<img src="' . esc_url( $placeholder_url ) . '" '
					       . 'width="100" height="100" loading="lazy" alt="กำลังรอรูปภาพสินค้า">';
					}
					?>
                </div>
                <p><?php the_title(); ?></p>
                <p><?php $brand = get_the_terms( $post->ID, 'brand' ); echo esc_html( $brand[0]->name ); ?></p>
                <?php if ( get_field( 'order_code_trusco' ) ) : ?><p><?php echo esc_html( get_field( 'order_code_trusco' ) ); ?></p><?php endif; ?>
                <p><?php echo esc_html( get_field( 'part_number' ) ); ?></p>
                <?php include __DIR__ . '/include-product-price.php'; ?>
                <?php include "include-taxonomy-product-list-stock.php"; ?>
            </a>
        </div>

    <?php   endforeach;
        endif;
        wp_reset_postdata();
    endif;
    ?>

    </div>
    <div class="swiper-button-prev swiper-custom-button"><i class="fa fa-angle-left"></i></div>
    <div class="swiper-button-next swiper-custom-button"><i class="fa fa-angle-right"></i></div>
    <div class="swiper-scrollbar"></div>
</div>

<?php endif; ?>

<!-- Related Products -->

<?php if(wp_is_mobile()): ?>
<?php else: ?>
<h2 class="product-h2">สอบถามข้อมูลสินค้า</h2>
<?php echo do_shortcode( '[contact-form-7 id="401186" title="Contact form Product Page PC"]' ); ?>

<!-- TOP Key Banner -->
<?php 
$post_id = 36;
$rows = get_field('top_key_banner', $post_id);
if ( ! empty( $rows ) ): ?>
  <h2 class="product-h2">สินค้าแนะนำ</h2>
  <div class="top-key-banner">
    <?php foreach ( $rows as $row ): 
      $url   = esc_url( $row['top_url'] );
      $event = sanitize_title( $row['top_event'] );
      $img   = esc_url( $row['top_image_pc'] );
      $utm   = sprintf(
        '?utm_source=internal-link&utm_medium=click&utm_campaign=%s',
        $event
      );
    ?>
    <div class="img-class">
      <a href="<?php echo $url . $utm; ?>">
        <img
          src="<?php echo $img; ?>"
          alt="<?php echo esc_attr( $row['top_event'] ); ?>"
          width="916"
          height="340"
          loading="lazy"
        />
      </a>
    </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<!-- /TOP Key Banner -->

<!-- Brand -->
<?php 
$post_id = 36;
$brand_title = get_field( 'pick_up_brand_title', $post_id );
$brands      = get_field( 'pick_up_brand', $post_id );
if ( $brand_title ) : ?>
  <h2 class="product-h2"><?php echo esc_html( $brand_title ); ?></h2>
<?php endif; ?>

<?php if ( ! empty( $brands ) ) : ?>
  <div class="b-container">
    <?php foreach ( $brands as $row ) :
      $term = isset( $row['acf-re-brand'] ) ? $row['acf-re-brand'] : false;
      if ( ! $term ) {
        continue;
      }

      $term_link  = esc_url( get_term_link( $term ) );
      $brand_meta = get_field( 'brand_img', $term );

      // プレースホルダー画像 URL を動的生成
      $placeholder_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';

      // brand_img が無い場合はプレースホルダー
      $brand_img  = esc_url( $brand_meta ? $brand_meta : $placeholder_url );

      $term_name  = esc_attr( $term->name );
    ?>
      <div class="b-item">
        <a href="<?php echo $term_link; ?>">
          <img
            src="<?php echo $brand_img; ?>"
            alt="<?php echo $term_name; ?>"
            width="159"
            height="43"
            loading="lazy"
          />
        </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php 
$link_url  = get_field( 'pick_up_brand_link_url',  $post_id );
$link_text = get_field( 'pick_up_brand_link_text', $post_id );

if ( $link_url && $link_text ) : ?>
  <div class="lp-link">
    <a href="<?php echo esc_url( $link_url ); ?>">
      <?php echo esc_html( $link_text ); ?>
    </a>
  </div>
<?php endif; ?>
<!-- Brand -->
<?php endif; ?>

<!-- ontact form -->

</div>

		<?php
		/**
		 * generate_after_entry_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_footer_meta - 10
		 */
		do_action( 'generate_after_entry_content' );

		/**
		 * generate_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_content' );
		?>
	</div>
</article>

		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();
