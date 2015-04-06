<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<?php
echo $this->Html->css('admin_css/assets/plugins/gritter/css/jquery.gritter.css');
echo $this->Html->css('admin_css/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
echo $this->Html->css('admin_css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
echo $this->Html->css('admin_css/assets/plugins/jqvmap/jqvmap/jqvmap.css');
echo $this->Html->css('admin_css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css');
echo $this->Html->css('admin_css/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
?>
<!-- incluse all the scripts and css here in this file -->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Dashboard <small>statistics and more</small> </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php ADMIN_BASEURL; ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Dashboard </a> </li>
      <!--<li class="pull-right">
        <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range"> <i class="fa fa-calendar"></i> <span> </span> <i class="fa fa-angle-down"></i> </div>
      </li>-->
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue">
      <div class="visual"> <i class="fa fa-comments"></i> </div>
      <div class="details">
        <div class="number"> </div>
        <div class="desc"> Registered Users </div>
      </div>
      <a class="more" href="<?php echo ADMIN_BASEURL; ?>users/manage_user"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
<!--  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat green">
      <div class="visual"> <i class="fa fa-shopping-cart"></i> </div>
      <div class="details">
        <div class="number"></div>
        <div class="desc"> Registered Organisations </div>
      </div>
      <a class="more" href="<?php echo ADMIN_BASEURL; ?>organisation/manage_organisation"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple">
      <div class="visual"> <i class="fa fa-globe"></i> </div>
      <div class="details">
        <div class="number"></div>
        <div class="desc"> Causes </div>
      </div>
      <a class="more" href="<?php echo ADMIN_BASEURL; ?>start_cause/manage_cause"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat yellow">
      <div class="visual"> <i class="fa fa-bar-chart-o"></i> </div>
      <div class="details">
        <div class="number"></div>
        <div class="desc"> Banners </div>
      </div>
      <a class="more" href="<?php echo ADMIN_BASEURL; ?>banners/manage_banners"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>-->
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix"> </div>
<div class="clearfix"> </div>


<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --> 
<!-- BEGIN CORE PLUGINS --> 
<!--[if lt IE 9]>
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/excanvas.min.js"></script> 
<![endif]--> 
<?php
/*echo $this->Html->script('admin_js/jquery-1.10.2.min.js');
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

echo $this->Html->script('admin_js/jqvmap/jqvmap/jquery.vmap.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.russia.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.world.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.europe.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.germany.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/maps/jquery.vmap.usa.js');
echo $this->Html->script('admin_js/jqvmap/jqvmap/data/jquery.vmap.sampledata.js');


echo $this->Html->script('admin_js/flot/jquery.flot.min.js');
echo $this->Html->script('admin_js/flot/jquery.flot.resize.min.js');
echo $this->Html->script('admin_js/flot/jquery.flot.categories.min.js');
echo $this->Html->script('admin_js/jquery.pulsate.min.js');
echo $this->Html->script('admin_js/bootstrap-daterangepicker/moment.min.js');
echo $this->Html->script('admin_js/bootstrap-daterangepicker/daterangepicker.js');
echo $this->Html->script('admin_js/fullcalendar/fullcalendar/fullcalendar.min.js');
echo $this->Html->script('admin_js/jquery-easy-pie-chart/jquery.easy-pie-chart.js');
echo $this->Html->script('admin_js/jquery.sparkline.min.js');
echo $this->Html->script('admin_js/core/app.js');
echo $this->Html->script('admin_js/custom/index.js');
echo $this->Html->script('admin_js/custom/tasks.js');*/
?>    
<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initDashboardDaterange();
   Index.initIntro();
   Tasks.initDashboardWidget();
});
</script>

<!-- END JAVASCRIPTS --> 

