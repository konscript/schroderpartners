<div class="my_meta_control">
	<label>Greyscale Image URL</label>
	<p>
		<?php $mb->the_field('grey_url'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	
	<label>Contact Module Text</label>
	<p>
	  <?php $mb->the_field('cm_text'); ?>
		<textarea class="custom" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
	</p>
</div>