<style type="text/css">
.product-card {
    border: solid 1px rgba(0,0,0,.1);
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    background: #f5f6f7;
}
.product-card:hover {
    background: #e3e4e4;
}
.product-card p {
    margin: 0;
}
.product-card a {
    color: #000;
    text-decoration: none;
}
.product-card img {
    filter: brightness(97%);
}
.product-card:hover img {
    filter: brightness(90%);
}
.product-card-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
.product-card-item-left {
    width: 30%;
}
.product-card-item-left img {
    width: 90%;
    height: auto;
}
.product-card-item-right {
    width: 69%;
}
.product-card-item-right h3 {
    margin: 0 0 5px;
}
.price-container {
    display: flex;
    align-items: baseline;
}
.sale-price-list {
    color: #B12704 !important;
    font-weight: bold;
    font-size: 16px;
}
.regular-price {
    font-size: 14px;
    opacity: .5;
    text-decoration: line-through;
    margin-left: 5px;
}
.regular-price:before { content: "("; }
.regular-price:after  { content: ")"; }
</style>

<?php
$val = get_post();

$prod_domain   = 'https://www.monet.asia';
$stage_domain  = 'https://env-monetasia-premiummonet.kinsta.cloud';

// アイキャッチ取得
$thumb_url = get_the_post_thumbnail_url($val->ID, 'thumbnail');

if ($thumb_url) {
    $thumb_url = str_replace($prod_domain, $stage_domain, $thumb_url);
}
?>

<div class="product-card">
<div class="product-card-container">

    <!-- left / image -->
    <div class="product-card-item-left">
        <a href="<?php echo esc_url( get_permalink($val->ID) ); ?>" target="_top">
        <?php if ($thumb_url): ?>
            <img src="<?php echo esc_url($thumb_url); ?>"
                 width="185"
                 height="185"
                 loading="eager"
                 alt="<?php echo esc_attr( get_the_title($val->ID) ); ?>">
        <?php else: ?>
            <img src="<?php echo esc_url($stage_domain); ?>/wp-content/uploads2/noimage.jpg"
                 width="185"
                 height="185"
                 loading="eager"
                 alt="no image">
        <?php endif; ?>
        </a>
    </div>

    <!-- right / text -->
    <div class="product-card-item-right">
        <a href="<?php echo esc_url( get_permalink($val->ID) ); ?>" target="_top">
            <h3><?php echo esc_html( get_the_title($val->ID) ); ?></h3>

            <p>Brand :
            <?php
            $terms = get_the_terms($val->ID, 'brand');
            if (is_array($terms)) {
                $term = array_pop($terms);
                if ($term->parent != 0) {
                    $terms = get_the_terms($val->ID, 'brand');
                    $term = array_shift($terms);
                }
                echo esc_html($term->name);
            }
            ?>
            </p>

            <p>Part Number : <?php echo esc_html( get_field('part_number') ); ?></p>
            <p>Order Code : <?php echo esc_html( get_field('order_code_trusco') ); ?></p>
        </a>

        <!-- price -->
        <?php if( get_field('special_price') ): ?>
            <div class="sale-price-list">
                <?php include("include-price-sp.php"); ?>
            </div>
        <?php elseif ( get_field('trusco_price') ): ?>
            <?php if( has_term('promotion-price','trusco_status') ) : ?>
                <div class="price-container">
                    <div class="sale-price-list">
                        <?php include("include-price-tr-promotion.php"); ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="price-container">
                    <div class="sale-price-list">
                        <?php include("include-price-tr-sale.php"); ?>
                    </div>
                    <div class="regular-price">
                        <?php include("include-price-tr-regular.php"); ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        <!-- /price -->

    </div>
</div>
</div>
