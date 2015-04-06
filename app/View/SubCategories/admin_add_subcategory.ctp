<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> subfield </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> subfield </a> </li>
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
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> subfield </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                    <div class="row">
                        <?php
                        ($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) : (list($controller) = array(NULL));
                        ($form_data["controller"]) ? (list($action) = array($form_data["action"])) : (list($action) = array(NULL));
                        ($form_data["id"]) ? (list($id) = array($form_data["id"])) : (list($id) = array(NULL));
                        //($this->validationErrors) ? (list($errors) = array($this->validationErrors["Area"])) : (list($errors) = array(NULL));
						$errors = !empty($this->validationErrors["SubCategory"]) ? $this->validationErrors["SubCategory"] :  array();
                        ?>
                        <form enctype="multipart/form-data" name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>" method="post">
                            <div class="col-md-9">
                                <div class="row"></div>
                                <!--end row-->
                                <div class="tab-pane active" id="tab1"></div>
                                <input type="hidden" name="data[SubCategory][id]" value="<?php echo!empty($this->params['pass'][0]) ? $this->params['pass'][0] : ""; ?>" />
                                
                                <div class="form-group flare">
                                 <?php echo !empty($errors["category_id"][0]) ? $errors["category_id"][0] : "";?>

                                    <label class="control-label col-md-4"> Field<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <select class="form-control"  name="data[SubCategory][category_id]" id="title">
                                        <option value="">Select field</option>
                                        <?php foreach($categories as $k=>$v){
											$sel = 	!empty($resultset['category_id'])  ? $resultset['category_id'] : "";
										?>
                                        <option value="<?php echo $v["Category"]["id"];?>" <?php if($v["Category"]["id"] == $sel){echo 'selected="selected"';}?>><?php echo $v["Category"]["title"];?></option>
                                        <?php }?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group flare">
                                 <?php echo !empty($errors["title"][0]) ? $errors["title"][0] : "";?>

                                    <label class="control-label col-md-4"> Title<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <input class="form-control"  name="data[SubCategory][title]" id="title" type="text" value="<?php echo !empty($resultset['title']) ? $resultset['title'] : ""; ?>"/>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">&nbsp; </label>
                                <div class="col-md-8">
                                    <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                                    <a href="<?php echo ADMIN_BASEURL ?>sub_categories/manage_subcategory"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
