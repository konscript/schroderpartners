<?php
/*
Template Name: Frontpage
*/
?>

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
      
      <div class="container" id="frontpage">
        
        <div class="sidebar-left">
          <h2 class="headline">Seneste Nyheder</h2>
          <?php $latest_posts = get_posts(array('numberposts' => 3)); ?>
          <?php if($latest_posts): ?>
            <ul>
              <?php foreach($latest_posts as $key => $post): ?>
                <?php $post_url = get_permalink($post->ID); ?> 
                <li>
                    <p class="date"><?php echo get_the_time('d.m.Y', $post->ID); ?></p>
                    <p class="title"><a href="<?php echo $post_url ?>"><?php echo $post->post_title; ?></a></p>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
        
        
        <div class="content">        
          <?php if(have_posts()) : while(have_posts()) : the_post() ?>
            <div class="post">
            
              <h2 class="headline"><?php the_title(); ?></h2>
              
              <?php the_post_thumbnail('post-thumbnail', array('class' => 'page-thumbnail')); ?>
              
              <div class="entry">
                <?php the_content(); ?>
              </div>
                              
            </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>       
      
        
        <div class="sidebar-right">
          <h2 class="headline">Mere om:</h2>
          <?php 
            wp_nav_menu(array(
              'theme_location'  => 'top_menu'
            )); 
          ?>
        </div>
      
      
      </div>
      
      
      <div class="footer">
        <p class="copyright">&copy; 2007 www.schroderpartners.dk</p>
        <p class="info">Info | Info</p>
      </div>
      
      <div class="clearer"></div>
      
    </div>
  </body>
</html>