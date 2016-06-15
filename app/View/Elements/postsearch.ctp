<!-- address.jsファイル宣言-->
<?php echo $this->Html->script('address',array('inline' => false)); ?>

<div class="addresses index"><div class="container">
    <div class="form-group row">
        <?php echo $this->Form->create(); ?>
        <h4><?php echo ('住所検索') ?></h4>
        <label class="col-md-1">郵便番号</label>
        <div class="col-md-4">
            <?php echo $this->Form->input('postnum', array('label'=> false, 'class'=>'form-control', 'id'=>'postnumber')); ?>
        </div>
<!--        <div class="col-md-2">
            <input type="button" value="住所取得" class="form-control" onClick="addressBtn()" />
        </div>-->
        <div class="col-md-offset-8"></div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-md-1">都道府県名</label>
            <div class="col-md-4">
                <?php echo $this->Form->input('User.address1', array('type' => 'select', 'class' => 'form-control', 'label' => false, 'id' => 'AddressAddress1', 'name' => 'address1')); ?>
            </div>

            <label class="col-md-1">市区町村名</label>
            <div class="col-md-4">
               <?php echo $this->Form->input('address2', 
                array('class' => 'form-control','label' => false, 'type' => 'select', 'id' => 'AddressAddress2', 'name' => 'address2'));
                ?>
            </div>
            <div class="col-md-offset-2"></div>
        </div>
        <?php echo $this->Form->hidden('User.address_id', array('id' => 'address_id')); ?>
        <?php echo $this->Form->end(); ?>
    </div>

<!--address.jsに渡す-->
<script type="text/javascript">
$ (function() {
        $('#postnumber').bind('keypress change', function() {
            var thisValueLength = $(this).val().length;
            var trueLength = 7;
            if(trueLength == thisValueLength) {
                addressBtn($(this).val());
            }
        });

        <?php
        if(isset($_POST['address1'])) {
            $select_postnum = $_POST['data']['User']['postnum']; ?> 
                addressBtn(<?php echo "\"".$select_postnum."\"" ?>);
        <?php } ?>
    });

function addressBtn() {
        var postCd = document.getElementById("postnumber").value;
        addressSearch(postCd);
    }

</script>
</div>
