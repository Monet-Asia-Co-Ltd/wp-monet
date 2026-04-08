<?php 
$term_finish_model = get_field('term_finish_model', $term->taxonomy . '_' . $term->term_id);
$product_category_icon = get_field('product_category_icon', $term->taxonomy . '_' . $term->term_id);

if( !$term_finish_model ): ?>

<div class="category-item">
<a href="<?php echo get_term_link( $term ); ?>">

<?php if( $product_category_icon ): ?>
<div class="c-container">

<div class="category-item-img">
<img width="51" height="51" loading="lazy" src="<?php echo $product_category_icon; ?>" alt="<?php echo $term->name; ?>">
</div>

<div class="category-item-title">
<p><?php echo preg_replace('/แบรนด์.*/', '', $term->name); ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
</div>

</div>
<?php else : ?>
<p><?php echo preg_replace('/แบรนด์.*/', '', $term->name); ?> (<?php echo $term->count; ?>)</p>
<?php if( current_user_can('administrator') ) : $term_with_order = get_term($term->term_id, $term->taxonomy); ?><span style="color: red;"><?php echo $term_with_order->term_order; ?></span><?php endif; ?>
<?php endif; ?>
</a>
</div>

<?php endif; ?>