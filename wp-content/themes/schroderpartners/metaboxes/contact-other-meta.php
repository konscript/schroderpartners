<div class="my_meta_control">
  
  <label>Additional Info</label>
	<p>
		<?php $mb->the_field('additional'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	  <span>Eg. "Uddannelsesleder Value Chain Management, VIA Univercity."</span>
	</p>
  
	<h4>Publications</h4>
 
	<?php while($mb->have_fields_and_multi('publication')): ?>
	<?php $mb->the_group_open(); ?>
	
	  <table border="0">
	    <tr>
        <td class="head">Publication</td>
        <td>
          <?php $mb->the_field('publication_info'); ?>
          <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </td>
        <td>
          <a href="#" class="dodelete button">Remove</a>
        </td>
	    </tr>
	  </table>
	  
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
	
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-publication button">Add Publication</a></p>  
	
	<h4>Previous Jobs</h4>
	
	<?php while($mb->have_fields_and_multi('previous_job')): ?>
	<?php $mb->the_group_open(); ?>
	
	  <table border="0">
	    <tr>
        <td class="head">Job</td>
        <td>
          <?php $mb->the_field('job'); ?>
          <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </td>
        <td>
          <a href="#" class="dodelete button">Remove</a>
        </td>
	    </tr>
	  </table>
	  
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
	
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-previous_job button">Add Job</a></p>
  
	
 
</div>