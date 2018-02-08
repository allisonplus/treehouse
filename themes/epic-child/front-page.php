<?php
/**
 * This template is used for displaying the Front Page (when selected in Settings > Reading).
 *
 * This template is used even when the option is selected, but a page is not. It contains fallback functionality
 * to ensure content is still displayed.
 *
 * @package Epic
 */

get_header(); ?>

	<main class="content-wrapper front-page-content front-page cf">

		<section class="child-custom content-wrapper front-page-content front-page cf">

			<?php echo treehouse_homepage_focus(); ?>

			<article class="content">
				<?php echo treehouse_supplementary_section(); // WPCS: XSS ok. ?>
			</article>

		</section>
	</main>

<?php get_footer(); ?>
