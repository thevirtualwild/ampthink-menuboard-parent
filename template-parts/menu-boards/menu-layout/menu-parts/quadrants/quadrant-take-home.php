<div class="quadrant quadrant-take-home" style="order:<?php echo $order; ?>">
  <div class="quadrant-wrap">

    <div class="flex-image-wrapper" style="order:1;">
      <img src="http://broncos.3.229.112.134.xip.io/wp-content/themes/multi-menu-parent/images/gfx-take-home-game.png" class="featured-item-image" />
    </div>

    <?php
		// loop through the rows of data
		while ( have_rows('take_home_drinks') ) : the_row();

			// display a sub field value
			$featured_item = get_sub_field('take_home_drink');

			// override $post
      $custom_css_class = get_field('custom_css_class');
      if (strpos($custom_css_class, "alcohol-always-on") != false ) {
        $post = $featured_item;
      } else {
        $post = check_alcohol($featured_item);
      }
			setup_postdata( $post );

			$itemID = get_the_ID();

			$item_list[] = $itemID;

      $fields = get_fields($itemID);

      // print_r($fields);

      $display_title = get_field('display_title');
      $price = get_field('price');
      $calories = get_field('calories');

      $sku_class = 'noskuclass';

      $sku_class = get_sku_classes($post);


      if ($display_title) {
        ?>
        <div class="take-home-item <?php echo $sku_class ?>" style="order:<?php echo $count; ?>">
          <div class="with-item-image">
            <img src="<?php echo get_product_image_url($post); ?>" class="featured-item-image" />
          </div>
          <div class="with-item-info">
              <div class="title-container">
                <div class="featured_display_title animated bounceInLeft"><?php echo $display_title ;?></div>
              </div>
              <div class="info-container">
                <div class="animated bounceInLeft item-calories featured_calories calories"><div class="calories-num"><?php echo $calories; ?></div> Cal</div>
                <div class="separator">|</div>
                <div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div>
              </div>
          </div>
        </div>

        <?php

        $count += 2;
      } else {
        ?>
        <div class="take-home-item" style="order:<?php echo $count; ?>"></div>
        <?php
      }

			wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

		endwhile; ?>
  </div>
</div>
