<div class="container">
<div class="sub" style="margin-top:20px;">
    <?php echo __('Id'); ?>
    <?php echo h($category['Category']['id']); ?>
</div>
<div class="view main">
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
        </dd>
&nbsp;

        <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
		</dd>
&nbsp;

        <dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
        </dd>

	</dl>
</div>
&nbsp;
<?php echo $this->Form->postButton('戻る', array('controller' => 'categories', 'action' => 'index') ,array( 'class' => 'btn btn-default', 'style'  => 'float:left;'))  ?>
<?php echo $this->Html->link('編集', array('controller' => 'categories', 'action' => 'edit', $category['Category']['id']) ,array( 'class' => 'btn btn-default', 'style' => 'float:right;'))  ?>

<div class="related">
	<h3><?php #echo __('Related Posts'); ?></h3>
	<?php if (!empty($category['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['category_id']; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['body']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div>
