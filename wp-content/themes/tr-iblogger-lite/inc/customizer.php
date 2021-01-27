<?php
/**
 * iblogger Theme Customizer
 *
 * @package tr-iblogger-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tr_iblogger_lite_customize_register( $wp_customize ) {

	if ( ! function_exists( 'tr_iblogger_lite_sanitize_checkbox' ) ) :

	//Sanitize checkbox values
	 
	function tr_iblogger_lite_sanitize_checkbox( $input ) {
	  if ( $input ) {
	    $output = '1';
	  } else {
	    $output = false;
	  }
	  return $output;
	}
	endif;

	function tr_iblogger_lite_sanitize_ads( $html ) {
		return  $html;
	}

	if ( ! function_exists( 'tr_iblogger_lite_sanitize_choices' ) ) :

	//Sanitize radio values

	function tr_iblogger_lite_sanitize_choices( $input, $setting ) {
	  
	  // Ensure input is a slug
	  $input = sanitize_key( $input );
	  
	  // Get list of choices from the control
	  // associated with the setting
	  $choices = $setting->manager->get_control( $setting->id )->choices;
	  
	  // If the input is a valid key, return it;
	  // otherwise, return the default
	  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	endif;

    if ( ! function_exists( 'tr_iblogger_lite_sanitize_image' ) ) :

	function tr_iblogger_lite_sanitize_image( $image, $setting ) {

		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon'
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}
	endif;


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tr_iblogger_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tr_iblogger_lite_customize_partial_blogdescription',
		) );
	}

//Theme Help

$wp_customize->add_section('theme_help', array(
    'title' => __('Theme Help', 'tr-iblogger-lite'),
    'priority' => 10,
) );

$wp_customize->add_setting('theme_help', array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'wp_kses_post'
));

$theme_author_link = 'https://www.themerally.com/';

$wp_customize->add_control( 'theme_help', array(
  'label' => __('TR iBlogger Lite Theme Help', 'tr-iblogger-lite'),
  'section' => 'theme_help',
  'settings' => 'theme_help',
  'type' => 'hidden',
  'description' => __('TR iBlogger Lite is a simple blog theme. For our pro version and any kind of support please visit : ' , 'tr-iblogger-lite'). '<a href="'.esc_url($theme_author_link).'" target="_blank">https://www.themerally.com/</a>'
) );


// Layout Options

$wp_customize->add_section( 'layout' ,array(
	'title' => __('Layout', 'tr-iblogger-lite'),
	'priority' => 20
));
$wp_customize->add_setting( 'layout_options' , array(
      'default'     => 'right-sidebar',
      'transport'   => 'refresh',
      'sanitize_callback' => 'tr_iblogger_lite_sanitize_choices',
  ) );

$wp_customize->add_control( 'layout_options', array(
	  'label' => __('Select Your Layout', 'tr-iblogger-lite'),
	  'section' => 'layout',
	  'settings' => 'layout_options',
	  'type' => 'radio',
	  'choices' => array(
	    'right-sidebar' => __('Right Sidebar' , 'tr-iblogger-lite'),
	    'left-sidebar' => __('Left Sidebar' , 'tr-iblogger-lite'),
	    'full-width' => __('Full Width' , 'tr-iblogger-lite')
	  ),
) );


//Footer Options

$wp_customize->add_section( 'footer' , array(
    'title'      => __('Footer', 'tr-iblogger-lite'),
    'priority' => 21
) );

$wp_customize->add_setting( 'footer_copyright' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'wp_kses_post'
) );

$wp_customize->add_control( 'footer_copyright', array(
  'label' => __('Copyright Content', 'tr-iblogger-lite'),
  'section' => 'footer',
  'settings' => 'footer_copyright',
  'type' => 'textarea'
) );

$wp_customize->add_setting( 'footer_go_top_button' , array(
    'default'     => true,
    'transport'   => 'refresh',
    'sanitize_callback' => 'tr_iblogger_lite_sanitize_checkbox'
) );

$wp_customize->add_control( 'footer_go_top_button', array(
  'label' => __('Show Footer Back To Top Button', 'tr-iblogger-lite'),
  'section' => 'footer',
  'settings' => 'footer_go_top_button',
  'type' => 'checkbox'
) );


}
add_action( 'customize_register', 'tr_iblogger_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tr_iblogger_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tr_iblogger_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tr_iblogger_lite_customize_preview_js() {
	wp_enqueue_script( 'tr-iblogger-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tr_iblogger_lite_customize_preview_js' );
