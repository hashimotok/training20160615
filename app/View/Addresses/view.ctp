<div class="addresses view">
<h2><?php echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cd'); ?></dt>
		<dd>
			<?php echo h($address['Address']['cd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 2'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postnum'); ?></dt>
		<dd>
			<?php echo h($address['Address']['postnum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 4'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 5'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 6'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($address['Address']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($address['Address']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address3'); ?></dt>
		<dd>
			<?php echo h($address['Address']['address3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 10'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_10']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 11'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_11']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 12'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_12']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 13'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_13']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 14'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_14']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Col 15'); ?></dt>
		<dd>
			<?php echo h($address['Address']['col_15']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $address['Address']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
	</ul>
</div>
