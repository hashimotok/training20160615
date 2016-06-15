<div class="container">
<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
    <h3><?php echo __('Edit Tag'); ?></h3>
    <div class="form-group row" style="margin-bottom:15px;">
        <?php echo $this->Form->input('id'); ?>
        <div class="col-sm-5">
            <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
        </div>
        <div class="col-sm-offset-7"></div>
        <?php    #echo $this->Form->input('Post', array('class' => 'form-control')); ?>
    </div>

    <?php $id = $this->data['Tag']['id']; ?>

    <?php echo $this->Form->postButton('一覧へ', array('controller' => 'tags', 'action' => 'index') ,array( 'class' => 'btn btn-default', 'style'  => 'float:right;'))  ?>

    <button type="submit" class="btn btn-default" style="float:left;" form="TagEditForm">Submit</button>

    <!--<?php echo $this->Form->postLink('delete', array('action' => 'delete', $id)
    , array('confirm' => __('Are you sure you want to delete # %s?', $id)))
       # , array( 'class' => 'btn btn-default', 'style' => 'float:right;'))  ?>
-->
</div>
</div>
