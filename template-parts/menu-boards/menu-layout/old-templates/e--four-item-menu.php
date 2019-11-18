<?php
/**
 * Template part for displaying posts - Layout E
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<div class="four-col-horizontal-grid-white four-item-slider-top"> <!--  -->

	<div class="four-col-horizontal-grid-white-hero-image top contains-slider">
		<?php

		$item_list = array();

		// check if the repeater field has rows of data
		if( have_rows('featured_items') ):

			// loop through the rows of data
			while ( have_rows('featured_items') ) : the_row();

				// display a sub field value
				$featured_item = get_sub_field('featured_item');

				// override $post
				$post = $featured_item;


				$disable_alcohol = get_field('disable_alcohol', 'options');

				if ($disable_alcohol) {

					$menu_item = $featured_item;

					if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {

						$alternate_item = get_field('alternate_item', $menu_item->ID);

						$post = $alternate_item;
					}
				}
				setup_postdata( $post );
				$itemID = get_the_ID();

				$item_list[] = $itemID;

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endwhile;

		else :

			// no rows found

		endif;

		?>


		<div id="featured-menu-item">
			<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/slider-carousel.php', false, false ) ); ?>

			<?php
				/*
				echo do_shortcode( '[rev_slider alias="combos-top-feature"]' .
					   '[gallery ids="0,'. implode( ",", $item_list ).'"]' .
					   '[/rev_slider]' );
						 */
			?>

		</div>

	</div>

	<div id="second-menu" class="bottom">

	<?php

	$additional_items = get_sub_field('additional_items');

	// check if the repeater field has rows of data
	if( have_rows('additional_items') ):
		?>


		<?php
		// loop through the rows of data
		while ( have_rows('additional_items') ) : the_row();

			// display a sub field value
			$menu_item = get_sub_field('menu_item');

			if( $menu_item ):

				// print_r($menu_item);

				// override $post
				$post = $menu_item;


				$disable_alcohol = get_field('disable_alcohol', 'options');

				if ($disable_alcohol) {

					if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {

						$alternate_item = get_field('alternate_item', $menu_item->ID);

						$post = $alternate_item;
					}
				}
				setup_postdata( $post );


				$image = echo get_product_image_url($post);
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)
// 				$thumb = $image['sizes'][$size];
				$thumb = $image;
				?>

				<div class="additional-menu-item">
					<div class="title-container">
						<div class="menu-item-title">
							<h2><?php the_field('display_title'); ?></h2>
							<h3><?php the_field('display_subtitle'); ?></h3>
							<div class="menu-item-price"><span class="price-holder"><span class="price-sign">$</span><span class="price-num"><?php the_field('price'); ?></span></span></div>
						</div>
					</div>
					<div class="image-container">
						<div class="menu-item-image">
<!-- 								<img src="<?php // echo $thumb; ?>" /> -->
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</div>

<!-- 				<div class="additional-menu-item col">
					<div class="menu-item-image"><img src="<?php // echo $thumb; ?>" /></div>
					<div class="menu-item-title">
						<h2><?php // the_field('display_title'); ?></h2>
						<h3><?php // the_field('display_subtitle'); ?></h3>
					</div>
					<div class="menu-item-price">$<?php // the_field('price'); ?></div>
				</div> -->
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php endif;

		endwhile;

	else :

		// no rows found

	endif;

	?>

	</div>
</div>
