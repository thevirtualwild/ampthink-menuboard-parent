<?php
/**
 * Template part for displaying posts - Template A
 *
 * Layout:
 *	- header
 * 	- 3 featured items (full horizontal)
 * 	- 2 vertical menu list (full horizontal)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Menu_Parent
 */

?>

<div class="three-item-top-feature has-header allow-resize-title <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div id="featured-menu" class="top">
	<?php

	$count = 0;

	$featured_items = get_sub_field('featured_items');

	// check if the repeater field has rows of data
	if( have_rows('featured_items') ):
		?>

		<?php
		// loop through the rows of data
		while ( have_rows('featured_items') ) : the_row();

			// display a sub field value
			$menu_item = get_sub_field('menu_item');

			if( $menu_item ):

				// print_r($menu_item);

				// override $post
				$post = check_alcohol($menu_item);

				setup_postdata( $post );

				include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/featured-items/featured-image-with-title.php', false, false ) );

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php endif;

		endwhile;

	else :

		// no rows found

	endif; ?>

	</div>

	<div id="second-menu" class="bottom">

		<?php $current_items = array(); ?>

		<div class="additional-menu menu-list left">

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


						if (in_array($post->ID, $current_items)) {
							wp_reset_postdata();
							return;
						} else {
							$current_items[] = $post->ID;

							setup_postdata( $post );

							include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item.php', false, false ) );

							wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

						}

					endif;

				endwhile; ?>

			</ul>

			<?php else :

				// no rows found

			endif;

			?>
		</div>
		<div class="additional-menu menu-list right">

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

						wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

					<?php endif;

				endwhile; ?>

			</ul>

			<?php else :

				// no rows found

			endif;

			?>
		</div>

	</div>

</div>
