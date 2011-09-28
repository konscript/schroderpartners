<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/page-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/misc.css" type="text/css" media="screen" />
    
    <?php wp_head(); ?>
  </head>
  
  <body>
    <div class="wrapper">
      
      <div class="header">
        <a href="<?php bloginfo('url'); ?>" class="header-logo">
          <img src="<?php bloginfo('template_url'); ?>/images/header-logo.jpg" />
        </a>
        
        <div class="contact-module">
          &nbsp;
        </div>  
      </div>
      
      <div class="container">
        
        <?php include("top-menu.php"); ?>
        
        <table class="content">
          <tr>
            <td class="sidebar">
              <?php
                // This should be changed so the menus can be changed dynamically
                wp_nav_menu(array(
                  'theme_location'  => 'profile_menu',
                  'container'       => false,
                  'menu_class'      => 'sidebar-menu'
                ));
              ?>
            </td>
            
            <td>                
              <?php if(have_posts()) : while(have_posts()) : the_post() ?>
                <div class="post">
                
                  <h2 class="title"><?php the_title(); ?></h2>
                  
                  <?php the_post_thumbnail('post-thumbnail', array('class' => 'page-thumbnail')); ?>
                  
                  <div class="entry">
                    <?php the_content(); ?>
                  </div>
                    
                  </div>
                  
                </div>
              <?php endwhile; ?>
              <?php endif; ?>
            </td>
          </tr>
        </table>
        
      </div>
      
      <div class="footer">
        <p class="copyright">&copy; 2007 www.schroderpartners.dk</p>
        <p class="info">Info | Info</p>
      </div>
      
      <div class="clearer"></div>
      
    </div>
  </body>
</html>