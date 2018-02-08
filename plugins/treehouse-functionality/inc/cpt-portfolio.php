<?php
/**
 * Custom Post Types: Portfolio
 */
function sds_register_portfolio_cpt() {

	/**
	 * Post Type: Portfolio.
	 */

	$labels = array(
		'name' => __( 'Portfolio', 'epic-child' ),
		'singular_name' => __( 'Portfolio Piece', 'epic-child' ),
		'add_new_item' => __( 'Add new Portfolio Piece', 'epic-child' ),
	);

	$args = array(
		'label' => __( 'Portfolio', 'epic-child' ),
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => false,
		'rest_base' => '',
		'has_archive' => true,
		'show_in_menu' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'portfolio', 'with_front' => true ),
		'query_var' => true,
		'menu_icon' => 'dashicons-laptop',
		'supports' => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'portfolio', $args );
}

add_action( 'init', 'sds_register_portfolio_cpt' );
