<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php // echo $form_data["display_text"];  ?> blog </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php // echo $form_data["display_text"];  ?> blog </a> </li>
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
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> 
                        <?php // echo $form_data["display_text"]; ?>
                        blog </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                    <div class="row">
                        <?php // debug($resultset); ?>
                        <!--<form enctype="multipart/form-data" name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>" method="post">-->
                        <div class="col-md-9">
                            <div class="row"></div>
                            <!--end row-->
                            <div class="tab-pane active" id="tab1"></div>



                            <div class="form-group flare">

                                <label class="control-label col-md-4"> Title </label>
                                <div class="col-md-8">
                                    <?php echo!empty($resultset['title']) ? $resultset['title'] : ""; ?>
                                </div>
                            </div>

                            <div class="form-group flare">


                                <label class="control-label col-md-4"> Short Description </label>
                                <div class="col-md-8">
                                    <?php echo!empty($resultset['description']) ? $resultset['description'] : ""; ?>

                                </div>
                            </div>

                            <div class="form-group flare">



                                <label class="control-label col-md-4"> Long Description </label>
                                <div class="col-md-8">
                                    <?php echo!empty($resultset['long_desc']) ? $resultset['long_desc'] : ""; ?>

                                </div>
                            </div>
                            <?php // echo WWW_ROOT.'uploads/'; ?>
                            <div class="form-group flare">


                                <label class="control-label col-md-4"> Publisher </label>
                                <div class="col-md-8">
                                    <?php echo!empty($resultset['publish_by']) ? $resultset['publish_by'] : ""; ?>
                                    <!--<textarea class="form-control" name="data[Blog][publish_by]" id="long_desc" ><?php echo!empty($resultset['publish_by']) ? $resultset['publish_by'] : ""; ?></textarea>-->
                                      <!--<input class="form-control"  name="data[Blog][publish_by]" id="long_desc" type="text" value="<?php echo!empty($resultset['publish_by']) ? $resultset['publish_by'] : ""; ?>"/>-->
                                </div>
                            </div>
                            <div class="form-group flare">


                                <label class="control-label col-md-4"> Tags </label>
                                <div class="col-md-8">
                                    <?php echo!empty($resultset['tags_input']) ? $resultset['tags_input'] : ""; ?>

                                </div>
                            </div>
                            <div class="form-group flare">


                                <label class="control-label col-md-4"> Blog files </label>
                                <div class="col-md-8">
                                    <?php
                                    $files = $resultset['BlogFile'];
                                    if (!empty($files)) {
                                        foreach ($files as $key => $value) {
//                                                echo $value['BlogFile']['file'];
                                            ?>
                                    <img height="150" width="150" src="<?php echo BASEURL ?>/uploads/<?php echo $value['BlogFile']['file']; ?>"/>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">&nbsp; </label>
                            <div class="col-md-8">
                                <!--<button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>-->
                                <a href="<?php echo ADMIN_BASEURL ?>blogs/manage_blog"  class="btn theme-btn grey pull-left margd">Cancel</a>
                            </div>
                        </div>
                        <!--</form>-->
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
