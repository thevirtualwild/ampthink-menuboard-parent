<?php

// $image = echo get_product_image_url($post);
$size = 'medium'; // (thumbnail, medium, large, full or custom size)
// $thumb = $image['sizes'][$size];
?>

<div class="featured-menu-item">
  <div class="menu-item-image"><?php the_post_thumbnail($size); ?></div>
  <div class="menu-item-title">
    <h2><?php the_field('display_title'); ?></h2>
  </div>
</div>
