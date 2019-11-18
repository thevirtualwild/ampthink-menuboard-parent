<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<div class="versus-feature-menu menu-board">

	<?php

		$featured_menu_item = get_sub_field('featured_item');

		if( $featured_menu_item ):

		// print_r($menu_item);

		// override $post
			$post = $featured_menu_item;

			$disable_alcohol = get_field('disable_alcohol', 'options');

				if ($disable_alcohol) {

					$menu_item = $featured_menu_item;

					if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {

						$alternate_item = get_field('alternate_item', $menu_item->ID);

						$post = $alternate_item;
					}
				}
			setup_postdata( $post );
			$itemID = get_the_ID();

			?>

	<!-- Pull in left side of template -->
	<div id="featured-item-info" class="left">

		<div class="item-infobox">
			<div class="title_price_container">
				<div class="display-subtitle"><?php the_field('display_subtitle') ?></div>
				<div class="display-title"><?php the_field('display_title') ?></div>
			</div>
			<div class="description_container">
				<?php the_field('display_description'); ?>
			</div>
			<div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div>
		</div>
	</div>
	<!-- end of left side of template -->
	<!-- Pull in right side of template -->
	<div id="featured-item-slider" class="right">

			<div class="featured-menu-item">
				<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/slider-carousel.php', false, false ) ); ?>

				<?php
				/*
				echo do_shortcode( '[rev_slider alias="versus-feature-menu"]' .
								'[gallery ids="0,'. $itemID . '"]' . // implode( ",", $post_list ).'"]' .
								'[/rev_slider]' );
								*/
				?>
			</div>

			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

		<?php endif; ?>
	</div>
	<!-- End of right side of template -->
</div>
