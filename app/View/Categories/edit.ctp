<div class="container">
<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<h3><?php echo __('Edit Category'); ?></h3>
    <?php echo $this->Form->input('id'); ?>
    <fieldset>
    <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-5">
            <?php echo $this->Form->input('name',array('class' => 'form-control')); ?>
        </div>
        <div class="col-sm-offset-7">
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    </fieldset>
<?php echo $this->Form->postButton('一覧へ', array('controller' => 'categories',     'action' => 'index') ,array( 'class' => 'btn btn-default', 'style'  => 'float:right;'))  ?>
    <button type="submit" class="btn btn-default" style="float:left;" form="CategoryEditForm">
    Submit</button>
</div>
</div>
