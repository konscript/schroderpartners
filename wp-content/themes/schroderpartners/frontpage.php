<?php
/*
Template Name: Frontpage
*/
?>

<?php get_header('frontpage'); ?>   
      
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
    
    <!-- The following breaks if the page "Nyheder" is renamed -->
    <?php $news_url = get_permalink(get_page_by_title('Nyheder')->ID); ?>
    <a href="<?php echo $news_url; ?>" class="more-news">Se flere nyheder og nyhedsbreve...</a> <!-- Find out how to link this to news site -->
  
  <?php endif; ?>
</div>


<div class="content">        
  <?php if(have_posts()) : while(have_posts()) : the_post() ?>
    <div class="page">
    
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

<div class="clearer"></div>

<div class="bottom-menu">
  <div class="certified-adviser">
    <p class="headline">Certified Adviser</p>
    <img src="<?php bloginfo('template_url') ?>/images/nasdaq-logo.jpg" />
  </div>
  <p class="headline">Mere om køb og salg af:</p>
  <?php
    wp_nav_menu(array(
      'theme_location'  => 'footer_menu',
      'menu_class'      => 'footer-navigation',
      'container'       => false
    ));
  ?>
</div>
      
<?php get_footer(); ?>