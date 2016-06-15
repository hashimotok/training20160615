<div id="container">
    <div id="headerMenu" class="navbar navbar-fixed-top"><div class="container">
        <ul class="nav navbar-nav" style=" padding:10px; color:#fff; font-size:22px; font-weight:400;">training</ul>
        <ul  class="nav navbar-nav navbar-right">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Post<span class="caret"></span>
                <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List Post'), array('controller' => 'posts', 'action' => 'index')); ?></li>
                </ul>
            </li>

            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span>
                <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List User'), array('controller' => 'users', 'action' => 'index')); ?></li>
                </ul>
            </li>

            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category<span class="caret"></span>
                <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List Category'), array('controller' => 'categories', 'action' => 'index')); ?></li>
                </ul>
           </li>

           <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tag<span class="caret"></span>
                <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List Tag'), array('controller' => 'tags', 'action' => 'index')); ?></li>
                </ul>
           </li>

           <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Address<span class="caret"></span>
                <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('Insert Address'), array('controller' => 'addresses', 'action' => 'add')); ?></li>
<!--                        <li><?php #echo $this->Html->link(__('Search'), array('controller' => 'addresses', 'action' => 'index')); ?></li>-->
                </ul>
           </li>

          <!-- <li class="dropdown-toggle">
            <?php #echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))  ?>
            </li>-->
           
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopu    p="true" aria-expanded="false">Logout<span class="caret"></span>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
                    </li>
                </ul>
            </li>

                <li>
                    <button  type="submit" class="btn btn-default" id="openBox">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </li>
        </ul>
    </div></div><!--header-->
</div>

<div id="slideBox">
	<div class="form-group">
		<div class="container">

			<?php $tags = $this->requestAction('/posts/searchTags');
			      $categories = $this->requestAction('/posts/searchCategories');
			 ?>

			<h2><?php echo __('Search'); ?></h2>
            <?php echo $this->Form->create('Post', array('novalidate' => true, 'url' => array_merge(array('controller' => 'posts' , 'action' => 'index'), $this->params['pass']))); ?>
				
			<div class="form-group">
                <label class="col-sm-1 control-label">Title</label>
                <div class="col-sm-11">
                    <?php echo $this->Form->input('title' , array('class' => 'form-control', 'label'=> false)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">Category</label>
                <div class="form-inlinea col-sm-11">
					<?php echo $this->Form->input('category_id' , array('options' => $categories, 'class' => 'checkbox-inline','div' => false, 'multiple' => 'checkbox', 'label' => false)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">Tag</label>
                <div class="form-inline col-sm-11">
                        <?php echo $this->Form->input('tags',array('options' => $tags, 'class' => 'checkbox-inline','div' => false, 'multiple' => 'checkbox', 'label' => false)); ?>
                </div>
            </div>
            <?php $this->Form->end(); ?>
		    <button type="submit" id="PostIndexForm" class="btn btn-default" name="index">Search</button>
		    <?php echo $this->Form->end(); ?>
		</div>
	</div>
</div><!--slidebox-->
