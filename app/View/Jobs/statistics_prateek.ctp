<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/accordion.css">
<link href="<?php echo BASEURL; ?>/css/tabcontent.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/fontello.css">

<!--INDEX PAGE CONTENT HERE--> 
<div class="row">
    <?php
    $user_id = $this->Session->read('User');
//   debug($user_id);
    ?>
    <!--<form action="<?php echo BASEURL; ?>/jobs/add" id="JobAddForm" method="POST">-->
    <div class="col-md-12 padd_zero jobsset ">
        <div class="white_bg spicy ">
            <div class="pi-accordion faq_li">
                <div class="pi-accordion-item ">
                    <h5 class="pi-accordion-title"> <a href="#"  class="h1 "> 
                            <span class="pi-accordion-toggle"></span> General Statistics </a> </h5>
                    <div class="pi-accordion-content" style="display: block;">
                        <div class="row">

                            <?php foreach ($posted_jobs as $key => $value) { ?>
                                <div class="col-lg-4">
                                    <div class="clearfix"></div>
                                    <a href="javascript:void(0)" class="junioursoft"><?php echo $value['Job']['title']; ?> </a>
                                    <div class="clearfix"></div>
                                    <?php if (!empty($value['JobTest'])) { ?>
                                        <div class="arowtop">
                                            <span class="arowset">
                                                <img src="<?php echo BASEURL; ?>/img/top_statistics.png" alt="img">
                                            </span>

                                            <?php foreach ($value['JobTest'] as $keyT => $valueT) { ?>
                                                <div class="testone">
                                                    <span><a href=""><?php echo $valueT['title']; ?></a></span>
                                                </div>
                                            <?php } ?>

                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } ?>

                                </div>
                            <?php } ?>

                            <?php // debug($posted_jobs); ?>
                            <!--                                <div class="col-lg-8">
                                                                <table class="tbtesting">
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <th>Name</th>
                                                                        <th>Score</th>
                                                                        <th>Duration</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>infor@example.com</td>
                                                                        <td>Mark </td>
                                                                        <td>100</td>
                                                                        <td>30:00 min</td>
                                                                        <td>10-18-14</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>infor@example.com</td>
                                                                        <td>Mark </td>
                                                                        <td>100</td>
                                                                        <td>30:00 min</td>
                                                                        <td>10-18-14</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>infor@example.com</td>
                                                                        <td>Mark </td>
                                                                        <td>100</td>
                                                                        <td>30:00 min</td>
                                                                        <td>10-18-14</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>infor@example.com</td>
                                                                        <td>Mark </td>
                                                                        <td>100</td>
                                                                        <td>30:00 min</td>
                                                                        <td>10-18-14</td>
                                                                    </tr>
                                                                </table>
                                                            </div>-->
                            <div class="clear"></div>
                        </div>

                    </div>
                </div>
                <div class="pi-accordion-item ">
                    <h5 class="pi-accordion-title"> <a href="#"  class="h1 ">
                            <span class="pi-accordion-toggle"></span>Candidate Statistics</a> </h5>
                    <div class="pi-accordion-content" style="display:block ;" >
                        <div class="row">

                            <?php foreach ($posted_jobs as $key => $value) { ?>
                                <div class="col-lg-4">
                                    <div class="clearfix"></div>
                                    <a data-toggle="modal" data-target="#jobmodal" href="<?php echo BASEURL; ?>/jobs/get_job_stats_info/<?php echo $value['Job']['id']; ?>" class="junioursoft">
                                        <?php echo $value['Job']['title']; ?>
                                    </a>
                                    <div class="clearfix"></div>
                                    <?php if (!empty($value['JobTest'])) { ?>
                                        <div class="arowtop">
                                            <span class="arowset">
                                                <img src="<?php echo BASEURL; ?>/img/top_statistics.png" alt="img">
                                            </span>

                                            <?php foreach ($value['JobTest'] as $keyT => $valueT) { ?>
                                                <?php // debug($valueT) ?>
                                                <div class="testone">
                                                    <span>
                                                        <a data-toggle="modal" data-target="#testmodal" href="<?php echo BASEURL; ?>/jobs/get_candidate_info_on_test/<?php echo $valueT['test_id']; ?>">
                                                            <?php echo $valueT['title']; ?>
                                                        </a>
                                                    </span>
                                                </div>
                                            <?php } ?>

                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } ?>

                                </div>
                            <?php } ?>

                            <?php // debug($posted_jobs); ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>


        <div class="clear"></div>
    </div>
    <!--</form>-->

    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS FOLDER  --> 

    <?php echo $this->element('job_left_menu', array("job_li" => '<li><a href="' . BASEURL . '/jobs" class="glyphicon glyphicon-briefcase"> JOBS</a></li>')); ?>
    <!--JOB PAGE MENU-->

</div>
<div class="clear"></div>
<!--FOOTER-->
<script type="text/javascript">
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(this).removeData('bs.modal');
    });
</script>
<!--MODAL WINDOW-->
<div class="modal fade" id="jobmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">Loading... </div>
    </div>
</div>
<!--MODAL WINDOW-->
<!--MODAL WINDOW-->
<div class="modal fade" id="testmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">Loading... </div>
    </div>
</div>
<!--MODAL WINDOW-->