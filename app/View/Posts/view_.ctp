<div class="container">
<div class="postsview">
    <!--<h2><?php echo __('Post'); ?></h2>-->
    <dl>
        <!--<dt><?php echo __('Title'); ?></dt>-->
        <dd><h3>
            <?php echo h($post['Post']['title']); ?>
        </h3></dd>
        <hr>
    
        <dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
        </dd>

        <dt><?php echo __('Category'); ?></dt>
        <dd>
            <?php echo h($post['Category']['name']); ?>
            &nbsp;
        </dd>

		<!--<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
        </dd>-->

		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
        
        <dt><?php echo __('Image'); ?></dt>
        <dd>
		    <?php $base = $this->Html->url( "/files/image/attachment/" ); ?>
            <?php foreach($post['Image'] as $cnt => $image) { ?>
            <a href="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" class=<?php echo "\"popupimg".$cnt."\"" ?> data-n=<?php echo "\"".$cnt."\"" ?>>
                <img src="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" width="100px" >
		    </a>
            <?php } ?>
        </dd>

			&nbsp;
        
        <dt><?php echo __('Tag'); ?></dt>
        <dd>
			<?php $tags = $post['Tag'];  ?>
			<?php foreach($tags as $tag) :  ?>
                        	<?php echo h($tag['name']); ?>
			<?php endforeach; ?>
                        &nbsp;
        </dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('投稿者'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>

    <div class="slider">
        <div class="slideSet">
            <?php foreach($post['Image'] as $cnt => $image) { ?>
                <a href="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" class="slide">
                    <img src="<?php echo $base . $image['dir'] . '/' . $image['attachment']; ?>" width="500px" >
                </a>
            <?php } ?>
        </div><!--slideSet-->
    </div>
    <div class="slideBtn container" >
        <button type="button" id="slider-prev" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-arrow-left"></span>前
        </button>
        <button type="button" id="slider-next" class="btn btn-default btn-sm">
            次<span class="glyphicon glyphicon-arrow-right"></span>
        </button>
    </div>

</div>
</div>

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
/*
	$('.popupimg').bind('click',function(e){
		e.preventDefault(); //イベント中止

		var img = new Image(); // image読み込み？
		var imgsrc = this.href; // クリックされたaタグのhrefを取得する

		$(img).load(function(){ // imageのロード？
			$('#popup-item').attr('src',imgsrc); // #popup-itemにimgsrcをsrcという名前でセット？
			
			$('#popup-item').each(function(){ // 合致？したものに全て関数実行
				if(this.complete) {
					imgload(img);
					return;
				}
			}); 
		});

		$('#popup-item').bind('load',function(){
			imgload(img); // imgload関数呼び出し
		});
		img.src = imgsrc; // Image()に画像を読み込ませる？
	});

	// フェードイン
	function imgload(imgsource){
		$('#popup-background').fadeIn(function(){
			var item_height = (imgsource.height / 2) * -1;
			var item_width = (imgsource.width / 2) * -1;

			var cssObj = {
				marginTop: item_height ,
				marginLeft: item_width,
				width:imgsource.width,
				height:imgsource.height
			}

			$('#popup-item').css(cssObj).fadeIn('normal');
		});
	}
*/
	// フェードアウト
	$('#popup-background, .slide').bind('click',function(){
		$('.slider').fadeOut();
		$('#popup-background').fadeOut();
		$('.slide').fadeOut();
		$('#slider-next').fadeOut();
		$('#slider-prev').fadeOut();
	});


    //$('.popupimg').bind('click',function(e){
    $("[class^=popupimg]").bind('click',function(e){
        e.preventDefault(); //イベント中止
		$('#popup-background').fadeIn(); //背景表示
        
        console.log($(this).data("n"));

        var item_height = (800 / 2) * -1;
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
})(jQuery)

</script> 
</head>
<body>




</body>
</html>

