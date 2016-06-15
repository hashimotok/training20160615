<div class="container">
<div class="form-group">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<h3><?php echo __('Add Tag'); ?></h3>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
	?>
	</fieldset>
<button  type="submit"  class="btn btn-default" name="tagAdd"> Submit</button>
<?php #echo $this->Form->end(__('Submit')); ?>
</div>
</div>
