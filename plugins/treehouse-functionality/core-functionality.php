<?php
/**
 * Plugin Name: Elena's Treehouse Portfolio Content
 * Description: Data: Custom Post Types & ACF for Elena's Portfolio
 * Version: 1.0.0
 * Author: Allison Tarr
 * Author URI: http://www.allisontarr.com
 *
 * @package Epic
 */

// Plugin Directory.
define( 'BE_DIR', dirname( __FILE__ ) );

require_once( BE_DIR . '/inc/general.php' ); // General.
require_once( BE_DIR . '/inc/cpt-portfolio.php' ); // Portfolio CPT.
require_once( BE_DIR . '/advanced-custom-fields-pro/acf.php' ); // Advanced Custom Fields.


// Hide ACF menu (re: Portfolio content plugin).
// add_filter( 'acf/settings/show_admin', '__return_false' );
