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
h3 {
    color: #ed8f4f;
    font-weight: bold;
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

<img style="width: 100%;" src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_shachihata.jpg" alt="" loading="lazy" />

<h2>Shachihata Makeとは</h2>
<div class="make-top">
日本に本社を構えるシヤチハタ株式会社は、2025年に創業100周年を迎えるものづくり企業（manufacturer）です。産業（Industries）の現場や家庭、学校や官公庁など、様々なシーンで使用される商品を企画、開発、製造し、世界90ヵ国以上で販売しています。<br>
<br>
日本ではサインの代わりに氏名印（Name Stamp）が用いられますが、ShachihataのName Stampは発売以来累計1億８千万本を販売し、国内シェアは圧倒的一位です。インキの研究開発力の高さを活かして、スタンプ、マーカー、工業用インキなど各種マーキングツールを次々に発売。時代の変化に伴い電子印鑑などのデジタル分野にも進出し、日本国内ではコロナ禍の新しいビジネススタイルに適応していると話題になりました。<br>
<br>
シヤチハタは今後も革新を続けながら、ビジネスや日常生活に欠かせない「便利」「楽しさ」「安心」を提供していきます。タイを含む海外市場においても、アナログとデジタルを融合させた革新的なアイデアで、新たな100年を皆様と共に歩んでいきます。

</div>

<div class="make-top">
これまで培ってきたインキ技術を基軸として、他分野においても、新たな価値を生み出し、提供し続けていきたいというのが今回のプロジェクト実施の背景となります。
</div>


<div id="projct"></div>
<h2>今回の求める提案の方向性は3つになります。</h2>
<p class="tc">皆様の自由なアイデアをご共有ください！豪華景品もご用意しております。</p>
<br><br>

<h3>①ノンドライインキマーカーを使ったマーキング用途</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_01.jpg" alt="" width="800" loading="lazy" />
<p><b>＜技術＞</b><br>インキに含まれる特殊な皮膜がペン先を覆い、キャップを開けている間、ペン先からのインキの蒸発を防ぎます。<br><br>
学校やオフィスで長時間の板書やポスター作製などに、一定時間キャップの開け閉めをしなくても、インキが乾かないのでストレスフリーです。<br>
<br>
<b>＜与えられる機能の例＞</b><br>
ペン先が長時間空気に触れてもペン先が乾燥せず、再び筆記できる<br>
インキの種類により乾燥を防ぐ期間が変わる<br>
<br>
<b>＜商品展開の例＞</b><br>
速乾マーカー（キャップを締めなくても２週間ペン先が乾かない)。<br>
ホワイトボードマーカー(キャップを締めなくても3日間ペン先が乾かない）。<br>
<br><br>

<h3>②マイクロカプセルを含んだインキの商品案</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_02.jpg" alt="" width="800" loading="lazy" />
<p><b>＜技術＞</b><br>
インキの中に入るほど小さなサイズのカプセルに様々なものを入れることができます。<br>
カプセルに機能薬剤を内包する事で、その機能薬剤の性能が長く持続出来、他成分からも保護出来る。そのカプセルを含むインキを使った商品。<br>
<br>
<b>＜与えられる機能の例＞</b><br>
・消臭<br>
・香料<br>
・冷感<br>
・安眠<br>
・虫除け<br>
・花粉＆PM2.5バリア<br>
<br>

<b>＜商品展開の例＞</b><br>
・スプレー（消臭、冷感、安眠、忌避）<br>
・香り付き民族衣装（サリー）<br>
・消臭機能付き猫砂<br>
・冷感／消臭手袋<br>
・香り付き名刺<br>
<br><br>

<h3>③紫外線によって色が消色⇔発色を繰り返す可逆性インキを使った商品案</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_03.jpg" alt="" width="800" loading="lazy" />
<p><b>＜技術＞</b><br>
紫外線に触れることにより消色⇔発色を繰り返す可逆性色素。<br>
紫外光が当たると変色するインキ、もしくは色が消えるインキを使用した商品。<br>
<br>

<b>＜与えられる機能の例＞</b><br>
・見た目の変化を楽しめる<br>
・紫外線を避けたい場合のガイドになる<br>
・紫外線を浴びて一度色が変わっても、紫外線のない場所でまた元に戻せる<br>
<br>
<b>＜商品展開の例＞</b><br>
・色が変わる消しゴム<br>
・フォトピアビーズ<br>
・化粧品手鏡<br>
・紫外線チェックカード<br>
・Tシャツなど衣類、布製品のデザイン<br>
<br>

<div class="lp-link"><a href="https://docs.google.com/forms/d/129TAbcoob3oeA3lyec5Lg82PU13PqtBham6xDHgYt_U/formrestricted">応募はこちらから！</a></div>

<p><a href="https://www.facebook.com/ShachihataCompetitionThailand/" target=”_blank”>Facebook</a>では常に情報発信をしておりますので、そちらもご覧ください！</p>

<div class="flow">

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-04.svg" alt="">
</div>

<div class="itme-80">
<p><b>景品</b></p>
<ul>
<li>最優秀賞：5万THB（すべてのアイデアから1点）</li>
<li>優秀賞：iPad Air（5th Gen)（各アイデアより1点）</li>
</ul>
</div>

</div>
<br><br>

<h2>応募条件</h2>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-02.svg" alt="">
</div>

<div class="itme-80">
<p><b>対象</b></p>
<ul>
<li>大学生、社会人の方</li>
<li>個人、グループ問いません。グループの場合は代表者の情報をご入力ください</li>
</ul>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-01.svg" alt="">
</div>

<div class="itme-80">
<p><b>応募コンテンツ</b></p>
<ul>
<li>アイデアの内容が明確にわかる内容の資料をGoogleForm経由で応募ください</li>
<li>応募方法はワード、パワーポイント、手書きの内容等フォーマットは問いません</li>
</ul>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>

<div class="flow-sub">

<p><b>応募要項</b></p>
<ul>
<li>タイでの運営はAsian Bridge (Thailand) Co., Ltd.が行います。</li>
<li>選考委員会は勝者の賞品を取り消す権利を保有します。</li>
<li>SNS及び募集サイトで結果を発表いたします。</li>
<li>結果発表後7日以内に当選者にご連絡が取れない場合、賞を取り消す可能性があります。</li>
<li>運営会社は、事前の通知なくアクティビティ、ルール、賞品を変更する権利を保有します。</li>
<li>受賞の権利を他人に譲渡することはできません。</li>
<li>賞金には法律で定められた税率で源泉税が課されます。</li>
<li>応募アイディアは、応募者自身のオリジナルのものに限ります。</li>
<li>他のコンペティションへの二重応募は認められません。また、主催者であるシヤチハタ株式会社の同意なしに他に公表しないものとします。</li>
<li>応募いただきましたコンテンツの権利は主催者が保有するものとなります。</li>
<li>アイディアで利用される画像・イラスト等が第三者の有する著作権・肖像権・商標権・意匠権などの権利を侵害するおそれのある場合は、応募者の責任において必要な許可を得た上で、ご応募ください。</li>
<li>受賞アイディアが、既発表のアイディアと同一または酷似している場合、または第三者の知的財産権の侵害となる場合（応募後に侵害となった場合を含む）は受賞結果発表後であっても受賞を取り消す場合があります。</li>
<li>募集要項に記載された事項以外について取り決める必要が生じた場合、主催者の判断により決定します。応募者は、その内容に同意できなかった場合は応募を撤回できますが、主催者は応募に要した一切の費用は負担いたしません。</li>
<li>その他個人情報の取扱いにつきましては、シヤチハタ株式会社の「<a href="https://www.artlineworld.com/privacy_policy/">Privacy policy</a> | <a href="https://www.artlineworld.com/">Shachihata</a>」および業務を委託しているアジアンブリッジタイランドの「<a href="https://asian-bridge.co.th/th/privacy-policy/">Privacy policy</a>」をご参照ください。</li>
</ul>

</div>

</div>

<div class="lp-link"><a href="https://docs.google.com/forms/d/129TAbcoob3oeA3lyec5Lg82PU13PqtBham6xDHgYt_U/formrestricted">応募はこちらから！</a></div>


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
