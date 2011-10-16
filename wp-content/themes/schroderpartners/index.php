<?php get_header(); ?>
        
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
      <h2 class="title"><?php wp_title(''); ?></h2>
                  
      <?php if(have_posts()) : while(have_posts()) : the_post() ?>
        <div class="post">
        
          <div class="header">
            <a href="<?php the_permalink(); ?>" class="post-title">
              <?php the_title(); ?>
            </a>
            <p class="post-date">
              <?php the_time("[d.m.Y]"); ?>
            </p>
          </div>
                          
          <div class="entry">
            <?php the_excerpt(); ?>
          </div>
                          
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </td>
  </tr>
</table>
        
<?php get_footer(); ?>