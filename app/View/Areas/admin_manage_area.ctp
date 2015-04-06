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
        <h3 class="page-title"> area </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group"> <a href="<?php echo ADMIN_BASEURL ?>areas/add_area" class="btn blue dropdown-toggle"> <span> Add area </span> </a> </li>
            <li> <i class="fa fa-home"></i> <a href="<?php echo ADMIN_BASEURL; ?>admins/dashboard"> Home </a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="javascript:void(0);"> Manage area </a> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
    </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row"><?php //  debug($resultset); ?>
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Manage areas </a> </li>
            </ul>

            <div class="tab-content"> 

                <!--end tab-pane-->
                <div id="tab_1_5" >
<!--                    <div class="row search-form-default">
                        <div class="col-md-12">
                            <form class="form-inline" action="<?php echo ADMIN_BASEURL; ?>areas/add_area/" id="search">

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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//                                debug($resultset);
                                if (count($resultset) != 0) {
                                    foreach ($resultset as $k => $v) {
//                                      
                                        ?>
                                        <tr>
                                            <td><?php echo $v["Area"]["title"]; ?></td>
                                            <td>
                                                <?php if ($v["Area"]["status"] == 1) { ?>
                                                    <span class="label label-sm label-success"> <a href="<?php echo ADMIN_BASEURL; ?>areas/enable_disable_area/<?php echo $v["Area"]["id"]; ?>/0" onclick="return enable_disable_area('disable');">Inactivate</a> </span>
                                                <?php } else { ?>
                                                    <span class="label label-sm label-success"> 
                                                        <a href="<?php echo ADMIN_BASEURL; ?>areas/enable_disable_area/<?php echo $v["Area"]["id"]; ?>/1" onclick="return enable_disable_area('enable');">
                                                            Activate
                                                        </a>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>

                                                <a class="" href="<?php echo ADMIN_BASEURL; ?>areas/view_area/<?php echo $v["Area"]["id"]; ?>"> <i class="fa fa-search fonta"></i> </a> 
                                                <a class="can_delete" href=" <?php echo ADMIN_BASEURL; ?>areas/delete_area/<?php echo $v["Area"]["id"]; ?>"  onclick="return delete_fun();"><i class="can_delete fa fa-times fonta"></i></a> 
                                                <a class="" href="<?php echo ADMIN_BASEURL; ?>areas/edit_area/<?php echo $v["Area"]["id"]; ?>"><i class="fa fa-edit fonta"></i></a></td>
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
<script type="text/javascript">
//to delete pending causes	
    var element = $(".can_delete");
    element.onclick = function() {
        alert("hi");
        var id = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "You want to delete this cause",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!'
        },
        function() {
            alert(id);
            //window.location.href = BASEURL+'start_cause/delete_cause/'+id;
        });
    }
</script>
<!-- END PAGE CONTENT--> 

<!--<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo ADMIN_BASEURL; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo ADMIN_BASEURL; ?>assets/scripts/custom/search.js"></script> -->
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
        if (confirm("Are you sure you want to delete the area?")) {
            return true;
        }
        else {
            return false;
        }
    }
    function enable_disable_area(item) {
        if (confirm("Are you sure you want to " + item + " the area?")) {
            return true;
        }
        else {
            return false;
        }
    }
//to delete pending causes	
    /*var element = $(".can_delete");
     console.log(element);
     element.onclick = function(){
     alert("hi");
     var id = $(this).attr('href');
     swal({
     title: "Are you sure?",
     text: "You want to delete this cause",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: '#DD6B55',
     confirmButtonText: 'Yes, delete it!'
     },
     function(){
     alert(id);
     //window.location.href = BASEURL+'start_cause/delete_cause/'+id;
     });
     }*/
</script>