
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> blog </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> blog </a> </li>
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
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> blog </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                    <div class="row">
                        <?php
                        ($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) : (list($controller) = array(NULL));
                        ($form_data["controller"]) ? (list($action) = array($form_data["action"])) : (list($action) = array(NULL));
                        ($form_data["id"]) ? (list($id) = array($form_data["id"])) : (list($id) = array(NULL));
                        //($this->validationErrors) ? (list($errors) = array($this->validationErrors["Blog"])) : (list($errors) = array(NULL));
			$errors = !empty($this->validationErrors["Blog"]) ? $this->validationErrors["Blog"] :  array();
                        ?>
                        <form enctype="multipart/form-data" name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>" method="post">
                            <div class="col-md-9">
                                <div class="row"></div>
                                <!--end row-->
                                <div class="tab-pane active" id="tab1"></div>


                                <input type="hidden" name="data[Blog][id]" value="<?php echo!empty($this->params['pass'][0]) ? $this->params['pass'][0] : ""; ?>" />
                                <div class="form-group flare">
                                    <?php echo!empty($errors["title"][0]) ? $errors["title"][0] : ""; ?>
                                    <label class="control-label col-md-4"> Title<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <input class="form-control"  name="data[Blog][title]" id="title" type="text" value="<?php echo!empty($resultset['title']) ? $resultset['title'] : ""; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group flare">
                                    <?php echo!empty($errors["description"][0]) ? $errors["description"][0] : ""; ?>

                                    <label class="control-label col-md-4"> Short Description<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <textarea class="ckeditor form-control" name="data[Blog][description]" id="description" ><?php echo!empty($resultset['description']) ? $resultset['description'] : ""; ?></textarea>
                           <!--               <input class="form-control"  name="data[Blog][description]" id="description" type="text" value="<?php echo!empty($resultset['description']) ? $resultset['description'] : ""; ?>"/>-->
                                    </div>
                                </div>

                                <div class="form-group flare">
                                    <?php echo!empty($errors["long_desc"][0]) ? $errors["long_desc"][0] : ""; ?>


                                    <label class="control-label col-md-4"> Long Description<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <textarea class="ckeditor form-control" name="data[Blog][long_desc]" id="long_desc" ><?php echo!empty($resultset['long_desc']) ? $resultset['long_desc'] : ""; ?></textarea>
                           <!--               <input class="form-control"  name="data[Blog][long_desc]" id="long_desc" type="text" value="<?php echo!empty($resultset['last_name']) ? $resultset['last_name'] : ""; ?>"/>-->
                                    </div>
                                </div>
                                <?php // echo WWW_ROOT.'uploads/'; ?>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["long_desc"][0]) ? $errors["long_desc"][0] : ""; ?>

                                    <label class="control-label col-md-4"> Publisher </label>
                                    <div class="col-md-8">
                                        <!--<textarea class="form-control" name="data[Blog][publish_by]" id="long_desc" ><?php echo!empty($resultset['publish_by']) ? $resultset['publish_by'] : ""; ?></textarea>-->
                                          <input class="form-control"  name="data[Blog][publish_by]" id="long_desc" type="text" value="<?php echo!empty($resultset['publish_by']) ? $resultset['publish_by'] : ""; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["long_desc"][0]) ? $errors["long_desc"][0] : ""; ?>

                                    <label class="control-label col-md-4"> Tags(comma seperate your tags) </label>
                                    <div class="col-md-8">
                                       
                                          <input class="form-control"  name="tags_input" id="blog_tags" type="text" value="<?php  echo!empty($resultset['tags_input']) ? $resultset['tags_input'] : ""; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["long_desc"][0]) ? $errors["long_desc"][0] : ""; ?>

                                    <label class="control-label col-md-4"> Blog files<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <!--<textarea class="form-control" name="data[Blog][long_desc]" id="long_desc" ><?php // echo!empty($resultset['long_desc']) ? $resultset['long_desc'] : ""; ?></textarea>-->
                                        <input multiple name="data[BlogFile][file][]" id="blog_file" type="file" value=""/>
                                    </div>
                                </div>
                                <!--<div class="form-group flare">
                                <?php
                                echo!empty($errors["country"][0]) ? $errors["country"][0] : "";
                                !empty($resultset['country']) ? (list($selected) = array($resultset['country'])) : (list($selected) = array(NULL));
                                ?>
                                  <label class="control-label col-md-4"> Country<span class="required"> * </span> </label>
                                  <div class="col-md-8">
                                   <select id="country" name="data[Blog][country]">
                                    <option value="">Select Country</option>
                                <?php foreach ($country as $k => $v) { ?>
                                                <option value="<?php echo $v["Country"]["country_name"]; ?>" <?php
                                    if ($v["Country"]["country_name"] == $selected) {
                                        echo 'selected="selected"';
                                    }
                                    ?>><?php echo $v["Country"]["country_name"]; ?></option>
                                <?php } ?>
                                  
                                  </select>
                                  </div>
                                </div>-->




                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">&nbsp; </label>
                                <div class="col-md-8">
                                    <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                                    <a href="<?php echo ADMIN_BASEURL ?>blogs/manage_blog"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
