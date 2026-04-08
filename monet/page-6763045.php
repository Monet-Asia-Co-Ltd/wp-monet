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

<img style="width: 100%;" src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_kaizen-the-genba.jpg" alt="" loading="lazy" />

<h2>Shachihata Make คืออะไร</h2>
<div class="make-top">
Shachihata Make เป็นแพลตฟอร์มการร่วมสร้างสรรค์ออนไลน์ที่คุณสามารถเสนอไอเดียของคุณให้กับเทคโนโลยีผลิตภัณฑ์ของ Shachihata ที่กำลังจะครบรอบ 100 ปีได้ หากคุณลงทะเบียนกับ Shachihata Make แล้ว คุณสามารถเสนอไอเดียได้ทั้งในฐานะบุคคลหรือองค์กร Shachihata กำลังมองหาไอเดียที่พวกเขาไม่สามารถคิดได้ด้วยตัวเอง ดังนั้นเราจึงรอคอยการเข้าร่วมของทุกคนที่มีพื้นหลังที่หลากหลาย
</div>


<div id="projct"></div>
<h2>การรับสมัครไอเดียสำหรับผลิตภัณฑ์การทำเครื่องหมาย</h2>
<p class="tc">ปัจจุบัน Shachihata Make กำลังรับสมัครไอเดียสำหรับ "ผลิตภัณฑ์การทำเครื่องหมาย"</p>
<br><br>
<h3 class="tc">ตัวอย่างไอเดีย</h3>

<h3>1.การใช้มาร์คเกอร์หมึกไม่แห้งสำหรับการทำเครื่องหมาย</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_01.jpg" alt="" width="800" loading="lazy" />
<p><b>เทคโนโลยี:</b>ฟิล์มสารเติมแต่งพิเศษที่มีอยู่ในหมึกจะครอบคลุมปลายปากกาและป้องกันการระเหยของหมึกจากปลายปากกาขณะที่เปิดฝา<br>
<b>ตัวอย่างการขยายเทคโนโลยี:</b><br>
ปากกาที่ใช้หมึกนี้จะไม่แห้งแม้จะลืมปิดฝาประมาณ 2 สัปดาห์<br>
เมื่อเขียนเป็นเวลานานในโรงเรียนหรือที่อื่น ๆ จะไม่ต้องกังวลเรื่องการเปิดปิดฝา<br>

<b>【ตัวอย่างฟังก์ชันที่ให้】</b><br>
・ปลายปากกาไม่แห้งแม้จะสัมผัสกับอากาศเป็นเวลานานและสามารถเขียนได้อีกครั้ง<br>
・ระยะเวลาการป้องกันการแห้งจะแตกต่างกันไปตามประเภทของหมึก<br>
<br>
<b>【ตัวอย่างการขยายผลิตภัณฑ์】</b><br>
・มาร์คเกอร์แห้งเร็ว (ปลายปากกาไม่แห้งแม้จะลืมปิดฝา 2 สัปดาห์)<br>
・มาร์คเกอร์ไวท์บอร์ด (ปลายปากกาไม่แห้งแม้จะลืมปิดฝา 3 วัน)</p>


<h3>2.ข้อเสนอผลิตภัณฑ์หมึกที่มีไมโครแคปซูล</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_02.jpg" alt="" width="800" loading="lazy" />
<p><b>เทคโนโลยี:</b>สามารถใส่สิ่งต่าง ๆ ลงในแคปซูลที่มีขนาดพอที่จะเข้าไปในหมึกหรือสารละลายได้<br>
<b>ตัวอย่างการขยายเทคโนโลยี:</b><br>
การบรรจุสารยาในแคปซูลจะช่วยให้ประสิทธิภาพของสารยานั้นยาวนานขึ้นและป้องกันจากส่วนประกอบอื่น ๆ ผลิตภัณฑ์ที่ใช้หมึกที่มีแคปซูลนี้<br>
<br>
<b>【ตัวอย่างฟังก์ชันที่ให้】</b><br>
・การกำจัดกลิ่น<br>
・น้ำหอม<br>
・ความเย็น<br>
・การนอนหลับที่ดี<br>
・การป้องกันแมลง<br>
・การป้องกันฝุ่นและ PM2.5<br>
<br>
<b>【ตัวอย่างการขยายผลิตภัณฑ์】</b><br>
・สเปรย์ (การกำจัดกลิ่น, ความเย็น, การนอนหลับที่ดี, การป้องกัน)<br>
・ชุดประจำชาติที่มีกลิ่นหอม (ส่าหรี)<br>
・ทรายแมวที่มีฟังก์ชันการกำจัดกลิ่น<br>
・ถุงมือที่มีความเย็น/การกำจัดกลิ่น<br>
・นามบัตรที่มีกลิ่นหอม<br>

<h3>3.ข้อเสนอผลิตภัณฑ์ที่ใช้หมึกที่เปลี่ยนสีได้ด้วยแสงอัลตราไวโอเลต</h3>
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/key_03.jpg" alt="" width="800" loading="lazy" />
<p><b>เทคโนโลยี:</b>สีที่เปลี่ยนได้ด้วยแสงอัลตราไวโอเลต<br>
<b>ตัวอย่างการขยายเทคโนโลยี:</b><br>
ผลิตภัณฑ์ที่ใช้หมึกที่เปลี่ยนสีเมื่อสัมผัสกับแสงอัลตราไวโอเลตหรือหมึกที่สีหายไป<br>

<b>【ตัวอย่างฟังก์ชันที่ให้】</b><br>
・เพลิดเพลินกับการเปลี่ยนแปลงของรูปลักษณ์<br>
・เป็นแนวทางเมื่อคุณต้องการหลีกเลี่ยงแสงอัลตราไวโอเลต<br>
・แม้สีจะเปลี่ยนเมื่อสัมผัสกับแสงอัลตราไวโอเลต แต่สามารถกลับมาเป็นสีเดิมได้เมื่ออยู่ในที่ที่ไม่มีแสงอัลตราไวโอเลต<br>
<br>
<b>【ตัวอย่างการขยายผลิตภัณฑ์】</b><br>
・ยางลบที่เปลี่ยนสีได้<br>
・ลูกปัดโฟโตเปีย<br>
・กระจกแต่งหน้าที่มีแสงอัลตราไวโอเลต<br>
・การ์ดตรวจสอบแสงอัลตราไวโอเลต<br>
・เสื้อยืดและผลิตภัณฑ์ผ้าอื่น ๆ<br>

<div class="lp-link"><a href="https://docs.google.com/forms/d/129TAbcoob3oeA3lyec5Lg82PU13PqtBham6xDHgYt_U/formrestricted">เข้าร่วมประกวด</a></div>


<div class="flow">
<h2>การเข้าร่วมโครงการ</h2>

<p class="tc">สามารถเสนอไอเดียได้ทั้งในฐานะบุคคลหรือองค์กร ผู้ที่ผ่านการคัดเลือกเบื้องต้น (ผู้ที่ผ่านการคัดเลือกครั้งแรก) จะร่วมทีมกับพนักงานของบริษัทผู้จัดโครงการเพื่อปรับปรุงแผนงาน</p>

<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-01.svg" alt="">
</div>

<div class="itme-80">
<p><b>การโพสต์ไอเดีย</b></p>
<p>รายละเอียดของโครงการสามารถตรวจสอบได้ที่หน้าโครงการ แต่เพื่อความเข้าใจที่ลึกซึ้งยิ่งขึ้น จะมีการจัดงานอธิบาย ในงานอธิบายจะมีการอธิบายโครงการอย่างละเอียดโดยบริษัทผู้จัดโครงการ และตอบคำถามจากผู้เข้าร่วม นอกจากนี้ยังสามารถดูผลิตภัณฑ์และวัสดุที่เกี่ยวข้องกับโครงการได้จริง สำหรับผู้ที่ไม่สามารถเข้าร่วมงานอธิบายได้ จะมีการแชร์เนื้อหาของวันนั้น แต่เนื่องจากเป็นโอกาสที่มีค่า ขอแนะนำให้เข้าร่วม!</p>
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
<p><b>การปรับปรุงไอเดียตามคำแนะนำของบริษัทผู้จัดโครงการ</b></p>
<p>หากไอเดียของคุณได้รับความสนใจจากบริษัทผู้จัดโครงการ<br>
คุณจะได้รับคำแนะนำที่เป็นรูปธรรมสำหรับไอเดียของคุณ การปรับปรุงไอเดียโดยรวมมุมมองที่บริษัทผู้จัดโครงการให้ความสำคัญจะเพิ่มโอกาสในการผ่านการคัดเลือกครั้งแรก</p>
</div>

</div>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>


<p class="tc">การประกาศผลการคัดเลือกครั้งแรก</p>
<p class="tc">คัดเลือกจากจำนวนข้อเสนอทั้งหมดของโครงการ (เฉลี่ย 240 ข้อเสนอ) เหลือประมาณ 10 ข้อเสนอ</p>

<div class="tc m30">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/arrow-down.svg" alt="">
</div>


<div class="flow-sub">

<div class="itme-20 tc">
<img src="https://env-monetasia-premiummonet.kinsta.cloud/wp-content/themes/monet/steps-icon-03.svg" alt="">
</div>

<div class="itme-80">
<p><b>ร่วมกับเมนเทอร์ของบริษัทผู้จัดโครงการ ปรับปรุงและตรวจสอบไอเดียประมาณ 2 เดือน</b></p>
<p>ไอเดียที่ผ่านการคัดเลือกครั้งแรกจะร่วมมือกับเมนเทอร์ของบริษัทผู้จัดโครงการเพื่อทำให้เป็นรูปธรรม เพื่อสำรวจความต้องการของลูกค้า จะมีการทำแบบสอบถามและสัมภาษณ์ และหากจำเป็นจะมีการสร้างต้นแบบเพื่อปรับปรุงผลิตภัณฑ์หรือบริการให้ดียิ่งขึ้น สิ่งที่ผู้โพสต์ไม่สามารถทำได้ด้วยตัวเอง สามารถใช้ระบบการรับสมัครสมาชิกเพื่อรวบรวมเพื่อนร่วมทีมในการปรับปรุง</p>
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
<p><b>การนำเสนอและการคัดเลือกขั้นสุดท้ายเพื่อการพาณิชย์และการผลิต</b></p>
<p>นำเสนอไอเดียต่อบริษัทผู้จัดโครงการ การนำเสนอจะมีพนักงานที่มีอำนาจตัดสินใจเข้าร่วม และมีการถามตอบเพื่อมุ่งสู่การทำให้เป็นจริง ผู้ที่ผ่านการคัดเลือกจะได้รับรางวัลเงินสดไม่เพียงแต่รางวัลชนะเลิศเท่านั้น รางวัลสูงสุดสำหรับรางวัลยอดเยี่ยมคือ 3,000,000 เยน</p>
</div>

</div>

</div>

<div class="faq">
<h2>FAQ</h2>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">ข้อเสนอที่แท้จริงควรทำให้ละเอียดแค่ไหน?</p>
<p class="icon-a">หากแสดงปัญหา ความต้องการ และคุณค่าของลูกค้าอย่างชัดเจนในรูปแบบข้อความก็เพียงพอแล้ว ไม่จำเป็นต้องสร้างตัวอย่างภาพที่ละเอียด เนื่องจากโครงการที่จัดโดยบริษัทใหญ่ ๆ มีคำถามมากมายว่า "ต้องสร้างข้อเสนอที่มีปริมาณมากหรือไม่?" แต่หากแสดงปัญหาและความต้องการของลูกค้าอย่างมีเหตุผล ก็ไม่จำเป็นต้องทำให้ละเอียดถึงระดับแผนธุรกิจ ที่หน้านี้มีตัวอย่างข้อเสนอที่สรุปไว้อย่างชัดเจน กรุณาดู</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">สมาชิกทีมจะรวบรวมได้แน่นอนหรือไม่?</p>
<p class="icon-a">เกือบจะรวบรวมได้ แต่สำหรับการรับสมัครบทบาทที่มีชุดทักษะที่จำกัดหรือข้อกำหนดพิเศษ อาจมีแนวโน้มที่จะรวบรวมได้ยาก</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">ความถี่และวิธีการสื่อสารกับผู้จัดโครงการและสมาชิกทีมเป็นอย่างไร?</p>
<p class="icon-a">ใช้ห้องแชทเฉพาะและเครื่องมือประชุมทางทีวีในการสื่อสาร หลังจากเสนอข้อเสนอแล้ว จะตอบสนองเมื่อมีข้อเสนอแนะจากบริษัทผู้จัดโครงการ ในช่วงการปรับปรุง จะมีการเสนอแนะและการติดต่อเพื่อปรับปรุงไอเดียเกือบทุกวัน</p>
</div>

</div>

<div class="faq-sub">

<div class="item-90">
<p class="faq-q icon-q">สิทธิ์ในไอเดียที่เสนอเป็นอย่างไร?</p>
<p class="icon-a">หากไอเดีย (แนวคิด) ได้รับการคัดเลือกจากบริษัท (ได้รับรางวัลบางอย่าง) สิทธิ์ในไอเดีย (แนวคิด) ที่เสนอจะถูกโอนไปยังบริษัทผู้จัดโครงการ สิทธิ์ในไอเดียที่ไม่ได้รับรางวัลรวมถึงทรัพย์สินทางปัญญาจะยังคงเป็นของผู้เสนอ ดังนั้นสามารถเสนอไอเดียให้กับโครงการอื่นได้อีกครั้ง</p>
</div>


</div>


</div>

<div class="lp-link"><a href="https://docs.google.com/forms/d/129TAbcoob3oeA3lyec5Lg82PU13PqtBham6xDHgYt_U/formrestricted">เข้าร่วมประกวด</a></div>


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
