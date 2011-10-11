<div class="my_meta_control">
	<label>Birth year</label>
	<p>
		<?php $mb->the_field('born'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	
	<label>Position</label>
	<p>
		<?php $mb->the_field('position'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	  <span>Eg. "Partner, cand. merc. HD"</span>
	</p>
	
	<label>Theoretical Education</label>
	<p>
	  <?php $mb->the_field('education'); ?>
		<textarea class="custom" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
	</p>
	
	<label>Work Areas</label>
	<p>
		<?php $mb->the_field('work_areas'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
</div>