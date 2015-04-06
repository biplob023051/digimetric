<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $form_data["display_text"]; ?> test </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>

            <li> <a href="javascript:void(0);"> <?php echo $form_data["display_text"]; ?> test </a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<?php
//debug($categories);
//debug($subcategories);
//debug($difficulties);
?>
<div class="row profile">
    <div class="col-md-12"> 
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> <a href="#tab_1_1" data-toggle="tab"> 
                        <?php echo $form_data["display_text"]; ?> Test </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">


                    <div class="row">

                        <?php
//                        debug($resultset);
                        ($form_data["controller"]) ? (list($controller) = array($form_data["controller"])) : (list($controller) = array(NULL));
                        ($form_data["controller"]) ? (list($action) = array($form_data["action"])) : (list($action) = array(NULL));
                        ($form_data["id"]) ? (list($id) = array($form_data["id"])) : (list($id) = array(NULL));
                        //($this->validationErrors) ? (list($errors) = array($this->validationErrors["Test"])) : (list($errors) = array(NULL));
                        $errors = !empty($this->validationErrors["Test"]) ? $this->validationErrors["Test"] : array();
                        ?>
                        <form enctype="multipart/form-data" name="frm" id="validation_user" action="<?php echo ADMIN_BASEURL; ?><?php echo $controller; ?>/<?php echo $action; ?>/<?php echo $id; ?>" method="post">
                            <div class="col-md-9">
                                <div class="row"></div>
                                <!--end row-->
                                <div class="tab-pane active" id="tab1"></div>


                                <input type="hidden" name="data[Test][id]" value="<?php echo!empty($this->params['pass'][0]) ? $this->params['pass'][0] : ""; ?>" />
                                <div class="form-group flare">

                                    <label class="control-label col-md-4"> Title<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red"><?php echo!empty($errors["title"][0]) ? $errors["title"][0] : ""; ?></span>
                                        <input class="form-control"  name="data[Test][title]" id="title" type="text" value="<?php echo!empty($resultset['title']) ? $resultset['title'] : ""; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group flare">


                                    <label class="control-label col-md-4"> Description<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["description"][0]) ? $errors["description"][0] : ""; ?>
                                        </span>
                                        <textarea class="form-control" name="data[Test][description]" id="description" ><?php echo!empty($resultset['description']) ? $resultset['description'] : ""; ?></textarea>

                                    </div>
                                </div>


                                <?php // echo WWW_ROOT.'uploads/'; ?>
                                <?php
                                if (!empty($id)) {
//                                    echo $id; 
                                    ?>
                                    <div class="form-group flare">


                                        <label class="control-label col-md-4"> Current Logo</label>
                                        <div class="col-md-8">

                                            <img alt="Logo" src="<?php echo BASEURL ?>/uploads/test_logo/<?php echo $current_logo; ?>" height="30" width="30"/>

                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["long_desc"][0]) ? $errors["long_desc"][0] : "";   ?>

                                    <label class="control-label col-md-4"> Test Logo<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["logo"][0]) ? $errors["logo"][0] : ""; ?>
                                        </span>
                                        <input name="data[Test][logo]" id="test_file" type="file" value=""/>
                                    </div>
                                </div>


                                <div class="form-group flare">
                                    <?php
                                    !empty($resultset['area_id']) ? (list($area) = array($resultset['area_id'])) :
                                                    (list($area) = array(NULL));
                                    ?>
                                    <label class="control-label col-md-4"> Area<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["area_id"][0]) ? $errors["area_id"][0] : ""; ?>
                                        </span>
                                        <select onchange="javascript:abc(this.value)" id="category" name="data[Test][area_id]" class="form-control">
                                            <option value="">Area</option>
                                            <?php foreach ($areas as $k => $v) { ?>
                                                <?php
                                                if ($k == 0) {
                                                    $loadarea = isset($_POST['data']['Test']['area_id']) ? $_POST['data']['Test']['area_id'] : $v["Area"]["id"];
                                                }
                                                ?>
                                                <option value="<?php echo $v["Area"]["id"]; ?>" <?php
                                                if ($v["Area"]["id"] == $area) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $v["Area"]["title"]; ?></option>
                                                    <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <?php // echo $loadarea;  ?>
                                <?php // debug($_POST); ?>
                                <div class="form-group flare">
                                    <?php
                                    !empty($resultset['category_id']) ? (list($topic) = array($resultset['category_id'])) : (list($topic) = array(NULL));
                                    ?>
                                    <label class="control-label col-md-4"> Field<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["category_id"][0]) ? $errors["category_id"][0] : ""; ?>
                                        </span>
                                        <?php
//                                        $categories =  array();
//                                        echo $get_cats = "select * from categories where area_id='".$loadarea."'";
//                                        $ex_get_cats = mysql_query($get_cats);
//                                        if(mysql_num_rows($ex_get_cats)>0){
//                                            $c =0;
//                                            while ($row = mysql_fetch_assoc($ex_get_cats)) {
//                                                $categories[$c]['Category'][] = $row;
//                                                        $c++;
//                                            }
//                                        } 
//                                        debug($categories);
                                        ?>
                                        <select  id="category" name="data[Test][category_id]" class="form-control">
                                            <option value="">Field</option>
                                            <?php foreach ($categories as $k => $v) { ?>
                                                <option value="<?php echo $v["Category"]["id"]; ?>" <?php
                                                if ($v["Category"]["id"] == $topic) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $v["Category"]["title"]; ?></option>
                                                    <?php } ?>

                                        </select>
                                    </div>
                                </div>






                                <div class="form-group flare">
                                    <?php
//                                    echo!empty($errors["sub_category_id"][0]) ? $errors["sub_category_id"][0] : "";
                                    !empty($resultset['sub_category_id']) ? (list($subtopic) = array($resultset['sub_category_id'])) : (list($subtopic) = array(NULL));
                                    ?>
                                    <label class="control-label col-md-4"> Sub Field</label>
                                    <div class="col-md-8">
                                        <select id="country" name="data[Test][sub_category_id]" class="form-control">
                                            <option value="">Sub Field</option>
                                            <?php foreach ($subcategories as $k => $v) { ?>
                                                <option value="<?php echo $v["SubCategory"]["id"]; ?>" <?php
                                                if ($v["SubCategory"]["id"] == $subtopic) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $v["SubCategory"]["title"]; ?></option>
                                                    <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php
//                                    echo!empty($errors["difficulty_id"][0]) ? $errors["difficulty_id"][0] : "";
                                    !empty($resultset['difficulty_id']) ? (list($diff) = array($resultset['difficulty_id'])) : (list($diff) = array(NULL));
                                    ?>
                                    <label class="control-label col-md-4"> Difficulty Level<span class="required"> * </span> </label>
                                    <div class="col-md-8">

                                        <select id="difficulty" name="data[Test][difficulty_id]" class="form-control">
                                            <!--                                            <option value="">Sub Topic</option>-->
                                            <?php foreach ($difficulties as $k => $v) { ?>
                                                <option value="<?php echo $v["Difficulty"]["id"]; ?>" <?php
                                                if ($v["Difficulty"]["id"] == $diff) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $v["Difficulty"]["title"]; ?></option>
                                                    <?php } ?>

                                        </select>
                                    </div>
                                </div>



                                <div class="form-group flare">
                                    <?php // echo!empty($errors["no_of_questions"][0]) ? $errors["no_of_questions"][0] : "";    ?>
                                    <label class="control-label col-md-4"> No of Questions<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["no_of_questions"][0]) ? $errors["no_of_questions"][0] : ""; ?>
                                        </span>
                                        <input class="form-control"  name="data[Test][no_of_questions]" id="title" type="text" value="<?php echo!empty($resultset['no_of_questions']) ? $resultset['no_of_questions'] : ""; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["no_of_questions"][0]) ? $errors["no_of_questions"][0] : "";    ?>
                                    <label class="control-label col-md-4"> No of Versions
                                        <span class="required"> * </span> 
                                    </label>
                                    <div class="col-md-8">
                                        <span style="color: red">
                                            <?php echo!empty($errors["versions"][0]) ? $errors["versions"][0] : ""; ?>
                                        </span>
                                        <input class="form-control"  name="data[Test][versions]" id="title" type="text" value="<?php echo!empty($resultset['versions']) ? $resultset['versions'] : ""; ?>"/>
                                    </div>
                                </div>
                                <span class="label label-sm label-danger">
                                    <?php echo!empty($errors["custom"]) ? $errors["custom"] : ""; ?>
                                </span>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["duration_hour"][0]) ? $errors["duration_hour"][0] : "";    ?>
                                    <label class="control-label col-md-4"> Duration(Hour) </label>
                                    <div class="col-md-8">
                                        <?php $rs_h = !empty($resultset['duration_hour']) ? $resultset['duration_hour'] : ''; ?>
                                        <select  name="data[Test][duration_hour]">
                                            <option value="0">Select Hour</option>
                                            <?php for ($h = 1; $h <= 24; $h++) { ?>
                                                <option value="<?php echo $h; ?>" <?php
                                                if ($h == $rs_h) {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo $h; ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["duration_mins"][0]) ? $errors["duration_mins"][0] : "";    ?>
                                    <label class="control-label col-md-4"> Duration(mins)<span class="required"> * </span> </label>
                                    <div class="col-md-8">
                                        <!--<span style="color: red">-->
                                        <?php // echo!empty($errors["duration_mins"]) ? $errors["duration_mins"] : "";   ?>
                                        <!--</span>-->
                                        <?php $rs_m = !empty($resultset['duration_mins']) ? $resultset['duration_mins'] : ''; ?>
                                        <select  name="data[Test][duration_mins]">
                                            <option value="0">Select Mins</option>
                                            <?php for ($m = 1; $m <= 60; $m++) { ?>
                                                <option value="<?php echo $m; ?>" <?php
                                                if ($m == $rs_m) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $m; ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group flare">
                                    <?php // echo!empty($errors["duration_secs"][0]) ? $errors["duration_secs"][0] : "";    ?>
                                    <label class="control-label col-md-4"> Duration(secs)<span class="required"> * </span> </label>
                                    <div class="col-md-8">
<!--                                        <span style="color: red">
                                        <?php // echo!empty($errors["duration_secs"]) ? $errors["duration_secs"] : "";  ?>
                                        </span>-->
                                        <?php $rs_s = !empty($resultset['duration_secs']) ? $resultset['duration_secs'] : ''; ?>
                                        <select  name="data[Test][duration_secs]">
                                            <option value="0">Select secs</option>
                                            <?php for ($s = 1; $s <= 60; $s++) { ?>
                                                <option value="<?php echo $s; ?>" <?php
                                                if ($s == $rs_s) {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo $s; ?>
                                                </option>
<?php } ?>

                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">&nbsp; </label>
                                <div class="col-md-8">
                                    <button type="submit" value="submit" class="btn theme-btn green pull-left" >Save</button>
                                    <a href="<?php echo ADMIN_BASEURL ?>tests/manage_test"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
<script type="text/javascript">
    function abc(venueid) {
//        alert(venueid)
//        return false;
        $.ajax({
            type: "POST",
            url: "ajax_like.php?do=getvenuedate&venue=" + venueid,
            success: function(rep) {
//                     alert(rep);
//                    obj = JSON.parse(rep);
                //alert(rep);
//                $('#date').html(rep);
//                $('#time_1').find('option').remove();
//                $('#time_2').find('option').remove();
//                $('#time_3').find('option').remove();
//                    $('#time_1').find('option').prop('disabled', true);
//                    $('#time_2').find('option').prop('disabled', true);
//                    $('#time_3').find('option').prop('disabled', true);
//                    $('#time_2').prop('disabled', true);
//                    $('#time_3').prop('disabled', true);
            }
        });
    }
    function def(seleteddate) {

        var venueid = $('#vid').val();
//        alert(venueid);
//        return ;
        $.ajax({
            type: "POST",
            url: "ajax_like.php?do=getvenuedatetime&date=" + seleteddate + "&venue=" + venueid,
            success: function(rep) {
//                     alert(rep);
                $('#time_1').html(rep);
                $('#time_2').html(rep);
                $('#time_3').html(rep);
            }
        });
    }
</script>
<script type="text/javascript">

                                            jQuery(document).ready(function() {
                                                App.init();
                                                Search.init();
                                            });
</script>
