<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				while ( have_posts() ) :

					the_post();

					generate_do_template_part( 'page' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>

<style type="text/css">
.item-30 {
	width: 33%;
}
h2 {
    text-align: center;
    font-weight: bold;
    font-size: 26px;
    color: #ed8f4f;
}
.flow {
	background-color: #ed8f4f;
	padding: 40px;
}
.flow h2 {
	color: #fff;
}
.flow p {
	color: #fff;
}
.tc {
	text-align: center;
}
.flow-sub {
	display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    align-content: stretch;
}
.flow-sub,
.faq-sub {
	background: #fff;
	border-radius: 12px;
	padding: 20px;
}
.flow-sub p,
.faq-sub p {
	color: #000;
	margin: 0;
	padding: 0;
	margin-bottom: 20px;
}
.faq-sub {
	margin-bottom: 20px;
}

.flow-sub .itme-20 {
	width: 20%;
}
.flow-sub .itme-80 {
	width: 80%;
}
.m30 {
	margin: 30px;
}
.faq {
	background-color: #fbf3e5;
	padding: 40px;
}
.faq-q {
    border-bottom: 3px dotted #ed8f4f;
    padding-bottom: 7px !important;
    margin-bottom: 7px !important;
}


p.icon-q, p.icon-a {
    min-height: 45px;
    padding-left: 65px;
    padding-top: 7px;
    margin: 15px 0 !important;
    margin-left: 5px !important;
}

p.icon-q {
    background-image: url(https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/icon-q.svg);
    background-repeat: no-repeat;
    background-size: 50px 50px;
}
p.icon-a {
    background-image: url(https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/icon-a.svg);
    background-repeat: no-repeat;
    background-size: 50px 50px;
}

</style>

<img style="width: 100%;" src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key.jpg" alt="" loading="lazy" />

<h2>monet makeとは</h2>
<div class="make-top">
monet makeは、もうすぐ１００周年のシヤチハタの製品技術に、皆さんがお持ちのアイデアを提案することができるオンライン共創プラットフォームです。
monet makeにご登録いただいている方であれば、個人としても、法人としても提案が可能です。
シヤチハタは、自分たちでは思いつかないアイデアを広く求めていますので、多種多様なバックグラウンドを持つ皆さまのご参加をお待ちしています。
</div>

<div class="lp-link"><a href="https://env-monetasia-premiummonet.kinsta.cloud/make/#projct">募集中のプロジェクトを見る</a></div>


<div class="flow">
<h2>プロジェクト参加の流れ</h2>

<p class="tc">個人でも法人でもアイデアをご提案可能です。ファイナリスト（一次審査を通過した方）はプロジェクト主催企業の社員さまとチームを組んで企画を改善します。</p>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-01.svg" alt="">
</div>

<div class="itme-80">
<p><b>アイデア投稿</b></p>
<p>プロジェクトの詳細については、プロジェクトページで確認できますが、より深く理解するために説明会を開催します。説明会では、主催企業によるプロジェクトの丁寧な説明はもちろん、参加者からの質問にもお答えします。さらに、プロジェクトに関わる商品や資材を実際に手に取ってご覧いただくことも可能です。説明会に参加できない方にも、当日の内容を共有しますが、貴重な機会ですのでぜひご参加ください！</p>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>




<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-02.svg" alt="">
</div>

<div class="itme-80">
<p><b>主催企業のアドバイスを基に、さらにアイデアをブラッシュアップ</b></p>
<p>審査をする主催企業の目に止まると、アイデアへ具体的なアドバイスをもらえます。<br>主催企業が重視している観点を取り入れてアイデアをブラッシュアップしていくと、一次審査通過の確率が高まります。</p>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>


<p class="tc">一次審査 結果発表</p>
<p class="tc">プロジェクトの総提案数（平均240案）から10案前後に選抜</p>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>


<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-03.svg" alt="">
</div>

<div class="itme-80">
<p><b>主催企業のメンターと一緒に、アイデアの改善と検証を約2ヶ月</b></p>
<p>一次審査を通過したアイデアは、主催企業のメンターと協力して、形にしていきます。お客様のニーズを調査するために、アンケートやインタビューを行い、必要に応じて試作品を作り、より良い商品やサービスへと磨き上げていきます。投稿者一人でできないことは、メンバー募集制度を使って一緒に改善を行う仲間を集めることもできます。</p>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-04.svg" alt="">
</div>

<div class="itme-80">
<p><b>事業化・商品化に向けて、プレゼン &amp; 最終審査</b></p>
<p>主催企業にアイデアのプレゼンを行います。プレゼンには決裁権のある社員が参加することが多く、実現化を目指した質疑応答が行われます。ファイナリストには受賞に限らず賞金が贈られ、最優秀賞には最高で300万円もの賞金が用意されています。</p>
</div>

</div>

</div>

<div class="faq">
<h2>FAQ</h2>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">実際の提案はどこまで作り込めば良いでしょうか？</p>
<p class="icon-a">顧客の課題、ニーズ、価値を具体的に文章で示していればOKです。作り込んだ画像サンプルの作成も不要です。大手企業様主催のプロジェクトが多いため、「膨大な量の提案書を作成しなければならないのか？」というご質問を多くいただきますが、顧客の課題やニーズが根拠を持って示されていれば、いわゆる事業計画書レベルまで作り込む必要はありません。こちらのページに具体的に提案サンプルをまとめていますので、ぜひご覧ください。</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">チームメンバーは必ず集まりますか？</p>
<p class="icon-a">ほぼ集まります。ただし、非常に限られた領域や特殊な要件のスキルセットを持つ役割募集では、集まりにくい傾向にあります。</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">主催企業の担当者やチームメンバーとのコミュケーション頻度、またその手段を教えてください。</p>
<p class="icon-a">専用のチャットルームとTVミーティングのツールを使用してコミュニケーションを行います。 提案後は主催企業からのフィードバックがあった場合に対応します。改善フェーズではアイディアのブラッシュアップのために、改善提案や連絡事項などが毎日のように行われます。</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">提案したアイデアの権利はどうなりますか？</p>
<p class="icon-a">アイデア（コンセプト）が企業により採択（何からの賞を授与）された場合、ご提案いただいたアイデア（コンセプト）の権利は主催企業に移ります。受賞していないアイデアの知財を含む権利は、ご提案者様に帰属したままです。ですので、他のプロジェクトへ再度ご提案いただくことも可能です。</p>
</div>

</div>


























</div>

<div id="projct"></div>
<h2>募集中のプロジェクト</h2>

<div class="b-container">
<div class="item-30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/001.png" alt="" loading="lazy" />
</div>

<div class="item-30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/002.png" alt="" loading="lazy" />
</div>

<div class="item-30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/003.png" alt="" loading="lazy" />
</div>

</div>


<div class="lp-link"><img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/link.png" alt="" width="300" loading="lazy" /></div>




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
