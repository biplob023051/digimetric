<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> field </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> field </a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<?php
//debug($resultset);
?>
<div class="row profile">
    <div class="col-md-12"> 
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> field </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                    <div class="row">
                        <?php
                        ($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) : (list($controller) = array(NULL));
                        ($form_data["controller"]) ? (list($action) = array($form_data["action"])) : (list($action) = array(NULL));
                        ($form_data["id"]) ? (list($id) = array($form_data["id"])) : (list($id) = array(NULL));
                        //($this->validationErrors) ? (list($errors) = array($this->validationErrors["Area"])) : (list($errors) = array(NULL));
						$errors = !empty($this->validationErrors["Category"]) ? $this->validationErrors["Category"] :  array();
                        ?>
                        <form enctype="multipart/form-data" name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>" method="post">
                            <div class="col-md-9">
                                <div class="row"></div>
                                <!--end row-->
                                <div class="tab-pane active" id="tab1"></div>
                                <input type="hidden" name="data[Category][id]" value="<?php echo!empty($this->params['pass'][0]) ? $this->params['pass'][0] : ""; ?>" />
                                
                                <div class="form-group flare">
                                 <?php echo !empty($errors["area_id"][0]) ? $errors["area_id"][0] : "";?>

                                    <label class="control-label col-md-4"> Area<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <select class="form-control"  name="data[Category][area_id]" id="title">
                                        <option value="">Select area</option>
                                        <?php foreach($areas as $k=>$v){
											$sel = 	!empty($resultset['area_id'])  ? $resultset['area_id'] : "";
										?>
                                        <option value="<?php echo $v["Area"]["id"];?>" <?php if($v["Area"]["id"] == $sel){echo 'selected="selected"';}?>><?php echo $v["Area"]["title"];?></option>
                                        <?php }?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group flare">
                                 <?php echo !empty($errors["title"][0]) ? $errors["title"][0] : "";?>

                                    <label class="control-label col-md-4"> Title<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <input class="form-control"  name="data[Category][title]" id="title" type="text" value="<?php echo !empty($resultset['title']) ? $resultset['title'] : ""; ?>"/>
                                    </div>
                                </div>
                                
                                
								<div class="form-group flare">
                                 <?php echo !empty($errors["image"][0]) ? $errors["image"][0] : "";?>
                                <label class="control-label col-md-4"> Area files<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                    <?php if(!empty($id)){?>
                                    <img src="<?php echo $this->webroot. 'uploads/categories/'.$resultset["image"];?>" height="150" width="150" />
                                    <input name="data[Category][hidden_image]" id="hidden_file" type="hidden" value="<?php echo !empty($resultset["image"]) ? $resultset["image"] : "";?>"/>
                                    <?php }?>
                                        <!--<textarea class="form-control" name="data[Area][long_desc]" id="long_desc" ><?php // echo!empty($resultset['long_desc']) ? $resultset['long_desc'] : ""; ?></textarea>-->
                                        <input name="data[Category][image]" id="Category_file" type="file" value=""/>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">&nbsp; </label>
                                <div class="col-md-8">
                                    <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                                    <a href="<?php echo ADMIN_BASEURL ?>categories/manage_category"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
