<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Multi_Menu_Parent
 */

get_header();

	get_template_part( 'template-parts/header/header_menubranding', 'header-menubranding' );


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
?>
	<div id="single_inventory" class="site-main <?php echo $priceclass; ?>" style="background:url('<?php the_post_thumbnail_url(); ?>')">
		<!-- <h2>Inventory Item Template</h2> -->

		No Preview for Inventory Items

	</div>

<?php
get_footer();
