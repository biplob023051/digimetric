<div class="row">
    <div class="col-md-12 padd_zero">

        <div class="liquid-slider " id="slider-4">
            <!--JOBS LISTING HERE--> 
            <!--            <div>
                            <h2 class="title visible-xs hidden-xs">JOBS</h2>
                            <div class="col-md-12 padd_zero">
                                <div class="white_bg spicy">
                                    <div class="t_head bbs"> JOBS <?php echo $this->Session->flash(); ?></div>
            
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>-->
            <!-- JOBS  END HERE  -->

            <!--TOPICS START HERE--> 
            <!--            <div>
                            <h2 class="title visible-xs hidden-xs">TOPICS</h2>
                            <div class="col-md-12 padd_zero">
                                <div class="white_bg spicy">
                                    <div class="t_head bbs"> TOPICS</div>
                                    <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp1.png" class="margt"></span> 
                                            <span class="theme_bg"> ARTS </span> <span class="after_c"> 100 Tests </span> </a> 
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>-->

            <!--TOPICS END HERE--> 

            <!--TESTS START HERE--> 
            <div>
                <h2 class="title visible-xs hidden-xs">test</h2>
                <div class="col-md-12 padd_zero">
                    <div class="white_bg spicy">
                        <div class="desghi">
                            <div class="container-fluid"> 
                                <div class="row descrive">
                                    <div class="testhead ">
                                        <h1>
                                            <img src="<?php echo BASEURL; ?>/images/test-2.png" alt="img"/> 
                                            <!--<span>-->
                                                <?php echo!empty($test_info[0]["Test"]["title"]) ? $test_info[0]["Test"]["title"] : "" ?>
                                            <!--</span>-->
                                            <span style="width: 200px;text-align: center;">
                                                <?php echo $test_info[0]["Difficulty"]["title"] ?>
                                            </span>
                                        </h1>
                                    </div>



                                </div>
                            </div>
                            <div class="container ">
                                <div class="row descrive">
                                    <div class="col-lg-6">
                                        <div class="left"><h3 class="mtop ">Question No.<span id="qus_no">1</span> to <?php echo count($test_questions); ?></h3> </div>
                                    </div>
                                    <div class="col-lg-6"><div class="right">
                                            <div class="row"><div class="timedetail "> Total Time : <?php echo $test_info[0]["Test"]["duration_hour"] ?>(hrs) <?php echo $test_info[0]["Test"]["duration_mins"]; ?>(mins.) <?php echo $test_info[0]["Test"]["duration_secs"]; ?>(secs.) </div> </div>
                                            <div class="row"><div class="timedetail "> Remaining Time : <span data-time="<?php echo!empty($start_timer) ? $start_timer : ""; ?>" class="kkcountdown-1"></span> </div> </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                                <hr size="1" color="#999999" width="100%"  />

                                <div class="row descrive">
                                    <div class="col-lg-12">
                                    <form id="question_form" method="post" action="<?php echo BASEURL;?>/job_candidates/save_test/">
                                       <input type="hidden" id="candidate_test_id" name="data[CandidateTestAnswer][candidate_test_id]" value="<?php echo !empty($candidate_test_id) ? $candidate_test_id : ""; ?>" />
                                        <?php
										//debug($test_questions);
										$rows = count($test_questions);
                                        $i = 1;
                                        foreach ($test_questions as $k => $v) {
											 if (!empty($v['TestQuestionAnswer'])) {
                                                ?>
                                               
                                                <div id="question_<?php echo $i;?>" class="cont">
                                                <h1 class='questions'><?php echo $i; ?>. <?php echo $v["TestQuestion"]["question"] ?>  </h1>
                                                <?php $qid =  $v["TestQuestion"]["id"];?>
                                                <input type="hidden" name="data[CandidateTestAnswer][test_questions][]" value="<?php echo $v["TestQuestion"]["id"];?>" />
                                                <ul class="rrunt">
                                                    <?php

                                                    $j =0;
													foreach ($v["TestQuestionAnswer"] as $k1 => $v1) {
															//first is_correct found counter becomes 1
															if ($v1['is_correct'] == 1) {
																$j++;
																if ($j == 2) {
																	break;
																}
															}
														}
														if ($j < 2) {//single correct
															$type = 'radio';
															$name = "data[CandidateTestAnswer][test_question_answers][$qid][]";
															//$name = 'data[CandidateTestAnswer][test_question_answer_id][]';
														} else {//multiple correct
															$type = 'checkbox';
															$name = "data[CandidateTestAnswer][test_question_answers][$qid][]";
														}	
                                                         foreach ($v["TestQuestionAnswer"] as $k1 => $v1) {                                                       
													?>
                                                        <li> <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" value="<?php echo $v1["id"] ?>" /> <?php echo $v1["answer_text"] ?></li>
                                                    <?php } ?>
                                                </ul>
                                                </div>
                                                  
                                                <?php
                                                unset($type);
                                                unset($name);
                                                $i++;
                                            }
                                        }
                                        ?>
                                        </form>
                                    </div>
                                    <div class="col-lg-12 text-center"><button id='next' type="button" class="next start" value="Start Test">Next</button>
                                                </div>
                                			 
                                </div>

								
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--TESTS END HERE--> 
            <!--ACTIVITIES start HERE-->
            <!--            <div>
                            <h2 class="title visible-xs hidden-xs"> ACTIVITIES </h2>
                            <div class="spicy">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="head-wrap">
                                            <div class="icon-head"> <i class="fa fa-briefcase"></i> </div>
                                            <div class="head-text">
                                                <h1>My ACTIVITIES</h1>
                                                <h4>Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri.</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section id="grid" class="grid clearfix">
                                            <a href="<?php echo BASEURL; ?>/images/1.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                                <figure> <img src="<?php echo BASEURL; ?>/images/1.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                                    <path d="M 180,160 0,218 0,0 180,0 z"/>
                                                    </svg>
                                                    <figcaption>
                                                        <h2>Police Ride</h2>
                                                        <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                                        <button>View</button>
                                                    </figcaption>
                                                </figure>
                                            </a> 
            
                                        </section>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
            
                        </div>-->

            <!--ACTIVITIES END HERE--> 

        </div>
    </div>

    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS--> 

    <?php // echo $this->element('job_left_menu'); ?>
    <!--JOB PAGE MENU-->

    <!--    <a href="#" class="search " id="flip" data-toggle="collapse" data-target=".toogle_search"> <img src="<?php echo BASEURL; ?>/img/bigsearchs_search.png" height="26" width="25" alt="img" ></a>
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
        </a> 
    </div>-->
</div>
<div class="clear"></div>
<!--FOOTER-->
<?php echo $this->Html->script('kkcountdown.min.js'); ?>

<?php echo $this->Html->css('counter_style.css'); ?>
<script type="text/javascript">
$('.cont').addClass('hide');
$('div .cont:nth-last-child(1)').addClass('finish');
$('#question_1').removeClass('hide');


var total_questions = $('.cont').length;
if(total_questions==1){
	$('div .cont:nth-last-child(1)').addClass('finish');
	var chk = $('#question_1').hasClass('finish');
	if(chk){
		$("#next").text('Finish').removeClass('next');
		$(document).on('click','#next',function(){
			 $("#question_form").submit();
		});
	}
}
 var i=1;
 $(document).on('click','.next',function(){
	 var active_question = $("#question_"+i);
	 var current = (active_question.selector);
	 var next  = $(current).addClass('hide').next().removeClass('hide');
	 var is_class = $("#question_"+i).hasClass('finish');
	 if(is_class == true){
		  //$("#next").attr('type',"submit").text('Finish');
		 $("#question_form").submit();
	 }
	 else{
		 $("#qus_no").text(i+1);
	 }
	 i++;
 });
 

$(document).ready(function() {
	$(".kkcountdown-1").kkcountdown({
		dayText: false,
		daysText: false,
		hoursText: 'h ',
		minutesText: 'm ',
		secondsText: 's',
		displayZeroDays: true,
		callback: end_test,
		rusNumbers: false
	});

	
});
function end_test() {
		alert("Time out!!");
		update_test_expire_time();
}
function update_test_expire_time(){
	$.ajax({
			type: "POST",
			data: {'id':<?php echo !empty($candidate_test_id) ? $candidate_test_id : ""; ?>,'expire_time':<?php echo time();?>},
			url: '<?php echo BASEURL;?>/job_candidates/update_test_expire_time/',
			beforeSend:function(){
			},
			success: function(rep) {
				if(rep==true){
					//window.location.href='<?php echo BASEURL;?>/job_candidates/';
					window.location.href='<?php echo BASEURL;?>';
				}
			}
		});
}
</script>