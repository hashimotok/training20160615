<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cd');
		echo $this->Form->input('col_2');
		echo $this->Form->input('postnum');
		echo $this->Form->input('col_4');
		echo $this->Form->input('col_5');
		echo $this->Form->input('col_6');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('address3');
		echo $this->Form->input('col_10');
		echo $this->Form->input('col_11');
		echo $this->Form->input('col_12');
		echo $this->Form->input('col_13');
		echo $this->Form->input('col_14');
		echo $this->Form->input('col_15');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Address.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
	</ul>
</div>
