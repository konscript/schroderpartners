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
           
      <?php if(have_posts()) : while(have_posts()) : the_post() ?>
        
        <?php
          global $contact_info_mb;                  
          $contact_info = $contact_info_mb->the_meta();
          
          global $career_mb;
          $career_info = $career_mb->the_meta();
          
          global $general_mb;
          $general_info = $general_mb->the_meta();                  
        ?>                

        <div class="post single-sp_contact">
        
          <div class="header">
            <?php the_post_thumbnail('contact-thumbnail', array('class' => 'contact-thumbnail')); ?>
            
            <ul class="contact-info">
              <li><p class="title"><?php the_title(); ?></p></li>
              <li><?php echo $general_info['position']; ?></li>
              <li><a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></li>
              <li>
                <table border="0">                      
                  <?php foreach($contact_info['phone_numbers'] as $key => $phone): ?>
                    <tr>
                      <td><?php echo $phone['phone_type']; ?></td>
                      <td class="number"><?php echo $phone['phone_number']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </li>
              <li><?php echo $contact_info['address_street']; ?></li>
              <li><?php echo $contact_info['address_zipcode']; ?></li>
            </ul>
          </div>
          
          <div class="clearer"></div>
          <div class="entry">
            <table>
              <tr>
                <td class="head">Født</td>
                <td><?php echo $general_info['born']; ?></td>
                </td>
              </tr>
              <tr>
                <td class="head">Teoretisk uddannelse</td>
                <td><?php echo nl2br($general_info['education']); ?></td>
                </td>
              </tr>
              <tr>
                <td class="head">Arbejdsområder</td>
                <td><?php echo $general_info['work_areas']; ?></td>
                </td>
              </tr>
              <tr>
                <td class="head">Karriereforløb</td>
              </tr>
              
              <?php foreach($career_info['career'] as $key => $career): ?>
              <tr>
                <td class="period"><?php echo $career['period']; ?></td>
                <td><?php echo $career['description']; ?></td>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td class="head">Aktuelle tillidsposter</td>
                <td><?php echo $general_info['work_areas']; ?></td>
                </td>
              </tr>
            </table>
          </div>
          
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </td>
  </tr>
</table>
        
<?php get_footer(); ?>