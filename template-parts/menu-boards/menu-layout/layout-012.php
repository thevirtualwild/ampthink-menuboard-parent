<?php
/**
 * Template part for displaying posts - Layout BBQ
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Start Template File -->
<div id="layout-012-bbq" class="left-right-container mx-auto menu-board layout-012-bbq <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<!-- Pull in left side of template -->
	<div id="top-bottom-half-feature" class="left">

		<?php

		$count = 0;

		// check if the repeater field has rows of data
		if( have_rows('featured_items') ):

			// loop through the rows of data
			while ( have_rows('featured_items') ) : the_row();

				// display a sub field value
				$featured_item = get_sub_field('featured_item');

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

        ?>
        <div class="featured-menu-item <?php echo $sku_class ?>">
          <!-- <img src="..." class="d-block w-100" alt="..."> -->
          <div class="flex-image-wrapper">
            <img src="<?php echo get_product_image_url($post); ?>" class="featured-item-image" />
          </div>
          <div class="featured-item-info">
              <div class="item-text">
                <div class="featured_display_title animated bounceInLeft"><?php echo $display_title ;?></div>
              </div>
							<div class="animated bounceInLeft item-calories featured_calories calories"><div class="calories-num"><?php echo $calories; ?></div> Cal</div>
              <div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div>
          </div>
					<div class="disclaimer">*Gluten Friendly Burger Roll Available Upon Request</div>
        </div>

        <?php

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endwhile;

		else :

			// no rows found

		endif;

		?>


		<!-- <div class="featured-menu-item">
			<?php //include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/sliders/slider-title-outline.php', false, false ) ); ?>
		</div> -->

	</div>
	<!-- End of left side of template -->

	<!-- Pull in right side of template -->
	<div id="menu-list" class="menu-list right">
		<?php

		$additional_items = get_sub_field('additional_items');

		// check if the repeater field has rows of data
		if( have_rows('additional_items') ):  ?>

      <h1 class="menu-list-title">Beverages</h1>

			<ul class="list-of-menu-items">
			<?php
				// loop through the rows of data
			while ( have_rows('additional_items') ) : the_row();

				// display a sub field value
				$menu_item = get_sub_field('menu_item');
				$show_description = get_sub_field('show_description');

				if( $menu_item ):

					// override $post
					$custom_css_class = get_field('custom_css_class');
					if (strpos($custom_css_class, "alcohol-always-on") != false ) {
						$post = $menu_item;
					} else {
						$post = check_alcohol($menu_item);
					}
					setup_postdata( $post );

					$sku_class = 'noskuclass';

					$sku_class = get_sku_classes($post);

					include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item-with-calorie.php', false, false ) );

					wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

				endif;

			endwhile; ?>

			</ul>

		<?php else :

		// no rows found

		endif;

		?>

    <div class="disclaimer">2000 calories a day is used as general nutrition advice but calorie
needs vary. Additional nutrition information available upon request.</div>
	</div>
	<!-- end of right side of template -->
</div>
