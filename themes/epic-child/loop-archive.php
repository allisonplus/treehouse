<?php
/**
 * Loop for archive items (made with portfolio items in mind).
 *
 * @package Epic
 */

?>

<?php
// Loop through posts.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-single' ); ?>>
		<a class="portfolio-single-link" href="<?php esc_url( the_permalink() ); ?>">
			<?php the_post_thumbnail( 'portfolio-archive' ); ?>
			<h2 class="latest-post-title"><?php the_title(); ?></h2>
		</a>
	</article>
<?php
	endwhile;
else :
?>
	<section class="no-posts no-archive-results latest-post">
		<?php sds_no_posts(); ?>
	</section>
<?php
	endif;
?>
