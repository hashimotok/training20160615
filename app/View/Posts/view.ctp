<div class="container">
    <div class="sub" style="margin-top:20px;">
        <?php echo __('Id'); ?>:
        <?php echo h($post['Post']['id']); ?>
        <?php echo $this->Html->link('編集', array('controller' => 'posts', 'action' => 'edit',     $post['Post']['id']) ,array('style' => 'float:right;'))  ?>
    </div>

    <div class="view main">
        <div class="row">
            <div class="col-md-12" style="font-weight:500; font-size:25px;"> 
                <?php echo h($post['Post']['title']); ?>
            </div>
            <div class="sub"> 
                <div class="col-sm-2">
                    <?php echo h($post['Post']['created']); ?>
                </div>
                <div class="col-sm-10" style="text-align:right;">
                    <?php echo __('Category'); ?>[
                    <?php echo h($post['Category']['name']); ?>]
                </div>
            </div> 

            <div class="col-md-12"><hr></div>

            <div class="col-md-12" style="text-align:center;">
                <?php $base = $this->Html->url( "/files/image/attachment/" ); ?>
                <?php foreach($post['Image'] as $cnt => $image) { ?>
                    <a href="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" class=<?php echo "\"popupimg".$cnt."\"" ?> data-n=<?php echo "\"".$cnt."\"" ?>>
                        <img src="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" width="100px" >
                    </a>
                <?php } ?>
            </div>
            &nbsp;

            <div class="col-md-12 postBack">
		        <?php echo nl2br($post['Post']['body']); ?>
            </div>

            <div class="col-md-12"><hr></div>

            <div class="col-md-12 sub" >
                <?php echo __('Tag'); ?>:
			    <?php $tags = $post['Tag'];  ?>
			    <?php foreach($tags as $tag) :  ?>
                <?php echo h($tag['name']." "); ?>
			    <?php endforeach; ?>
            </div>
            <div>
                <div class="col-md-3 sub" >
                    <?php echo __('更新日時'); ?>
			        <?php echo h($post['Post']['modified']); ?>
                </div>
                <div class="col-md-9" style="text-align:right;">
                    <?php echo __('投稿者:'); ?>
                    <?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- view main -->
    &nbsp;
    <div> 
        <?php echo $this->Form->postButton('戻る', array(
            'controller' => 'posts', 'action' => 'index') ,array( 'class' => 'btn btn-default', 'style' => 'float:left; margin:0 0 10;'))  ?>
        <p id="pageTop" ><a href="#">page</br>top</a></p>
    </div>

    <div class="imageMain">
        <div class="slider">
            <div class="slideSet">
                <?php foreach($post['Image'] as $cnt => $image) { ?>
                    <a href="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" class="slide">
                        <img src="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" width="500px" >
                    </a>
                <?php } ?>
            </div><!--slideSet-->
        </div>
    </div>
    <div class="slideBtn container" >
        <button type="button" id="slider-prev" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-arrow-left"></span>前
        </button>
        <button type="button" id="slider-next" class="btn btn-default btn-sm">
            次<span class="glyphicon glyphicon-arrow-right"></span>
        </button>
    </div>
</div><!-- container -->

<!-- 背景,拡大画像 -->
<div id="popup-background">
</div>
<!--
<img id="popup-item" src="" />
-->

<!DOCTYPE html>
<html>
<head>
<script> 


(function($){ // この中では$はjQueryとして扱われる
	$('#popup-background').hide(); // 背景消す
	$('.slider').hide();
	$('#slider-next').hide();
	$('#slider-prev').hide();

    // フェードアウト
	$('#popup-background, .slide').bind('click',function(){
		$('.slider').fadeOut();
		$('#popup-background').fadeOut();
		$('.slide').fadeOut();
		$('#slider-next').fadeOut();
		$('#slider-prev').fadeOut();
	});

    $("[class^=popupimg]").bind('click',function(e){
        e.preventDefault(); //イベント中止
		$('#popup-background').fadeIn(); //背景表示
        
        console.log($(this).data("n"));

        var item_height = (568 / 2) * -1;
        var item_width = (500 / 2) * -1;

        var cssObj = {
            marginTop: item_height ,
            marginLeft: item_width,
        }

        $('.slider').css(cssObj).fadeIn('normal');


        $('.slider').fadeIn();
        $('.slide').fadeIn();
        $('.sliderSet').fadeIn();
        $('#slider-next').fadeIn();
        $('#slider-prev').fadeIn();

        //var slideCurrent;
        slideCurrent = $(this).data("n");
         $('.slideSet').animate({
           left: slideCurrent * -slideWidth
         });

    });

        $('.slide').bind('click',function(e){
                e.preventDefault(); //イベント中止
	});

	var slideWidth = $('.slide').outerWidth(); //slide幅
	var slideNum = $('.slide').length;
	var slideSetWidth = slideWidth * slideNum;
	$('.slideSet').css('width', slideSetWidth);

    //var slideCurrent = 0;
    var sliding = function(){
		if(slideCurrent < 0 ) {
			slideCurrent = slideNum - 1;
		} else if(slideCurrent > slideNum - 1) {
			slideCurrent = 0;
        }

        $('.slideSet').animate({
            left: slideCurrent * -slideWidth
		});
    }

	$('#slider-next').click(function(){
        slideCurrent++;
  		sliding();
	});

    $('#slider-prev').click(function(){
        slideCurrent--;
        sliding();
    });
    var slideCurrent;



      $(function(){
            var topBtn = $('#pageTop');
                  topBtn.hide();
            
      $(window).scroll(function(){
          if($(this).scrollTop() > 50) {
              topBtn.fadeIn();
          } else {
              topBtn.fadeOut();
          }
      });

      topBtn.click(function(){
          $('body,html').animate({
              scrollTop:0
          }, 500);
          return false;
      });
  });
})(jQuery)

</script> 
</head>
<body>




</body>
</html>

