
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

$cakeDescription = __d('cake_dev', 'Digimetrik');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>
<?php echo $cakeDescription ?>:
<?php echo $title_for_layout; ?>
</title>

<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<?php
  echo $this->Html->css('admin_css/assets/plugins/font-awesome/css/font-awesome.min.css');
  echo $this->Html->css('admin_css/assets/plugins/bootstrap/css/bootstrap.min.css');
  echo $this->Html->css('admin_css/assets/plugins/uniform/css/uniform.default.css');
  echo $this->Html->css('admin_css/assets/plugins/bootstrap/css/bootstrap.min.css');
  echo $this->Html->css('admin_css/assets/plugins/select2/select2.css');
  echo $this->Html->css('admin_css/assets/plugins/select2/select2-metronic.css');
  echo $this->Html->css('admin_css/style-metronic.css');
  echo $this->Html->css('admin_css/style.css');
  echo $this->Html->css('admin_css/style-responsive.css');
  echo $this->Html->css('admin_css/plugins.css');
  echo $this->Html->css('admin_css/themes/default.css');
  echo $this->Html->css('admin_css/pages/login-soft.css');
  echo $this->Html->css('admin_css/custom.css');
  
?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
   
		<!--<img src="<?php //  echo $this->webroot;?>img/logo.png" alt="pic"/>-->
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 © Copyright 2014 digimetrik.com . All Rights Reserved.
</div>
<?php // echo $this->element('sql_dump'); ?>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<?php
echo $this->Html->script('admin_js/jquery-1.10.2.min.js');
echo $this->Html->script('admin_js/jquery-migrate-1.2.1.min.js');
echo $this->Html->script('admin_js/bootstrap/js/bootstrap.min.js');
echo $this->Html->script('admin_js/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
echo $this->Html->script('admin_js/jquery-slimscroll/jquery.slimscroll.min.js');
echo $this->Html->script('admin_js/jquery.blockui.min.js');
echo $this->Html->script('admin_js/jquery.cokie.min.js');
echo $this->Html->script('admin_js/uniform/jquery.uniform.min.js');
echo $this->Html->script('admin_js/jquery-validation/dist/jquery.validate.min.js');
echo $this->Html->script('admin_js/backstretch/jquery.backstretch.min.js');
echo $this->Html->script('admin_js/select2/select2.min.js');
echo $this->Html->script('admin_js/core/app.js');
echo $this->Html->script('admin_js/custom/login-soft.js');
?>    
<script>
	jQuery(document).ready(function() {     
	  App.init();
	  Login.init();
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>