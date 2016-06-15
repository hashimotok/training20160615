<div class="actions"> 
<div class="posts index">
<!--<div class="form-group">
<div class="container">

<h2><?php echo __('Search'); ?></h2>
	<?php echo $this->Form->create('Post', array( 'novalidate' => true, 'url' => array_merge(array('action' => 'index'), $this->params['pass']) )); ?>

        <div class="form-group">
        <label class="col-sm-1 control-label">Title</label>
<div class="col-sm-11">	<?php echo $this->Form->input('title' , array('class' => 'form-control', 'label'=> false)); ?></div></div>

        <div class="form-group">
        <label class="col-sm-1 control-label">Category</label>
       	<div class="form-inlinea col-sm-11">
		<?php echo $this->Form->input('category_id', array('class' => 'checkbox-inline','div' => false, 'multiple' => 'checkbox', 'label' => false)); ?>
	</div></div>

	<div class="form-group">
        <label class="col-sm-1 control-label">Tag</label>
	<div class="form-inline col-sm-11">
	<?php echo $this->Form->input('tags',array('class' => 'checkbox-inline','div' => false, 'multiple' => 'checkbox', 'label' => false)); ?>
	</div></div>

	<button type="submit" class="btn btn-default">Search</button>
</div>
</div>-->
<div class="container">
	<h2><?php echo __('Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th style="width:200px; overflow:hidden; table-layout:fixed; white-space:nowrap; text-overflow:ellipsis;"><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['Category']['name']); ?>&nbsp;</td>
        <td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
        <td>
                <?php echo h($post['Post']['body']); ?>&nbsp;
        </td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['Post']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<ul class="pagination">
		<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
	</ul>
	</div>
</div>
</div>
</div>
