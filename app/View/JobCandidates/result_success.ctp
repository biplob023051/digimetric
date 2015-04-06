<div class="row">
    <div class="col-md-12 padd_zero">

        <div class="liquid-slider " id="slider-4">
            <!--JOBS LISTING HERE--> 
            <!--TESTS START HERE--> 
            <div>
                <h2 class="title visible-xs hidden-xs">Success</h2>
                <div class="col-md-12 padd_zero">
                    <div class="white_bg spicy">
                        <div class="desghi">
                            <div class="container-fluid"> 
                                <div class="row descrive">
                                    <div class="testhead ">
                                        
                                    </div>



                                </div>
                            </div>
                            <div class="container ">
                                <div class="row descrive">
                                    <div class="col-lg-6">
                                        <div class="left"><h3 class="mtop ">Your result has beed successfully submitted</h3> </div>
                                       <div class="left"><h3 class="mtop "><a href="<?php echo BASEURL;?>/">Go back to account</a></h3> </div>

                                    </div>
                                    

                                </div>
                                <hr size="1" color="#999999" width="100%"  />
                                <div class="page-header"><h2><?php echo __('Test Rangkigs');?></h2></div>
                                <div class="table-responsive">
                                    <table cellpadding="0" cellspacing="0"  class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center col-md-1"><?php echo __('SL'); ?></th>
                                                <th class="text-center"><?php echo __('CANDIDATE EMAIL'); ?></th>
                                                <th class="text-center"><?php echo __('RANKING'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; ?>
                                            <?php foreach ($results as $key => $result): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $count; ?></td>
                                                    <td class="text-center"><?php echo h($result['JobCandidate']['email']); ?></td>
                                                    <td class="text-center"><?php echo h($result['CandidateRanking']['result']) . '(' . h($result['CandidateRanking']['total']) . ')'; ?></td>
                                                </tr>
                                            <?php 
                                                $count++;
                                                endforeach; 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                

								
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS--> 

   
</div>
<div class="clear"></div>
<!--FOOTER-->
