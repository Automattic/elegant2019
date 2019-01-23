<?php
/**
 * Elegant (Twenty Nineteen) functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elegant_2019
 */

if ( ! function_exists( 'elegant2019_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elegant2019_setup() {

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 190,
			'flex-width'  => true,
			'flex-height' => false,
			'header-text' => array( 'site-title' ),
		)
	);
}
endif; // elegant2019_setup
add_action( 'after_setup_theme', 'elegant2019_setup', 30 );

// Our filter callback function
function elegant2019_primary_color_hue() {
	// Hue
	return 330;
}
add_filter( 'twentynineteen_default_hue', 'elegant2019_primary_color_hue' );

// Our filter callback function
function elegant2019_primary_color_saturation() {
	// Saturation
	return 53;
}
add_filter( 'twentynineteen_default_saturation', 'elegant2019_primary_color_saturation' );

// Our filter callback function
function elegant2019_primary_color_lightness() {
	// Lightness
	return 50;
}
add_filter( 'twentynineteen_default_lightness', 'elegant2019_primary_color_lightness' );

/**
 * Google font URLs.
 */
function elegant2019_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$source_serif_pro = esc_html_x( 'on', 'Source Serif Pro font: on or off', 'elegant2019' );

	if ( 'off' !== $source_serif_pro ) {
		$font_families = array();

		if ( 'off' !== $source_serif_pro ) {
			$font_families[] = 'Source Serif Pro:400,700,400italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function elegant2019_scripts() {

	/**
	 * Styles
	 */
	wp_enqueue_style( 'elegant2019-fonts', elegant2019_fonts_url(), array(), null );

}
add_action( 'wp_enqueue_scripts', 'elegant2019_scripts' );

/**
 * Load extras.php file (if necessary).
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Load wpcom compatibility file (if necessary).
 */
require get_stylesheet_directory() . '/inc/wpcom.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';
