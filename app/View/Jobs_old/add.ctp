
<!--INDEX PAGE CONTENT HERE--> 
<div class="row">
<?php
$user_id = $this->Session->read('User');
   debug($user_id);

?>
    <form action="/jobs/add" id="JobAddForm" method="POST">
        <div class="col-md-12 padd_zero jobsset ">
            <div class="white_bg spicy ">
                <div class="job_table">
                    <table >
                        <tr>
                            <td>
                                <div class="ftxt">Title:</div>
                            </td>
                            <td>
                                <input name="data[Job][title]" type="text" class="form-control orng" placeholder="Please enter the job title" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ftxt">Category:</div>
                            </td> 
                            <td>
                                <select name="data[Job][job_category_id]" class="form-control slcts orng" >
                                    <option value="0">Select</option>
                                    <?php if(!empty($all_cats)){ ?>
                                    <?php foreach($all_cats as $k=>$v){ ?>

                                    <option value="<?php echo $v['JobCategory']['id']; ?>"><?php echo $v['JobCategory']['title']; ?></option>

                                    <?php } ?>
                                    <?php } ?>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ftxt">Duration:</div>
                            </td> 
                            <td>
                                <input type="text" name="data[Job][valid_upto]" class="form-control orng" placeholder="How long job will be live ?" >
                            </td>
                        </tr>
                        <tr>
                            <td class="empty">&nbsp;</td>
                            <td>
                                <input type="text" class="form-control orng timsa" placeholder="Hour" >
                                <input type="text" class="form-control orng timsa" placeholder="Day" >
                                <input type="text" class="form-control orng timsa" placeholder="Week" >
                                <input type="text" class="form-control orng timsa" placeholder="Month" >
                            </td>
                        </tr>
                            <tr>
                            <td>
                                <div class="ftxt"> Number of applicants for the job:</div>
                            </td> 
                            <td>
                                <input name="data[Job][no_of_applicants]" type="text" class="form-control orng" placeholder="Enter the # of applicants allowed for the job" >
                                <!--<textarea style="text-align:justify;" class="form-control mstd orng" >Enter the # of applicants allowed for the job</textarea>-->
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class=" btn oraa pull-right" value="Create"></td>
                        </tr>
                    </table>
                    <!--<table class="tb2">
                        
                    </table>
                    <input type="submit" class=" btn oraa pull-right" value="Create">  -->
                    <div class="clear"></div>
                </div> 
                <div class="clear"></div>
            </div>


            <div class="clear"></div>
        </div>
    </form>
    <!--<div class="row">
        <div class="col-md-12 padd_zero">
            <div class="liquid-slider " id="slider-4">
                <div>
                    <h2 class="title visible-xs hidden-xs">JOBS</h2>

                </div>
                <div>
                    <h2 class="title visible-xs hidden-xs">TOPICS</h2>
                </div>
                <div>

                    <h2 class="title visible-xs hidden-xs">TEST</h2>

                </div>
                <div>
                    <h2 class="title visible-xs hidden-xs"> ACTIVITIES </h2>

                </div>

            </div>
        </div>
    </div>-->

    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS FOLDER  --> 

    <?php echo $this->element('job_left_menu', array("job_li" => '<li><a href="' . BASEURL . '/jobs" class="glyphicon glyphicon-briefcase"> JOBS</a></li>')); ?>
    <!--JOB PAGE MENU-->

    <!--            <a href="#" class="search " id="flip" data-toggle="collapse" data-target=".toogle_search"> 
                    <img src="<?php echo BASEURL; ?>/img/bigsearchs_search.png" height="26" width="25" alt="img" >
                </a>
                <div class="toogle_search col-lg-12 collapse" style="display:none;" id="panel">
                    <div class="col-lg-2">
                        <input type="submit" class="btn btn-block btn-blue srchu" value="Search For" >
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control col-lg-8"> 
                    </div>
                    <div class="clear"></div>
    
                </div>
                <div id="back-top" style="display: block;"> <a href="#top" class="img-circle"> <i class="fa fa-angle-up"></i> 
                    </a> </div>-->
</div>
<div class="clear"></div>
<!--FOOTER-->
