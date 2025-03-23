<?php

/**
 * Project Beta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Project_Beta
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function project_beta_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Project Beta, use a find and replace
		* to change 'project-beta' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('project-beta', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'project-beta'),
        )
    );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'Project_Beta_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'project_beta_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Project_Beta_content_width()
{
    $GLOBALS['content_width'] = apply_filters('Project_Beta_content_width', 640);
}
add_action('after_setup_theme', 'Project_Beta_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Project_Beta_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'project-beta'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'project-beta'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'Project_Beta_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function Project_Beta_scripts()
{
    // Ensure jQuery is loaded by WordPress
    wp_enqueue_script('jquery');

    wp_enqueue_style('project-beta-style', get_stylesheet_uri(), array(), null);
    wp_style_add_data('project-beta-style', 'rtl', 'replace');

    // Enqueue scripts with jQuery as a dependency
    wp_enqueue_script('rekos-gerenal-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

    // Enqueue scripts with jQuery as a dependency
    wp_enqueue_script('rekos-new-shop-page', get_template_directory_uri() . '/js/new-shop-page.js', array('jquery'), null, true);

    wp_enqueue_script('project-beta-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), null, true);
    wp_enqueue_script('project-beta-homepage', get_template_directory_uri() . '/js/homepage.js', array('jquery', 'slick-js'), null, true);
    wp_enqueue_script('project-beta-category', get_template_directory_uri() . '/js/category-page.js', array('jquery'), null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'Project_Beta_scripts');


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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}




/**
 * 
 * 
 * 
 * Custom functions for the Project Beta theme
 * 
 * 
 * 
 * 
 */





/**
 * Enqueues all frontend styles and scripts for the Project Beta theme.
 *
 * This function loads all required CSS and JavaScript libraries from the theme's `assets/` directory,
 * including third-party vendor libraries like Bootstrap, Slick, GSAP, and LightGallery,
 * as well as the main theme stylesheet and scripts.
 *
 * It also enqueues local fonts and the main theme script file.
 *
 * Hooked to `wp_enqueue_scripts`, this ensures all assets are loaded properly in the frontend.
 */
function project_beta_enqueue_assets()

{


	// CSS Libraries
	wp_enqueue_style('lightgallery', get_template_directory_uri() . '/assets/vendors/lightgallery/css/lightgallery-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', array(), null, 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/vendors/animate/animate.min.css', array(), null, 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/vendors/slick/slick.css', array(), null, 'all');
	wp_enqueue_style('mapbox', get_template_directory_uri() . '/assets/vendors/mapbox-gl/mapbox-gl.min.css', array(), null, 'all');
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', array(), null, 'all');

	// Local Fonts
	wp_enqueue_style('project-beta-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), null, 'all');

	// Theme Styles
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css', array(), null, 'all');

	// JavaScript Libraries
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.bundle.js', array('jquery'), null, true);
	wp_enqueue_script('clipboard', get_template_directory_uri() . '/assets/vendors/clipboard/clipboard.min.js', array(), null, true);
	wp_enqueue_script('lazyload', get_template_directory_uri() . '/assets/vendors/vanilla-lazyload/lazyload.min.js', array(), null, true);
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/vendors/waypoints/jquery.waypoints.min.js', array('jquery'), null, true);
	wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/vendors/lightgallery/lightgallery.min.js', array(), null, true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/vendors/slick/slick.min.js', array(), null, true);
	wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/vendors/gsap/gsap.min.js', array(), null, true);
	wp_enqueue_script('scroll-trigger', get_template_directory_uri() . '/assets/vendors/gsap/ScrollTrigger.min.js', array(), null, true);
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'project_beta_enqueue_assets');





/**
 * Enqueue styles for the Gutenberg editor.
 *
 * This function ensures that the block editor (Gutenberg) matches the frontend styles.
 * 
 * - Loads the `fonts.css` file so that custom fonts are applied inside the editor.
 * - Applies `theme.css` using `add_editor_style()`, ensuring Gutenberg reflects the theme design.
 * - This function runs inside `enqueue_block_editor_assets` to affect only the editor and not the frontend.
 */
function project_beta_enqueue_editor_assets() {
    // Enqueue fonts explicitly for the block editor
    wp_enqueue_style('project-beta-editor-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), null, 'all');
    
    // Enqueue theme styles for the editor to match frontend design
    add_editor_style('assets/css/theme.css');
}
add_action('enqueue_block_editor_assets', 'project_beta_enqueue_editor_assets');






/**
 * Dynamically registers ACF blocks from the `/blocks/` directory.
 *
 * This function scans the `/blocks/` folder for any subdirectories that contain a `block.json` file.
 * If a valid `block.json` file is found, it reads the configuration and registers the block dynamically.
 *
 * - Reads block configuration from `block.json`
 * - Ensures required data (like `name`) is present before registration
 * - Automatically sets `render_template`, `enqueue_style`, and `enqueue_script` if available
 * - Logs errors if `block.json` is missing required fields or if the block directory is not found
 *
 * This eliminates the need to manually register each block, making block management easier.
 */
function project_beta_register_acf_blocks() {
    $blocks_dir = get_template_directory() . '/blocks';

    if (file_exists($blocks_dir)) {
        foreach (glob($blocks_dir . '/*/block.json') as $block_json) {
            $block_folder = dirname($block_json);
            $block_name   = basename($block_folder);
            $block_config = json_decode(file_get_contents($block_json), true);

            if (!isset($block_config['name'])) {
                error_log("ACF Block missing 'name' field: " . $block_json);
                continue;
            }

            // Determine block asset paths
            $render_template = $block_folder . '/' . ($block_config['acf']['renderTemplate'] ?? "{$block_name}.php");
            $style_path      = "/blocks/{$block_name}/{$block_name}.css";
            $script_path     = "/blocks/{$block_name}/{$block_name}.js";

            $style_url  = get_template_directory_uri() . $style_path;
            $style_file = get_template_directory() . $style_path;

            $script_url  = get_template_directory_uri() . $script_path;
            $script_file = get_template_directory() . $script_path;

            // Register the block
            acf_register_block_type(array(
                'name'              => str_replace('acf/', '', $block_config['name']),
                'title'             => $block_config['title'] ?? 'Unnamed Block',
                'description'       => $block_config['description'] ?? '',
                'category'          => $block_config['category'] ?? 'formatting',
                'icon'              => $block_config['icon'] ?? 'admin-generic',
                'keywords'          => $block_config['keywords'] ?? array(),
                'render_template'   => $render_template,
                'enqueue_style'     => file_exists($style_file) ? $style_url : '',
                'enqueue_script'    => file_exists($script_file) ? $script_url : '',
                'supports'          => $block_config['supports'] ?? array(),
            ));

            error_log("ACF Block Registered: " . $block_config['name']);
        }
    } else {
        error_log("ACF Blocks folder does not exist: " . $blocks_dir);
    }
}
add_action('acf/init', 'project_beta_register_acf_blocks');








// register header menu
function register_main_menu()
{
    register_nav_menus(array(
        'main_menu' => __('Main Menu', 'project-beta')
    ));
}
add_action('after_setup_theme', 'register_main_menu');




function mytheme_add_editor_styles()
{
    add_theme_support('editor-styles'); // Enable editor styles
    add_editor_style('editor-style.css'); // Enqueue your editor-style.css file
}
add_action('after_setup_theme', 'mytheme_add_editor_styles');




/* 

Allow SVG

*/

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'fix_svg');





/* 

Enable excerpts for pages

*/


function enable_page_excerpts()
{
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'enable_page_excerpts');



/* 

additonal theme options


*/



if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}





/* 

enable exceprts for default posts

*/


function enable_excerpt_for_posts()
{
    add_post_type_support('post', 'excerpt');
}
add_action('init', 'enable_excerpt_for_posts');







/* 

enables video formats

*/


function enable_custom_upload_mime_types($mime_types)
{
    // Add video MIME types
    $mime_types['mp4'] = 'video/mp4';
    $mime_types['webm'] = 'video/webm';
    $mime_types['ogg'] = 'video/ogg';

    // Add any other formats you need (optional)
    // $mime_types['m4v'] = 'video/x-m4v'; // Optional

    return $mime_types;
}
add_filter('upload_mimes', 'enable_custom_upload_mime_types');



/* 

Enable support for WooCommerce plugin in your custom theme

*/


function Project_Beta_add_woocommerce_support()
{
    add_theme_support('woocommerce'); // Enables WooCommerce in your custom theme
}
add_action('after_setup_theme', 'Project_Beta_add_woocommerce_support');



/* 

Register a custom sidebar for the shop page

*/

function Project_Beta_register_sidebar()
{
    register_sidebar(array(
        'name'          => 'Shop Sidebar',
        'id'            => 'shop-sidebar',
        'description'   => 'Widgets in this area will appear in the left sidebar on the shop page.',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'Project_Beta_register_sidebar');


