<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> Job </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      
      <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> Job </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->

<div class="row profile">
  <div class="col-md-12"> 
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> Job -->  <?php echo $resultset['title']; ?></a>
            
 </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"></div>
              <!--end row-->
              <div class="tab-pane active" id="tab1"></div>
             <?php
			($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) :(list($controller) = array(NULL));
			($form_data["controller"]) ? (list($action) = array($form_data["action"])) :(list($action) = array(NULL));
			($form_data["id"]) ? (list($id) = array($form_data["id"])) :(list($id) = array(NULL));
                        //debug($this->validationErrors);
//debug($resultset);
//debug($job_categories);
			//($this->validationErrors) ? (list($errors) = array($this->validationErrors["User"])) :(list($errors) = array(NULL));
                        $errors = !empty($this->validationErrors["User"]) ? $this->validationErrors["User"] :  array();
//                        $errors =  $this->validationErrors["User"];
			 ?>
             <form name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL;?><?php echo $controller; ?>/<?php echo  $action; ?>/<?php echo  $id ;?>" method="post">
			
             <input type="hidden" name="data[Job][id]" value="<?php echo !empty($this->params['pass'][0]) ? $this->params['pass'][0]: "";?>" />
             <div class="form-group flare">
              <?php //echo !empty($errors["first_name"][0]) ? $errors["first_name"][0] : "";?>
                <label class="control-label col-md-4"> Title<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[Job][title]" id="title" type="text" value="<?php echo !empty($resultset['title']) ? $resultset['title'] : "";?>"/>
                </div>
              </div>
             
              <div class="form-group flare">
              <?php //echo !empty($errors["description"][0]) ? $errors["description"][0] : "";?>

                <label class="control-label col-md-4"> Description<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[Job][description]" id="description" type="text" value="<?php echo !empty($resultset['description']) ? $resultset['description'] : "";?>"/>
                </div>
              </div>
              
              <div class="form-group flare">
               <?php
                //echo !empty($errors["job_category_id"][0]) ? $errors["job_category_id"][0] : "";
		!empty($resultset['job_category_id']) ? (list($selected) = array($resultset['job_category_id'])) :(list($selected) = array(NULL));
			    ?>
                <label class="control-label col-md-4"> Category<span class="required"> * </span> </label>
                <div class="col-md-8">
                 <select id="category" name="data[Job][job_category_id]" class="form-control">
                  <option value="">Select Category</option>
                 <?php foreach($job_categories as $k=>$v){?>
                  <option value="<?php echo $v["JobCategory"]["id"];?>" <?php if($v["JobCategory"]["id"] == $selected){echo 'selected="selected"';}?>>
<?php echo $v["JobCategory"]["title"];?></option>
                <?php }?>
                
                </select>
                </div>
              </div>
              
            
               <div class="form-group flare">
               <?php //echo !empty($errors["email"][0]) ? $errors["email"][0] : "";?>
                <label class="control-label col-md-4"> Valid From(format -> yyyy-mm-dd)<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[Job][valid_from]" id="valid_from" type="text" value="<?php echo !empty($resultset['valid_from']) ? $resultset['valid_from'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
               <?php //echo !empty($errors["company"][0]) ? $errors["company"][0] : "";?>
                <label class="control-label col-md-4"> Valid To(format -> yyyy-mm-dd)<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[Job][valid_to]" id="valid_to" type="text" value="<?php echo !empty($resultset['valid_to']) ? $resultset['valid_to'] : "";?>"/>
                </div>
              </div>
              <div class="form-group flare">
               <?php //echo !empty($errors["password"][0]) ? $errors["password"][0] : "";?>
                <label class="control-label col-md-4"> No of applicants<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[Job][no_of_applicants]" id="no_of_applicants" type="text" value="<?php echo !empty($resultset['no_of_applicants']) ? $resultset['no_of_applicants'] : "";?>"/>
                </div>
              </div>
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-4">&nbsp; </label>
                <div class="col-md-8">
                   <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                   <a href="<?php echo ADMIN_BASEURL ?>jobs/manage_job"  class="btn theme-btn grey pull-left margd">Cancel</a>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--tab_1_2--> 
      
    </div>
  </div>
  
  <!--END TABS--> 
</div>

<script>
jQuery(document).ready(function() {    
   App.init();
   Search.init();
});
</script>
