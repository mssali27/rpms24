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
	<?php echo $this->Html->script('jquery'); ?>
	<?php echo $this->Html->script('jquery.validate.min'); ?>
	<script type="text/javascript"> 
		//var webroot = '<?php echo $this->webroot; ?>'; 
	</script>
	<?php //echo $this->Html->script('core'); ?>
	<!-- js files -->
	<?php echo $this->Html->script('jquery.min.js'); ?>
	<?php echo $this->Html->script('bootstrap.js'); ?>
	<?php echo $this->Html->script(array('common.js','custom.js'));?>
	<!-- stylesheets -->
	<?php //echo $this->Html->css('cake.generic.css'); ?>
	<?php echo $this->Html->css('bootstrap.min.css'); ?>
	<?php echo $this->Html->css('repelev.css'); ?>
	<?php echo $this->Html->css('bootstrap-theme.min.css'); ?>

</head>
<body>
<div id="header">
			
			<div class="container">
				<div class="row">
				
					<div class="col-xs-3">
						<img src="<?php echo $this->webroot; ?>img/review-elevator.png" alt="Review Elevator" class="logo" />
					</div>
					
					<div class="col-xs-4 col-xs-offset-5">
					<button type="button" class="btn topicon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
					<button type="button" class="btn topicon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					<button type="button" class="btn topicon"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></button>
					</div>
					
					
					
				</div>
			</div>
				
				<nav class="navbar navbar-inverse">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<h1 class="maintitle">review <b>elevator</b></h1>
							</div>
							<div class="col-sm-3 col-sm-offset-6">
								<button type="button" class="btn btn-adduser">+ new user</button>
							</div>
						</div>
					</div>
				</nav>
				
			</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>