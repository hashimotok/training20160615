<div class="container">
<div class="sub" style="margin-top:20px;">
    <?php echo __('Id'); ?>:
    <?php echo h($group['Group']['id']); ?>
</div>
<div class="view main">
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
        </dd>
        &nbsp;

        <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
		</dd>
        &nbsp;
        
        <dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
        </dd>

	</dl>
</div>
</div>
