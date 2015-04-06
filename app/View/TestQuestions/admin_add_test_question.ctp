<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> Question </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> 
                <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> 
                <i class="fa fa-angle-right"></i>
            </li>
            <li> 
                <a href="<?php echo ADMIN_BASEURL ?>test_questions/manage_test_questions?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"> 
                    <?php echo $test['Test']['title']; ?> -> Version - <?php echo $this->request->query['version']; ?>
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> Question </a> </li>
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
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> <?php echo $form_data["display_text"]; ?> Question </a> </li>
                <li>
                   *** Please supply atleast two options to question.
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                    <div class="row">
                        <?php
                        ($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) : (list($controller) = array(NULL));
                        ($form_data["controller"]) ? (list($action) = array($form_data["action"])) : (list($action) = array(NULL));
                        ($form_data["id"]) ? (list($id) = array($form_data["id"])) : (list($id) = array(NULL));
                        //($this->validationErrors) ? (list($errors) = array($this->validationErrors["Blog"])) : (list($errors) = array(NULL));
                        $errors = !empty($this->validationErrors) ? $this->validationErrors : array();
//                        debug($errors);
                        ?>
                        <form name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>" method="post">
                            <div class="col-md-9">
                                <div class="row"></div>
                                <!--end row-->
                                <div class="tab-pane active" id="tab1"></div>


                                <input type="hidden" name="data[TestQuestion][id]" value="<?php echo!empty($this->params['pass'][0]) ? $this->params['pass'][0] : ""; ?>" />
                                <input type="hidden" name="data[TestQuestion][version]" value="<?php echo $this->request->query['version']; ?>" />
                                <input type="hidden" name="data[TestQuestion][test_id]" value="<?php echo $this->request->query['test_id']; ?>" />
                                <div class="form-group flare">

                                    <label class="control-label col-md-4"> Question title<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span class="label label-sm label-danger"><?php echo !empty($errors["TestQuestion"]['question'][0]) ? $errors["TestQuestion"]['question'][0] : ""; ?></span>
                                        <input class="form-control"  name="data[TestQuestion][question]" id="title" type="text" value="<?php echo!empty($resultset['question']) ? $resultset['question'] : ""; ?>"/>
                                    </div>
                                </div>
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <div class="form-group flare">

                                        <label class="control-label col-md-4"> Option <?php echo $i; ?> </label>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="corrects[<?php echo $i; ?>]"/>Is answer?
                                            <input class="form-control"  name="answers[<?php echo $i; ?>]" id="title" type="text" value=""/>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">&nbsp; </label>
                                <div class="col-md-8">
                                    <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                                    <a href="<?php echo ADMIN_BASEURL ?>test_questions/manage_test_questions?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
