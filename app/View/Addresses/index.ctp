<!-- address.jsファイル宣言-->
<?php echo $this->Html->script('address',array('inline' => false)); ?>


<div class="addresses index"><div class="container">
    <div class="form-group">
        <?php echo $this->Form->create(); ?>
        <h4><?php echo ('住所検索') ?></h4>
        <label class="col-md-1">郵便番号</label>
        <div class="col-md-9">
            <?php echo $this->Form->input('postnum', array('label'=> false, 'class'=>'form-control', 'id'=>'postnumber' )); ?>
        </div>
        <div class="col-md-2">
        <input type="button" value="住所取得" class="form-control" onClick="addressBtn()" />
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    &nbsp;
    <div class="form-group">
        <h4><?php echo ('住所検索結果') ?></h4>
        <div class="row">
            <label class="col-md-1">都道府県名</label>
            <?php echo $this->Form->create(); ?>
            <div class="col-md-11">
                <?php echo $this->Form->input('address1', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="row">
            <label class="col-md-1">市区町村名</label>
            <div class="col-md-11">
                <?php echo $this->Form->input('address2', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="row">
            <label class="col-md-1">町域名</label>
            <div class="col-md-11">
                <?php echo $this->Form->input('address3', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>


    <div>
            <?php #echo h($address['Address']['address1']) ?>
    </div>


<!--	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cd'); ?></th>
			<th><?php echo $this->Paginator->sort('col_2'); ?></th>
			<th><?php echo $this->Paginator->sort('postnum'); ?></th>
			<th><?php echo $this->Paginator->sort('col_4'); ?></th>
			<th><?php echo $this->Paginator->sort('col_5'); ?></th>
			<th><?php echo $this->Paginator->sort('col_6'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('address3'); ?></th>
			<th><?php echo $this->Paginator->sort('col_10'); ?></th>
			<th><?php echo $this->Paginator->sort('col_11'); ?></th>
			<th><?php echo $this->Paginator->sort('col_12'); ?></th>
			<th><?php echo $this->Paginator->sort('col_13'); ?></th>
			<th><?php echo $this->Paginator->sort('col_14'); ?></th>
			<th><?php echo $this->Paginator->sort('col_15'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['cd']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_2']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['postnum']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_4']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_5']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_6']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['address1']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['address2']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['address3']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_10']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_11']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_12']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_13']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_14']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['col_15']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $address['Address']['id']))); ?>
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
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
-->
</div>

<!--address.jsに渡す-->
<script>
    function addressBtn() {
        var postCd = document.getElementById("postnumber").value;
        addressSearch(postCd);
    }
 </script>
</div>
