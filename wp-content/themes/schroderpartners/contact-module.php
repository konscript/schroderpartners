<?php
  $contacts = get_posts(array('numberposts' => -1, 'post_type' => 'sp_contact'));
?>

<div id="contact-module">
  <ul class="contact-images">
    <?php foreach($contacts as $key => $contact): ?>
      <?php 
        global $contact_module_mb; 
        $meta = $contact_module_mb->the_meta($contact->ID);
      ?>
      <li>
        <a href="#contact-id-<?php echo $contact->ID; ?>">
          <?php echo get_the_post_thumbnail($contact->ID, 'contact-module-thumb', array('class' => 'active')); ?>
          <img src="<?php echo $meta['grey_url']; ?>" width="58" height="70" class="inactive">          
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
  
  <div id="contact-info">
    <?php foreach($contacts as $key => $contact): ?>
      <?php 
        global $contact_module_mb; 
        $meta = $contact_module_mb->the_meta($contact->ID);
      ?>
      <div class="contact" id="contact-id-<?php echo $contact->ID; ?>">
        <?php echo get_the_post_thumbnail($contact->ID, 'contact-module-big', array('class' => 'contact-thumbnail-big')); ?>
        <h3 class="contact-name"><?php echo $contact->post_title; ?></h3>
        <p class="contact-content"><?php echo $meta['cm_text']; ?></p>
        <a href="<?php echo get_permalink($contact->ID); ?>" class="read-more">Læs mere...</a>
      </div>
    <?php endforeach; ?>
  </div>
  
</div>