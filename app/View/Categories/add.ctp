<div class="container">
<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<h3><?php echo __('Add Category'); ?></h3>
	<div class="form-group">
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
	?>
	</div>
	</fieldset>
	<button type="submit" class="btn btn-default" >Submit</button>
	<?php #echo $this->Form->end(__('Submit')); ?>
</div>
</div>
