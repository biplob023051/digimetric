
<script type="text/javascript">
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(this).removeData('bs.modal');
    });
</script>
<!--MODAL WINDOW-->
<div class="modal fade" id="jobmodal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">Loading... </div>
    </div>
</div>
<!--MODAL WINDOW-->
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
                        <?php //debug($tests); ?>
                        <!--LISTING OF TESTS HERE -->
                        <div class="col-lg-6 buiscon">
                        <div class="row m_top">
                        <div class="col-lg-12">
                        <div class="abop"> 
                        <h1>This is the <?php echo $tests[0]['Job']['title'] ?> role, which requires candidates to take the following tests 
                            <a href="javascript:void(0);" onclick="show_description();">More</a>
                        </h1>
                        <p id="show_description" style="display:none; text-align:justify">
                        <?php echo stripcslashes($tests[0]['Job']['description']);?>
                        </p>
                        </div>
                        </div>
                    </div>
                    <?php if (!empty($tests)) { ?>
                            <?php foreach ($tests as $key => $value) { ?>
                     <div class="row m_top">
                          <div class="col-lg-8">
                           <div class="abop"> <h1><?php echo $value['Test']['title']; ?></h1></div>
                    </div>
                    <div class="col-lg-4">
                    <a href="<?php echo BASEURL; ?>/job_candidates/test_description/<?php echo $value['Test']['id']; ?>" class="starbtt btn btn-block">
                    Start
                    </a>
                    </div>
                    </div>
                    <?php } ?>
                            <?php } ?>
        </div>

                            <!--LISTING OF TESTS HERE -->
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
<script>
function show_description(){
	$("#show_description").slideToggle("slow");
}
</script>