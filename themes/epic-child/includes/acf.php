<?php
/**
 * ACF info.
 *
 * @package Epic
 */

/**
 * Portfolio Query.
 *
 * @return WP_Query Portfolio items.
 */
function treehouse_query_portfolio() {

	return new WP_Query( array(
		'post_type'              => 'portfolio',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	) );
}

/**
 * 'Portfolio' Section
 */
function treehouse_portfolio_gallery() {

	// Stop if there's nothing to display.
	if ( ! $images ) {
		return false;
	}

	ob_start(); ?>

	<?php $portfolio_pieces = treehouse_query_portfolio(); ?>

	<section class="portfolio-pieces">

	<?php while ( $portfolio_pieces->have_posts() ) : $portfolio_pieces->the_post(); ?>

	<?php
		$images = get_field( 'portfolio_images' );
		$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
	?>

		<?php if ( $images ) : ?>
			<ul>
				<?php foreach ( $images as $image ) : ?>
					<li>
						<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

	<?php endwhile; ?>

	</section><!--.section-->

	<?php
	return ob_get_clean();
}

/**
 * Homepage slider.
 */
function treehouse_homepage_focus() {

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

