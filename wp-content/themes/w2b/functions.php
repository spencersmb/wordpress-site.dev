<?php
/**
 * Bootstrap to Wordpress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootstrap_to_Wordpress
 */

if ( ! function_exists( 'bootstrap2wordpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootstrap2wordpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bootstrap to Wordpress, use a find and replace
	 * to change 'bootstrap2wordpress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bootstrap2wordpress', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'bootstrap2wordpress' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootstrap2wordpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bootstrap2wordpress_setup
add_action( 'after_setup_theme', 'bootstrap2wordpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootstrap2wordpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootstrap2wordpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootstrap2wordpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bootstrap2wordpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bootstrap2wordpress' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bootstrap2wordpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootstrap2wordpress_scripts() {

  wp_enqueue_style( 'bootstrap-main', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '3.3.1' );

  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css', '4.2.0' );

  wp_enqueue_style( 'b2wp-main', get_template_directory_uri() . '/assets/css/main.css', '1' );

  wp_enqueue_style( 'bootstrap2wordpress-style', get_stylesheet_uri() );

  wp_enqueue_script( 'bootstrap2wordpress-master-js', get_template_directory_uri() . '/js/theme.js', 'v1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrap2wordpress_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register theme customizer settings.
 *
 *
 */
function w2b_register_theme_customizer( $wp_customize ){
//    echo '<pre>';
//    var_dump( $wp_customize->sections() );
//    echo '</pre>';

  // Customize title and tagline sections and labels
  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'bootstrap2wordpress');
  $wp_customize->get_control('blogname')->label = __('Site Name', 'bootstrap2wordpress');

  //update live
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

  // Customize the Front Page Settings - changes lables and priority
  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'bootstrap2wordpress');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'bootstrap2wordpress');
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'bootstrap2wordpress');
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'bootstrap2wordpress');

  // Customize Background Settings - rename title and move color to background
  $wp_customize->get_section('background_image')->title = __('Background Styles', 'bootstrap2wordpress');
  $wp_customize->get_control('background_color')->section = 'background_image';

  // Add Custom Logo Settings
  //1-first add the section
  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','bootstrap2wordpress'),
    'panel'      => 'general_settings',
    'priority'   => 20
  ) );
  //2-add the settings
  $wp_customize->add_setting(
    'wpt_logo',
    array(
      'default'         => get_template_directory_uri() . '/assets/images/logo.png',
      //'transport'       => 'postMessage'
    )
  );
  //3-add controls
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'custom_logo',
      array(
        'label'      => __( 'Change Logo', 'bootstrap2wordpress' ),
        'section'    => 'custom_logo',
        'settings'   => 'wpt_logo',
        'context'    => 'wpt-custom-logo'
      )
    )
  );

  /////////////////////////////
  // Add Custom Footer Settings
  /////////////////////////////
  require_once('inc/wp-customize-footer.php');


  // Create custom panels
  $wp_customize->add_panel( 'general_settings', array(
    'priority' => 10,
    'theme_supports' => '',
    'title' => __( 'General Settings', 'bootstrap2wordpress' ),
    'description' => __( 'Controls the basic settings for the theme.', 'bootstrap2wordpress' ),
  ) );

  // Assign sections to panels
  $wp_customize->get_section('title_tagline')->panel = 'general_settings';
  $wp_customize->get_section('colors')->panel = 'general_settings';


}
add_action( 'customize_register', 'w2b_register_theme_customizer');

// Custom js for theme customizer
function wpt_customizer_js() {
  wp_enqueue_script(
    'wpt_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
  );
}
add_action( 'customize_preview_init', 'wpt_customizer_js' );

//Sanitize Text
function sanitize_text($text){
  return sanitize_text_field( $text );
}