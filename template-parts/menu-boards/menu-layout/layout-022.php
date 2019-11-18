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
<div id="layout-022" class="mx-auto menu-board layout-022 <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="menu-container">
		<div class="menu-title-container"><h1><?php echo get_field('menu_title')?></h1></div>
		<!-- Pull in left side of template -->
		<div class="menu-list left">
			<?php
			$featured_item = get_sub_field('featured_item_left');

			if( $featured_item ):

				$post = $featured_item;

				$custom_css_class = get_field('custom_css_class');
				if (strpos($custom_css_class, "alcohol-always-on") != false ) {
					$post = $featured_item;
				} else {
					$post = check_alcohol($featured_item);
				}


					setup_postdata( $post );

					$sku_class = 'noskuclass';

					$sku_class = get_sku_classes($post);



					echo '<div class="featured-item-wrapper '. $sku_class .'">';
					the_post_thumbnail('large');
					// echo '<div class="featured-image"><img src="' . get_the_post_thumbnail_url('large') . '"></div>';
					// display a sub field value

	        $display_title = get_field('display_title');
	        $price = get_field('price');
	        // $calories = get_field('calories');


	        ?>
					<div class="featured-item-info">
							<div class="item-text">
								<div class="featured_display_title animated bounceInLeft"><?php echo $display_title ;?><div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div></div>
							</div>
					</div>
	        <?php

					echo '</div>';

					wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endif;
			?>

		</div>
		<!-- end of left side of template -->

		<!-- Pull in right side of template -->
		<div class="menu-list right">

			<?php
			$featured_item = get_sub_field('featured_item_right');

			if( $featured_item ):

				$post = $featured_item;

				$custom_css_class = get_field('custom_css_class');
				if (strpos($custom_css_class, "alcohol-always-on") != false ) {
					$post = $featured_item;
				} else {
					$post = check_alcohol($featured_item);
				}

					setup_postdata( $post );

					$sku_class = 'noskuclass';

					$sku_class = get_sku_classes($post);

					echo '<div class="featured-item-wrapper '. $sku_class .'">';
					the_post_thumbnail('large');
					// echo '<div class="featured-image"><img src="' . get_the_post_thumbnail_url('large') . '"></div>';
					// display a sub field value

					$display_title = get_field('display_title');
					$price = get_field('price');
					// $calories = get_field('calories');


					?>
						<div class="featured-item-info">
								<div class="item-text">
									<div class="featured_display_title animated bounceInLeft"><?php echo $display_title ;?><div class="animated bounceInLeft item-price featured_display_price featured_price price"><span class="price-sign">$</span><span class="price-num"><?php echo $price; ?></span></div></div>
								</div>
						</div>
					<?php

					echo '</div>';

					wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endif;
			?>

		</div>
		<!-- end of right side of template -->
	</div>

</div>
