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

<div id="layout-000" class="layout-000 menu-board <?php the_field('custom_css_class'); ?> ">

	<?php get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' ); ?>

	<!-- Start Template File -->

	<div class="menu-container">
		<h1 class="menu-title"><?php echo get_field('menu_title');?></h1>
		<h2 class="menu-tagline"><?php echo get_field('menu_tagline');?></h2>
	</div>

</div>
