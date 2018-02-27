<?php
// Loop through posts.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post cf' ); ?>>

		<section class="post-title-wrap page-title-wrap cf <?php echo ( has_post_thumbnail() ) ? 'post-title-wrap-featured-image' : 'post-title-wrap-no-image'; ?>">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</section>

		<section class="content-wrap">
			<?php the_content(); ?>
		</section>
	</section>
<?php
		endwhile;
	endif;
?>
