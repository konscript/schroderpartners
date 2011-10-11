<div class="my_meta_control">
	<h4>Career</h4>
 
	<?php while($mb->have_fields_and_multi('career')): ?>
	<?php $mb->the_group_open(); ?>
	
	  <table border="0">
	    <tr>
        <td class="head">Period</td>
        <td>
          <?php $mb->the_field('period'); ?>
          <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </td>
	    </tr>
	    <tr>
        <td class="head">Description</td>
        <td>
          <?php $mb->the_field('description'); ?>
          <textarea class="custom" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
        </td>
	    </tr>
	    <tr>
        <td class="head"></td>
        <td>
      		<a href="#" class="dodelete button">Remove Period</a>
        </td>
	    </tr>
	  </table>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-career button">Add Period</a></p>
</div>