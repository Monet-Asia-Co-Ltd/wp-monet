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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
<div class="inside-article">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<?php if( get_field('brand_key_img') ): ?>
<img width="" height="" loading="lazy" src="<?php echo esc_url( get_field('brand_key_img') ); ?>" alt="<?php the_title(); ?>">
<?php endif; ?>

			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
					'after'  => '</div>',
				)
			);
			?>

<?php if(have_rows('recomend')): ?>
<div id="recommend"></div>
<h2>สินค้าแนะนำ</h2>
<div class="c-container">
<?php while(have_rows('recomend')): the_row(); ?>

<div class="brand-category-banner-item">
<a href="<?php echo esc_url( get_sub_field('url') ); ?>">
<img width="444" height="132" loading="lazy" src="<?php echo esc_url( get_sub_field('img') ); ?>" alt="" />
</a>
</div>

<?php endwhile; ?>
</div>
<?php endif; ?>

<?php if(have_rows('post')): ?>
<div id="post"></div>
<h2>บทความ</h2>
<div class="c-container">
<?php while(have_rows('post')): the_row(); ?>

<div class="brand-category-banner-item">
<a href="<?php echo esc_url( get_sub_field('url') ); ?>">
<img width="" height="" loading="lazy" src="<?php echo esc_url( get_sub_field('url') ); ?>" alt="" />
<h3><?php echo esc_html( get_sub_field('title') ); ?></h3>
</a>
</div>

<?php endwhile; ?>
</div>
<?php endif; ?>

<?php if(have_rows('catalog')): ?>
<div id="catalog"></div>
<h2>แคตตาล็อก</h2>
<div class="c-container">
<?php while(have_rows('catalog')): the_row(); ?>

<div class="item-30 company-item" target="_blank" rel="noopener noreferrer">
<a href="<?php echo esc_url( get_sub_field('url') ); ?>" >
<img width="" height="" loading="lazy" src="<?php echo esc_url( get_sub_field('img') ); ?>" alt="" />
</a>
</div>

<?php endwhile; ?>
</div>
<?php endif; ?>

<div id="about"></div>
<h2>ข้อมูลบริษัท</h2>

<table border="">
<tbody>
<tr>
<th>ชื่อบริษัท</th>
<td>
<?php if( get_field('sub_name') ): ?>
<?php echo esc_html( get_field('sub_name') ); ?>
<?php endif; ?>
</td>
</tr>
<tr>
<th>Company Name</th>
<td>
<?php the_title(); ?>
</td>
</tr>
<tr>
<th>TAX ID</th>
<td>
<?php if( get_field('tax_id') ): ?>
<?php echo esc_html( get_field('tax_id') ); ?>
<?php endif; ?>
</td>
</tr>
<tr>
<th>วันที่ก่อตั้ง</th>
<td>
<?php if( get_field('registration_date') ): ?>
<?php echo esc_html( get_field('registration_date') ); ?>
<?php endif; ?>
</td>
</tr>
<tr>
<th>ที่อยู่</th>
<td>
<?php if( get_field('location') ): ?>
<?php echo esc_html( get_field('location') ); ?>
<?php endif; ?>
</td>
</tr>
<tr>
<th>ทุนจดทะเบียน</th>
<td>
<?php if( get_field('registered_capital') ): ?>
<?php echo esc_html( get_field('location') ); ?> บาท
<?php endif; ?>
</td>
</tr>
<tr>
<th>จำนวนพนักงาน</th>
<td>
<?php if( get_field('employees') ): ?>
ประมาณ <?php echo esc_html( get_field('employees') ); ?> คน
<?php endif; ?>
</td>
</tr>
<tr>
<th>รายละเอียดธุรกิจ</th>
<td>
<?php if( get_field('business_details') ): ?>
ประมาณ <?php echo esc_html( get_field('business_details') ); ?> คน
<?php endif; ?>
</td>
</tr>
</tbody></table>

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
