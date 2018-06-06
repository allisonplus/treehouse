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
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>

		<div class="content-img-wrap">

		<?php
		// Show featured image on single portfolio page as well?
		if ( false == get_field( 'hide_featured_img' ) ) {
			the_post_thumbnail( 'portfolio-single' );
		} else { } ?>

		<?php
			$images = get_field( 'portfolio_images' );
			$pub_link = get_field( 'link_to_publication' );
			$etsy_link = get_field( 'etsy_link' );
		?>

		<?php if ( $images ) : ?>
			<ul>
				<?php foreach ( $images as $image ) :
					// If it's a GIF bring in the full size so animation is retained.
					$size = ( 'image/gif' == $image['mime_type'] ? 'full' : 'portfolio-single' ); ?>
					<li><?php echo wp_get_attachment_image( $image['ID'], $size ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		</div><!--.content-img-wrap-->

		<div class="content-wrap">
			<div class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
				<h1 class="post-title page-title"><?php the_title(); ?></h1>
			</div>
			<?php the_content(); ?>

			<?php if ( $etsy_link ) : ?>
				<a class="button" href="<?php echo esc_url( $etsy_link ); ?>"><?php esc_html_e( 'Etsy Listing', 'epic-child' ); ?></a>
			<?php endif; ?>

			<?php if ( $pub_link ) : ?>
				<a class="button" href="<?php echo esc_url( $pub_link ); ?>"><?php esc_html_e( 'Client Link', 'epic-child' ); ?></a>
			<?php endif; ?>
		</div>
	</section>

	<footer class="post-footer">
		<?php if ( 'attachment' !== $post->post_type  ) : // Post Meta Data (tags, categories, etc). ?>
			<div class="post-meta">
				<?php sds_post_meta(); ?>
			</div>
		<?php endif ?>

		<?php sds_single_post_navigation(); ?>
	</footer>
<?php
		endwhile;
	endif;
?>
