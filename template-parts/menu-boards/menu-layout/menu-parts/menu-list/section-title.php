<h1 class="section-title">
  <div class="title"><div class="title-text"><?php echo get_sub_field('section_title'); ?></div></div>
  <?php $section_subtitle = get_sub_field('section_subtitle');
    if ($section_subtitle) { ?>
      <div class="subtitle"><?php echo get_sub_field('section_subtitle'); ?></div>
    <?php } ?>
</h1>
