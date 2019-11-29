<?php
/**
 * The template for displaying devices by pulling in specified menu board
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Multi_Menu_Parent
 */

get_header();

	
	setup_postdata( $post );

	include( locate_template( 'layouts/single-menu_board.php', false, false ) );


get_footer();
