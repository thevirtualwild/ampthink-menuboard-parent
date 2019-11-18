<div class="menu-list">
	<?php
	
	// check if the repeater field has rows of data
	if( have_rows($fieldname) ):  ?>

		<ul class="list-of-menu-items">

		<?php 
		// loop through the rows of data
		while ( have_rows($fieldname) ) : the_row();

			// display a sub field value
			$menu_item = get_sub_field('menu_item');
			$show_description = get_sub_field('show_description'); 

			if( $menu_item ): 

				// print_r($menu_item);

				// override $post
				$post = $menu_item;
				setup_postdata( $post ); 

				?>
				<li class="menu_item">
					<div class="title_price_container">
						<h1 class="display-title"><div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div><?php the_field('display_title') ?></h1>
					</div>
					<?php if ($show_description) { ?> 	
						<div class="display-container">
							<p><?php the_field('display_description'); ?></p>
						</div>
					<?php } ?>
				</li>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

			<?php endif; 

		endwhile; ?>

		</ul>

	<?php 
		else :
		// no rows found

	endif;
	?>
</div>