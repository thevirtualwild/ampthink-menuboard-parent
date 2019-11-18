<li class="menu_item <?php echo $sku_class ?>">
  <div class="title_price_container">
    <div class="menu-item-info-wrapper">
      <?php $display_icon = get_field('display_icon'); ?>
      <h1 class="display-title"><div class="title-text"><?php the_field('display_title'); ?></div><?php if($display_icon) {
        echo '<img src="' . $display_icon . '" class="display-icon">';
      }?><div class="subtitle"><?php the_field('display_subtitle');?></div></h1>
      <div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div>
      <div class="calories"><div class="calories-num"><?php the_field('calories') ?></div><span class="calories-tag">cal</span></div>
    </div>
  </div>
  <?php if ($show_description): ?>
  <div class="description_container">
    <?php the_field('display_description'); ?>
  </div>
  <?php endif; ?>
</li>
