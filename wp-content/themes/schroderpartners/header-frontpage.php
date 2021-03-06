<!DOCTYPE html>
<html>
  <head>
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/page-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/misc.css" type="text/css" media="screen" />
    
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'); ?>
    
    <?php wp_head(); ?>
    
    <style type="text/css" media="screen">
      .ui-tabs-hide {
        display: none;
      }
    </style>

    <script type="text/javascript" charset="utf-8">
      jQuery(document).ready(function() {
        jQuery('.active:first', '.contact-images').hide();
        jQuery('.inactive:first', '.contact-images').show();            
              
    		jQuery("#contact-module").tabs({
    		  fx: {
    		    opacity: "toggle"
    		  },
    		  select: function(event, ui) {
    		    jQuery(ui.tab).find('.active').hide();
    		    jQuery(ui.tab).find('.inactive').show();
    		    jQuery('.ui-state-active .active', '.contact-images').show();
    		    jQuery('.ui-state-active .inactive', '.contact-images').hide();            
    		  }
    		}).tabs("rotate", 5000, true);
      });
    </script>
  </head>
  
  <body>
    <div class="wrapper">
      
      <div class="header">
        <a href="<?php bloginfo('url'); ?>" class="header-logo">
          <img src="<?php bloginfo('template_url'); ?>/images/header-logo.jpg" />
        </a>

				<?php
					wp_nav_menu(array(
						'theme_location' 	=> 'language_picker',
						'menu_id'					=> 'language-picker',
						'fallback_cb'			=> null,
						'container'				=> 'false'
					));
				?>
				
				<div class="clearer"></div>
        
        <?php //include('contact-module.php'); ?> 
        <?php dynamic_sidebar('header'); ?>
      </div>
      
      <div class="container" id="frontpage">