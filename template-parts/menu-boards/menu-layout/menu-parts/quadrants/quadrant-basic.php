<div class="quadrant quadrant-basic <?php echo $sku_class ?>">
  <div class="quadrant-wrap">
    <div class="item-text">
        <?php if($display_icon) {
          echo '<img src="' . $display_icon . '" class="display-icon">';
        }
        if($display_subtitle){
          echo '<div class="featured_display_title animated bounceInLeft">'
            . $display_title
            . '<div class="plus-icon">' . '+' . '</div>'
            . '</div>';
          echo '<div class="featured_display_subtitle animated bounceInLeft">'
            . $display_subtitle . '</div>' ;
        } else {
          echo '<div class="featured_display_title animated bounceInLeft">'
            . $display_title
            . '</div>';
        }
        ?>
    </div>
    <div class="flex-image-wrapper">
      <img src="<?php echo get_product_image_url($post); ?>" class="featured-item-image" />
    </div>
    <div class="item-info">
      <div class="animated bounceInLeft item-calories featured_calories calories"><div class="calories-num"><?php echo $calories; ?></div> Cal</div>
      <div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div>
    </div>
  </div>
</div>
