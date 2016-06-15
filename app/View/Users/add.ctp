<div class="container">
<div class="users form">
<?php echo $this->Form->create('User', array('name' => 'userform')); ?>
	    <h3><?php echo __('Add User'); ?></h3>

        <div class="form-group">
	        <label class="col-sm-1 control-label" for="username">Username</label>
	        <div class="col-sm-11"> <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false)); ?>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label" for="Password">Password</label>
            <div class="col-sm-11"><?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false)); ?>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label" for="group_id">Group</label>
            <div class="col-sm-11"><?php   echo $this->Form->input('group_id', array('class' => 'form-control', 'label' => false)); ?>
        </div>
    &nbsp;
        <?php echo $this->element('postsearch'); ?>
    <button type="submit" class="btn btn-default" form="UserAddForm">Submit</button>
    <?php echo $this->Form->end(); ?>
	</div>
</div>
</div>
