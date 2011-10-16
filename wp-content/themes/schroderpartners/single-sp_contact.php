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
          
          global $other_meta_mb;
          $other_meta = $other_meta_mb->the_meta();
        ?>                

        <div class="post single-sp_contact">
        
          <div class="header">
            <?php the_post_thumbnail('contact-thumbnail', array('class' => 'contact-thumbnail')); ?>
            
            <ul class="contact-info">
              <li><p class="title"><?php the_title(); ?></p></li>
              <li><?php echo $general_info['position']; ?></li>
              <li><a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></li>
              
              <?php if($contact_info['phone_numbers']): ?>
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
              <?php endif; ?>
              
              <li><?php echo $contact_info['address_street']; ?></li>
              <li><?php echo $contact_info['address_zipcode']; ?></li>
            </ul>
          </div>
          
          <div class="clearer"></div>
          <div class="entry">
            <table>
              
              <?php if($general_info['born']): ?>
                <tr>
                  <td class="head">Født</td>
                  <td><?php echo $general_info['born']; ?></td>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($general_info['education']): ?>
                <tr>
                  <td class="head">Teoretisk uddannelse</td>
                  <td><?php echo nl2br($general_info['education']); ?></td>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($general_info['work_areas']): ?>
                <tr>
                  <td class="head">Arbejdsområder</td>
                  <td><?php echo $general_info['work_areas']; ?></td>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($career_info['career']): ?>
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
              <?php endif; ?>
              
              <?php if($career_info['position_of_trust']): ?>
                <tr>
                  <td class="head">Aktuelle tillidsposter</td>
                  <td>
                    <ul class="no-style">
                      <?php foreach($career_info['position_of_trust'] as $key => $pot): ?>
                        <li><?php echo $pot['position']; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($other_meta['additional']):?>
                <tr>
                  <td class="head">Andet</td>
                  <td><?php echo $other_meta['additional']; ?></td>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($other_meta['publication']): ?>
                <tr>
                  <td class="head">Publikationer</td>
                  <td>
                    <ul class="no-style">
                      <?php foreach($other_meta['publication'] as $key => $publication): ?>
                        <li><?php echo $publication['publication_info']; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                </tr>
              <?php endif; ?>
              
              <?php if($other_meta['previous_job']): ?>
                <tr>
                  <td class="head">Tidligere hverv</td>
                  <td>
                    <ul class="no-style">
                      <?php foreach($other_meta['previous_job'] as $key => $prev_job): ?>
                        <li><?php echo $prev_job['job']; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                </tr>
              <?php endif; ?>
              
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