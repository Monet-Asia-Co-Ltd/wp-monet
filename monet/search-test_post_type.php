<?php

get_header(); ?>

<?php

//エスケープ用
function sethtmlspecialchars($data)
{
    if (is_array($data)) { //データが配列の場合
        return array_map('sethtmlspecialchars', $data);
    } else { //データが配列ではない場合
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}


//検索タイプ
$tax_01 = []; //カテゴリー01
$tax_02 = []; //カテゴリー02


//GETの設定
if (isset($_GET['s']) && $_GET['s']) {
    $s = sethtmlspecialchars($_GET['s']);
}
if (isset($_GET['tax_01']) && $_GET['tax_01']) {
    $tax_01 = sethtmlspecialchars($_GET['tax_01']);
}
if (isset($_GET['tax_02']) && $_GET['tax_02']) {
    $tax_02 = sethtmlspecialchars($_GET['tax_02']);
}

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
    'paged' => $paged,
    'post_type' => array('test_post_type'), //カスタム投稿タイプtest_post_type
    'post_status' => array('publish'), //公開状態
    'order' => 'DESC', //降順
    'orderby' => 'date', //日付で並び替える
    'posts_per_page' => 10 // 1ページあたり10件表示
);

//タクソノミー検索条件追加用配列
$tax_query = [];

//カテゴリー01に値があり、「all」ではないときのみtax_query配列に条件追加。
if (!empty($tax_01) && !in_array('all', $tax_01)) {
    $tax_query[] = array(
        'taxonomy' => 'tax_01',
        'field' => 'slug',
        'terms' => $tax_01,
    );
}
//カテゴリー02に値があり、「all」ではないときのみtax_query配列に条件追加。
if (!empty($tax_02) && !in_array('all', $tax_02)) {
    $tax_query[] = array(
        'taxonomy' => 'tax_02',
        'field' => 'slug',
        'terms' => $tax_02,
    );
}


//tax_queryに格納
if (count($tax_query) > 0) {
    //AND検索（デフォルト）
    $tax_query['relation'] = 'AND';
    $args += array('tax_query' => $tax_query);
}

$the_query = new WP_Query($args);


/**
 * 検索条件を残す処理
 */
//カテゴリ01
function checkTax01($param)
{
    global $tax_01;
    if (in_array($param, $tax_01)) {
        echo 'checked';
    }
}
//カテゴリ02
function checkTax02($param)
{
    global $tax_02;
    if (in_array($param, $tax_02)) {
        echo 'checked';
    }
}



get_header(); ?>

<form action="<?php echo home_url(); ?>" method="GET">
    <input type="hidden" name="post_type" value="test_post_type">
    <input type="hidden" name="s">
    <table>
        <tbody>
            <tr>
                <th>カテゴリー01</th>
                <td>
                    <div>
                        <ul>
                            <?php
                            $taxonomies = 'tax_01';
                            $args = array(
                                'hide_empty'    => false,
                                'orderby' => 'menu_order',
                                'parent' => 0
                            );

                            ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="tax_01[]" value="all" <?php checkTax01('all'); ?>>
                                    <span>すべて</span>
                                </label>
                            </li>
                            <?php
                            $tax_01_terms = get_terms($taxonomies, $args);
                            foreach ($tax_01_terms as $term) :
                                $term_name = $term->name;
                                $term_slug = $term->slug;
                                $term_id = $term->term_id;
                            ?>
                                <li>
                                    <label>
                                        <input type="checkbox" name="tax_01[]" value="<?php echo $term_slug; ?>" <?php checkTax01($term_slug); ?>>
                                        <span><?php echo $term_name; ?></span>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th>カテゴリー02</th>
                <td>
                    <div>
                        <ul>
                            <?php
                            $taxonomies = 'tax_02';
                            $args = array(
                                'hide_empty'    => false,
                                'orderby' => 'menu_order',
                                'parent' => 0
                            );

                            ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="tax_02[]" value="all" <?php checkTax02('all'); ?>>
                                    <span>すべて</span>
                                </label>
                            </li>
                            <?php
                            $tax_02_terms = get_terms($taxonomies, $args);
                            foreach ($tax_02_terms as $term) :
                                $term_name = $term->name;
                                $term_slug = $term->slug;
                                $term_id = $term->term_id;
                            ?>
                                <li>
                                    <label>
                                        <input type="checkbox" name="tax_02[]" value="<?php echo $term_slug; ?>" <?php checkTax02($term_slug); ?>>
                                        <span><?php echo $term_name; ?></span>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit">
        この条件で検索する
    </button>
</form>
<?php if ($the_query->have_posts()) : ?>
    <div style="margin-top:40px;">
        <div>
            <b style="font-size:20px;">検索結果</b>
            <p>
                <span><?php echo $the_query->found_posts; ?>件</span>
                <span>見つかりました</span>
            </p>
        </div>
        <?php
        while ($the_query->have_posts()) : $the_query->the_post();
            //各種データ取得
            $title = get_the_title();
            $post_id = get_the_ID();

            /**
             * カテゴリー取得
             */
            $tax_01 = get_the_terms($post_id, 'tax_01'); //カテゴリー01
            $tax_02 = get_the_terms($post_id, 'tax_02'); //カテゴリー02
        ?>
            <div style="margin-top:20px;">
                <div><b>記事タイトル:</b><?php echo $title; ?></div>
                <div><b>カテゴリー01:</b><?php echo $tax_01[0]->name; ?></div>
                <div><b>カテゴリー02:</b><?php echo $tax_02[0]->name; ?></div>
                <div><a href="<?php the_permalink(); ?>">記事リンク</a></div>
            </div>
        <?php endwhile; ?>
        <?php
        /* ページャーの表示 */
        // if (function_exists('pagination')) :
        //     pagination($the_query->max_num_pages, get_query_var('paged'));
        // endif;
        ?>
    </div>
<?php else : ?>
    見つかりませんでした。
<?php endif;
wp_reset_postdata(); ?>

<?php get_footer(); ?>