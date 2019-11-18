<div class="quadrant quadrant-with-featured parent-item <?php echo $sku_class ?>">
  <div class="quadrant-wrap">
    <div class="featured-image-wrapper">
      <?php the_post_thumbnail('large'); ?>
    </div>
    <div class="both-with-items">
      <?php
      $featured_item_price = $price;
      if(strpos($calories, '-') !== false) {
        $first_item_calories = explode("-",trim($calories));
      } else {
        $first_item_calories = array($calories);
      }

      if( have_rows('with_items') ):

        // loop through the rows of data
        while ( have_rows('with_items') ) : the_row();

        $with_item = get_sub_field('with_item');

        // override $post
        $custom_css_class = get_field('custom_css_class');
				if (strpos($custom_css_class, "alcohol-always-on") != false ) {
					$post = $with_item;
				} else {
					$post = check_alcohol($with_item);
				}

        setup_postdata( $post );

        $display_title = get_field('display_title');
        $display_subtitle = get_field('display_subtitle');
        $display_icon = get_field('display_icon');
        $price = get_field('price');
        $price = floatval($featured_item_price) + floatval($price);
        $price = number_format($price, 2);
        $calories = get_field('calories');

        if(strpos($calories, '-') !== false) {
          $second_item_calories = explode("-",$calories);
          // echo 'inner split';
        } else {
          $second_item_calories = array($calories);
        }

        $calories = get_calorie_sum($first_item_calories, $second_item_calories);

        $sku = get_field('sku');


				$sku_class = get_sku_classes($post);

        $with_sku_class = $sku_class . " with-item"; // . " product_id-" . strval($sku)

        if ($display_title) {
          ?>
          <div class="with-item-container <?php echo $with_sku_class ?>">
            <div class="with-item-image">
              <img src="<?php echo get_product_image_url($post); ?>" class="featured-item-image" />
            </div>
            <div class="with-item-info">
                <div class="title-container">
                  <div class="plus-icon"><img src="http://broncos.3.229.112.134.xip.io/wp-content/themes/multi-menu-parent/images/gfx-plus-icon-round.png"/></div><div class="featured_display_title animated bounceInLeft"><?php echo $display_title ;?></div>
                </div>
                <div class="animated bounceInLeft item-calories featured_calories calories"><span class="calories-num"><?php echo $calories; ?></span> Cal</div>
                <div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div>
            </div>
          </div>
          <?php

        }
        wp_reset_postdata();
        endwhile;
      endif;
      ?>
    </div>
  </div>
</div>
