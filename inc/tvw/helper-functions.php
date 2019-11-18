<?php
function get_included_items($_postID) {

  $included_items_text = '';


  if( have_rows('included_items', $_postID) ):

    // loop through the rows of data
    while ( have_rows('included_items', $_postID) ) : the_row();

      $combo_item = get_sub_field('combo_item');

      if($combo_item) {
        $product_id = get_field('sku', $combo_item->ID);
      } else {
        $product_id = 'nocomboitem';
      }

      $included_items_text = $included_items_text . ' product_id-' . $product_id;

    endwhile;

  endif;


  return trim($included_items_text);
}

function get_sku_classes($_postID) {
  $sku_class = '';

  $sku = get_field('sku', $_postID);
  $display_title = get_field('display_title', $_postID);
  $included_items_text = get_included_items($_postID);

  if($sku) {
    $sku_class .= " product_id-" . strval($sku) . " ";
  }

  if($included_items_text) {
    $sku_class .= $included_items_text . " multi-items";
  }

  if (!$display_title) {
    $sku_class .= " sold_out";
  }

  $alcoholic = has_term('alcoholic', 'inventory_type', $_postID );

  if( $alcoholic ) {
    $sku_class .= " alcoholic";
  } else {
    $sku_class .= " non-alcoholic";
  }

  return $sku_class;
}

function write_alcohol_json() {

  $myupload_dir = wp_upload_dir();
	// $file = plugin_dir_path( __FILE__ ) . '/data/' . $vendor_id . '.json';
	$file = $myupload_dir['baseurl'] . '/data/alcohol.json';

  $file = get_template_directory() . '/data/' . get_current_blog_id() . '-alcohol.json';

  $disable_alcohol = get_field('disable_alcohol', 'option');

  if ($disable_alcohol) {
    $value = array(
      "alcohol_disabled"=> true
    );
		$body = json_encode($value);
    // $body = 'hi';
		file_put_contents($file, $body);
	} else {
    $value = array(
      "alcohol_disabled"=> false
    );
		$body = json_encode($value);
    // $body = 'woah';
		file_put_contents($file, $body);
	}

}

add_action('acf/save_post','write_alcohol_json');


function get_product_image_url($post) {
  $image = get_field('product_image', $post);

  if (!empty($image)) {
    // vars
    $url = $image['url'];

    // thumbnail
    $size = 'large';
    $thumb = $image['sizes'][ $size ];
    //return $thumb;
    return $thumb;
  } else {
    return $image;
  }

}

?>
