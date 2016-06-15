<div class="container">
<div class="users form">
    <?php echo $this->Form->create('User'); ?>
        
    <h3><?php echo __('Edit User'); ?></h3>

    <div style="margin-bottom:15px;">
        <?php echo $this->Form->input('id'); ?>
        <div class="form-group row">
            <div class="col-sm-5">
                <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-offsset-7"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5">
                <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-offset-7"></div>
        </div>  

        <div class="form-group row">
            <div class="col-sm-5">
                <?php echo $this->Form->input('group_id', array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-offset7"></div>
            <?php $id = $this->data['User']['id']; ?>
        </div>
    </div>

<?php echo $this->Html->link('一覧へ', array('controller' => 'users', 'action' => 'index') , array( 'class' => 'btn btn-default', 'style'  => 'float:right;'))  ?>

 <?php #echo $this->Form->postButton('Submit', array('action' => 'edit', $id) ,array( 'class' => 'btn btn-default', 'style'  => 'float:left;' , 'form' => 'UserEditForm'))  ?>
</div>
<button type="submit" class="btn btn-default" >Submit</button>
</div>
