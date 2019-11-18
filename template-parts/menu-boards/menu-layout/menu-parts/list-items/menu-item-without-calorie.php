<li class="menu_item <?php echo $sku_class ?>">
  <div class="title_price_container">
    <div class="menu-item-info-wrapper">
      <?php $display_icon = get_field('display_icon'); ?>
      <h1 class="display-title"><div class="title"><div class="title-text"><?php the_field('display_title'); ?></div><?php if($display_icon) {
        echo '<img src="' . $display_icon . '" class="display-icon">';
      }?></div><span class="subtitle"><?php the_field('display_subtitle');?></span></h1>
      <div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div>
    </div>
  </div>
  <?php if ($show_description): ?>
  <div class="description_container">
    <?php the_field('display_description'); ?>
  </div>
  <?php endif; ?>
</li>
