<?php
add_action("pre_get_posts", "custom_front_page");
function custom_front_page($wp_query){
    //Ensure this filter isn't applied to the admin area
    if(is_admin()) {
        return;
    }

    if($wp_query->get('page_id') == get_option('page_on_front')):

        $wp_query->set('post_type', 'menu_boards');
        $wp_query->set('page_id', ''); //Empty

        //Set properties that describe the page to reflect that
        //we aren't really displaying a static page
        $wp_query->is_page = 0;
        $wp_query->is_singular = 0;
        $wp_query->is_post_type_archive = 1;
        $wp_query->is_archive = 1;

    endif;
}





function reorder_menuboards($query) {

  if($query->is_admin) {

        if ($query->get('post_type') == 'menu_board')
        {
          $query->set('orderby', 'menu_order');
          $query->set('order', 'ASC');
        }
  }
  return $query;
}
add_filter('pre_get_posts', 'reorder_menuboards');

function wpb_screenshots($atts, $content = NULL) {
	extract(shortcode_atts(array(
		"snap" => 'http://s.wordpress.com/mshots/v1/',
		"url" => 'https://www.wpbeginner.com',
		"alt" => 'screenshot',
		"w" => '1920', // width
		"h" => '1080' // height
	), $atts));

	$img = '<img alt="' . $alt . '" src="' . $snap . '' . urlencode($url) . '?w=' . $w . '&h=' . $h . '" />';

	return $img;
}
add_shortcode("menu-preview", "wpb_screenshots");

function my_change_sort_order($query){
	if(is_archive()):
	 //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
   //Set the order ASC or DESC
   $query->set( 'order', 'ASC' );
   //Set the orderby
   $query->set( 'orderby', 'title' );
	endif;
};
add_action( 'pre_get_posts', 'my_change_sort_order');

?>
