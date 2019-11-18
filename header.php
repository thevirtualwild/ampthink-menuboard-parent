<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Multi_Menu_Parent
 */
 ?>
 <!doctype html>
 <html <?php language_attributes(); ?>>
 <head>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 <!-- 	<meta name="viewport" content="width=device-width, initial-scale=1"> -->
 	<meta name="viewport" content="initial-scale=1.0"> <!-- width=1920, -->
 	<link rel="profile" href="https://gmpg.org/xfn/11">

 	<!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


 	<?php wp_head(); ?>



 	<style>
 		<?php //body ?>
 		html body {
 			background-color: <?php echo the_field('primary_background_color', 'options'); ?> !important;
 		}

 		<?php // primary ?>
 		.archive #content article.menu_boards .entry-body .goto-menu button,
 		header .header-inner,
 		.background_brand_primary {
 			background-color: <?php echo the_field('primary_brand_color', 'options'); ?> !important;
 		}

 		.four-col-horizontal-grid-white .col hr,
 		.four-col-horizontal-grid-white .col,
 		.four-col-horizontal-grid-white h1,
 		.four-col-horizontal-grid-white .col,
 		.four-col-horizontal-grid-white h3,
 		.four-col-horizontal-grid-white .col,
 		.four-col-horizontal-grid-white h4,
 		.three-col-vertical-grid-white li,
 		ul li.menu_item h1.display-title,
 		ul li.menu_item h1.display-title .price,
 		#feature-left-snacks-menu .left .featured-deal-infobox .item-text .featured_display_sub_title,
 		#feature-left-combos-menu .left .featured-deal-infobox .item-text .featured_display_sub_title,
 		#feature-right-menu .left .featured-deal-infobox .item-text .featured_display_sub_title,
 		#split-menu-top-feature .left .featured-deal-infobox .item-text .featured_display_sub_title,
 		#feature-left-snacks-menu .right .featured-deal-infobox .item-text .featured_display_sub_title,
 		#feature-left-combos-menu .right .featured-deal-infobox .item-text .featured_display_sub_title,
 		#feature-right-menu .right .featured-deal-infobox .item-text .featured_display_sub_title,
 		#split-menu-top-feature .right .featured-deal-infobox .item-text .featured_display_sub_title,
 		.five-item-feature-left-menu .right .additional-menu-item .menu-item-title h2,
 		.five-item-feature-left-menu .right .additional-menu-item .menu-item-title .menu-item-price,
 		.four-item-slider-top .additional-menu-item .menu-item-title h2,
 		.four-item-slider-top .additional-menu-item .menu-item-title h2,
 		.four-item-slider-top .additional-menu-item .menu-item-title .menu-item-price,
 		.versus-feature-menu.menu-board .left .item-infobox .display-title,
 		.versus-feature-menu.menu-board .left .item-infobox .price,
 		p,
 		.color_brand_primary {
 			color: <?php echo the_field('primary_brand_color', 'options'); ?> !important;
 		}

 		<?php // secondary ?>
 		.four-col-horizontal-grid-white .col, .four-col-horizontal-grid-white h2, #feature-left-combos-menu.menu-board .featured-deal-infobox .item-text .featured_display_title, .five-item-feature-left-menu .combo-subtitle, .five-item-feature-left-menu .right .additional-menu-item .menu-item-title h3, .three-item-top-feature .top .featured-menu-item .menu-item-title, .four-item-slider-top .additional-menu-item .menu-item-title h3, .versus-feature-menu.menu-board .left .item-infobox .display-subtitle,
 		.color_brand_secondary {
 			color: <?php echo the_field('secondary_brand_color', 'options'); ?> !important;
 		}

 		.four-item-slider-top .additional-menu-item .menu-item-title .menu-item-price:before,
 		.background_brand_secondary {
 			background-color: <?php echo the_field('secondary_brand_color', 'options'); ?> !important;
 		}
 	</style>
 </head>

 <body <?php body_class(); ?>>
