<div class="container">
<div class="posts form">
<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
	<fieldset>
		<h3><?php echo __('Edit Post'); ?></h3>
	<div class="form-group">
    <?php echo $this->Form->input('id'); ?>
    <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
    &nbsp;
    <?php echo $this->Form->input('body', array('class' => 'form-control'));?>
    &nbsp;
    <div class="row">
        <div class="col-sm-5">
            <?php echo $this->Form->input('category_id', array('class' => 'form-control')); ?>
        </div>
        <div class="col-sm-offset-7"></div>
    </div>
    &nbsp;
    <div class="row">
        <div class="col-sm-5">
            <?php echo $this->Form->input('Tag', array('class' => 'form-control')); ?>
        </div>
        <div class="col-sm-offset-7"></div>
    </div>
    &nbsp;
    <?php #echo $this->Form->file('image',array('type' => 'file'));?>
    <?php
                $base = $this->Html->url( "/files/image/attachment/" );
                foreach($post['Image'] as $id => $image) {
			if (!empty($image['active']) && $image['active']) { ?>
                		<?php echo  $this->Html->image( $base . $image['dir'] . '/' . $image['attachment'] );
				     echo  $this->Form->input('Image.'. ($id+1) .'.attachment.id', array('type' => 'hidden', 'value' => $image['id']));
                                     echo  $this->Form->input('Image.'. ($id+1) .'.attachment.active', array('type' => 'checkbox' , 'label' => 'active', 'checked' => true ));
				?>
</br>
				<?php
			}
		} 
                echo $this->Form->input('Image..attachment', array('type' => 'file', 'label' => 'Image' ,'multiple'));
		?>
	</fieldset>
<button type="submit" class="btn btn-default">Submit</button>

<?php echo $this->Form->postButton('一覧へ', array('controller' => 'posts',     'action' => 'index') ,array( 'class' => 'btn btn-default', 'style'  => 'float    :right;'))  ?>
</div>
</div>
