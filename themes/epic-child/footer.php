	<section class="clear"></section>
	<!-- Footer -->
		<footer id="footer">
			<?php echo sds_get_footer_social_links(); // WPCS: XSS OK. ?>

			<p class="copyright">
				<?php sds_copyright( 'Epic' ); ?>
			</p>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
