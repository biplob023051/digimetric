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


<section class="bg_white">
    <div class="container ">
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#">
                <span class="icon_topics arts"></span>
                <span class="topics_title">Arts</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#" class="selected">
                <span class="icon_topics eng"></span>
                <span class="topics_title">Engineering</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#">
                <span class="icon_topics c_scince"></span>
                <span class="topics_title">Computer Science</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#">
                <span class="icon_topics b_and_m"></span>
                <span class="topics_title">Business &AMP; Management </span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#">
                <span class="icon_topics eco_fin"></span>
                <span class="topics_title">Economics &AMP; Finance</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 t_pics">
            <a href="#">
                <span class="icon_topics fin"></span>
                <span class="topics_title">Finance</span>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container">
        <ul class="nav nav-tabs t_tabs" role="tablist" id="engineeringTab">
            <li role="presentation">
                <a href="#eng" aria-controls="eng" role="tab" data-toggle="tab">
                    <span class="t_tabs_icon t_tabs_eng"></span>&nbsp;Engineering
                    <span class="after_arrow"></span>
                </a>
            </li>
            <li role="presentation">
                <a href="#eee" aria-controls="eee" role="tab" data-toggle="tab">
                    <span class="t_tabs_icon t_tabs_ee"></span>&nbsp;Electrical Engineering
                    <span class="after_arrow"></span>
                </a>
            </li>
            <li role="presentation">
                <a href="#wifi" aria-controls="wifi" role="tab" data-toggle="tab">
                    <span class="t_tabs_icon t_tabs_wifi"></span>&nbsp;Wireless Communication
                    <span class="after_arrow"></span>
                </a>
            </li>
            <li role="presentation" class="active">
                <a href="#4g_sys" aria-controls="4g_sys" role="tab" data-toggle="tab">
                    <span class="t_tabs_icon t_tabs_4g"></span>&nbsp;4G System
                    <span class="after_arrow"></span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="eng">
                <h2 class="t_tab_title">Engineering <span class="t_tab_title_label t_basic">Basic</span></h2>
            </div>
            <div role="tabpanel" class="tab-pane" id="eee">
                <h2 class="t_tab_title">Electrical Engineering <span class="t_tab_title_label t_basic">Basic</span></h2>
            </div>
            <div role="tabpanel" class="tab-pane" id="wifi">
                <h2 class="t_tab_title">Wireless Communication <span class="t_tab_title_label t_basic">Basic</span></h2>
            </div>
            <div role="tabpanel" class="tab-pane active" id="4g_sys">
                <h2 class="t_tab_title">4G System <span class="t_tab_title_label t_basic">Basic</span></h2>
                <p class="t_txt">Tests the basic knowledge in 4G Systems.</p>
                <p class="t_txt">Duration : <strong>10 min</strong></p>
                <p class="t_txt">Language : <strong>English</strong></p>
                <p class="t_txt" style="margin-top: 30px;"><strong>Test is useful for following roles:</strong></p>
                <ul class="listing">
                    <li>Junior 4G/LTE Systems Engineer</li>
                    <li>Junior 4G/LTE Software Engineer</li>
                    <li>Junior 4G/LTE Test/Lab Engineer</li>
                    <li>4G/LTE RF Testing/Drive Test Engineer</li>
                </ul>
                <p class="t_txt"><a href="#">+ Sign up today to learn more</a></p>

                <h2 class="t_tab_title">Answer to common queries</h2>
                <p class="t_txt"><strong>Can I add my own questions?</strong></p>
                <p class="t_txt">Absolutely. You can add your own questions to your tests. If you want specific tests to be developed for a particular role you are hiring, please contact us.</p>
                <p class="t_txt" style="margin-top: 30px;"><strong>Will I pay for each test?</strong></p>
                <p class="t_txt">No. Digimetrik provides unlimited number of test for a montly flat fee. No hidden costs.</p>
                <p class="t_txt" style="margin-top: 30px;"><strong>Will I pay for each candidate?</strong></p>
                <p class="t_txt">No. Digimetrik provides unlimited testing for unlimited number of candidates for a montly flat fee. No hidden costs.</p>
                <p class="t_txt" style="margin-top: 30px;"><strong>Can I share the test results with my colleges?</strong></p>
                <p class="t_txt">Yes. You can share test results through our Candidate Analytics Dashboard easily. </p>
                
                <h2 class="t_tab_title">Related Tests</h2>
                
                <ul class="listing_link">
                    <li><a href="#">Wireless Communications</a></li>
                    <li><a href="#">3G Systems</a></li>
                    <li><a href="#">5G Systems</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
