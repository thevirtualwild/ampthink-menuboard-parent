<?php
/**
 * Multi Menu Parent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Multi_Menu_Parent
 */

if ( ! function_exists( 'multi_menu_parent_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function multi_menu_parent_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Multi Menu Parent, use a find and replace
		 * to change 'multi-menu-parent' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'multi-menu-parent', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'multi-menu-parent' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'multi_menu_parent_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// First we'll add support for featured images
		add_theme_support( 'post-thumbnails' );

		// Then we'll add our 2 custom images
		add_image_size( 'off_square_slider', 750, 808, true );
		add_image_size( 'thin_vertical_slider', 375, 808, true );
		add_image_size( 'ad_vertical_slider', 560, 808, true );
		add_image_size( 'half_horizontal_slider', 1480, 560, true );

	}
endif;
add_action( 'after_setup_theme', 'multi_menu_parent_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function multi_menu_parent_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'multi_menu_parent_content_width', 640 );
}
add_action( 'after_setup_theme', 'multi_menu_parent_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function multi_menu_parent_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'multi-menu-parent' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'multi-menu-parent' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'multi_menu_parent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function multi_menu_parent_scripts() {
	wp_enqueue_style( 'multi-menu-parent-style', get_stylesheet_uri() );
	wp_enqueue_style( 'multi-menu-parent-animation-style', get_template_directory_uri() . '/animate.css' );

	wp_enqueue_style( 'multi-menu-parent-ampcustom-style', get_template_directory_uri() . '/amp_custom.css' );

	wp_enqueue_script( 'multi-menu-parent-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'multi-menu-parent-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'multi-menu-parent-font-resizer', get_template_directory_uri() . '/js/font_resizer.js', array(), '20190724', true);

	// create my own version codes
  // $my_js_ver  = date("ymd-Gis", filemtime( get_template_directory_uri() . '/js/menu_resizer.js' ));

	// wp_enqueue_script( 'multi-menu-parent-font-resizer', get_template_directory_uri() . '/js/menu_resizer.js', array(), '143124134' , true);

	wp_enqueue_script( 'multi-menu-parent-font-resizer', get_template_directory_uri() . '/js/add-body-class.js', array(), '20190903', true);

	wp_enqueue_script( 'multi-menu-parent-copy-to-clipboard', get_template_directory_uri() . '/js/copy_to_clipboard.js', array(), '20190919', true);

	// create my own version codes
	// $ampcustom_js_ver  = date("ymd-Gis", filemtime( get_template_directory_uri() . '/amp_custom.js' ));

	wp_enqueue_script( 'multi-menu-parent-ampcustom-script', get_template_directory_uri() . '/amp_custom.js', array(), '20191006', true );

	wp_enqueue_script("jquery");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'multi_menu_parent_scripts' );


// add_action('acf/input/admin_enqueue_scripts', 'my_acf_extension_enqueue');
// function my_acf_extension_enqueue() {
//   $handle = 'acf-options-get';
//   $src = get_template_directory_uri() . '/js/acf-options-get.js';
//
//   // $deps is where we tell WP what scripts need to load first
//   // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
//   $deps = array('acf-input');
//
//   wp_enqueue_script($handle, $src, $deps, false, true);
// }

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
 * Custom Post Initialization
 */
require get_template_directory() . '/inc/tvw/cpt-init.php';

/**
 * Game Info Setup
 */
require get_template_directory() . '/inc/tvw/game-info.php';

/**
 * Front Page Archive and Menu Preview
 */
require get_template_directory() . '/inc/tvw/menu-preview.php';

/**
 * ACF after_setup_theme
 */
require get_template_directory() . '/inc/tvw/acf-init.php';

/**
 * Alcohol Check
 */
require get_template_directory() . '/inc/tvw/alcohol-swap.php';

/**
 * Helpers
 */
require get_template_directory() . '/inc/tvw/helper-functions.php';

/**
 * Price Update
 */
// require get_template_directory() . '/inc/tvw/price-update.php';

/**
 * White Image Swap
 */
require get_template_directory() . '/inc/tvw/white-image-swap.php';


/**
 * Calorie Sum
 */
require get_template_directory() . '/inc/tvw/calorie-sum.php';

add_action( 'wpmu_new_blog', 'delete_wordpress_defaults', 100, 1 );

function delete_wordpress_defaults(){

    // 'Hello World!' post
    wp_delete_post( 1, true );

    // 'Sample page' page
    wp_delete_post( 2, true );
}

if( !is_super_admin() ) {
	function remove_menus() {
		// remove_menu_page( 'index.php' );                  //Dashboard
		// remove_menu_page( 'jetpack' );                    //Jetpack*
		remove_menu_page( 'edit.php' );                   //Posts
		// remove_menu_page( 'upload.php' );                 //Media
		remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
	}
	add_action( 'admin_menu', 'remove_menus' );
}



//
// add_action('admin_footer', 'debug_something');
//
// function debug_something(){
// 	$myupload_dir = wp_upload_dir();
// 	$file = $myupload_dir['baseurl'] . '/data/alcohol.json';
//
// 	$blog_id = get_current_blog_id();
//
//   echo 'filepath ' . $file . " - " ;
// }


function get_acf_value ($post_id) {
    $v = get_field('disable_alcohol', 'option');
    // error_log($v);
    // Incase it is array you can use print_r

		$file = get_template_directory() . '/data/' . get_current_blog_id() . '-alcohol.json';

	  $disable_alcohol = get_field('disable_alcohol', 'option');

	  if ($disable_alcohol) {
	    $value = array(
	      "alcohol_disabled"=> true
	    );
			$body = json_encode($value);

					$v  = $file ;
	    // $body = 'hi';
			file_put_contents($file, $body);
		} else {
	    $value = array(
	      "alcohol_disabled"=> false
	    );
			$body = json_encode($value);


					$v  = $file ;
	    // $body = 'woah';
			file_put_contents($file, $body);
		}

		// $url = 'http://static.adzerk.net/Advertisers/12f0cc69cd9742faa9c8ee0f7b0d210e.jpg';
		// $mydir = get_template_directory() . '/data'; // Full Path
		// $name = 'image.jpg';

		// $v = is_dir($mydir); // || @mkdir($dir) || die("Can't Create folder");
		// copy($url, $dir . DIRECTORY_SEPARATOR . $name);

    // error_log( print_r( $v, true ) );

}
add_action( 'acf/save_post', 'get_acf_value', 10 );



/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }
