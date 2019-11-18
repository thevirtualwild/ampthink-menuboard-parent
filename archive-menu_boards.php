<?php
/**
 *
 * Template Name: Menu Archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Multi_Menu_Parent
 */

get_header();

// get_template_part( 'template-parts/header/header_frontpage', 'header-frontpage' );
$hello = "hello";
include( locate_template( 'template-parts/header/header_frontpage.php', false, false ) );?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/menu-boards/menu-preview', get_post_type() );

			endwhile;

// 			the_posts_navigation();

		else :

// 			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<!-- 	<script>
// 		function copyToClipboard() {
// 		  /* Get the text field */
// 		  var copyText = document.getElementById("menu-link");

// 		  /* Select the text field */
// 		  copyText.select();

// 		  /* Copy the text inside the text field */
// 		  document.execCommand("copy");

// 		  /* Alert the copied text */
// 		  alert("Copied the text: " + copyText.value);
// 		}
	</script> -->

<?php
get_footer();
