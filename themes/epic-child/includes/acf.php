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
 * Homepage Supplmentary Section.
 */
function treehouse_supplementary_section() {

	$modules = get_field( 'modules' );

	// Stop if there's nothing to display.
	if ( ! $modules ) {
		return false;
	}

	ob_start(); ?>

	<?php if ( have_rows( 'modules' ) ) : ?>

		<ul class="supplementary-gallery">

		<?php while ( have_rows( 'modules' ) ) : the_row();

			// Variables.
			$image = get_sub_field( 'image' );
			$title = get_sub_field( 'title' );
			$link = get_sub_field( 'link' );

		?>

			<li class="supplementary-single">

				<?php if ( $link ) : ?>
					<a href="<?php echo esc_url( $link ); ?>">
				<?php endif; ?>

					<img src="<?php echo esc_url( $image['sizes']['wcsquare'] ); ?>" alt="<?php echo esc_html( $image['alt'] ); ?>" />

				<?php if ( $link ) : ?>
					<p><?php echo esc_html( $title ); ?></p>
					</a>
				<?php endif; ?>

			</li>

		<?php endwhile; ?>

		</ul>

	<?php endif; ?>

	<?php
	return ob_get_clean();
}

