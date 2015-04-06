
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
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
<?php
  echo $this->Html->script('admin_js/jquery-1.10.2.min.js');
  echo $this->Html->script('admin_js/jquery-migrate-1.2.1.min.js');
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
  echo $this->Html->script('ckeditor/ckeditor');

?></head>
<body class="page-header-fixed">
<!-- BEGIN HEADER -->

    <?php echo $this->element('admin_menu');?>
<!-- END HEADER -->
    <div class="clearfix"> </div>
<!-- BEGIN CONTAINER -->
    <div class="page-container"> 
  <!-- BEGIN SIDEBAR -->
	<?php echo $this->element('admin_sidebar');?>
  <!-- END SIDEBAR --> 
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content"> 
         <span style="color:red;"><?php echo $this->Session->flash(); ?></span>
	 <?php echo $this->fetch('content'); ?>
    </div>
    <div class="clearfix"> </div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="footer">
  <div class="footer-inner"> © Copyright Test. All Rights Reserved </div>
  <div class="footer-tools"> <span class="go-top"> <i class="fa fa-angle-up"></i> </span> </div>
</div>
<?php
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
echo $this->Html->script('admin_js/bootstrap-datepicker/js/bootstrap-datepicker.js');
/*echo $this->Html->script('admin_js/jqvmap/jqvmap/jquery.vmap.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.russia.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.world.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.europe.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.germany.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.usa.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/data/jquery.vmap.sampledata.js');*/
echo $this->Html->script('admin_js/flot/jquery.flot.min.js');
echo $this->Html->script('admin_js/flot/jquery.flot.resize.min.js');
echo $this->Html->script('admin_js/flot/jquery.flot.categories.min.js');
echo $this->Html->script('admin_js/jquery.pulsate.min.js');
echo $this->Html->script('admin_js/bootstrap-daterangepicker/moment.min.js');
echo $this->Html->script('admin_js/bootstrap-daterangepicker/daterangepicker.js');
echo $this->Html->script('admin_js/fullcalendar/fullcalendar/fullcalendar.min.js');
echo $this->Html->script('admin_js/jquery-easy-pie-chart/jquery.easy-pie-chart.js');
echo $this->Html->script('admin_js/jquery.sparkline.min.js');
echo $this->Html->script('admin_js/custom/index.js');
echo $this->Html->script('admin_js/custom/tasks.js');
echo $this->Html->script('admin_js/custom/search.js');
?>  

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>