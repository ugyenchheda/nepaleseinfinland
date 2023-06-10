<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NepaleseinFinland
 */

?>

	<footer id="colophon" class="sitemain-footer">
		<div class="container">
			<div class="text-center copyright-text"> © 2022-<?php echo date("Y");?> 
			<span class="sep"> | </span>
				<span class="copyright-text">
					<?php
						printf( esc_html__( 'Developed and Powered by: %2$s.', 'nepaleseinfinland' ), 'nepaleseinfinland', '<a href="https://ugyen.com.np/">Ugyen</a>' );
					?>
				</span>
		</div></div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
