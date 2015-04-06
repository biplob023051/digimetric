<?php
echo $this->Html->css('admin_css/assets/plugins/gritter/css/jquery.gritter.css');
echo $this->Html->css('admin_css/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
echo $this->Html->css('admin_css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
echo $this->Html->css('admin_css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css');
echo $this->Html->css('admin_css/assets/plugins/jqvmap/jqvmap/jqvmap.css');
echo $this->Html->css('admin_css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css');
?>
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> Test Questions & Answers</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group"> <a href="<?php echo ADMIN_BASEURL ?>test_questions/add_test_question?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>" class="btn blue dropdown-toggle"> <span> Add Question</span> </a> </li>
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="<?php echo ADMIN_BASEURL ?>tests/manage_test"> Manage Tests</a> <i class="fa fa-angle-right"></i></li>
            <li> <a href="javascript:void(0)"> Manage Test Questions/Version </a> <i class="fa fa-angle-right"></i></li>
            <li> <a href="javascript:void(0)"> <?php echo $test['Test']['title']; ?> </a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row"><?php // debug($this->request->query);                   ?>
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> 
                    <a data-toggle="tab" href="#tab_1_5"> Manage Test Questions - <?php echo $test['Test']['title']; ?>
                    </a>
                </li>
                <li class="label label-sm label-success">
                    No of questions must be - <?php echo $test['Test']['no_of_questions']; ?>
                </li>
            </ul>

            <div class="tab-content"> 

                <!--end tab-pane-->
                <div id="tab_1_5" >
                    <!--                    <div class="row search-form-default">
                                            <div class="col-md-12">
                                                <form class="form-inline" action="<?php echo ADMIN_BASEURL; ?>tests/add_test/" id="search">
                    
                                                    <div class="input-group">
                    
                                                        <div class="input-cont">
                                                            <input type="text" placeholder="Search..." id="search_data" class="form-control"  name="search"  value=""/>
                                                        </div>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn green"  onclick="return check_form();"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                                                        </span> </div>
                                                </form>
                                            </div>
                                        </div>-->
                    <form action="<?php echo ADMIN_BASEURL; ?>test_questions/update_sort_order?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>" method='post'>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th> Sort Order </th>
                                    <th> Version </th>
                                    <th> Question </th>

                                    <th> Options </th>

                                    <th> Status </th>

                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id='sortable'>
                                <?php
                                //debug($resultset);
                                if (count($resultset) != 0) {
                                    foreach ($resultset as $k => $v) {
//                                        debug($v);
//                                        isset($v['tag']['BlogTag']) ? $tag_array = $v['tag']['BlogTag'] : '';
                                        ?>
                                        <tr>
                                            <!--<input type='hidden' name='data[TestQuestion][sort_order][]' value="<?php // echo $v["TestQuestion"]["sort_order"]; ?>"/>-->
                                            <input type='hidden' name='data[TestQuestion][id][]' value="<?php echo $v["TestQuestion"]["id"]; ?>"/>
                                            <td><?php echo $v["TestQuestion"]["sort_order"]; ?></td>
                                            <td><?php echo $v["TestQuestion"]["version"]; ?></td>
                                            <td><?php echo $v["TestQuestion"]["question"]; ?></td>
                                            <td>
                                                <?php if (!empty($v['TestQuestionAnswer'])) { ?>
                                                    <table>
                                                        <?php foreach ($v['TestQuestionAnswer'] as $ka => $va) { ?>
                                                            <tr>
                                                                <td>
                                                                    #<?php echo $ka + 1; ?>
                                                                    -
                                                                    <?php if ($va['is_correct']) { ?>
                                                                        <span class="label label-sm label-success"><?php echo $va['answer_text']; ?></span>
                                                                    <?php } else { ?>
                                                                        <span class="label label-sm label-danger"><?php echo $va['answer_text']; ?></span>
                                                                    <?php } ?>
                                                                    <a class="can_delete" href=" <?php echo ADMIN_BASEURL; ?>test_questions/delete_test_question_answer/<?php echo $va['id']; ?>?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"  onclick="return delete_fun_ans();">
                                                                        <i class="can_delete fa fa-times fonta">

                                                                        </i>
                                                                    </a> 
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                <?php } else { ?>
                                                    <?php echo "No answers added"; ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($v["TestQuestion"]["status"] == 1) { ?>
                                                    <span class="label label-sm label-success"> <a href="<?php echo ADMIN_BASEURL; ?>test_questions/enable_disable_test_question/<?php echo $v["TestQuestion"]["id"]; ?>/0?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>" onclick="return enable_disable_test('disable');">Inactivate</a> </span>
                                                <?php } else { ?>
                                                    <span class="label label-sm label-success"> 
                                                        <a href="<?php echo ADMIN_BASEURL; ?>test_questions/enable_disable_test_question/<?php echo $v["TestQuestion"]["id"]; ?>/1?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>" onclick="return enable_disable_test('enable');">
                                                            Activate
                                                        </a>
                                                    </span>
                                                <?php } ?>
                                            </td>

                                            <td>

                                                                <!--<a class="" href="<?php echo ADMIN_BASEURL; ?>test_questions/view_test_question/<?php echo $v["TestQuestion"]["id"]; ?>?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"> <i class="fa fa-search fonta"></i> </a>--> 
                                                <a class="can_delete" href=" <?php echo ADMIN_BASEURL; ?>test_questions/delete_test_question/<?php echo $v["TestQuestion"]["id"]; ?>?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"  onclick="return delete_fun();"><i class="can_delete fa fa-times fonta"></i></a> 
                                                <a class="" href="<?php echo ADMIN_BASEURL; ?>test_questions/edit_test_question/<?php echo $v["TestQuestion"]["id"]; ?>?version=<?php echo $this->request->query['version']; ?>&test_id=<?php echo $this->request->query['test_id']; ?>"><i class="fa fa-edit fonta"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr class="scndrow">
                                        <td colspan="7" align="center">No record found</td>
                                    </tr>
                                <?php } ?> 
                            </tbody>

                        </table>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">&nbsp; </label>
                        <div class="col-md-8">
                            <button type="submit" value="submit" class="btn theme-btn green pull-left" >Update sort order</button>
                            <a href="<?php echo ADMIN_BASEURL ?>tests/manage_test"  class="btn theme-btn grey pull-left margd">Cancel</a>
                        </div>
                    </div>
                </form>
                    <div class="margin-top-20">
                        <ul class="pagination">
                            <?php
                            $paginator = $this->Paginator;
// pagination section
                            echo "<div class='paging'>";
// the 'first' page button
                            echo $paginator->first("First");
// 'prev' page button, 
// we can check using the paginator hasPrev() method if there's a previous page
// save with the 'next' page button
                            if ($paginator->hasPrev()) {
                                echo $paginator->prev("Prev");
                            }
// the 'number' page buttons
                            echo $paginator->numbers(array('modulus' => 2));
// for the 'next' button
                            if ($paginator->hasNext()) {
                                echo $paginator->next("Next");
                            }
// the 'last' page button
                            echo $paginator->last("Last");
                            echo "</div>";
                            ?>
                        </ul>
                    </div>
                </div>
                <!--end tab-pane--> 
            </div>
        </div>
    </div>
    <!--end tabbable--> 
</div>

<script>

                                                                        jQuery(document).ready(function() {
                                                                            App.init();
                                                                            Search.init();
                                                                        });

                                                                        function check_form() {
                                                                            var filter = $("#filter").val();
                                                                            var search_data = $("#search_data").val()
                                                                            /*if(filter == ""){
                                                                             alert("Please select filter");
                                                                             }*/
                                                                            if (filter != "")
                                                                            {
                                                                                if (search_data == "") {
                                                                                    alert("Please enter text in search box");
                                                                                }
                                                                                else {
                                                                                    document.getElementById('search').submit()
                                                                                }
                                                                            }
                                                                            else {
                                                                                document.getElementById('search').submit()
                                                                            }
                                                                        }
</script>
<script>
    function delete_fun() {
        if (confirm("Are you sure you want to delete this question?")) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_fun_ans() {
        if (confirm("Are you sure you want to delete this option?")) {
            return true;
        }
        else {
            return false;
        }
    }
    function enable_disable_test(item) {
        if (confirm("Are you sure you want to " + item + " the question?")) {
            return true;
        }
        else {
            return false;
        }
    }
</script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#sortable").sortable({
            placeholder: 'ui-state-highlight',
            axis: 'y',
            cursor: 'move',
//            opacity: 0.65,
            tolerance: 'pointer'
        });
//    $( "#sortable" ).disableSelection();
    });
</script>