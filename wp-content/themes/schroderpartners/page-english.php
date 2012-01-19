<?php
/*
Template Name: Page - English
*/
?>

<?php get_header('english'); ?>
        
<table class="content">
  <tr>
    <td class="sidebar">
      <?php
        // Get the ID of the set menu
        $menu_id = get_menu_for_page($post->ID);

        // print the menu if set
        if($menu_id > 0) {
          wp_nav_menu(array(
            'menu'        => $menu_id,
            'container'   => false,
            'menu_class'  => 'sidebar-menu'
          ));
        }
      ?>
    </td>
    
    <td>                
      <?php if(have_posts()) : while(have_posts()) : the_post() ?>
        <div class="page">
        
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
        
<?php get_footer(); ?>