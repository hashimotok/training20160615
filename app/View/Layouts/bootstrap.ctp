<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('base-style.css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.12.4.min.js');
	?>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrapの基本テンプレート</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

<style>
    body {
        padding-top: 50px;
    }
</style>
<script>
	$(document).ready(function(){
       		$('#openBox').click(function(){
               		$('#slideBox').slideToggle();
       		});
    });

</script>

</head>
<body>
    <!-- エレメント読込 -->
    <?php if($this->action != 'login') { ?>
	    <?php echo $this->element('header', array(), array('cache' => true)); ?>
    <?php } ?>

	<div id="content">
		<?php #echo $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>

	</div>
		<div id="footer">
			<?php #echo $this->Html->link(
				#	$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				#	'http://www.cakephp.org/',
				#	array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				#);
			?>
			<p>
				<?php #echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php #echo $this->element('sql_dump'); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>

</body>
</html>
