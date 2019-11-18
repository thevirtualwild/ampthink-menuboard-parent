<li class="menu_item <?php echo $sku_class ?>">
  <div class="title_price_container">
    <h1 class="display-title"><div class="price"><span class="price-sign">$</span><span class="price-num"><?php the_field('price') ?></span></div><div class="title-text"><?php the_field('display_title') ?></div></h1>
  </div>
  <?php if ($show_description): ?>
  <div class="description_container">
    <?php the_field('display_description'); ?>
  </div>
  <?php endif; ?>
</li>
