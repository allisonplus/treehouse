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

		<?php the_post_thumbnail( 'portfolio-archive' ); ?>

		<?php
			$images = get_field( 'portfolio_images' );
			$size = 'portfolio-archive'; // (thumbnail, medium, large, full or custom size)
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
		</div><!--.content-img-wrap-->

		<div class="content-wrap">
			<div class="post-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
				<h1 class="post-title page-title"><?php the_title(); ?></h1>
			</div>
			<?php the_content(); ?>
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
