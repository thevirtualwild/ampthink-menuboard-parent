<?php

// $image = echo get_product_image_url($post);
$size = 'large'; // (thumbnail, medium, large, full or custom size)
// $thumb = $image['sizes'][$size];
$title_top = trim(explode(" ",$display_title)[0]);
$title_bottom = trim(explode($title_top, $display_title)[1]);
?>

<div class="featured-menu-item">
  <div class="combo-num"><?php echo $count; ?></div>
  <div class="menu-item-image"><?php the_post_thumbnail($size); ?></div>
  <div class="menu-item-title">
    <h2 class="featured_display_title">
      <div class="title-top"><div class="title-text"><?php echo $title_top; ?></div><div class="title-line"></div></div>
      <div class="title-bottom"><?php echo $title_bottom ?></div>
    </h2>
    <div class="featured_display_subtitle"><?php echo $display_subtitle; ?></div>
    <div class="item-info">
      <div class="animated bounceInLeft item-calories featured_calories calories"><div class="calories-num"><?php echo $calories; ?></div> Cal</div><div class="separator">|</div><div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div>
    </div>
  </div>
</div>
