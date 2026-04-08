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
</style>

<h2>Shachihata New Product Competition in Thailand คืออะไร</h2>
<div class="make-top">
Shachihata เป็นบริษัทผู้ผลิตที่มีสำนักงานใหญ่ในญี่ปุ่น ซึ่งกำลังจะเฉลิมฉลองครบรอบ 100 ปี ในปี 2025 นี้ โดยเรามีการวางแผนพัฒนาและผลิตผลิตภัณฑ์ต่างๆ ที่ใช้ในสภาพแวดล้อมที่หลากหลาย รวมถึงในอุตสาหกรรม บ้าน โรงเรียน หน่วยงานของรัฐ และจัดจำหน่ายไปกว่า 90 ประเทศทั่วโลก<br>
<br>
โดยในญี่ปุ่นจะใช้ตรายางชื่อแทนการใช้ลายเซ็นต์ ทำให้ตรายางชื่อของ Shachihata มียอดขายรวม 180 ล้านชิ้น นับตั้งแต่เปิดตัวและมีส่วนแบ่งการตลาดเป็นอันดับหนึ่งภายในประเทศญี่ปุ่น ด้วยการที่ใช้ประโยชน์จากความสามารถในการวิจัยและพัฒนาหมึกขั้นสูงของบริษัทเรา ทำให้เราได้เปิดตัวเครื่องมือการทำเครื่องหมายออกมาหลากหลายชนิด ไม่ว่าจะเป็นตรายาง ปากกามาร์กเกอร์ และหมึกอุตสาหกรรม เมื่อกาลเวลาเปลี่ยนไป ทางบริษัทได้ขยายกิจการเข้าสู่ด้านดิจิทัล ซึ่งรวมถึง Electronic Seal และกลายเป็นประเด็นร้อนในญี่ปุ่น เนื่องจากบริษัทต้องปรับตัวให้เข้ากับรูปแบบธุรกิจใหม่ในช่วงการแพร่ระบาดของโควิด-19<br>
<br>
Shachihata จะยังคงพัฒนานวัตกรรมเพื่อมอบความสะดวกสบาย ความสนุก และความอุ่นใจ ซึ่งเป็นสิ่งสำคัญต่อธุรกิจและชีวิตประจำวันต่อไป ในตลาดต่างแดนรวมถึงประเทศไทย เราจะเดินเคียงข้างคุณสู่ 100 ปีด้วยนวัตกรรมที่ผสมผสานระหว่างอนาล็อกและดิจิทัลเข้าด้วยกัน
</div>

<div class="make-top">
ที่มาของโปรเจ็กต์นี้คือทาง Shachihata ต้องการสร้างสรรค์และมอบคุณค่าใหม่ๆ ในด้านอื่นต่อไปเช่นกัน โดยใช้เทคโนโลยีหมึกที่บริษัทได้สั่งสมมาตลอดหลายปี
</div>
<br>

<div id="projct"></div>
<h2>ครั้งนี้ Shachihata มีอยู่ 3 แนวทางที่ขอข้อเสนอแนะมาจากทุกคน</h2>
<p class="tc">โปรดอย่าลังเลที่จะแบ่งปันไอเดียของคุณ เรายังมีรางวัลดีๆ อีกมากมายรอคุณอยู่ !!</p>
<br>

<h3>1. การทำเครื่องหมายด้วยปากกามาร์กเกอร์หมึกที่ไม่แห้ง</h3>
<img src="https://www.monet.asia/wp-content/uploads/key_01_01.jpg" alt="" width="800" loading="lazy" />
<p><b><เทคโนโลยี></b><br>จะมีฟิล์มพิเศษปกคลุมหมึกในบริเวณปลายปากกา เพื่อป้องกันไม่ให้หมึกระเหยออกจากปลายปากกาในขณะที่ฝาเปิดอยู่<br><br>
มีประโยชน์ต่อการใช้งานเป็นเวลานานๆ ไม่ว่าจะระหว่างการเขียนบนกระดานหรือเขียนโปสเตอร์ที่โรงเรียนและสำนักงาน นอกจากนี้ แม้ว่าคุณจะไม่ได้เปิดฝาหรือปิดฝาทิ้งไว้ก็ตาม หมึกของปากกาจะไม่แห้ง <br>
<br>
<b><ฟังก์ชัน></b><br>
แม้ว่าปลายปากกาจะเปิดทิ้งไว้เกิดการสัมผัสกับอากาศเป็นเวลานาน ปลายปากกาก็จะไม่แห้ง คุณสามารถเขียนต่อได้เลยทันที ซึ่งระยะเวลาป้องกันการแห้งของหมึกจะแตกต่างกันไปขึ้นอยู่ที่ประเภทของหมึก<br>
<br>
<b><ตัวอย่างการพัฒนาผลิตภัณฑ์></b><br>
ปากกามาร์กเกอร์ชนิดแห้งเร็ว (ปลายปากกาจะไม่แห้งแม้ปิดฝาไม่แน่นทิ้งไว้เป็นเวลา 2 สัปดาห์ก็ตาม)`<br>
ปากกาไวท์บอร์ด (ปลายปากกาจะไม่แห้งแม้ปิดฝาไม่แน่นทิ้งไว้เป็นเวลา 3 วัน)<br>
<br><br>

<h3>2. ข้อเสนอผลิตภัณฑ์หมึกไมโครแคปซูล</h3>
<img src="https://www.monet.asia/wp-content/uploads/key_02_01.jpg" alt="" width="800" loading="lazy" />
<p><b><เทคโนโลยี></b><br>
เปิดอิสระทางความคิดผสมผสานอะไรก็ได้โดยใช้หมีกไมโครแคปซูลในการออกแบบผลิตภัณฑ์<br>
ด้วยฟังก์ชันการหุ้มของแคปซูลที่มีประสิทธิภาพ ทำให้ยาสามารถคงอยู่เป็นเวลานานและสามารถปกป้องจากส่วนผสมอื่นๆ ได้ เมื่อผลิตภัณฑ์นี้ใช้หมึกไมโครแคปซูล<br>
<br>
<b><ฟังก์ชัน></b><br>
・ ผลิตภัณฑ์ระงับกลิ่นกาย<br>
・ มีกลิ่นหอม<br>
・ รู้สึกเย็นสบาย<br>
・ หลับสบาย<br>
・ ไล่แมลง<br>
・ ป้องกันละอองเกสรและฝุ่น PM 2.5<br>
<br>

<b><ตัวอย่างการพัฒนาผลิตภัณฑ์></b><br>
・ สเปรย์ (ดับกลิ่น, รู้สึกเย็นสบาย, หลับสบาย, ไล่แมลง)<br>
・ ชุดประจำชาติที่มีกลิ่นหอม (ส่าหรี)<br>
・ ทรายแมวที่มีฟังก์ชั่นกำจัดกลิ่น<br>
・ ถุงมือที่ให้ความเย็นสบาย / ระงับกลิ่น<br>
・ นามบัตรที่มีกลิ่นหอม<br>
<br><br>

<h3>3. ข้อเสนอผลิตภัณฑ์หมึกเปลี่ยนสีตามแสง UV</h3>
<img src="https://www.monet.asia/wp-content/uploads/key_03_01.jpg" alt="" width="800" loading="lazy" />
<p><b><เทคโนโลยี></b><br>
หมึกเปลี่ยนสีตามแสง UV คืนชีพสีที่จางไปให้กลับมามีชีวิตอีกครั้ง<br>
เมื่อผลิตภัณฑ์ที่ใช้หมึกเปลี่ยนสีตามแสง UV<br>
<br>

<b><ฟังก์ชัน></b><br>
・ เพลิดเพลินกับการเปลี่ยนแปลงของสีสัน<br>
・ หมึกสามารถแจ้งเตือนได้ถึงแสง UV ช่วยให้คุณหลีกเลี่ยงแสง UV ได้<br>
・ สีจะเปลี่ยนไปเมื่อโดนแสง UV แต่ก็มาสามารถกลับไปสีเดิมได้เช่นกัน เมื่อไม่โดนแสง UV<br>
<br>
<b><ตัวอย่างการพัฒนาผลิตภัณฑ์></b><br>
・ ยางลบเปลี่ยนสี<br>
・ ลูกปัด UV ลูกปัดเปลี่ยนสีได้<br>
・ กระจกแต่งหน้า<br>
・ การ์ดเช็คค่า UV<br>
・ การออกแบบผลิตภัณฑ์เสื้อผ้าและอื่นๆ<br>
<br>

<div class="lp-link"><a href="https://docs.google.com/forms/d/e/1FAIpQLSeAyhvl2EU5UbM22fj-OyEBcGGyWYlfbD8qy4KG9dwua5hALg/viewform">สมัครได้ที่นี้ !</a></div>

<p>เราโพสต์ข้อมูลบน <a href="https://www.facebook.com/ShachihataCompetitionThailand/" target=”_blank”>Facebook</a> อยู่เสมอ ดังนั้น โปรดตรวจสอบข้อมูลได้ที่นั้น !</p>

<div class="flow">

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://www.monet.asia/wp-content/themes/monet/steps-icon-04.svg" alt="">
</div>

<div class="itme-80">
<p><b>รางวัล</b></p>
<ul>
<li>รางวัลที่ 1 : เงินสด 50,000 บาท</li>
<li>รางวัลที่ 2 : iPad Air 5th Gen 64GB (มี 3 รางวัล)</li>
</ul>
</div>

</div>
<br><br>

<h2>เงื่อนไขการสมัคร</h2>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://www.monet.asia/wp-content/themes/monet/steps-icon-02.svg" alt="">
</div>

<div class="itme-80">
<p><b>ผู้มีสิทธิ์สมัคร</b></p>
<ul>
<li>นักศึกษามหาวิทยาลัยและผู้ใหญ่วัยทำงาน</li>
<li>ไม่สำคัญว่าคุณจะเป็นบุคคลหรือกลุ่มก็สามารถสมัครได้ หากเป็นกลุ่มกรุณากรอกข้อมูลของตัวแทน</li>
</ul>
</div>

</div>

<div class="tc m30">
<img src="https://www.monet.asia/wp-content/themes/monet/arrow-down.svg" alt="">
</div>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://www.monet.asia/wp-content/themes/monet/steps-icon-01.svg" alt="">
</div>

<div class="itme-80">
<p><b>รายละเอียดการสมัคร</b></p>
<ul>
<li>โปรดสมัครผ่าน GoogleForm พร้อมสื่อที่อธิบายเนื้อหาแนวคิดของคุณอย่างชัดเจน</li>
<li>สามารถส่งใบสมัครในรูปแบบใดก็ได้ รวมถึง Word, PowerPoint หรือเนื้อหาที่เขียนด้วยลายมือ</li>
</ul>
</div>

</div>

<div class="tc m30">
<img src="https://www.monet.asia/wp-content/themes/monet/arrow-down.svg" alt="">
</div>

<div class="flow-sub">

<p><b>ข้อกำหนดการสมัคร</b></p>
<ul>
<li>การดำเนินงานในประเทศไทยจะดำเนินการโดยบริษัท เอเชียน บริดจ์ (ไทยแลนด์) จำกัด</li>
<li>คณะกรรมการคัดเลือกขอสงวนสิทธิ์ในการยกเลิกรางวัลของผู้ชนะ</li>
<li>ทางเราจะประกาศผลทางช่องทางโซเชียลมีเดียและเว็บไซต์ที่รับสมัคร</li>
<li>หากไม่สามารถติดต่อผู้ชนะได้ภายใน 7 วันหลังจากประกาศผล ถือว่าสละสิทธิ์ของรางวัล</li>
<li>ผู้ประกอบการขอสงวนสิทธิ์ในการเปลี่ยนแปลงกิจกรรม กติกา และของรางวัลโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</li>
<li>สิทธิ์ในการรับรางวัลไม่สามารถโอนให้บุคคลอื่นได้</li>
<li>รางวัลจะต้องเสียภาษีหัก ณ ที่จ่ายตามอัตราที่กฎหมายกำหนด</li>
<li>เนื้อหาการสมัครจะต้องเป็นต้นฉบับของผู้สมัคร</li>
<li>ไม่อนุญาตให้ส่งรายการซ้ำในการแข่งขันอื่นๆ นอกจากนี้ จะไม่เปิดเผยต่อสาธารณะโดยไม่ได้รับความยินยอมจากผู้จัดงาน Shachihata</li>
<li>สิทธิ์ในเนื้อหาที่ส่งจะเป็นของผู้จัดงาน</li>
<li>หากรูปภาพ ภาพประกอบและอื่นๆ ที่ใช้ในแนวคิดอาจมีความเสี่ยงของการละเมิดลิขสิทธิ์ สิทธิ์ในการถ่ายภาพบุคคล สิทธิ์ในเครื่องหมายการค้า สิทธิ์ในการออกแบบ ฯลฯ ที่เป็นของบุคคลที่สาม คุณจะต้องรับผิดชอบในการขออนุญาตทั้งหมดที่จำเป็นก่อนส่งไอเดียของคุณ</li>
<li>หากไอเดียที่ชนะนั้นเหมือนหรือคล้ายกันกับไอเดียที่ได้รับการตีพิมพ์แล้ว หรือหากละเมิดสิทธิ์ในทรัพย์สินทางปัญญาของบุคคลที่สาม (รวมถึงกรณีที่การละเมิดเกิดขึ้นหลังจากส่งใบสมัครแล้ว) รางวัลอาจถูกเพิกถอนได้แม้ว่าจะประกาศผู้ชนะแล้วก็ตาม</li>
<li>หากมีความจำเป็นต้องจัดเตรียมเรื่องอื่นๆ นอกเหนือจากที่ระบุไว้ในแนวทางการสมัคร ผู้จัดงานจะตัดสินใจในเรื่องดังกล่าวตามดุลยพินิจของตนเอง หากผู้สมัครไม่เห็นด้วยกับเนื้อหา ผู้สมัครสามารถถอนใบสมัครได้ แต่ทางผู้จัดงานจะไม่รับผิดชอบค่าใช้จ่ายใดๆ ที่เกิดขึ้นในการสมัคร</li>
<li>สำหรับข้อมูลอื่นๆ เกี่ยวกับการจัดการข้อมูลส่วนบุคคล โปรดดู "<a href="https://www.artlineworld.com/privacy_policy/">นโยบายความเป็นส่วนตัว</a> | <a href="https://www.artlineworld.com/">Shachihata</a>" ของ Shachihata Co., Ltd. และ "<a href="https://asian-bridge.co.th/th/privacy-policy/">นโยบายความเป็นส่วนตัว</a>" ของบริษัท เอเชียน บริดจ์ (ไทยแลนด์) จำกัด ซึ่งเป็นผู้ดำเนินการของเรา</li>
</ul>

</div>

</div>

<div class="lp-link"><a href="https://docs.google.com/forms/d/e/1FAIpQLSeAyhvl2EU5UbM22fj-OyEBcGGyWYlfbD8qy4KG9dwua5hALg/viewform">สมัครได้ที่นี้ !</a></div>


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
