<div class="quadrant quadrant-ad">
  <div class="quadrant-wrap">
    <div class="featured-ad-container">
      <?php if (get_field('force_ad_slider', 'options')) {
        $ad_list = get_field('ad_list', 'options');
    		$count = 0;
        include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/advertisements/ad-slider.php', false, false ) );
      } else {
        include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/advertisements/featured-ad.php', false, false ) );
      } ?>
    </div>
  </div>
</div>
