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

<div class="inside-article">

<!-- TOP Key Banner -->
<?php 
while(have_rows('top_key_banner')): 
    the_row(); 
    $top_url = get_sub_field('top_url');
    $top_event = get_sub_field('top_event');
    $top_image_pc = get_sub_field('top_image_pc');
?>
<div class="img-class"><a href="<?php echo $top_url; ?>?utm_source=internal-link&utm_medium=click&utm_campaign=<?php echo $top_event; ?>"><img src="<?php echo $top_image_pc; ?>" alt="<?php echo $top_event; ?>" width="916" height="340" loading="lazy" /></a></div>
<?php endwhile; ?>
<!-- TOP Key Banner -->

<!-- Pick Up Brand -->
<h2 class="top-h2"><?php echo get_field('pick_up_brand_title'); ?></h2>
<div class="tb-container">
<?php 
while(have_rows('pick_up_brand')): 
    the_row(); 
    $term = get_sub_field('acf-re-brand'); 
    if( $term ): 
        $term_link = get_term_link( $term );
        $brand_img = get_field('brand_img', $term);
        $term_name = esc_html( $term->name );
?>
<div class="b-item">
<a href="<?php echo $term_link; ?>">
<img width="159" height="43" loading="lazy" src="<?php echo $brand_img; ?>" alt="<?php echo $term_name; ?>">
</a>
</div>
<?php endif; endwhile; ?>
</div>

<?php 
$pick_up_brand_link_url = get_field('pick_up_brand_link_url');
$pick_up_brand_link_text = get_field('pick_up_brand_link_text');
?>
<div class="lp-link"><a href="<?php echo $pick_up_brand_link_url; ?>"><?php echo $pick_up_brand_link_text; ?></a></div>
<!-- Pick Up Brand -->

<!-- TOP Key Banner 02 -->
<?php 
while(have_rows('top_key_banner_02')): 
    the_row(); 
    $top_url = get_sub_field('top_url');
    $top_event = get_sub_field('top_event');
    $top_image_pc = get_sub_field('top_image_pc');
?>
<div class="img-class"><a href="<?php echo $top_url; ?>?utm_source=internal-link&utm_medium=click&utm_campaign=<?php echo $top_event; ?>"><img src="<?php echo $top_image_pc; ?>" alt="<?php echo $top_event; ?>" width="916" height="340" loading="lazy" /></a></div>
<?php endwhile; ?>
<!-- TOP Key Banner 02 -->

<!-- Pick Up Brand Category 001 -->

<!-- Repeater Field -->
<?php 
while(have_rows('pick_up_brand_category')): 
    the_row(); 
    $pick_up_brand_link_url = get_sub_field('pick_up_brand_link_url');
    $pick_up_brand_link_text = get_sub_field('pick_up_brand_link_text');
    if( $pick_up_brand_link_url ): 
?>
<h2 class="top-h2">แบรนด์<a href="<?php echo get_term_link( $pick_up_brand_link_url ); ?>"><?php echo $pick_up_brand_link_text; ?></a>ที่แนะนำ</h2>
<?php else: ?>
<h2 class="top-h2">แบรนด์<?php echo $pick_up_brand_link_text; ?>ที่แนะนำ</h2>    
<?php endif; ?>

<div class="tb-container">
<?php 
while(have_rows('pick_up_brand_list')): 
    the_row(); 
    $brand_link = get_sub_field('brand_link'); 
    $brand_event = get_sub_field('brand_event');
    $brand_image = get_sub_field('brand_image');
    if( $brand_link ): 
?>
<div class="b-item">
<a href="<?php echo get_term_link( $brand_link ); ?>?utm_source=internal-link&utm_medium=click&utm_campaign=<?php echo $brand_event; ?>"><img width="159" height="43" loading="lazy" src="<?php echo $brand_image; ?>" alt="<?php echo esc_html( $brand_link->name ); ?>"></a>
</div>
<?php endif; ?>
<?php endwhile; ?>
</div>
<?php endwhile; ?>
<!-- Repeater Field -->

<!-- Pick Up Brand Category 001 -->

<!-- TOP Banner -->
<h2 class="top-h2"><?php echo get_field('top_banner_title'); ?></h2>
<?php 
if(have_rows('top_banner')): 
    while(have_rows('top_banner')): 
        the_row(); 
        $top_url = get_sub_field('top_url');
        $top_event = get_sub_field('top_event');
        $top_image_pc = get_sub_field('top_image_pc');
?>
<div class="img-class">
<a href="<?php echo $top_url; ?>?utm_source=internal-link&utm_medium=click&utm_campaign=<?php echo $top_event; ?>">
<img src="<?php echo $top_image_pc; ?>" alt="<?php echo $top_event; ?>" width="916" height="340" loading="lazy" />
</a>
</div>
<?php endwhile; endif; ?>
<!-- TOP Banner -->

<!-- Blog -->
<h2 class="top-h2"><?php echo get_field('blog_title'); ?></h2>

<div class="tbn-container">

<?php
  $args = array(
    'posts_per_page' => 3
  );
  $posts = get_posts( $args );
  foreach ( $posts as $post ):
  setup_postdata( $post );
  $permalink = get_permalink();
  $title = get_the_title();
?>

<!-- Repeater Field -->
<div class="blog-item">
<a href="<?php echo $permalink; ?>">
<?php 
if(has_post_thumbnail()): 
    the_post_thumbnail(array( 294, 155 )); 
else: 
?>
<img width="294" height="155" src="https://www.monet.asia/wp-content/uploads/admin/logo_monet.svg" alt="monet" loading="lazy" />
<?php endif; ?>
<p><?php echo $title; ?></p>
</a>
</div>
<!-- Repeater Field -->

<?php
  endforeach;
  wp_reset_postdata();
?>
</div>

<?php 
$blog_link_url = get_field('blog_link_url');
$blog_link_text = get_field('blog_link_text');
?>
<div class="lp-link"><a href="<?php echo $blog_link_url; ?>"><?php echo $blog_link_text; ?></a>
</div>
<!-- Blog -->

<!-- News -->
<h2 class="top-h2">ข่าว</h2>

<div class="tbn-container">

<?php
  $args = array(
    'post_type' => 'news',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  $posts = get_posts( $args );
  foreach ( $posts as $post ):
  setup_postdata( $post );
  $permalink = get_permalink();
  $title = get_the_title();
?>

<!-- Repeater Field -->
<div class="blog-item">
<a href="<?php echo $permalink; ?>">
<?php 
if(has_post_thumbnail()): 
    the_post_thumbnail(array( 294, 155 )); 
else: 
?>
<img width="294" height="155" src="https://www.monet.asia/wp-content/uploads/admin/logo_monet.svg" alt="monet" loading="lazy" />
<?php endif; ?>
<p><?php echo $title; ?></p>
</a>
</div>
<!-- Repeater Field -->

<?php
  endforeach;
  wp_reset_postdata();
?>
</div>

<div class="lp-link"><a href="/news-list/">ข่าวทั้งหมด</a>
</div>
<!-- News -->



<!-- Category List -->
<h2 class="top-h2">หมวดหมู่</h2>

<div class="b-container">

<!-- Category box 01 -->
<div class="sc-item a-tag">
<?php if(have_rows('category_list_01')):
    while(have_rows('category_list_01')): the_row(); 
        $taxonomy_field = get_sub_field('product_categories');
        if($taxonomy_field):
            $term_id = $taxonomy_field->term_id;
            $term_link = get_term_link($term_id);
            if(is_wp_error($term_link)) continue;
            $term_name = $taxonomy_field->name;
?>
<h3><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></h3>
<?php
$child_terms = get_terms( 'c', array(
    'orderby'    => 'count',
    'hide_empty' => 0,
    'parent' => $term_id,
) );
foreach($child_terms as $child_term):
    $child_term_link = get_term_link($child_term->term_id);
    if(is_wp_error($child_term_link)) continue;
    $child_term_name = $child_term->name;
    $product_category_icon_id = get_term_meta($child_term->term_id, 'product_category_icon', true);
    $product_category_icon_url = wp_get_attachment_url($product_category_icon_id);
?>
<a href="<?php echo esc_url($child_term_link); ?>">
<div class="tcl">
<div class="item-20">
<?php if ($product_category_icon_url): ?>
<img src="<?php echo esc_url($product_category_icon_url); ?>" alt="<?php echo esc_attr($child_term_name); ?>" width="25" height="25" loading="lazy" />
<?php endif; ?>
</div>
<div class="item-80">
<?php echo esc_html($child_term_name); ?>
</div>
</div>
</a>
<?php endforeach; ?>
<?php endif; endwhile; endif; ?>
</div>
<!-- Category box 01 -->

<!-- Category box 02 -->
<div class="sc-item a-tag">
<?php if(have_rows('category_list_02')):
    while(have_rows('category_list_02')): the_row(); 
        $taxonomy_field = get_sub_field('product_categories');
        if($taxonomy_field):
            $term_id = $taxonomy_field->term_id;
            $term_link = get_term_link($term_id);
            if(is_wp_error($term_link)) continue;
            $term_name = $taxonomy_field->name;
?>
<h3><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></h3>
<?php
$child_terms = get_terms( 'c', array(
    'orderby'    => 'count',
    'hide_empty' => 0,
    'parent' => $term_id,
) );
foreach($child_terms as $child_term):
    $child_term_link = get_term_link($child_term->term_id);
    if(is_wp_error($child_term_link)) continue;
    $child_term_name = $child_term->name;
    $product_category_icon_id = get_term_meta($child_term->term_id, 'product_category_icon', true);
    $product_category_icon_url = wp_get_attachment_url($product_category_icon_id);
?>
<a href="<?php echo esc_url($child_term_link); ?>">
<div class="tcl">
<div class="item-20">
<?php if ($product_category_icon_url): ?>
<img src="<?php echo esc_url($product_category_icon_url); ?>" alt="<?php echo esc_attr($child_term_name); ?>" width="25" height="25" loading="lazy" />
<?php endif; ?>
</div>
<div class="item-80">
<?php echo esc_html($child_term_name); ?>
</div>
</div>
</a>
<?php endforeach; ?>
<?php endif; endwhile; endif; ?>
</div>
<!-- Category box 02 -->

<!-- Category box 03 -->
<div class="sc-item a-tag">
<?php if(have_rows('category_list_03')):
    while(have_rows('category_list_03')): the_row(); 
        $taxonomy_field = get_sub_field('product_categories');
        if($taxonomy_field):
            $term_id = $taxonomy_field->term_id;
            $term_link = get_term_link($term_id);
            if(is_wp_error($term_link)) continue;
            $term_name = $taxonomy_field->name;
?>
<h3><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></h3>
<?php
$child_terms = get_terms( 'c', array(
    'orderby'    => 'count',
    'hide_empty' => 0,
    'parent' => $term_id,
) );
foreach($child_terms as $child_term):
    $child_term_link = get_term_link($child_term->term_id);
    if(is_wp_error($child_term_link)) continue;
    $child_term_name = $child_term->name;
    $product_category_icon_id = get_term_meta($child_term->term_id, 'product_category_icon', true);
    $product_category_icon_url = wp_get_attachment_url($product_category_icon_id);
?>
<a href="<?php echo esc_url($child_term_link); ?>">
<div class="tcl">
<div class="item-20">
<?php if ($product_category_icon_url): ?>
<img src="<?php echo esc_url($product_category_icon_url); ?>" alt="<?php echo esc_attr($child_term_name); ?>" width="25" height="25" loading="lazy" />
<?php endif; ?>
</div>
<div class="item-80">
<?php echo esc_html($child_term_name); ?>
</div>
</div>
</a>
<?php endforeach; ?>
<?php endif; endwhile; endif; ?>
</div>
<!-- Category box 03 -->

</div>
<!-- Category List -->
<?php
$category_link_url = get_field('category_link_url');
$category_link_text = get_field('category_link_text');
?>
<div class="lp-link">
<a href="<?php echo $category_link_url; ?>"><?php echo $category_link_text; ?></a>
</div>

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
