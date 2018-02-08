<?php
/**
 * This template is used for the display of single portfolio.
 *
 * @package Epic
 */

get_header(); ?>
	<section class="content-wrapper post-content single-content cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs. ?>

			<?php get_template_part( 'loop', 'single' ); // Loop. ?>

		</article>
	</section>

<?php get_footer(); ?>
