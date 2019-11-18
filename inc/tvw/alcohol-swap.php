<?php

function check_alcohol($menu_item) {
  // $myterms = wp_get_post_terms($menu_item->ID, 'inventory_type');

  // print_r($myterms);

  $disable_alcohol = get_field('disable_alcohol', 'option');

  if ($disable_alcohol && $menu_item) {

    if( has_term( 'alcoholic', 'inventory_type', $menu_item->ID ) ) {
      $alternate_item = get_field('alternate_item', $menu_item->ID);

      return $alternate_item;
      // return $menu_item;
    } else {
      return $menu_item;
    }
  } else {
    return $menu_item;
  }

}

?>
