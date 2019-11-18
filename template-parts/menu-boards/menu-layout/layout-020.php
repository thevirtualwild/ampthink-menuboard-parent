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
<div id="layout-020" class="mx-auto menu-board layout-020 <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="menu-container">
		<!-- Pull in left side of template -->
		<div class="menu-list left">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('menu_list_left') ):
					// loop through the rows of data
				while ( have_rows('menu_list_left') ) : the_row();

					?>
					<div class="menu-section">

						<?php
						include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/section-title.php', false, false ) );

					// check if the repeater field has rows of data
					if( have_rows('additional_items') ):  ?>


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

								include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item-without-calorie.php', false, false ) );

								wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

							endif;

						endwhile; ?>

						</ul>

					<?php endif;?>

					</div>

					<?php

				endwhile;
			endif;

			?>

		</div>
		<!-- end of left side of template -->

		<!-- Pull in right side of template -->
		<div class="menu-list right">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('menu_list_right') ):
					// loop through the rows of data
				while ( have_rows('menu_list_right') ) : the_row();

					?>
					<div class="menu-section">

						<?php
						include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/section-title.php', false, false ) );

					// check if the repeater field has rows of data
					if( have_rows('additional_items') ):  ?>


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

								include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item-without-calorie.php', false, false ) );

								wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

							endif;

						endwhile; ?>

						</ul>

					<?php endif;?>

					</div>

					<?php

				endwhile;
			endif;

			?>

		</div>
		<!-- end of right side of template -->
	</div>
	<div class="disclaimer">2000 calories a day is used as general nutrition advice but calorie
needs vary. Additional nutrition information available upon request.</div>
</div>
