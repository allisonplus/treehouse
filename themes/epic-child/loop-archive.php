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
		    $url = wp_get_attachment_url( get_post_thumbnail_id() );
		    $filetype = wp_check_filetype( $url );
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-single' ); ?>>
		<a class="portfolio-single-link" href="<?php esc_url( the_permalink() ); ?>">
			<?php
			// Bring in the full size to retain animation if it's a GIF.
			if ( 'gif' == $filetype['ext'] ) {
				the_post_thumbnail( 'full' );
			} else {
				the_post_thumbnail( 'square-med-crop' );
			}

			?>
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
