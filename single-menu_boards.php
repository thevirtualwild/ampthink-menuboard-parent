<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Multi_Menu_Parent
 */

get_header();

	$show_price = get_field('show_pricesign');
	$priceclass = '';
	$price_visibility = get_field('price_visibility', 'option');
	if ($price_visibility == 'Hide All Prices') {
		$priceclass = "hide-prices";
	} elseif ($price_visibility == 'Show All Prices') {
		$priceclass = "show-price";
	} else {
		if ($show_price) {
			$priceclass = 'show-price';
		}
	}

	$count = 0;
?>
	<div id="menu-container" class="site-main <?php echo $priceclass; ?>" style="background:url('<?php the_post_thumbnail_url(); ?>'); background-size: cover;">
		<!-- <h2>Menu Boards Template</h2> -->

		<?php
		while ( have_posts() ) :
			the_post();

			while ( have_rows('menu_layout') ) : the_row();

				$layout = get_row_layout();

				if( $layout == '3_item_featured_banner_top_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-001', 'three-item-top-feature' );

				elseif( $layout == '5_item_feature_left_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-002', 'five-item-menu' );

				elseif( $layout == 'snacks_drinks_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-003', 'snacks-drinks-menu' );

				elseif( $layout == 'feature_left_snacks_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-004', 'feature-left-snacks-menu' );

				elseif( $layout == '4_item_banner_top_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/unfinished-999', 'four-item-menu' );

				elseif( $layout == 'feature_left_drinks_ad_right_menu' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-005', 'drink-feature-left-ad-right-menu' );

				elseif( $layout == 'feature_left_combo_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-006', 'feature-left-combo-menu' );

				elseif( $layout == 'versus_feature_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/unfinished-998', 'single-item-menu' );

				elseif( $layout == 'feature_right_menu' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-007', 'feature-right-menu' );

				elseif( $layout == 'split_menu_top_feature' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-008', 'split-menu-top-feature' );

				elseif( $layout == 'layout-009' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-009', '009-basic-quads' );

				elseif( $layout == 'layout-010' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-010', '010-redzone' );

				elseif( $layout == 'layout-012' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-012', '012-bbq' );

				elseif( $layout == 'layout-013' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-013', '013-tlc' );

				elseif( $layout == 'layout-014' ):

        	get_template_part( 'template-parts/menu-boards/menu-layout/layout-014', '014-tlc-list' );

				elseif( $layout == 'layout-015' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-015', '015-combo-quads' );

				elseif( $layout == 'layout-016' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-016', '016-take-home-list' );

				elseif( $layout == 'layout-017' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-017', '017-quad-special' );

				elseif( $layout == 'layout-021' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-018', '018-double-list' );

				elseif( $layout == 'layout-020' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-020', '020-double-list-special' );

				elseif( $layout == 'layout-022' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-022', '022-specialty-chef' );

				elseif( $layout == 'layout-024' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-024', '024-specialty-chef-3-column' );

				elseif( $layout == 'layout-000' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-000', '000-blank-layout' );


				elseif( $layout == 'layout-p-001' ):

					get_template_part( 'template-parts/menu-boards/menu-layout/layout-p-001', 'p-001-basic-portable' );

        else:

					echo 'Layout Not Known: ' . $layout;

        endif;

	    endwhile;

		endwhile; // End of the loop.
		?>

	</div>

<?php
get_footer();
