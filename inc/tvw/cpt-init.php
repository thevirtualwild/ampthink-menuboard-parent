<?php
/**
 * Custom Post Type Init
 *
 * @package Multi_Menu_Parent
 */

/**---   Taxonomies  ---**/

// Custom Taxonomies
function inventory_types_taxonomy() {
    register_taxonomy(
        'inventory_type',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'inventory_items', //post type name
        array(
            'hierarchical' => true,
            'label' => 'Inventory Type',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'inventory_items', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );

    wp_insert_term(
      'Non Alcoholic', // the term
      'inventory_type', // the taxonomy
      array(
        'description'=> 'Default items as non alcoholic.',
        'slug' => 'non_alcoholic'
      )
    );
    wp_insert_term(
      'Alcoholic', // the term
      'inventory_type', // the taxonomy
      array(
        'description'=> 'This is an alcoholic item.',
        'slug' => 'alcoholic'
      )
    );
}
add_action( 'init', 'inventory_types_taxonomy');


/**---   Post Types  ---**/

// Our custom post type function
function create_inventory_posttype() {
    register_post_type( 'inventory_items',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Inventory Items' ),
                'singular_name' => __( 'Inventory Item' ),
                'add_new_item' => __( 'Add New Inventory Item' ),
                'edit_item' => __( 'Edit Inventory Item' ),
                'new_item' => __( 'New Inventory Item' ),
                'view_item' => __( 'View Inventory Item' ),
                'view_items' => __( 'View Inventory Items' ),
                'search_items' => __( 'Search Inventory Items' ),
                'not_found' => __( 'Inventory Item Not Found' ),
                'not_found_in_trash' => __( 'Inventory Item Not Found in Trash' ),
                'all_items' => __( 'All Inventory Items' )
            ),
            'description' => __( 'Inventory Items to be used in a variety of Menu Boards'),
            'public' => false,
            'has_archive' => true,
            'rewrite' => array('slug' => 'inventory_items'),
            'show_in_menu' => true,
            'show_ui' => true,
	        'hierarchical'        => false,
	        'capability_type'     => 'page',
	        'taxonomies'          => array( 'inventory_type' ),
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_inventory_posttype' );

// // Our custom post type function
function create_menuboard_posttype() {

    register_post_type( 'menu_boards',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Menu Boards' ),
                'singular_name' => __( 'Menu Board' ),
                'add_new_item' => __( 'Add New Menu Board' ),
                'edit_item' => __( 'Edit Menu Board' ),
                'new_item' => __( 'New Menu Board' ),
                'view_item' => __( 'View Menu Board' ),
                'view_items' => __( 'View Menu Boards' ),
                'search_items' => __( 'Search Menu Boards' ),
                'not_found' => __( 'Menu Board Not Found' ),
                'not_found_in_trash' => __( 'Menu Board Not Found in Trash' ),
                'all_items' => __( 'All Menu Boards' )
            ),
            'description' => __( 'Menu Boards with varying layouts and inventory items being shown'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'menu_boards'),
	        'hierarchical'        => false,
	        'capability_type'     => 'page',
	        'taxonomies'          => array( '' ),
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_menuboard_posttype' );

// Our custom post type function
function create_ad_posttype() {
    register_post_type( 'advertisements',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Advertisements' ),
                'singular_name' => __( 'Advertisement' ),
                'add_new_item' => __( 'Add New Advertisement' ),
                'edit_item' => __( 'Edit Advertisement' ),
                'new_item' => __( 'New Advertisement' ),
                'view_item' => __( 'View Advertisement' ),
                'view_items' => __( 'View Advertisements' ),
                'search_items' => __( 'Search Advertisements' ),
                'not_found' => __( 'Advertisement Not Found' ),
                'not_found_in_trash' => __( 'Advertisement Not Found in Trash' ),
                'all_items' => __( 'All Advertisements' )
            ),
            'description' => __( 'Inventory Items to be used in a variety of Menu Boards'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ads'),
	        'hierarchical'        => false,
	        'capability_type'     => 'page',
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_ad_posttype' );




/**
 * Register options page.
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Brand Settings',
		'menu_title'	=> 'Brand Settings',
		'menu_slug' 	=> 'theme-brand-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'		=> 0,
	));
  acf_add_options_page(array(
    'page_title'  => 'Site Options',
    'menu_title'  => 'Site Options',
    'menu_slug'   => 'site-options',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'position'    => 0,
  ));

}

function save_brand_options() {

    // get new value
    // $brand_primary = get_field('brand_primary_color', 'option');
    // $brand_secondary = get_field('brand_secondary_color', 'option');
    // $brand_logo = get_field('brand_logo', 'option');

   //    $file = get_template_directory_uri() . 'sass/variables-site/_brand.scss';
  	// // Open the file to get existing content
  	// $current = file_get_contents($file);
  	// // Append a new person to the file
  	// $new_scss = "$brand-primary: ". $brand_primary . ";\n
  	// 			 $brand-secondary: " . $brand_secondary . ";\n
  	// 			 $brand-logo: " . $brand_logo . ";";
  	// // Write the contents back to the file
  	// file_put_contents($file, $new_scss);

   //    echo 'saved acf';

  	// $my_file = get_template_directory_uri() . '/sass/variables-site/brand.scss';
  	// $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
  	// $data = 'This is the data';
  	// fwrite($handle, $data);



  	// $scss_url = get_template_directory_uri() . '/sass/variables-site/brand.scss';
  	// $myfile = fopen($scss_url, "w") or die("Unable to open file!");
  	// $txt = "John Doe\n";
  	// fwrite($myfile, $txt);
  	// $txt = "Jane Doe\n";
  	// fwrite($myfile, $txt);
  	// fclose($myfile);

}

add_action('acf/save_post', 'save_brand_options', 20);
