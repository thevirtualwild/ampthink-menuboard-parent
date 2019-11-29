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
<div id="layout-p-001" class="menu-board-portable layout-p-001 <?php the_field('custom_css_class'); ?>">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<div class="portable-menu-container">
		<!-- Pull in left side of template -->
		<div class="menu-list">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('menu_list') ):
					// loop through the rows of data
				while ( have_rows('menu_list') ) : the_row();

					include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/menu-list/menu-list-section.php', false, false ) );

				endwhile;
			endif;

			?>

		</div>
		<!-- end of left side of template -->
		<div class="disclaimer">A complimentary cup of water can be requested at any permanent concession stand</div>
	</div>
</div>
