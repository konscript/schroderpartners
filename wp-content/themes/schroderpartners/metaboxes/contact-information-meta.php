<div class="my_meta_control">
	
	<label>E-mail</label>
	<p>
		<?php $mb->the_field('email'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
    <span>Contact e-mail address</span>
	</p>
	
	<h4>Address</h4>
	
  <table border="0">
    <tr>
      <td class="head">Street, number</td>
      <td>
        <?php $mb->the_field('address_street'); ?>
        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
      </td>
    </tr>
    <tr>
      <td class="head">Zip Code, City</td>
      <td>
        <?php $mb->the_field('address_zipcode'); ?>
        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
      </td>
    </tr>
  </table>	
	
	<h4>Phones</h4>
 
	<?php while($mb->have_fields_and_multi('phone_numbers')): ?>
	<?php $mb->the_group_open(); ?>
	
	  <table border="0">
	    <tr>
        <td class="head">Phone Type</td>
        <td>
          <?php $mb->the_field('phone_type'); ?>
          <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </td>
	    </tr>
	    <tr>
        <td class="head">Phone Number</td>
        <td>
          <?php $mb->the_field('phone_number'); ?>
          <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </td>
	    </tr>
	    <tr>
        <td class="head"></td>
        <td>
      		<a href="#" class="dodelete button">Remove Phone</a>
        </td>
	    </tr>
	  </table>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-phone_numbers button">Add Phone</a></p>
</div>