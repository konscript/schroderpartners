<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme and plugins. 
 */
?>

	<?php get_sidebar( 'primary' ); ?>

	</div><!-- #container -->
	<div id="footer-container">
		<div id="footer">
			<?php
			$footer_insert = hybrid_get_setting( 'footer_insert' );
			if ( !empty( $footer_insert ) )
				echo '<div class="footer-insert">' . do_shortcode( $footer_insert ) . '</div>';
			?>
		</div><!-- #footer -->
	</div><!-- #footer-container -->
</div><!-- #body-container -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27849778-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_footer(); ?>

</body>
</html>
