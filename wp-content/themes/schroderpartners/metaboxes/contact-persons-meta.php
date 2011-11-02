<?php

$contacts = get_posts(array('numberposts' => -1, 'post_type' => 'sp_contact'));

?>

<div class="my_meta_control">
	<p>Select contacts to show</p>

	<?php while($mb->have_fields_and_multi('contacts')): ?>
	<?php $mb->the_group_open(); ?>

		<?php $mb->the_field('person'); ?>
		<select name="<?php $mb->the_name(); ?>">
		  
      <?php foreach($contacts as $key => $contact): ?>
        <option value="<?php echo $contact->ID; ?>"<?php $mb->the_select_state($contact->ID); ?>><?php echo $contact->post_title; ?></option>
      <?php endforeach; ?>

		</select>
		<a href="#" class="dodelete">Remove</a>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p><a href="#" class="docopy-contacts button">Add Contact</a></p>

</div>