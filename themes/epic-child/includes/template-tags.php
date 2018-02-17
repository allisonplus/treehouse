<?php
/**
 * ACF info.
 *
 * @package Epic
 */

/**
 * Homepage heroine.
 */
function treehouse_homepage_heroine() {

	$image = get_field( 'main_image' );

	// Stop if there's nothing to display.
	if ( ! $image ) {
		return false;
	}

	if ( ! $image['alt'] ) {
		$img_alt = '';
	}

	ob_start(); ?>

	<section class="homepage-focus-img">
		<a href="<?php echo esc_url( $image['url'] ); ?>">
			<img src="<?php echo esc_url( $image['sizes']['homepage-heroine'] ); ?>" alt="<?php echo esc_html( $img_alt ); ?>" />
		</a>
	</section><!--.homepage-focus-img-->

	<?php
	return ob_get_clean();
}


/**
 * Social links for the footer.
 */
function sds_get_footer_social_links() {

	// Set an array of social networks.
	$social_networks = array( 'pinterest', 'tumblr', 'facebook', 'instagram' );
	$email = get_theme_mod( 'sds_email_link' );
	$icon_email = get_stylesheet_directory_uri() . '/assets/social-email.jpg';

	ob_start(); ?>

	<ul class="social-networks">

	<?php // If there's no email, don't make this <li> in the first place .?>
	<?php if ( ! empty( $email ) ) : ?>
		<li class="social-network email">
			<a href="mailto:<?php echo esc_attr( $email ); ?>">
				<img src="<?php echo esc_url( $icon_email ); ?>" alt="">
			</a>
		</li>
	<?php endif; ?>

	<?php // Continue <li>'s with rest of social networks provided. ?>
	<?php foreach ( $social_networks as $network ) :

		$link_value = get_theme_mod( 'sds_' . $network . '_link' ); ?>

		<?php if ( ! empty( $link_value ) ) : ?>
		<li class="social-network <?php echo $network; // WPCS: XSS OK. ?>">
			<a href="<?php echo esc_url( get_theme_mod( 'sds_' . $network . '_link' ) ); ?>">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/social-' . $network . '.jpg' ); ?>" alt="">
			</a>
		</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul><!-- .social-networks -->
	<?php
	return ob_get_clean();
}
