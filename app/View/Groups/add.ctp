<div class="actions">
        <ul class="nav nav-tabs">
                <li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul>
</div>

<div class="container">
<div class="form-group">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<h3><?php echo __('Add Group'); ?></h3>
	<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
	</fieldset>

<?php #echo $this->Form->end(__('Submit')); ?>
<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
