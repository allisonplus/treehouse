<?php
/**
 * Epic Custom (Child) Theme Customizations
 *
 * Adjustments to styling & scripts, Fall 2017
 *
 * @version 1.0
 * @package Epic
 */

// Include file to bring in ACF related content.
require_once( dirname( __FILE__ ) . '/includes/acf.php' );

add_action( 'after_setup_theme', 'sds_child_image_size', 11 );
/**
 * Add image sizes.
 */
function sds_child_image_size() {
	add_image_size( 'homepage-heroine', 1200, 550, false );
	add_image_size( 'portfolio-archive', 388, 225, array( 'center', 'center' ), true );
	add_image_size( 'portfolio-single', 550, 550, false );
}

add_action( 'wp_enqueue_scripts', 'sds_enqueue_styles' );
/**
 * Enqueue child theme styles.
 */
function sds_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue scripts and styles.
 */
function sds_scripts() {

	// EQCSS - https://github.com/tomhodgins/element-queries-spec.
	wp_enqueue_script( 'sds-eqcss', get_stylesheet_directory_uri() . '/assets/eqcss.js', array(), '20171215', true );
}
add_action( 'wp_enqueue_scripts', 'sds_scripts' );
