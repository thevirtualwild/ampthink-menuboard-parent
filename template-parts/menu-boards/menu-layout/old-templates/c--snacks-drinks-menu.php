<?php
/**
* Template part for displaying posts - Layout C
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package The_Virtual_Wild_AmpThink_Starter
*/

?>

<!-- Start Template File -->
<div class="snacks-drinks-menu menu-board">

	<?php $current_items = array(); ?>

	<?php $fieldname = 'additional_items_left'; ?>

	<!-- Pull in left of template -->
	<div id="menu-list" class="left">
	<?php

	$additional_items_left = get_sub_field('additional_items_left');

	// check if the repeater field has rows of data
	if( have_rows('additional_items_left') ):  ?>

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
				$post = $menu_item;

				$disable_alcohol = get_field('disable_alcohol', 'options');

				if ($disable_alcohol) {
					// echo 'disable';

					if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {

						$alternate_item = get_field('alternate_item', $menu_item->ID);
// echo 'alternate';
						$post = $alternate_item;
					}
				}

				// echo 'hello';
				// print_r($menu_item);
				// print_r($post);

				if (in_array($post, $current_items)) {
					// wp_reset_postdata();
				} else {
					$current_items[] = $post;



					setup_postdata( $post );

					?>
					<li class="menu_item">
						<div class="title_price_container">
							<h1 class="display-title"><div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div><?php the_field('display_title') ?></h1>
						</div>
						<?php if ($show_description) { ?>
							<div class="display-container">
								<p><?php the_field('display_description'); ?></p>
							</div>
						<?php } ?>
					</li>
				<?php } ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php endif;

		endwhile; ?>

		</ul>

	<?php
		else :

	// no rows found

	endif;

	?>
	</div>
	<!-- end of left side of template -->



	<div id="featured-item-slider" class="hero-image middle">
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
			<?php include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/slider-thin-vertical.php', false, false ) ); ?>

			<?php
				/*
				echo do_shortcode( '[rev_slider alias="snacks-drinks-feature"]' .
					   '[gallery ids="0,'. implode( ",", $item_list ).'"]' .
					   '[/rev_slider]' );
					   */
			?>

		</div>
	</div>


	<!-- Pull in right of template -->
	<div id="menu-list" class="right">
	<?php

	$additional_items_right = get_sub_field('additional_items_right');

	// check if the repeater field has rows of data
	if( have_rows('additional_items_right') ):

		echo '<ul class="list-of-menu-items">';

		// loop through the rows of data
		while ( have_rows('additional_items_right') ) : the_row();

			// display a sub field value
			$menu_item = get_sub_field('menu_item');
			$show_description = get_sub_field('show_description');

			if( $menu_item ):

				// print_r($menu_item);

				// override $post
				$post = $menu_item;


				$disable_alcohol = get_field('disable_alcohol', 'options');

				if ($disable_alcohol) {

					$menu_item = $featured_item;

					if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {

						$alternate_item = get_field('alternate_item', $menu_item->ID);

						$post = $alternate_item;
					}
				}

				if (in_array($post->ID, $current_items)) {
					// wp_reset_postdata();
				} else {
					$current_items[] = $post->ID;
					setup_postdata( $post );

					?>
					<li class="menu_item">
						<div class="title_price_container">
							<h1 class="display-title"><div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div><?php the_field('display_title') ?></h1>
						</div>
						<?php if ($show_description) { ?>
							<div class="display-container">
								<p><?php the_field('display_description'); ?></p>
							</div>
						<?php } ?>
					</li>
				<?php } ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php endif;

		endwhile;

		echo '</ul>';

	else :

	// no rows found

	endif;

	?>
	</div>
	<!-- end of right side of template -->
</div>
