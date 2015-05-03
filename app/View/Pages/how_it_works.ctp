<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>

<section class=" bg_white" id="how_it_works">
    <div class="container ">
        <div class="text-center sec_text">
            <h2 class="sec_heading">How It Works</h2>
        </div>

        <div class="box_holder hiw_block clearfix">
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="100">
                <h2 class="kapftr_title">Create Role And Select Tests</h2>
                <p class="color_ash">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.quis nostrud exercitation. Dolor sit amet consectetur.
                </p>                
            </div>
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="200">
                <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step1.png"/>
            </div>
            <div id="hit_sec_1" class="box_holder hiw_hidden clearfix">
                <div class="col-sm-12 col-sm-6 col-md-4">
                    <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step1_hidden.png"/>
                </div>
                <div class="col-sm-12 col-sm-6 col-md-8">
                    <h2 class="kapftr_title">Test Recommendations</h2>
                    <p class="color_ash">
                        When you create a particular role we will find the best tests for that role. Only thing you need to do is to tell Digimetrik, the title of the role.
                    </p>
                </div>
            </div>
            <a href="javascript:void(0);" data-src="#hit_sec_1" class="kapftr_link_more hiw_toggle_more">Learn More +</a>
        </div>        
    </div>
</section>

<section class="bg_gray" style="padding-top:0;">
    <div class="container ">
        <div class="box_holder hiw_block clearfix hiw_block_rgt">
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="100">
                <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step2.png"/>
            </div>
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="200">
                <h2 class="kapftr_title">Upload Resumes</h2>
                <p class="color_ash">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Ation.quis nostrud exercitation. Dolor sit amet consectetur adipiscing elit sed do. Sed do eiusmod tempor incididunt ut labore et.
                </p>                
            </div>

            <div id="hit_sec_2" class="box_holder hiw_hidden clearfix">
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step2_hidden1.png"/>
                    <h2 class="kapftr_title">Easy to Use Interface</h2>
                    <p class="color_ash">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
                    </p>
                </div>
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img style="max-height:170px;" alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step2_hidden2.png"/>
                    <h2 class="kapftr_title">Fast Upload</h2>
                    <p class="color_ash">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                    </p>
                </div>
            </div>            
            <a href="javascript:void(0);" data-src="#hit_sec_2" class="kapftr_link_more hiw_toggle_more">Learn More +</a>
        </div>
    </div>
</section>

<section class="bg_white">
    <div class="container ">       
        <div class="box_holder hiw_block clearfix">
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="100">
                <h2 class="kapftr_title">Candidates Automatically<br> Invited to Take Tests</h2>
                <p class="color_ash">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.quis nostrud exercitation. Dolor sit amet consectetur adipiscing elit sed do. Sed do eiusmod tempor incididunt ut labore et.
                </p>                
            </div>
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="200">
                <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step3.png"/>
            </div>
            <div id="hit_sec_3" class="box_holder hiw_hidden clearfix">
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step3_hidden1.png"/>
                    <h2 class="kapftr_title">Adaptive Testing</h2>
                    <p class="color_ash">
                        Digimetrik uses advanced testing algorithm which changes the questions based on candidate&apos;s perfomance.
                    </p>
                </div>
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step3_hidden2.png"/>
                    <h2 class="kapftr_title">Customizable Questions</h2>
                    <p class="color_ash">
                        You can add your own questions easily. Digimetrik’s smart interface will guide you at anytime you need help.
                    </p>
                </div>
            </div>
            <a href="javascript:void(0);" data-src="#hit_sec_3" class="kapftr_link_more hiw_toggle_more">Learn More +</a>
        </div>
    </div>
</section>

<section class="bg_gray" style="padding-top:0;">
    <div class="container ">
        <div class="box_holder hiw_block clearfix hiw_block_rgt">
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="100">
                <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step4.png"/>
            </div>
            <div class="col-sm-12 col-sm-6 col-md-6 bounceIn animated" data-delay="200">
                <h2 class="kapftr_title">View Results Instantly in Talent<br> Analytics Dashboard</h2>
                <p class="color_ash">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Ation.quis nostrud exercitation. Dolor sit amet consectetur adipiscing elit sed do. Sed do eiusmod tempor incididunt ut labore et.
                </p>                
            </div> 
        
            <div id="hit_sec_4" class="box_holder hiw_hidden clearfix">
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step4_hidden1.png"/>
                    <h2 class="kapftr_title">Create Talent Pool</h2>
                    <p class="color_ash">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
                    </p>
                </div>
                <div class="col-sm-12 col-sm-6 col-md-6 text-center">
                    <img style="max-height:170px;" alt="" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/hiw_step4_hidden2.png"/>
                    <h2 class="kapftr_title">Download Results and<br> Share with Colleagues</h2>
                    <p class="color_ash">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                    </p>
                </div>
            </div>
            <a href="javascript:void(0);" data-src="#hit_sec_4" class="kapftr_link_more hiw_toggle_more">Learn More +</a>
        </div>
    </div>
</section>



<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click", ".hiw_toggle_more", function(){
            var IDdiv = $(this).attr('data-src');
            if($(IDdiv).is(':hidden')){
                $(IDdiv).slideDown(200);
                $(this).text('See Less');
            } else {
                $(IDdiv).slideUp(200);
                $(this).text('Learn More +');
            }
        });
    });
</script>