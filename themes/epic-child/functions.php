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
	add_image_size( 'portfolio-archive', 388, 225, array( 'center', 'center' ), true );
}

add_action( 'wp_enqueue_scripts', 'sds_enqueue_styles' );
/**
 * Enqueue child theme styles.
 */
function sds_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

