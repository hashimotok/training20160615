<div class="row">

<div class="container">
<div class="posts form" style="margin-top:20px;">
<?php echo $this->Form->create('Post', array( 'type'=>'file')); ?>
	<fieldset>
	<div class="form-group">
        <label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10">
	<?php	echo $this->Form->input('title', array('class' => 'form-control', 'label' => false)); ?>
	</div></div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Body</label>
        <div class="col-sm-10">
	<?php	echo $this->Form->input('body', array('class' => 'form-control', 'label' => false)); ?>
	</div></div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
	<?php	echo $this->Form->input('category_id', array('class' => 'form-control', 'label' => false)); ?>
        </div></div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Tag</label>
        <div class="col-sm-10">
	<?php	echo $this->Form->input('Tag', array('class' => 'form-control', 'label' => false)); ?>
	</div></div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
        <?php   echo $this->Form->input('Image..attachment', array('type' => 'file', 'label' => 'Image' ,'multiple', 'class' => 'form-control', 'label' => false));?>
        </div></div>
    	<button type="submit" class="btn btn-default" id="postBtn">Submit</button>
    </fieldset>
    </div>
</div>
</div>
</div>
