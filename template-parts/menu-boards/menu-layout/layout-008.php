<?php
/**
 * Template part for displaying posts - Layout J
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<div id="split-menu-top-feature" class="has-header allow-resize-title <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="featured-item top contains-slider">
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
			<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/sliders/slider-top.php', false, false ) ); ?>
		</div>

	</div>

	<div id="second-menu" class="bottom">
		<div class="additional-menu menu-list left half">

			<?php

			$additional_items_left = get_sub_field('additional_items_left');

			// check if the repeater field has rows of data
			if( have_rows('additional_items_left') ):
				?>
				<ul class="list-of-menu-items">

				<?php
				// loop through the rows of data
				while ( have_rows('additional_items_left') ) : the_row();

					// display a sub field value
					$menu_item = get_sub_field('menu_item');

					$show_description = get_sub_field('show_description');

					if( $menu_item ):

						// print_r($menu_item);

						// override $post
						$post = check_alcohol($menu_item);

						setup_postdata( $post );

						include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item.php', false, false ) );

						wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

					endif;

				endwhile; ?>

			</ul>

			<?php else :

				// no rows found

			endif;

			?>
		</div>
		<div class="additional-menu menu-list right half">

			<?php

			$additional_items_left = get_sub_field('additional_items_right');

			// check if the repeater field has rows of data
			if( have_rows('additional_items_right') ):
				?>
				<ul class="list-of-menu-items">

				<?php
				// loop through the rows of data
				while ( have_rows('additional_items_right') ) : the_row();

					// display a sub field value
					$menu_item = get_sub_field('menu_item');
					$show_description = get_sub_field('show_description');

					if( $menu_item ):

						// print_r($menu_item);

						// override $post
						$post = check_alcohol($menu_item);

						setup_postdata( $post );

						include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item.php', false, false ) );

						wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

					endif;

				endwhile; ?>

			</ul>

			<?php else :

				// no rows found

			endif;

			?>
		</div>

	</div>

</div>
