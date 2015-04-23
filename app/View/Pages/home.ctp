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

<div id="flex_area">
    <section id="slide_flex">
        <div class="flexslider">
            <ul class="slides">   
                <li class="text-center">
                    <div class="container ghd ">
                        <h1 class=" text-center bounceIn animated" data-delay="100">
                            We connect your business with the best talent<br>
                            in a fast and affordable way.
                        </h1>
                        <div class="clearfix"></div>
                    </div>
                    <a class="btn btn_orange btn_roll btn_hs" href="#" data-delay="100">Hire Smarter</a>
                </li>
                <li class="text-center">
                    <div class="container ghd ">
                        <h1 class=" text-center bounceIn animated" data-delay="100">
                            We connect your business with the best talent<br>
                            in a fast and affordable way.
                        </h1>
                        <div class="clearfix"></div>
                    </div>
                    <a class="btn btn_orange btn_roll btn_hs" data-delay="100" href="#">Hire Smarter</a>
                </li>            
            </ul>
        </div>
    </section>
    <section id="slide_flex_bottom" class="bg_gray">
        <div class="container text-center">
            <span class="color_orange">Digimetrik:</span> Providing talent assessment for small and medium size businesses.
        </div>
    </section>
</div>

<!-- BEGIN EXPERIENCE SECTION -->
<div id="intel">
    <section class="no-padding-bottom experience bg_white" >
        <div class="container ">
            <div class="text-center sec_text">
                <h2 class="sec_heading">We test, you decide.</h2>
                <p>Digimetrik will help you to select the right person for the job. </p>
            </div>
            <div id="vid_container">
                <div id="video_panel" class="bg_gray">
                    <iframe width="100%" height="463" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/ujjjBdFFEmE?list=UU_ZYo8S9i9vc-6OJSzpSrSg&amp;rel=0"></iframe>
                </div>
                <div id="vid_shadow">
                    <!--<img alt="" class="img-responsive" src="<?php //echo BASEURL;           ?>/img/vid_shadow.png"/>-->
                </div>
            </div>            
        </div>
    </section>

    <div id="vid_pnl_btm" class="bg_gray"></div>

    <section class=" bg_white" >
        <div class="container ">
            <div class="text-center sec_text">
                <h2 class="sec_heading">knowledge Assessment Platform for Technical Recruiting</h2>
            </div>
            <div class="box_holder clearfix">
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="100">
                    <img alt="Access Knowledge of Job Candidates" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/access_knowledge.png"/>
                    <h2 class="kapftr_title text-center">Assess Knowledge of Job Candidates</h2>
                    <p class="txt_hide">With Digimetrik, you can assess the knowledge of your job candidates by using subject-specific assessment tests.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="200">
                    <img alt="Fast and Accurate" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/fats_accurate.png"/>
                    <h2 class="kapftr_title text-center" style="height: 50px;">Fats and Accurate</h2>
                    <p class="txt_hide">Log into your account, assign knowledge assessment tests to your job candidates, and see their performance right away.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr kapftr_last text-center bounceIn animated" data-delay="300">
                    <img alt="Amazing Job" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/amazing_job.png"/>
                    <h2 class="kapftr_title text-center">It Only Takes One Right Hire to do an Amazing Job</h2>
                    <p class="txt_hide">Finding the best fit for the position will create an efficient and happy work environment.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
            </div>
        </div>
    </section>

    <section id="get_started" class="big_bg">
        <div class="container text-center">
            <h1 class="title_txt bounceIn animated" dat-delay="100">Digimetrik provides customizable knowledge assessment<br> tests in Science, Engineering,and Technology.</h1>
            <a href="#" class="btn btn_orange   btn_gs">Get Started</a>
        </div>
    </section>

    <section class=" bg_white" >
        <div class="container ">
            <div class="text-center sec_text">
                <h2 class="sec_heading">Our Assessment</h2>
            </div>
            <div class="box_holder clearfix">
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="100">
                    <img alt="Access Knowledge of Job Candidates" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/engineering.png"/>
                    <h2 class="kapftr_title text-center">Engineering</h2>
                    <p class="txt_hide">Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit, sed do<br> eiusmod tempor incididunt ut labore<br> et dolore magna aliqua.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="200">
                    <img alt="Fast and Accurate" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/science.png"/>
                    <h2 class="kapftr_title text-center">Science</h2>
                    <p class="txt_hide">Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit, sed do<br> eiusmod tempor incididunt<br> ut labore et dolore.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr kapftr_last text-center bounceIn animated" data-delay="300">
                    <img alt="Amazing Job" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/tecnology.png"/>
                    <h2 class="kapftr_title text-center">Technology</h2>
                    <p class="txt_hide">Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit, sed do<br> eiusmod tempor.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
            </div>
        </div>
    </section>

    <section id="create_account" class="big_bg">
        <div class="container text-center">
            <h1 class="title_txt bounceIn animated" dat-delay="100">Our Talent Analytics Dashboard identifies<br> the best candidates in real-time.</h1>
            <a href="#" class="btn btn_orange  btn_ca">Create Account</a>
        </div>
    </section>

    <section class=" bg_white" >
        <div class="container ">            
            <div class="box_holder clearfix">
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="100">
                    <img alt="Access Knowledge of Job Candidates" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/time.png"/>
                    <h2 class="kapftr_title text-center">Save Time and Energy<br> During Hiring</h2>
                    <p class="txt_hide">Test as many candidates as you want<br> simultaneously. After you see<br> the results, decide which candidates you<br> should focus your time and energy on.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr text-center bounceIn animated" data-delay="200">
                    <img alt="Fast and Accurate" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/analytics.png"/>
                    <h2 class="kapftr_title text-center">Talent Analytics<br> Dashboard</h2>
                    <p class="txt_hide">See the performance results of job<br> candidates in real-time. Each and<br> every candidate's performance result<br> is shown under your account.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
                <div class="col-sm-12 col-sm-4 col-md-4 kapftr kapftr_last text-center bounceIn animated" data-delay="300">
                    <img alt="Amazing Job" class="img-responsive auto_mrg" src="<?php echo BASEURL; ?>/img/print.png"/>
                    <h2 class="kapftr_title text-center">Print and Share<br> the Results</h2>
                    <p class="txt_hide">Print and share the results of<br> candidate assessments with other<br> decision makers in your organization.<br> It's fast and easy.</p>
                    <a href="#" class="kapftr_link_more">Learn More+</a>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg_gray" >
        <div class="container ">            
            <div class="text-center sec_text">
                <h2 class="sec_heading">From The Words Of Our Clients</h2>
            </div>
            <div id="client_blog" style="position: relative;">
                <div class="flexslider2">
                    <ul class="slides">   
                        <li class="text-center clearfix">
                            <div class="col-xs-12 col-sm-6 col-md-6 txt_slide_div pull-left">
                                <div class="bg_white cslider_txt">
                                    "Very easy to use. I'm good to go. 
                                    Thanks guys, keep up the good work!
                                    Best regards!"
                                </div>
                                <div class="cslider_user clearfix">
                                    <div class="col-xs-4 col-sm-4 cslider_user_img pull-left">
                                        <img alt="" class="img-responsive" src="<?php echo BASEURL; ?>/img/user_kr.png"/>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 cslider_user_info pull-left">
                                        <strong class="uname_f20">Keanu Reeves</strong>
                                        <p>Company Name and Location</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 txt_slide_div pull-right">
                                <div class="bg_white cslider_txt">
                                    "I am completely blown away. Thank you for making it painless, pleasant and most of all hassle free!"
                                </div>
                                <div class="cslider_user">
                                    <div class="col-xs-4 col-sm-4 cslider_user_img pull-left">
                                        <img alt="" class="img-responsive" src="<?php echo BASEURL; ?>/img/user_eve.png"/>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 cslider_user_info pull-left">
                                        <strong class="uname_f20">Eva Mendes</strong>
                                        <p>Company Name and Location</p>
                                    </div>
                                </div>
                            </div>
                        </li>                                   
                        <li class="text-center clearfix">
                            <div class="col-xs-12 col-sm-6 col-md-6 txt_slide_div pull-left">
                                <div class="bg_white cslider_txt">
                                    "Very easy to use. I'm good to go. 
                                    Thanks guys, keep up the good work!
                                    Best regards!"
                                </div>
                                <div class="cslider_user clearfix">
                                    <div class="col-xs-4 col-sm-4 cslider_user_img pull-left">
                                        <img alt="" class="img-responsive" src="<?php echo BASEURL; ?>/img/user_kr.png"/>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 cslider_user_info pull-left">
                                        <strong class="uname_f20">Keanu Reeves</strong>
                                        <p>Company Name and Location</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 txt_slide_div pull-right">
                                <div class="bg_white cslider_txt">
                                    "I am completely blown away. Thank you for making it painless, pleasant and most of all hassle free!"
                                </div>
                                <div class="cslider_user">
                                    <div class="col-xs-4 col-sm-4 cslider_user_img pull-left">
                                        <img alt="" class="img-responsive" src="<?php echo BASEURL; ?>/img/user_eve.png"/>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 cslider_user_info pull-left">
                                        <strong class="uname_f20">Eva Mendes</strong>
                                        <p>Company Name and Location</p>
                                    </div>
                                </div>
                            </div>
                        </li>                                   
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe_newsletter" class="big_bg">
        <div class="container text-center">
            <img alt="" class="img-responsive" src="<?php echo BASEURL; ?>/img/paper_ap.png" style="margin: 40px auto 0px;"/>
            <h1 class="title_txt bounceIn animated" dat-delay="100">Subscribe to our newsletter today to learn about the best<br> practices in knowledge assessment and talent acquisition.</h1>
            <div class="subscription_form clearfix">
                <form accept-charset="utf-8" action="" method="post">
                    <input type="email" class="form-control" placeholder="Enter your email address..."/>
                    <input type="button" class="btn btn_subscribe" value="SUBSCRIBE"/>
                </form>
            </div>
        </div>
    </section>    
</div>
