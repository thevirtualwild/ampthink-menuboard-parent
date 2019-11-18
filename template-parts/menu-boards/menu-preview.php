<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<div class="menu-title background_brand_secondary"><?php echo the_title(); ?></div>
		<div class="screenshot-container">
			<?php echo '<img src="' . get_field('menu_preview') . '"/>'; ?>
		</div>
		<div class="menu-link-container">
			<input class="menu-link" id="goto-<?php the_ID(); ?>" value="<?php echo esc_url( get_permalink() ); ?>" readonly />
		</div>
	</div>
	<div class="entry-body">
		<div class="goto-menu">
			<a target="_blank" href="<?php echo esc_url( get_permalink() ); ?>"><button>Preview Menu</button></a>
		</div>
		<div class="copy-link goto-menu">
			<button id="copy-<?php the_ID(); ?>" onClick="copy_to_clipboard(this.id)" data-link="<?php echo esc_url( get_permalink() ); ?>">Copy Link</button>
		</div>
	</div>
</article>
