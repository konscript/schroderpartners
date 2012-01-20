			</div>

			<div class="footer">
				<?php dynamic_sidebar('footer-left'); ?>
				<?php
					wp_nav_menu(array(
						'theme_location'	=> 'eng_link',
						'menu_id'					=> 'english-link',
						'link_before'			=> '&nbsp<span class="invisible">',
						'link_after'			=> '</span>',
						'fallback_cb'			=> function() { return null; }
					));
				?>
				<?php dynamic_sidebar('footer-right'); ?>
			</div>
      
			<div class="clearer"></div>
      
		</div>
		
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
		
	</body>
</html>
