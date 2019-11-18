<?php
/**
 * Template part for displaying posts - Layout 016 - featured + Ad list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Virtual_Wild_AmpThink_Starter
 */

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Start Template File -->
<div id="layout-016" class="mx-auto menu-board layout-016 <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="menu-container">
		<!-- Pull in left side of template -->
		<div id="top-bottom-half-feature" class="left">

			<?php

			$count = 0;

			// check if the repeater field has rows of data
			if( have_rows('take_home_drinks') ):

				include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/quadrants/quadrant-take-home.php', false, false ) );

			endif;

			wp_reset_postdata();

			?>

			<?php
			$featured_ad = get_sub_field('featured_ad');

			if( $featured_ad ) {

				$post = $featured_ad;
				setup_postdata( $post);

				include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/quadrants/quadrant-ad.php', false, false ) );

	      wp_reset_postdata();
	    }
	    ?>

		</div>
		<!-- End of left side of template -->

		<!-- Pull in right side of template -->
		<div id="menu-list" class="menu-list right">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('menu_list') ):
					// loop through the rows of data
				while ( have_rows('menu_list') ) : the_row();

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

								include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/list-items/menu-item-with-calorie.php', false, false ) );

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
