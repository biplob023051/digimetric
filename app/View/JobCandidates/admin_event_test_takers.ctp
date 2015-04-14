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
        <h3 class="page-title"> <?php echo $title_for_layout; ?> </h3>
        <ul class="page-breadcrumb breadcrumb">
            <!--<li class="btn-group"> <a href="<?php echo ADMIN_BASEURL ?>users/add_euser" class="btn blue dropdown-toggle"> <span> Add user </span> </a> </li>-->
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="javascript:void(0);"><?php echo __('Manage Event Test Takers'); ?></a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> <a data-toggle="tab" href="#tab_1_5"><?php echo __('Mange Event Test Takers'); ?></a> </li>
            </ul>

            <div class="tab-content"> 

                <!--end tab-pane-->
                <div id="tab_1_5" >
        
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Positions</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Confirmation Code</th>
                                    <th>Rankings</th>
                                    <th>Time Duration</th>
                                    <th>Time Taken</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                if (count($resultset) != 0) {
                                    foreach ($resultset as $k => $v) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $v["JobCandidate"]["email"]; ?></td>
                                            <td><?php echo $v["JobCandidate"]["phone_no"]; ?></td>
                                            <td><?php echo $v["JobCandidate"]["confirmation_code"]; ?></td>
                                            <td><?php echo $v["CandidateRanking"]["result"] . '(' . $v["CandidateRanking"]["total"] . ')'; ?></td>
                                             <td><?php echo $v["CandidateRanking"]["time_duration"]; ?></td>
                                            <td><?php echo $v["CandidateRanking"]["time_taken"]; ?></td>
                                            <td>
                                                <a class="can_delete" href=" <?php echo ADMIN_BASEURL; ?>job_candidates/delete_event_taker/<?php echo $v["JobCandidate"]["id"]; ?>"  onclick="return delete_fun();"><i class="can_delete fa fa-times fonta"></i></a> 
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                } else {
                                    ?>
                                    <tr class="scndrow">
                                        <td colspan="8" align="center">No record found</td>
                                    </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
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

<!-- END PAGE CONTENT--> 
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
        if (confirm("Are you sure you want to delete the user?")) {
            return true;
        }
        else {
            return false;
        }
    }
</script>