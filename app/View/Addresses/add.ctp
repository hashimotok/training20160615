<div class="addresses form">
<div class="container">
    <?php echo $this->Form->create('', array('url' => '/addresses/add', 'type' => 'file')); ?>
	<fieldset>
	<div class="form-group">
		<h3><?php echo __('CSVをDBにインポートします'); ?></h3>
	<?php
		echo $this->Form->input('csvFile',  array('type' => 'file', 'label' => false, 'class' => 'form-control'));
?>
		<?php #echo $this->Form->end(); ?>
	</div>
	</fieldset>
 <?php echo $this->Form->end(); ?>
<button type="submit" form="AddressAddForm" class="btn btn-default">upload</button>
</div>
</div>
