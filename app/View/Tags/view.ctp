<div class="container">
    <div class="sub" style="margin-top:20px;">
        <?php echo __('Id'); ?>:
        <?php echo h($tag['Tag']['id']); ?>
    </div>
<div class="view main">
	<dl>
		<dt><?php echo __('name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
        </dd>
&nbsp;

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
		</dd>
&nbsp;
        <dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['modified']); ?>
		</dd>
	</dl>
</div>
&nbsp;
<?php echo $this->Form->postButton('戻る', array('controller' => 'tags', 'action' => 'index') ,array( 'class' => 'btn btn-default', 'style'  => 'float:left;'))  ?>
<?php echo $this->Html->link('編集', array('controller' => 'tags', 'action' => 'edit', $tag['Tag']['id']) ,array( 'class' => 'btn btn-default', 'style' => 'float:right;'))  ?>
</div>
