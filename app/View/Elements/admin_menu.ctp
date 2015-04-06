<div class="header navbar navbar-fixed-top"> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="header-inner"> 
    <!-- BEGIN LOGO --> 
    <a class="navbar-brand" href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> <!--<img height="27" src="<?php  echo $this->webroot;?>img/logo.png" alt="pic"/>--></a> 
    <!-- END LOGO --> 
    <!-- BEGIN HORIZANTAL MENU -->
    
    <div class="hor-menu hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <li class="classic-menu-dropdown"> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Dashboard <span class="selected"> </span> </a> </li>
        <?php //if($type == 'admin'){ ?>
        <li class="classic-menu-dropdown"> <a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" href=""> System Setup <span class="selected"> </span> </a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu"> <a href="javascript:;"> Users Administration </a>
              <ul class="dropdown-menu">
                <li> <a href="<?php echo ADMIN_BASEURL; ?>users/manage_user"> Manage Users </a> </li>
              </ul>
            </li>
            <li class="dropdown-submenu"> <a href="javascript:;">Content Management </a>
              <ul class="dropdown-menu">
<!--                <li> <a href="<?php echo ADMIN_BASEURL; ?>pages/">About us</a> </li>
                <li> <a href="<?php echo ADMIN_BASEURL; ?>pages/">How it works</a> </li>
                <li> <a href="<?php echo ADMIN_BASEURL; ?>pages/">Terms & conditions</a> </li>-->
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    
    <!-- END HORIZANTAL MENU --> 
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <img src="<?php  echo $this->webroot;?>img/admin_img/menu-toggler.png" alt=""/> </a> 
    <!-- END RESPONSIVE MENU TOGGLER --> 
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">
      <li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <!--<img alt="" src="<?php echo ADMIN_BASEURL; ?>assets/img/avatar1_small.jpg"/>--> <span class="username"> Admin </span> <i class="fa fa-angle-down"></i> </a>
        <ul class="dropdown-menu">
          <!--<li> <a href="extra_profile.html"> <i class="fa fa-user"></i> My Profile </a> </li>-->
<!--          <li> 
              <a href="<?php echo ADMIN_BASEURL; ?>commonfunctions/updateprofile"> 
                  <i class="fa fa-calendar" style="margin-right:5px;"></i>Update Profile </a>
          </li>-->
          <!-- <li> <a href="#"> <i class="fa fa-envelope"></i> Change Password </a> </li>--> 
          <!--<li><a href="#"><i class="fa fa-tasks"></i> My Tasks<span class="badge badge-success">7</span></a></li>-->
          <li class="divider"> </li>
          <li> <a href="javascript:;" id="trigger_fullscreen"> <i class="fa fa-arrows"></i> Full Screen </a> </li>
          <!--<li> <a href="<?php echo ADMIN_BASEURL; ?>setting/lock_screen"> <i class="fa fa-lock"></i> Lock Screen </a> </li>-->
          <li> <a href="<?php echo ADMIN_BASEURL; ?>admins/logout"> <i class="fa fa-key"></i> Log Out </a> </li>
        </ul>
      </li>
      <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU --> 
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
