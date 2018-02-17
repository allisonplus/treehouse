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
require_once( dirname( __FILE__ ) . '/includes/template-tags.php' );

add_action( 'after_setup_theme', 'sds_child_image_size', 11 );
/**
 * Add image sizes.
 */
function sds_child_image_size() {
	add_image_size( 'homepage-heroine', 1200, 550, false );
	add_image_size( 'portfolio-single', 750, 750, false );
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

/**
 * This function outputs next/prev navigation on single portfolio item.
 */
if ( ! function_exists( 'sds_single_port_navigation' ) ) {
	function sds_single_port_navigation() {
	?>
		<section class="single-post-navigation post-navigation">
			<section class="previous-posts">
				<?php next_post_link( '%link', '&lt; Next Project ' ); ?>
			</section>
			<section class="next-posts">
				<?php previous_post_link( '%link', 'Previous Project &gt;' ); ?>
			</section>
		</section>
	<?php
	}
}

/********************
 * Theme Customizer *
 ********************/

/**
 * This function adds settings, sections, and controls to the Theme Customizer.
 */
add_action( 'customize_register', 'sds_customizer_additional', 20 );

function sds_customizer_additional( $wp_customize ) {

	// Add our social link options.
	$wp_customize->add_section(
		'sds_social_links_section',
		array(
			'title'       => esc_html__( 'Social Links', 'sds' ),
			'description' => esc_html__( 'These are the settings for social links.', 'sds' ),
			'priority'    => 90,
		)
	);

	// Add our Contact Email field.
	$wp_customize->add_setting(
		'sds_email_link',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'sds_email_link',
		array(
			'label'       => esc_html__( 'Email', 'sds' ),
			'section'     => 'sds_social_links_section',
			'type'        => 'email',
			// 'sanitize'    => 'html',
		)
	);

	// Create an array of our social links for ease of setup.
	$social_networks = array( 'pinterest', 'tumblr', 'facebook', 'instagram' );

	// Loop through our networks to setup our fields.
	foreach ( $social_networks as $network ) {

		$wp_customize->add_setting(
			'sds_' . $network . '_link',
			array(
				'default' => '',
				// 'sanitize_callback' => 'sds_sanitize_customizer_url',
			)
		);
		$wp_customize->add_control(
			'sds_' . $network . '_link',
			array(
				'label'   => sprintf( esc_html__( '%s Link', 'sds' ), ucwords( $network ) ),
				'section' => 'sds_social_links_section',
				'type'    => 'text',
			)
		);
	}

}
