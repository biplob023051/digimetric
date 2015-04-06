
<!--INDEX PAGE CONTENT HERE--> 
<style>
    .poping {
        z-index: 99999;
    }
</style>
<div class="row">
    <div class="col-md-12 padd_zero">
        <div class="liquid-slider " id="slider-4">
            <!--JOBS LISTING HERE--> 
            <div>
                <h2 class="title visible-xs hidden-xs">JOBS</h2>
                <div class="col-md-12 padd_zero">
                    <div class="white_bg spicy">
                        <div class="t_head bbs"> JOBS</div>
                        <?php
//                        debug($all_jobs);
                        ?>
                        <?php foreach ($all_jobs as $key => $value) {?>
                        <?php
                        //Associated tests with this job
                        
//                        $test_assoc = $value;
                        
                        
                        ?>
                        
                        <div class="col-md-6">
                            <ul class="jobs_ul">
                                <li> 
                                    <a href="<?php echo BASEURL; ?>/jobs/detail/<?php echo $value['Job']['id']; ?>" class="jobs_label"><?php echo $value['Job']['title']; ?></a> 
                                    <span class="jobs_icon">
                                        <span class="add_img"> <div class="add_job">
                                                <img src="<?php echo BASEURL; ?>/img/add.png" class="add_image ">
                                                <div class="poping">
                                                    <div class="title_pop">Add Test</div>

                                                    <input type="text" placeholder="Search Here" class="srch_id">


                                                    <div class="list_poping">
                                                        <ul style="overflow-y: auto;height: 200px;">
                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li><li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li class="pop_d_selected"> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>

                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                            <li> <a class="pop_d" href="javascript:void(0)"> Introduction  </a> </li>
                                                        </ul>
                                                    </div>


                                                    <input type="submit" value="Add" class="btnis" ><input type="submit" value="Cancel" class="btnis">

                                                    <div class="clear"></div>
                                                </div></div>

                                            <!-- hover details -->

                                            <div class="clear"></div>
                                        </span> <span class="add_img"><div class="add_job"><img src="<?php echo BASEURL; ?>/img/list2.png" class="add_image" > 




                                                <div class="poping" >
                                                    <div class="title_pop">Invite Users</div>

                                                    <input type="text" placeholder="User name" class="popinp">
                                                    <input type="text" placeholder="User Email" class="popinp">

                                                    <div class="addion"><a href="#">+ Add users  </a></div>

                                                    <input type="submit" value="INVITE" class="btnis" >

                                                    <div class="clear"></div>
                                                </div>
                                            </div>                <!-- hover details -->

                                            <div class="clear"></div>
                                        </span> <span class="add_img"><img src="<?php echo BASEURL; ?>/img/delete.png" class="add_image" > 
                                            <!-- hover details --> 
                                        </span>
                                        <div class="clear"></div>
                                    </span>
                                    <div class="clear"></div>
                                </li> 
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!-- JOBS  END HERE  -->
            <div>
                <h2 class="title visible-xs hidden-xs">TOPICS</h2>
                <div class="col-md-12 padd_zero">
                    <div class="white_bg spicy">
                        <div class="t_head bbs"> TOPICS</div>
                        <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp1.png" class="margt"></span> 
                                <span class="theme_bg"> ARTS </span> <span class="after_c"> 100 Tests </span> </a> 
                        </div>
<!--                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp2.png" class="margt"></span> <span class="theme_bg"> Computer Science </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp3.png" class="margt"></span> <span class="theme_bg"> Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp4.png" class="margt"></span> <span class="theme_bg"> Bussiness & Management </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/socl2.png" class="margt"></span> <span class="theme_bg"> Economics & Finance </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp1.png" class="margt"></span> <span class="theme_bg"> ARTS </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp2.png" class="margt"></span> <span class="theme_bg"> Computer Science </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp3.png" class="margt"></span> <span class="theme_bg"> Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tp4.png" class="margt"></span> <span class="theme_bg "> Bussiness & Management </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/socl2.png" class="margt"></span> <span class="theme_bg"> Economics & Finance </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="clear"></div>-->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <!--TOPICS END HERE--> 

            <div>
                <h2 class="title visible-xs hidden-xs">test</h2>
                <div class="col-md-12 padd_zero">
                    <div class="white_bg spicy">
                        <div class="t_head bbs"> Recently Taken tests</div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/basic.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/a2.png" alt="img" ></a> <a href="#"  class="theme_bg">Wireless Communication</a> <a href="#" class=" test_desc">tests the basic knowledge in Wireless Communication</a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/inter.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/a1.png" alt="img" ></a> <a href="#"  class="theme_bg">Introduction to Finance</a> <a href="#" class=" test_desc">tests the basic knowledge in Wireless Communication</a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/advance.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/tp5.png" alt="img" ></a> <a href="#"  class="theme_bg">Social Media </a> <a href="#" class=" test_desc"> Social Media </a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="clear"></div>
                        <div class="t_head bbs"> Most Popular tests</div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/basic.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/a2.png" alt="img" ></a> <a href="#"  class="theme_bg">Wireless Communication</a> <a href="#" class=" test_desc">tests the basic knowledge in Wireless Communication</a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/inter.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/a1.png" alt="img" ></a> <a href="#"  class="theme_bg">Introduction to Finance</a> <a href="#" class=" test_desc">tests the basic knowledge in Wireless Communication</a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12 nopadding main_boxa"> <a href="#" class="top_r"><img src="<?php echo BASEURL; ?>/img/advance.png" class="margtt" > </a> <a href="#" class="top_ico"> <img src="<?php echo BASEURL; ?>/img/tp5.png" alt="img" ></a> <a href="#"  class="theme_bg">Social Media </a> <a href="#" class=" test_desc"> Social Media </a> <a href="#"  class="time_b">Time: 10 Minutes</a> </div>
                        </div>
                        <div class="clear"></div>
                    </div>





                    <!------------------------engineering---------------------------->
                    <div class="white_bg spicy">
                        <div class="t_head bbs"> engineering</div>
                        <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/electri.png" class="margt"></span> <span class="theme_bg"> Electrical Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/comp.png" class="margt"></span> <span class="theme_bg"> Computer Engineering</span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/mechi.png" class="margt"></span> <span class="theme_bg"> Mechanical Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/civil.png" class="margt"></span> <span class="theme_bg">Civil Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/bio.png"class="margt"></span> <span class="theme_bg">Biomedical Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/chemical.png" class="margt"></span> <span class="theme_bg"> Chemical Engineering </span> <span class="after_c"> 100 Tests </span> </a> </div>
                        <div class="clear"></div>
                    </div>

                    <!--                    <div class="white_bg spicy">
                                            <div class="t_head bbs"> Programing</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/css.png" class="margt"></span> <span class="theme_bg">CSS</span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/html.png" class="margt"></span> <span class="theme_bg">HTML</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/js.png" class="margt"></span> <span class="theme_bg">JavaScript </span>  </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/php.png" class="margt"></span> <span class="theme_bg">PHP</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/pythuon.png" class="margt"></span> <span class="theme_bg">Python </span>  </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/ruby.png" class="margt"></span> <span class="theme_bg"> Ruby</span></a> </div>
                                            <div class="clear"></div>
                                        </div>
                    
                                        <div class="white_bg spicy">
                                            <div class="t_head bbs"> Analytic</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/chartbeat.png" class="margt"></span> <span class="theme_bg">Chartbeat</span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/google.png" class="margt"></span> <span class="theme_bg">Google Analytics</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/omniture.png" class="margt"></span> <span class="theme_bg">Omniture </span>  </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/virtul.png" class="margt"></span> <span class="theme_bg">Virtual Revenue
                                                    </span> </a> </div>
                    
                                            <div class="clear"></div>
                                        </div>-->

                    <!--                    <div class="white_bg spicy">
                                            <div class="t_head bbs"> Biomedical Engineering</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/cell.png" class="margt"></span> <span class="theme_bg">Cell and Molecular 
                                                        Biology </span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/bio_m.png" class="margt"></span> <span class="theme_bg"> Biomechanics</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/bio_trans.png" class="margt"></span> <span class="theme_bg">Biotransport</span>  </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/bio_sys.png" class="margt"></span> <span class="theme_bg">Biomedical Systems 
                                                        Analysis and Design
                    
                                                    </span> </a> </div>
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/bio_mat.png" class="margt"></span> <span class="theme_bg">Biomaterials</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/medi.png" class="margt"></span> <span class="theme_bg">
                                                        Medical Image 
                                                        Analysis
                                                    </span> </a> </div>
                    
                    
                                            <div class="clear"></div>
                                        </div>
                    
                                        <div class="white_bg spicy">
                                            <div class="t_head bbs">  Data Visualization</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/d3.png" class="margt"></span> <span class="theme_bg">D3.js</span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/graph.png" class="margt"></span> <span class="theme_bg"> Chart.js</span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/goog_fusion.png" class="margt"></span> <span class="theme_bg">Google Fusion Tables</span>  </a> </div>
                    
                    
                    
                    
                                            <div class="clear"></div>
                                        </div>
                    
                    
                    
                    
                                        <div class="white_bg spicy">
                                            <div class="t_head bbs">  Data Management</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/mysql.png" class="margt"></span> <span class="theme_bg"> MySql </span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/openrefine.png" class="margt"></span> <span class="theme_bg"> OpenRefine </span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/sql.png" class="margt"></span> <span class="theme_bg"> SQL</span>  </a> </div>
                    
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/tabula.png" class="margt"></span> <span class="theme_bg">Tabula</span>  </a> </div>
                    
                    
                    
                                            <div class="clear"></div>
                                        </div>
                    
                                        <div class="white_bg spicy">
                                            <div class="t_head bbs">  Physical Chemistry</div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/chis.png" class="margt"></span> <span class="theme_bg"> Introduction to Chemistry  </span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/orgnicsh.png" class="margt"></span> <span class="theme_bg"> Organic Chemistry </span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/thermo.png" class="margt"></span> <span class="theme_bg"> Thermodynamics </span>  </a> </div>
                    
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/trans.png" class="margt"></span> <span class="theme_bg">Transport process</span>  </a> </div>
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/physical.png" class="margt"></span> <span class="theme_bg">
                                                        Physical Chemistry </span>  </a> </div>
                    
                    
                    
                                            <div class="clear"></div>
                                        </div>
                    
                                        <div class="white_bg spicy">
                                            <div class="t_head bbs"> Computer Engineering </div>
                                            <div class="col-md-2  main_box "> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/algorithm.png" class="margt"></span> <span class="theme_bg"> Algorithms </span></a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/datastrs.png" class="margt"></span> <span class="theme_bg">  Data Structure </span> </a> </div>
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/dbsrtee.png" class="margt"></span> <span class="theme_bg"> Databasess</span>  </a> </div>
                    
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/compdtax.png" class="margt"></span> <span class="theme_bg"> Computer Architecture </span>  </a> </div>
                    
                    
                                            <div class="col-md-2  main_box"> <a href="#"> <span><img src="<?php echo BASEURL; ?>/img/cdsd.png" class="margt"></span> <span class="theme_bg">Programming Fundamentals</span>  </a> </div>
                    
                                            <div class="clear"></div>
                                        </div>-->


                </div>
            </div>

            <!--TESTS END HERE--> 

            <div>
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
                            <section id="grid" class="grid clearfix"> <a href="<?php echo BASEURL; ?>/images/1.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/1.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Police Ride</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/3.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/3.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Eiffel Tower</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/5.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/5.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>My Bike</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/7.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/7.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>3d Eye</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/2.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/2.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Christmas Tree</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/4.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/4.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Walking Man</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/6.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/6.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Basta Design</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> <a href="<?php echo BASEURL; ?>/images/8.png" class="fancybox" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                                    <figure> <img src="<?php echo BASEURL; ?>/images/8.png"/> <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                                        </svg>
                                        <figcaption>
                                            <h2>Tower On River</h2>
                                            <p>Donec accumsan ligula vitae mag na curabitur id</p>
                                            <button>View</button>
                                        </figcaption>
                                    </figure>
                                </a> </section>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--<h2 class="title visible-xs hidden-xs"> Logout </h2>-->
            </div>

            <!--ACTIVITIES END HERE--> 

        </div>
    </div>

    <!--JOB PAGE MENU-->
    <!--KEPT IN ELEMENTS--> 

    <?php echo $this->element('job_left_menu'); ?>
    <!--JOB PAGE MENU-->

    <a href="#" class="search " id="flip" data-toggle="collapse" data-target=".toogle_search"> <img src="<?php echo BASEURL; ?>/img/bigsearchs_search.png" height="26" width="25" alt="img" ></a>
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
        </a> </div>
</div>
<div class="clear"></div>
<!--FOOTER-->
