<h1 class="menu-list-title">
  <div class="title"><div class="title-text"><?php echo get_sub_field('section_title'); ?></div><div class="title-line"></div></div>
  <?php $section_subtitle = get_sub_field('section_subtitle');
    if ($section_subtitle) { ?>
      <span class="subtitle"><?php echo get_sub_field('section_subtitle'); ?></span>
    <?php } ?>
  <div class="calories-tag">Cal</div>
</h1>
