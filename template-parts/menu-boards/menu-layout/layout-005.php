<?php
/**
* Template part for displaying posts - Layout F
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package The_Virtual_Wild_AmpThink_Starter
*/

?>

<!-- Start Template File -->
<div class="drink-feature-left-ad-right-menu menu-board has-header allow-resize-title <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<!-- Pull in left side of template -->
	<div id="featured-item-slider" class="hero-image left">

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


		<div id="featured-item">
			<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/sliders/slider-thin-vertical.php', false, false ) ); ?>
		</div>

	</div>
	<!-- End of left side of template -->



	<!-- Pull in middle of template -->
	<div id="menu-list" class="middle">
	<?php

	$current_items = array();

	$additional_items = get_sub_field('additional_items');

	// check if the repeater field has rows of data
	if( have_rows('additional_items') ):  ?>

		<ul class="list-of-menu-items">

		<?php // loop through the rows of data
		while ( have_rows('additional_items') ) : the_row();

			// display a sub field value
			$menu_item = get_sub_field('menu_item');
			$show_description = get_sub_field('show_description');

			if( $menu_item ):

				// print_r($menu_item);

				// override $post
				$post = check_alcohol($menu_item);

				if (in_array($post->ID, $current_items)) {
					// wp_reset_postdata();
				} else {
					$current_items[] = $post->ID;

					setup_postdata( $post );

					include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item.php', false, false ) );

				}

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endif;

		endwhile; ?>

		</ul>

	<?php else :

	// no rows found

	endif;

	?>
	</div>
	<!-- end of right side of template -->

	<!-- Pull in left side of template -->
	<div class="right">

		<?php

		$post_list = array();

		// check if the repeater field has rows of data
		if( have_rows('featured_ads') ):

			// loop through the rows of data
			while ( have_rows('featured_ads') ) : the_row();

				// display a sub field value
				$featured_ad = get_sub_field('featured_ad');

				$post = check_alcohol($featured_ad);

				setup_postdata( $post );
				$itemID = get_the_ID();

				$post_list[] = $itemID;

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			endwhile;

		else :

			// no rows found

		endif;

		?>


		<div id="featured-ad">

			<?php
				foreach ($post_list as $item_id) {
					$post = get_post($item_id);
					setup_postdata( $post );

					include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/advertisements/featured-ad.php', false, false ) );

					wp_reset_postdata();
				}
			?>

		</div>

	</div>
	<!-- End of left side of template -->
</div>
