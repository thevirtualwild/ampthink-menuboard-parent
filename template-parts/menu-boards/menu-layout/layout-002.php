<?php
/**
 * Template part for displaying posts - Layout B
 *
 * Layout:
 *	- header
 * 	- Featured Item Slider (half width)
 * 	- Quad Featured Item grid (half width)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<div class="five-item-feature-left-menu menu-board has-header allow-resize-title <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="left">

		<?php

		$count = 0;

		$item_list = array();

		// check if the repeater field has rows of data
		if( have_rows('featured_items') ):

			// loop through the rows of data
			while ( have_rows('featured_items') ) : the_row();

				// display a sub field value
				$featured_item = get_sub_field('featured_item');

				// override $post
				$post = check_alcohol($featured_item);

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

			<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/sliders/slider-default.php', false, false ) ); ?>

		</div>

	</div>


	<div class="right">
		<?php

		$additional_items = get_sub_field('additional_items');

		// check if the repeater field has rows of data
		if( have_rows('additional_items') ):
			// loop through the rows of data
			while ( have_rows('additional_items') ) : the_row();

				// display a sub field value
				$menu_item = get_sub_field('menu_item');

				if( $menu_item ):

					// print_r($menu_item);

					// override $post
					$post = check_alcohol($menu_item);

					setup_postdata( $post );

					include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/featured-items/featured-image-under-title-subtitle.php', false, false ) );

					wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

				endif;

			endwhile;

		else :

			// no rows found

		endif;

		?>
	</div>

</div>
