<?php get_header(); ?>
        
<table class="content">
  <tr>
    <td class="sidebar">
      <?php
        // This should be changed so the menus can be changed dynamically
        wp_nav_menu(array(
          'theme_location'  => 'news_menu',
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
        
<?php get_footer(); ?>