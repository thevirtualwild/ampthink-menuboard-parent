<?php
/**
 * Junk Drawer
 *
 * @package Multi_Menu_Parent
 */



/** Custom David
 *
 * Register Post Types and Custom Taxonomies
*/
// Custom Taxonomies
function inventory_types_taxonomy() {
    register_taxonomy(
        'inventory_type',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'inventory_items',        //post type name
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
}
add_action( 'init', 'inventory_types_taxonomy');

// Our custom post type function
function create_inventory_posttype() {

    register_post_type( 'inventory_items',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Inventory Items' ),
                'singular_name' => __( 'Inventory Item' )
            ),
            'description' => __( 'Inventory Items to be used in a variety of Menu Boards'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'inventory_items'),
	        'hierarchical'        => false,
	        'capability_type'     => 'page',
	        'taxonomies'          => array( 'inventory_type' ),
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_inventory_posttype' );

//
// // Our custom post type function
function create_menuboard_posttype() {

    register_post_type( 'menu_boards',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Menu Boards' ),
                'singular_name' => __( 'Menu Board' )
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
                'singular_name' => __( 'Advertisement' )
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


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tvw_amp_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tvw-amp-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tvw-amp-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tvw_amp_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tvw_amp_starter_scripts() {
	wp_enqueue_style( 'tvw-amp-starter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tvw-amp-starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tvw-amp-starter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tvw_amp_starter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
