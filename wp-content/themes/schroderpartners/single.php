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
              <div class="page">
                   
              <?php if(have_posts()) : while(have_posts()) : the_post() ?>

                <div class="post single">
                
                  <div class="header">
                    <a href="<?php the_permalink(); ?>" class="post-title">
                      <?php the_title(); ?>
                    </a>
                    <p class="post-date">
                      <?php the_time("[d.m.Y]"); ?>
                    </p>
                  </div>
                                  
                  <div class="entry">
                    <?php the_content(); ?>
                  </div>
                                    
                  <!-- The following breaks if the page "Nyheder" is renamed -->
                  <?php $news_url = get_permalink(get_page_by_title('Nyheder')->ID); ?>
                  <a class="go-back" href="<?php echo $news_url; ?>">Tilbage til Nyheder</a>
                  
                </div>
              <?php endwhile; ?>
              <?php endif; ?>
              </div>
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