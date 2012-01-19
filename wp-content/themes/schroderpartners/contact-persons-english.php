<?php
/*
Template Name: Contact Persons - English
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
      
        
      <?php
        
        global $contact_persons_mb;
        $contact_ids = $contact_persons_mb->the_meta();
                        
        foreach($contact_ids['contacts'] as $key => $contact_id) {
          $id = $contact_id['person'];
          $general = get_post_meta($id, '_general_meta', true);
                
          $contacts[$id]['name'] = get_the_title($id);
          $contacts[$id]['contact_info'] = get_post_meta($id, '_contact_meta', true);
          $contacts[$id]['position'] = $general['position'];
        }      
      ?>
                      
      <?php if(have_posts()) : while(have_posts()) : the_post() ?>

                
        <div class="page">
        
          <h2 class="title"><?php the_title(); ?></h2>
          <div class="entry"><?php the_content(); ?></div>
                                
          <?php foreach($contacts as $key => $contact): ?>
            <div class="contact-person">
            
              <?php echo get_the_post_thumbnail($key, 'contact-thumbnail', array('class' => 'contact-thumbnail')); ?>

              <ul class="contact-info">
                <li><p class="title"><?php echo $contact['name']; ?></p></li>
                <li><?php echo $contact['position']; ?></li>
                <li><a href="mailto:<?php echo $contact['contact_info']['email']; ?>"><?php echo $contact['contact_info']['email']; ?></a></li>

                <?php if($contact['contact_info']['phone_numbers']): ?>
                  <li>
                    <table border="0">                      
                      <?php foreach($contact['contact_info']['phone_numbers'] as $key => $phone): ?>
                        <tr>
                          <td><?php echo $phone['phone_type']; ?></td>
                          <td class="number"><?php echo $phone['phone_number']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  </li>
                <?php endif; ?>

                <li><?php echo $contact['contact_info']['address_street']; ?></li>
                <li><?php echo $contact['contact_info']['address_zipcode']; ?></li>
              </ul>

            </div>
        
          <?php endforeach; ?>
                      
          </div>
          
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </td>
  </tr>
</table>
        
<?php get_footer(); ?>