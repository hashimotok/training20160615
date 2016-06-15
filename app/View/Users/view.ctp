<div class="container">
<!--<h2><?php echo __('User'); ?></h2>-->
   <div class="sub" style="margin-top:20px;">
        <?php echo __('Id'); ?>:
        <?php echo h($user['User']['id']); ?>
    </div>

    <div class="view main">
        <div class="row">
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
        </dd>
        <!--
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
        </dd>
        -->
&nbsp;
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
&nbsp;
        <dt><?php echo __('更新'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
&nbsp;
        <dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
        </dd>
&nbsp;
        <dt><?php echo __('PostNumber'); ?></dt>
        <dd>
            <?php echo ($user['Address']['postnum']); ?>
            &nbsp;
        </dd>
    </dl>
    </div><!--main -->
</div>
&nbsp;

<?php echo $this->Form->postButton('戻る', array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-default', 'style' => 'float:left;')) ?>

<?php echo $this->Html->link('編集', array('controller' => 'users', 'action' => 'edit',$user['User']['id']), array('class' => 'btn btn-default', 'style' => 'float:right;')) ?>

</div><!--container-->




<!--
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($user['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
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
-->
</div>
