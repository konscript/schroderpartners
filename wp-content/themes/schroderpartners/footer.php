			</div>

			<div class="footer">
				<?php dynamic_sidebar('footer-left'); ?>
				<?php
					wp_nav_menu(array(
						'theme_location'	=> 'eng_link',
						'menu_id'					=> 'english-link',
						'link_before'			=> '&nbsp<span class="invisible">',
						'link_after'			=> '</span>'
					));
				?>
				<?php dynamic_sidebar('footer-right'); ?>
			</div>
      
			<div class="clearer"></div>
      
		</div>
	</body>
</html>