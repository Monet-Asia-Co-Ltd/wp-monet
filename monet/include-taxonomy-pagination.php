<?php if (isset($query)) : ?>
<div class="activity-nav col-120">
  <div class="s-pagination-strip">
  <?php
    $paginate_base = get_pagenum_link(1);
    if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
      $paginate_format = '';
      $paginate_base = add_query_arg('paged', '%#%');
    } else {
      $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
      user_trailingslashit('page/%#%/', 'paged');;
      $paginate_base .= '%_%';
    }
    echo paginate_links( array(
      'base' => $paginate_base,
      'format' => $paginate_format,
      'total' => $query->max_num_pages,
      'mid_size' => 1,
      'current' => max(1, $query->query_vars['paged']),
    ));
  ?>
  </div>
</div>
<?php endif; ?>