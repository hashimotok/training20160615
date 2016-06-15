<div class="popup-background main">
<div class="container" style=" position:absolute; top:30%;">
    <?php
        echo $this->Form->create('User', array(
            'url' => array(
            'controller' => 'users',
            'action' => 'login'
            )
        ));
    ?>

    <div class="row">
        <div class="form-group" >
            <div class="col-xs-offset-4 col-xs-4 col-xs-offset-4">
                <?php echo ('User Name') ?>
            </div>
            <div class="col-xs-offset-4 col-xs-4 col-xs-offset-4" style="margin-bottom:10px;">
            <?php echo $this->Form->input('User.username',array('class' => 'form-control', 'label' => false));?>
            </div>
            &nbsp;
            <div class="col-xs-offset-4 col-xs-4 col-xs-offset-4">
                    <?php echo ('Password') ?>
                </div>
            <div class="col-xs-offset-4 col-xs-4 col-xs-offset-4" style="margin-bottom:10px;">
                <?php echo $this->Form->input('User.password',array('class' => 'form-control' , 'label'=> false));?>
            </div>
            &nbsp;
        </div>

        <div class="col-xs-offset-4 col-xs-4 col-xs-offset-4">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </div>
    </div>
</div>
</div>
