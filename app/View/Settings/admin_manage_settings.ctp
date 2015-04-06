<?php

echo $this->Html->css('admin_css/assets/plugins/gritter/css/jquery.gritter.css');
echo $this->Html->css('admin_css/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
echo $this->Html->css('admin_css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
echo $this->Html->css('admin_css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
echo $this->Html->css('admin_css/assets/plugins/jqvmap/jqvmap/jqvmap.css');
echo $this->Html->css('admin_css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css');
?>
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"><?php echo $title_for_layout; ?></h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="javascript:void(0);"><?php echo __('Event Test Settings'); ?></a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>

<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> <a data-toggle="tab" href="#tab_1_5"><?php echo __('Event Test Settings'); ?></a> </li>
            </ul>

            <div class="tab-content"> 

                <!--end tab-pane-->
                <div id="tab_1_5" >
                    <?php echo $this->Form->create('Setting', array(
					    'inputDefaults' => array(
					        'div' => 'form-group',
					        'label' => array(
					            'class' => 'control-label col-md-4'
					        ),
					        'wrapInput' => 'col-md-8',
					        'class' => 'flare'
					    ),
					    'type' => 'file',
					    'admin' => true,
					    'novalidate'=>'novalidate'
					)); ?>
                    <!-- <div class="form-group flare">
                <label class="control-label col-md-4"> First Name</label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][first_name]" id="first_name" type="text" value="<?php echo !empty($resultset['first_name']) ? $resultset['first_name'] : "";?>"/>
                </div>
              </div> -->
                  <?php echo $this->Form->input('confirmation_code', array('label'=>array('text'=>__('Confirmation Code')), 'value' => $site_settings['confirmation_code'], 'placeholder' => __('Confirmation Code'))); 

                  ?>
                  <?php echo $this->Form->input('business_user_name', array('label'=>array('text'=>__('Business User Name (Company)')), 'value' => $site_settings['business_user_name'], 'placeholder' => __('Business User Name(Company)'))); 

                  ?>
					<?php echo $this->Form->submit(__('SAVE'), array(
                        'div' => false,
                        'class' => 'btn theme-btn green pull-left'
                    )); ?>
					<?php echo $this->Form->end(); ?>
                   
                </div>
                <!--end tab-pane--> 
            </div>
        </div>
    </div>
    <!--end tabbable--> 
</div>


