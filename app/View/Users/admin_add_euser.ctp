<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> user </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      
      <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> user </a> </li>
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
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> user </a> </li>
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
			//($this->validationErrors) ? (list($errors) = array($this->validationErrors["User"])) :(list($errors) = array(NULL));
                        $errors = !empty($this->validationErrors["User"]) ? $this->validationErrors["User"] :  array();
//                        $errors =  $this->validationErrors["User"];
			 ?>
             <form name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL;?><?php echo $controller; ?>/<?php echo  $action; ?>/<?php echo  $id ;?>" method="post">
			
             <input type="hidden" name="data[User][id]" value="<?php echo !empty($this->params['pass'][0]) ? $this->params['pass'][0]: "";?>" />
             <div class="form-group flare">
              <?php echo !empty($errors["first_name"][0]) ? $errors["first_name"][0] : "";?>
                <label class="control-label col-md-4"> First Name<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][first_name]" id="first_name" type="text" value="<?php echo !empty($resultset['first_name']) ? $resultset['first_name'] : "";?>"/>
                </div>
              </div>
             
              <div class="form-group flare">
              <?php echo !empty($errors["last_name"][0]) ? $errors["last_name"][0] : "";?>

                <label class="control-label col-md-4"> Last Name<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][last_name]" id="last_name" type="text" value="<?php echo !empty($resultset['last_name']) ? $resultset['last_name'] : "";?>"/>
                </div>
              </div>
              
              <div class="form-group flare">
               <?php
                echo !empty($errors["country"][0]) ? $errors["country"][0] : "";
			    !empty($resultset['country']) ? (list($selected) = array($resultset['country'])) :(list($selected) = array(NULL));
			    ?>
                <label class="control-label col-md-4"> Country<span class="required"> * </span> </label>
                <div class="col-md-8">
                 <select class="form-control" id="country" name="data[User][country]">
                  <option value="">Select Country</option>
                 <?php foreach($country as $k=>$v){?>
                  <option value="<?php echo $v["Country"]["country_name"];?>" <?php if($v["Country"]["country_name"] == $selected){echo 'selected="selected"';}?>><?php echo $v["Country"]["country_name"];?></option>
                <?php }?>
                
                </select>
                </div>
              </div>
              
            
               <div class="form-group flare">
               <?php echo !empty($errors["email"][0]) ? $errors["email"][0] : "";?>
                <label class="control-label col-md-4"> Email<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][email]" id="email" type="text" value="<?php echo !empty($resultset['email']) ? $resultset['email'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
               <?php echo !empty($errors["company"][0]) ? $errors["company"][0] : "";?>
                <label class="control-label col-md-4"> Company<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][company]" id="company" type="text" value="<?php echo !empty($resultset['company']) ? $resultset['company'] : "";?>"/>
                </div>
              </div>
              
             <!-- <div class="form-group flare">
               <?php echo !empty($errors["username"][0]) ? $errors["username"][0] : "";?>
                <label class="control-label col-md-4"> Username<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][username]" id="username" type="text" value="<?php echo !empty($resultset['username']) ? $resultset['username'] : "";?>"/>
                </div>
              </div>
              
              <div class="form-group flare">
               <?php echo !empty($errors["password"][0]) ? $errors["password"][0] : "";?>
                <label class="control-label col-md-4"> Password<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="data[User][password]" id="password" type="text" value="<?php echo !empty($resultset['password']) ? $resultset['password'] : "";?>"/>
                </div>
              </div>-->
              
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-4">&nbsp; </label>
                <div class="col-md-8">
                   <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                   <a href="<?php echo ADMIN_BASEURL ?>users/manage_euser"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
