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
<!---New html code-->


<div class="modal fade" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
      <div class="clearfix"></div>

<div class="col-lg-12">
  <button type="button" class="close styl" data-dismiss="modal" aria-hidden="true">×</button>
          <table class="tbtesting">
            <tbody><tr>
              <th colspan="3"><span class=" pull-left  glyphicon glyphicon-info-sign"></span>Test Prticipition</th>
          
            </tr>
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
              <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            <tr>
              <td>20%</td>
              <td><meter value="20%"></meter> </td>
              <td>introduction to wireless</td>
            </tr>
            
            
            
          </tbody></table>
         <div class="clearfix"></div> </div> <div class="clearfix"></div></div>       
              <div class="clearfix"></div> 
              <div class="clearfix"></div>

</div>

<div class="row">
<div class="col-sm-4">
<ul class="statics">
<li><a href="#myModal0"  id="dem" data-toggle="modal" data-target="#myModal0" class="postpos">180 post have posted </a></li>
</ul>
</div></div>
<br><br>
<!---New html code-->
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
                                                <div class="testone"> <span><?php echo $valueT['title']; ?></span></div>
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
                                    <a href="javascript:void(0)" class="junioursoft"><?php echo $value['Job']['title']; ?> </a>
                                    <div class="clearfix"></div>
                                    <?php if (!empty($value['JobTest'])) { ?>
                                    <div class="arowtop">
                                        <span class="arowset">
                                            <img src="<?php echo BASEURL; ?>/img/top_statistics.png" alt="img">
                                        </span>
                                        
                                            <?php foreach ($value['JobTest'] as $keyT => $valueT) { ?>
                                                <div class="testone"> <span><?php echo $valueT['title']; ?></span></div>
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

                        <!--                            <div class="row">
                                                        <div class="col-lg-12">
                                                            <table class="tbtesting">
                                                                <tr>
                                                                    <td>No. of Tests </td>
                                                                    <td>2 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Highest Score </td>
                                                                    <td>100 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lowest Score </td>
                                                                    <td>20 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Average Score</td>
                                                                    <td>65 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No. of candidates </td>
                                                                    <td>1500</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>-->
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
