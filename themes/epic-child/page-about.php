<?php
/**
 * This template is used for the display of the About Page.
 *
 * @package Epic
 **/

get_header(); ?>
	<section class="content-wrapper page-content page-about cf">
		<article class="content about">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs. ?>

			<?php get_template_part( 'loop', 'about' ); // Loop - Page. ?>
		</article>
	</section>

<?php get_footer(); ?>
