<?php
/**
 * iblogger functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tr-iblogger-lite
 */

if ( ! function_exists( 'tr_iblogger_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tr_iblogger_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on iblogger, use a find and replace
	 * to change 'tr-iblogger-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tr-iblogger-lite', get_template_directory() . '/languages' );

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

	//adding custom field support globally

	add_theme_support( 'custom-fields' );

	//post formats

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio', 'link', 'image', 'quote', 'status', 'chat' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primarymenu' => esc_html__( 'Primary', 'tr-iblogger-lite' ),
		'footermenu' => esc_html__( 'Footer Menu', 'tr-iblogger-lite' ),
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
	add_theme_support( 'custom-background', apply_filters( 'tr_iblogger_lite_custom_background_args', array(
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

    // image size 
	add_image_size( 'tr-iblogger-lite-blog-full-width', 1140 , 534 , true );
	add_image_size( 'tr-iblogger-lite-blog-left-right-sidebar', 750 , 351 , true );

	//add editor style
	add_editor_style( 'css/custom-editor-style.css' );

}
endif;
add_action( 'after_setup_theme', 'tr_iblogger_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tr_iblogger_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tr_iblogger_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'tr_iblogger_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tr_iblogger_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tr-iblogger-lite' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add sidebar widgets here.', 'tr-iblogger-lite' ),
		'before_widget' => '<div id="%1$s" class="sidebar-post sidebar-post3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-top"><h4>',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'tr-iblogger-lite' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer logo here.', 'tr-iblogger-lite' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-head "><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'tr-iblogger-lite' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add footer recent post here.', 'tr-iblogger-lite' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-head "><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'tr-iblogger-lite' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add footer popular post here.', 'tr-iblogger-lite' ),
		'before_widget' => '<div class="footer-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-head "><h3>',
		'after_title'   => '</h3></div>',
	) );
	
}
add_action( 'widgets_init', 'tr_iblogger_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tr_iblogger_lite_scripts() {
	wp_enqueue_script('jquery');
	//scrolltop

	wp_enqueue_style('material-scrolltop', get_template_directory_uri().'/css/material-scrolltop.css');

	//icon

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css','4.4.0');

	//bootstrap

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css','3.3.7');

	//template

	wp_enqueue_style('tr-iblogger-lite-template', get_template_directory_uri().'/css/style.css');

	//wp-style

	wp_enqueue_style( 'tr-iblogger-lite-style', get_stylesheet_uri() );

	//responsive

	wp_enqueue_style( 'tr-iblogger-lite-responsive', get_template_directory_uri().'/css/responsive.css');

	//wp-jquery

	//wp_enqueue_script('jquery');

    //bootstrap jquery

	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true );

    //scroll jquery

	wp_enqueue_script( 'jquery-scroll', get_template_directory_uri() . '/js/jquery.hc-sticky.js', array(), '1.2.43', true );

   //scrolltop jquery

	wp_enqueue_script( 'jquery-scrolltop', get_template_directory_uri() . '/js/material-scrolltop.js', array(), true );

   //custom jquery

	wp_enqueue_script( 'jquery-custom', get_template_directory_uri() . '/js/custom.js', array(), true );


	wp_enqueue_script( 'iblogger-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151210', true );

	wp_enqueue_script( 'iblogger-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151211', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tr_iblogger_lite_scripts' );

// For google fonts

function tr_iblogger_lite_load_fonts(){
	wp_register_style( 'tr-iblogger-lite-google-fonts-Open-sans','https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
	wp_enqueue_style('tr-iblogger-lite-google-fonts-Open-sans');
}
add_action('wp_print_styles', 'tr_iblogger_lite_load_fonts');

//remove hash link from read more button

function tr_iblogger_lite_remove_hash_link($link){
	$link = preg_replace('|#more-[0-9]+|','',$link);
	return $link;
}
add_filter('the_content_more_link','tr_iblogger_lite_remove_hash_link');

function tr_iblogger_lite_styling_read_more(){

	$style = '<div class="custom-btn"><a class="btn" href="'.get_permalink().'" role="button">'.__('Read Details','tr-iblogger-lite').'</a></div>';
	return $style;
}
add_filter('the_content_more_link','tr_iblogger_lite_styling_read_more');	



// comment field to bottom

function tr_iblogger_lite_move_comment_field_to_bottom( $fields ) {

	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'tr_iblogger_lite_move_comment_field_to_bottom' );

// customize comment_form_defaults

function tr_iblogger_lite_comment_form_defaults( $defaults ) {
  $defaults['title_reply'] = __( 'Submit A Comment', 'tr-iblogger-lite' );
  $defaults['comment_notes_before'] = __( '<p class="comment-required-field">Must be fill required * marked fields.</p>', 'tr-iblogger-lite' );
  return $defaults;
}
add_filter( 'comment_form_defaults', 'tr_iblogger_lite_comment_form_defaults' );

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

// add bootstrap nav walker

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

// add bootstrap comment walker

require get_template_directory() .'/inc/class-wp-bootstrap-comment-walker.php';

// Dynamic Styles which updates from customizer

require get_template_directory() . '/inc/custom-css.php';

// Add breadcrumb

require get_template_directory() . '/inc/breadcrumb.php';