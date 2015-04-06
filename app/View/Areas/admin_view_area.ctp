<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php // echo $form_data["display_text"];  ?> area </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php // echo $form_data["display_text"];  ?> area </a> </li>
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
                        area </a> </li>
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
                                    <?php echo !empty($resultset['title']) ? $resultset['title'] : ""; ?>
                                </div>
                            </div>

                            

                            
                            <?php // echo WWW_ROOT.'uploads/'; ?>
                            
                            
                            <div class="form-group flare">


                                <label class="control-label col-md-4"> Image </label>
                                <div class="col-md-8">
                                    
                                    <img height="150" width="150" src="<?php echo $this->webroot; ?>uploads/areas/<?php echo $resultset['image']; ?>"/>
                                            
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">&nbsp; </label>
                            <div class="col-md-8">
                                <!--<button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>-->
                                <a href="<?php echo ADMIN_BASEURL ?>areas/manage_area"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
