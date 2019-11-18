<?php
$image = echo get_product_image_url($post);
$size = 'medium'; // (thumbnail, medium, large, full or custom size)
// $thumb = $image['sizes'][$size];
$thumb = $image;
?>

<div class="additional-menu-item">
	<div class="menu-item-title">
		<h2><?php the_field('display_title'); ?></h2>
		<h3><?php the_field('display_subtitle'); ?></h3>
		<div class="menu-item-price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price'); ?></span></div>
	</div>
	<div class="image-container">
		<div class="menu-item-image">
<!-- 								<img src="<?php echo $thumb; ?>" /> -->
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
</div>
