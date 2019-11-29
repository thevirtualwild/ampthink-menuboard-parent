<?php
/**
 * Template part for displaying posts - Layout 009 - 3 Combos 1 Mix
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<!-- Start Template File -->
<div id="layout-009" class="layout-009 left-right-container mx-auto menu-board <?php the_field('custom_css_class'); ?> ">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<!-- Pull in grid container of template -->
	<div id="grid-container">

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

				$order = get_sub_field('order');

				setup_postdata( $post );

        $display_title = get_field('display_title');
				$display_subtitle = get_field('display_subtitle');
				$display_icon = get_field('display_icon');
        $price = get_field('price');
        $calories = get_field('calories');

				$sku_class = 'noskuclass';

				$sku_class = get_sku_classes($post);

				include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/quadrants/quadrant-basic.php', false, false ) );

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endwhile;

		endif;

		if( have_rows('featured_items_with_drinks') ):

			// loop through the rows of data
			while ( have_rows('featured_items_with_drinks') ) : the_row();

				// display a sub field value
				$featured_item = get_sub_field('featured_item');

				// override $post
				$custom_css_class = get_field('custom_css_class');
				if (strpos($custom_css_class, "alcohol-always-on") != false ) {
					$post = $featured_item;
				} else {
					$post = check_alcohol($featured_item);
				}

				$order = get_sub_field('order');

				setup_postdata( $post );

				$display_title = get_field('display_title');
				$display_subtitle = get_field('display_subtitle');
				$display_icon = get_field('display_icon');
				$price = get_field('price');
				$calories = get_field('calories');

				$sku_class = 'noskuclass';

				$sku_class = get_sku_classes($post);

				include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/quadrants/quadrant-with-items.php', false, false ) );

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endwhile;

		endif;

		$order = get_sub_field('take_home_order');

		if( have_rows('take_home_drinks') ):
			
			include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/quadrants/quadrant-take-home.php', false, false ) );

		endif;

		wp_reset_postdata();
		?>

	</div>
	<!-- End of left side of template -->

</div>
