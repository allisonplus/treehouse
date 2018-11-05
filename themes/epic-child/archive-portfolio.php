<?php
/**
 * This template is used for the display of archives.
 *
 * @package Epic
 */

get_header(); ?>
	<section class="clearfix content-wrapper archive-content archives archive-portfolio">
		<div class="content">

			<?php
				get_template_part( 'loop', 'archive' ); // Loop - Archive.
			?>
		</div>
	</section>

<?php get_footer(); ?>
