<?php
/**
 * Loop for blog/home page (if content).
 *
 * @package Epic
 */

// Loop through posts.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post cf' ); ?>>

		<section class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h2 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="latest-post-date">

			<?php
			if ( strlen( get_the_title() ) > 0 ) :
				the_time( get_option( 'date_format' ) );
			else : // No title.
			?>
					<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				<?php
					endif;
				?>
			</p>
		</section>

		<section class="content-wrap">
			<?php
			// Show the excerpt if the post has one.
			if ( has_excerpt() ) :
				the_excerpt();
			?>
					<p><a href="<?php the_permalink(); ?>" class="more-link read-more excerpt-more-link"><?php esc_html_e( 'Continue Reading', 'epic' ); ?></a></p>
				<?php
				else :
					the_content( __( 'Continue Reading', 'epic' ) );
				endif;
			?>
		</section>
	</section>
<?php
		endwhile;
	else : // No posts.
?>
	<section class="no-results no-posts no-search-results latest-post">
		<?php sds_no_posts(); ?>
	</section>
<?php endif; ?>
