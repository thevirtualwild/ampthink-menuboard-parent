<div class="menu-section">

  <?php
  include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/menu-list/section-title.php', false, false ) );

  // check if the repeater field has rows of data
  if( have_rows('list_items') ):  ?>

    <ul class="list-of-menu-items">
    <?php
      // loop through the rows of data
    while ( have_rows('list_items') ) : the_row();

      // display a sub field value
      $menu_item = get_sub_field('list_item');
      $show_description = get_sub_field('show_description');

      if( $menu_item ):

        // override $post
        $custom_css_class = get_field('custom_css_class');
        if (strpos($custom_css_class, "alcohol-always-on") != false ) {
          $post = $menu_item;
        } else {
          $post = check_alcohol($menu_item);
        }
        setup_postdata( $post );

        $sku_class = 'noskuclass';

        $sku_class = get_sku_classes($post);

        include( locate_template( 'template-parts/menu-boards/menu-layout/menu-parts/menu-list/list-item.php', false, false ) );

        wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

      endif;

    endwhile; ?>

    </ul>

  <?php endif;?>

</div>
