
<!--INDEX PAGE CONTENT HERE--> 
<div class="row">
    <?php
    $user_id = $this->Session->read('User');
//   debug($user_id);
    ?>
    <form action="<?php echo BASEURL; ?>/jobs/add" id="JobAddForm" method="POST">
        <div class="col-md-12 padd_zero jobsset ">
            <div class="white_bg spicy ">
                <div class="job_table">
                    <?php echo $this->Session->flash(); ?>
                    <?php // debug($this->validationErrors); ?>
                    <table >
                        <tr>
                            <td>
                                <div class="ftxt">Title:</div>
                            </td>
                            <td>
                                <?php echo!empty($this->validationErrors['Job']['title']) ? "<span style='color:red'>" . $this->validationErrors['Job']['title'][0] . "</span>" : '' ?>
                                <input name="data[Job][title]" type="text" class="form-control orng" placeholder="Please enter the job title" >
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="ftxt">Description:</div>
                            </td>
                            <td>
                                <?php echo!empty($this->validationErrors['Job']['description']) ? "<span style='color:red'>" . $this->validationErrors['Job']['description'][0] . "</span>" : '' ?>
                                <textarea rows="5" cols="10" style="resize:none;" name="data[Job][description]" class="form-control orng" placeholder="Please enter the job description" ></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="ftxt">Category:</div>
                            </td> 
                            <td>
                                <?php echo!empty($this->validationErrors['Job']['job_category_id']) ? "<span style='color:red'>" . $this->validationErrors['Job']['job_category_id'][0] . "</span>" : '' ?>
                                <select name="data[Job][job_category_id]" class="form-control slcts orng" >
                                    <option value="">Select</option>
                                    <?php if (!empty($all_cats)) { ?>
                                        <?php foreach ($all_cats as $k => $v) { ?>

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
                                <?php echo!empty($this->validationErrors['Job']['valid_from']) ? "<span style='color:red'>" . $this->validationErrors['Job']['valid_from'][0] . "</span>" : '' ?>
                                <label for="from">From</label>
                                <input type="text" id="from" name="data[Job][valid_from]" class="form-control orng">
                                 <!--<input type="text" id="todate" name="to" class="form-control orng">-->
<!--                                <input type="text" name="data[Job][valid_upto]" class="form-control orng" placeholder="How long job will be live ?" >-->
                            </td>
<!--                            <td>
                                <label for="from">To</label>
                                <input type="text" id="from" name="from" class="form-control orng">
                                 <input type="text" id="todate" name="to" class="form-control orng">
                                <input type="text" name="data[Job][valid_upto]" class="form-control orng" placeholder="How long job will be live ?" >
                            </td>-->
                        </tr>
                        <tr>
                            <td>
                                <!--<div class="ftxt">Duration:</div>-->
                            </td> 
                            <td>
                                <?php echo!empty($this->validationErrors['Job']['valid_to']) ? "<span style='color:red'>" . $this->validationErrors['Job']['valid_to'][0] . "</span>" : '' ?>
                                <label for="from">To</label>

                                <input type="text" id="todate" name="data[Job][valid_to]" class="form-control orng">
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="ftxt"> Number of applicants for the job:</div>
                            </td> 
                            <td>
                                <?php echo!empty($this->validationErrors['Job']['no_of_applicants']) ? "<span style='color:red'>" . $this->validationErrors['Job']['no_of_applicants'][0] . "</span>" : '' ?>
                                <input name="data[Job][no_of_applicants]" type="text" class="form-control orng" placeholder="Enter the # of applicants allowed for the job" >
                                <!--<textarea style="text-align:justify;" class="form-control mstd orng" >Enter the # of applicants allowed for the job</textarea>-->
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class=" btn oraa pull-right" value="Create"></td>
                        </tr>
                    </table>
                     <div class="clear"></div>
                </div> 
                <div class="clear"></div>
            </div>


            <div class="clear"></div>
        </div>
    </form>
   
    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS FOLDER  --> 

    <?php echo $this->element('job_left_menu', array("job_li" => '<li><a href="' . BASEURL . '/jobs" class="glyphicon glyphicon-briefcase"> JOBS</a></li>')); ?>
   
</div>
<div class="clear"></div>
<!--FOOTER-->
