<?php
/**
 * Loop for single portfolio items.
 *
 * @package Epic
 */

	global $multipage;

	// Loop through posts.
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post cf' ); ?>>
		<?php sds_featured_image(); ?>

		<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h1 class="post-title page-title"><?php the_title(); ?></h1>
		</section>

		<section class="content-wrap">
			<?php the_content(); ?>
		</section>

		<?php if ( $multipage ) : ?>
			<section class="single-post-navigation single-post-pagination wp-link-pages">
				<?php wp_link_pages(); ?>
			</section>
		<?php endif; ?>
	</section>

	<footer class="post-footer">
		<?php if ( 'attachment' !== $post->post_type  ) : // Post Meta Data (tags, categories, etc). ?>
			<section class="post-meta">
				<?php sds_post_meta(); ?>
			</section>
		<?php endif ?>

		<?php sds_single_post_navigation(); ?>
	</footer>
<?php
		endwhile;
	endif;
?>
