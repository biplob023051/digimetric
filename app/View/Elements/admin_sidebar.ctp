<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse"> 
    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu --> 
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
      <li class="sidebar-toggler-wrapper"> 
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"> </div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
      </li>
      <li class="sidebar-search-wrapper"> 
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <?php /*?><form class="sidebar-search" action="extra_search.html" method="POST">
          <div class="form-container">
            <div class="input-box"> <a href="javascript:;" class="remove"> </a>
              <input type="text" placeholder="Search..."/>
              <input type="button" class="submit" value=" "/>
            </div>
          </div>
        </form><?php */?><br />
        <!-- END RESPONSIVE QUICK SEARCH FORM --> 
      </li>
      <li class="start active "> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> <i class="fa fa-home"></i> <span class="title"> Dashboard </span> </a> </li>
      
      <li> <a href="<?php echo ADMIN_BASEURL; ?>users/manage_user"> <i class="fa fa-user"></i> <span class="title"> Manage Users </span><span class=""></span> <span class="arrow "> </span> </a>
      <li> <a href="<?php echo ADMIN_BASEURL; ?>users/manage_euser"> <i class="fa fa-user"></i> <span class="title"> Manage Early Users </span><span class=""></span> <span class="arrow "> </span> </a>

      </li>
     <!-- <li> <a href="<?php echo ADMIN_BASEURL; ?>start_cause/manage_cause/"> <i class="fa fa-user"></i> <span class="title"> Manage cause </span><span class=""></span> <span class="arrow "> </span> </a>
      </li>
	  <li> <a href="<?php echo ADMIN_BASEURL; ?>banners/manage_banners/"> <i class="fa fa-user"></i> <span class="title"> Manage banners </span><span class=""></span> <span class="arrow "> </span> </a>
      </li>-->
      <li> <a href="<?php echo ADMIN_BASEURL; ?>blogs/manage_blog"> <i class="fa fa-road"></i> <span class="title"> Manage Blogs </span> <span class="arrow"> </span> </a>
      
      </li>
      <!--<li> <a href="<?php echo ADMIN_BASEURL; ?>promotion/manage_promotions"> <i class="fa fa-certificate"></i> <span class="title"> Promotion & Grading </span> <span class="arrow"> </span> </a>
        <?php /*?><ul class="sub-menu" style="display: none;">
           
          <!--  <li> <a href="<?php //echo ADMIN_BASEURL; ?>promotion/manage_process_promotion"> <i class="fa fa-dashboard"></i> Process Promotion </a> </li>-->
            <li> <a href="<?php echo ADMIN_BASEURL; ?>promotion/manage_promotions"> <i class="fa fa-archive"></i> Promotion Application </a> </li>
            <!--<li> <a href="<?php echo ADMIN_BASEURL; ?>promotion/relinquish_appointment"> <i class="fa fa-ban"></i>Relinquish Appointment </a> </li>-->
        </ul><?php */?>
      </li>-->
      
      	<!--<li> <a href="javascript:;"> <i class="fa fa-hand-o-right"></i> <span class="title"> Training Management </span> <span class="arrow"> </span> </a>
        <ul class="sub-menu" style="display: none;">
          <li> <a href="<?php echo ADMIN_BASEURL; ?>training/manage_training_application"> <i class="fa fa-video-camera"></i> Training Application </a> </li>
          <li> <a href="<?php echo ADMIN_BASEURL; ?>training/manage_training_exam"> <i class="fa fa-arrows-alt"></i> Exams & Attendance </a> </li>
        </ul>
      </li>
      
        <li> <a href="javascript:;"> <i class="fa fa-users"></i> <span class="title"> Communication Hub </span> <span class="arrow"> </span> </a>
          <ul class="sub-menu" style="display: none;">
            <li> <a href="<?php echo ADMIN_BASEURL; ?>communication_hub/manage_news"> <i class="fa fa-file-o"></i> Create News </a> </li>
            <li> <a href="<?php echo ADMIN_BASEURL; ?>communication_hub/send_email"> <i class="fa fa-align-center"></i> Broadcast Email </a> </li>
            <li> <a href="<?php echo ADMIN_BASEURL; ?>communication_hub/send_sms"> <i class="fa fa-comment-o"></i> Send SMS </a> </li>
          </ul>
        </li>
        
        <li> <a href="javascript:;"> <i class="fa fa-briefcase"></i> <span class="title <?php //$pagename=$this->uri->segment(1); if($pagename=="meeting"){ echo 'class="active"'; }?>" >Meeting Management </span> <span class="arrow"> </span> </a>
          <ul class="sub-menu" style="display: none;">
            <li> <a href="<?php echo ADMIN_BASEURL; ?>meeting/manage_meeting"> <i class="fa fa-star-o"></i>Create  Meeting </a> </li>
            <li> <a href="<?php echo ADMIN_BASEURL; ?>meeting/add_meeting_volunteers"> <i class="fa fa-video-camera"></i> volunteers Attendence</a> </li>
          </ul>
        </li>
        -->
        <li> <a href="javascript:;"> <i class="fa fa-arrow-right"></i> <span class="title"> Tests Management  </span> <span class="arrow"> </span> </a>
          <ul class="sub-menu" style="display: none;">
            <li> <a href="<?php echo ADMIN_BASEURL; ?>tests/add_test"> <i class="fa fa-user-md"></i> Create Test</a> </li>
           <li> 
            <a href="<?php echo ADMIN_BASEURL; ?>tests/manage_test"> 
            <i class="fa fa-arrow-right">
            </i>
            All Tests</a>
             </li>
          </ul>
        </li>
        <li> <a href="javascript:;"> <i class="fa fa-arrow-right"></i> <span class="title"> Jobs Management  </span> <span class="arrow"> </span> </a>
          <ul class="sub-menu" style="display: none;">
            <!--<li> <a href="<?php echo ADMIN_BASEURL; ?>tests/add_test"> <i class="fa fa-user-md"></i> Create Test</a> </li>-->
           <li> 
            <a href="<?php echo ADMIN_BASEURL; ?>jobs/manage_job"> 
            <i class="fa fa-arrow-right">
            </i>
            All Jobs</a>
             </li>
          </ul>
        </li>
        
        <li> <a href="javascript:;"> <i class="fa fa-arrow-right"></i> <span class="title"> Field Management  </span> <span class="arrow"> </span> </a>
          <ul class="sub-menu" style="display: none;">
            <li> <a href="<?php echo ADMIN_BASEURL; ?>areas/manage_area"> <i class="fa fa-user-md"></i> Area Management</a> </li>
            <li> <a href="<?php echo ADMIN_BASEURL; ?>categories/manage_category"> <i class="fa fa-user-md"></i> Field Management</a> </li>
            <li> <a href="<?php echo ADMIN_BASEURL; ?>sub_categories/manage_subcategory"> <i class="fa fa-user-md"></i> Subfield Management</a> </li>
          </ul>
        </li>
        <li> 
<a href="<?php echo ADMIN_BASEURL; ?>candidate_tests/manage_candidate_tests">
 <i class="fa fa-arrow-right"></i> <span class="title"> Test Takers  </span> <span class="arrow"> </span> </a>
          
        </li>
         <li> 
            <a href="<?php echo ADMIN_BASEURL; ?>job_candidates/event_test_takers">
             <i class="fa fa-arrow-right"></i> <span class="title"><?php echo __('Event Test Takers'); ?></span> <span class="arrow"> </span> </a>
        </li>
        <li> 
            <a href="<?php echo ADMIN_BASEURL; ?>settings/manage_settings">
             <i class="fa fa-arrow-right"></i> <span class="title"><?php echo __('Settings'); ?></span> <span class="arrow"> </span> </a>
        </li>
        	<!--<li> <a href="<?php echo ADMIN_BASEURL; ?>help"> <i class="fa fa-umbrella"></i> <span class="title"> Help & Support </span> <span class="arrow"> </span> </a>
       
        </li>-->
    </ul>
    <!-- END SIDEBAR MENU --> 
  </div>
</div>
