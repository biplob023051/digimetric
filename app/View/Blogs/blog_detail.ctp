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
<!-- END HEADER -->
<!-- BEGIN BANNER -->
<!--<div class="share42init"></div>-->
<!--<script type="text/javascript" src="http://site.name/share42/share42.js"></script>-->

<!--<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "c7300693-836a-4041-a5c6-738999dd8cc9", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>-->
<!--<span class='st_facebook_hcount' displayText='Facebook'></span>-->

<!--<span class='st_twitter_hcount' displayText='Tweet'></span>--> 
<div class="flexslider blogu">

    <ul class="slides">   

        <li>
            <div class="container ghd ">
                <h1 class=" text-center bounceIn animated" data-delay="100">BLOG</h1>
            </div>

        </li>

        <li>
            <div class="container ghd ">
                <h1 class=" text-center bounceIn animated" data-delay="100">BLOG</h1>
            </div>

        </li>

    </ul>


</div>

<!--
<a href="#experience" class="bot"><img src="img/bottom.png" alt="img"/></a>-->
<div class="clearfix"></div>
</div>
</header>
<!--------->

<section class="blog" id="blog">
    <div class="container">
        <div class="row">
            <?php // debug($blog_detail); ?>
            <div class="col-lg-8 col-sm-8 ">
                <div class="blog_list">
                    <ul>
                        <?php if (!empty($blog_detail)) { ?>
                            <?php foreach ($blog_detail as $key => $value) { ?>
                                <li>
        <!--                                    <a href="<?php echo BASEURL; ?>/blogs/blog_detail/<?php echo $value['Blog']['id']; ?>" class="tit_blog"> 
                                        
                                    </a>-->
                                    <div class="tit_blog"> 
                                        <?php echo $value['title']; ?>

                                    </div>
                                    <div class="blogu_likn">
                                        <span class="dateaug"> 
                                          <?php echo $value['published_on']; ?>
                                        </span>  
                                        <span class="marks"> by 
                                            <a href="javascript:void(0)"><?php echo ucfirst($value['publish_by']); ?></a>
                                        </span>
                                        <?php
//                                        $tag_array = $value['BlogTag'];
                                        $all_tags = array();
                                        $color = '';
//                                        debug($blog_tag);
                                        if (!empty($blog_tag)) {
                                            foreach ($blog_tag as $keyt => $valuet) {
//                                                debug($value);
                                                $bid = $valuet['BlogTag']['tag'];
                                                if (!empty($selectedtag)) {
                                                    if ($selectedtag == $bid) {
                                                        $color = '#ff5c00';
                                                    } else {
                                                        $color = '';
                                                    }
                                                }
                                                $all_tags[] = "<a style='color:" . $color . "' href='" . BASEURL . "/blogs/index/" . $bid . "'>" . $valuet['BlogTag']['tag'] . "</a>";
                                            }
                                        }
                                        ?>
                                        <span class="marks_tags"> 
                                            <?php echo!empty($all_tags) ? "Tags : " . implode(",", $all_tags) : ''; ?>
                                        </span>
                                        <div class="clear"></div>

                                    </div>
                                    <div class="clear"></div>



                                    <div class="sbpar_blog">   
                                        <?php echo $value['long_desc']; ?>
                                    </div>

                                    <?php if (!empty($blog_file)) { ?>
                                        <?php $img ='';// debug($blog_file); ?>
                                        <?php foreach ($blog_file as $keys => $values) { ?>
                                            <?php if($keys==0){
                                                $img = $values['BlogFile']['file'];
                                            } ?>    
                                            <div class="row">
                                                <!-- BEGIN DEVICES -->
                                                <div class=" text-center devices bounceInUp vedio" data-delay="100">
                                                    <img  src="<?php echo BASEURL; ?>/uploads/<?php echo $values['BlogFile']['file']; ?>" width="100%"  alt=""></div>

                                                <!-- END DEVICES -->
                                            </div>
                                        <?php } ?>
                                    <?php } ?>


                                </li>
                                <div data-image="<?php echo BASEURL; ?>/uploads/<?php if(!empty($img)){ echo $img; } ?>" data-url="<?php echo BASEURL; ?>/blog/<?php echo $value['slug']; ?>" data-title="<?php echo $value['title']; ?>" class="share42init"></div>
                            <?php } ?>
                        <?php } ?>
                                <?php // debug(); ?>
<!--                                <span class='st_email_hcount' displayText='Email'></span>-->
                                
                    </ul>


                </div>
            </div>

            <div class="col-lg-4 col-sm-4 ">
                <div class="tit_blog_bord "> Archive</div>
                <div class="col-lg-12">
                    <?php
                    // debug($month);
                    if (isset($month)) {
                        $m = $month;
                    } else {
                        $m = 0;
                    }
//                    echo $m;
                    ?>
                    <form action="<?php echo BASEURL; ?>/blogs/index" method="post">
                        <select class="month" name="archive" onchange="this.form.submit()">
                            <option <?php
                            if ($m == 0) {
                                echo "selected";
                            }
                            ?> value="0">Select Month</option>
                            <option <?php
                            if ($m == 1) {
                                echo "selected";
                            }
                            ?> value="1">January</option>
                            <option <?php
                            if ($m == 2) {
                                echo "selected";
                            }
                            ?> value="2">February</option>
                            <option <?php
                            if ($m == 3) {
                                echo "selected";
                            }
                            ?> value="3">March</option>
                            <option <?php
                            if ($m == 4) {
                                echo "selected";
                            }
                            ?> value="4">April</option>
                            <option <?php
                            if ($m == 5) {
                                echo "selected";
                            }
                            ?> value="5">May</option>
                            <option <?php
                            if ($m == 6) {
                                echo "selected";
                            }
                            ?> value="6">June</option>
                            <option <?php
                            if ($m == 7) {
                                echo "selected";
                            }
                            ?> value="7">July</option>
                            <option <?php
                            if ($m == 8) {
                                echo "selected";
                            }
                            ?> value="8">August</option>
                            <option <?php
                            if ($m == 9) {
                                echo "selected";
                            }
                            ?> value="9">September</option>
                            <option <?php
                            if ($m == 10) {
                                echo "selected";
                            }
                            ?> value="10">October</option>
                            <option <?php
                            if ($m == 11) {
                                echo "selected";
                            }
                            ?> value="11">November</option>
                            <option <?php
                            if ($m == 12) {
                                echo "selected";
                            }
                            ?> value="12">December</option>

                        </select>
                    </form>
                </div>

                <div class="clear"></div>
                <!--                <div class="tit_blog_bord m_top "> Archive</div>
                
                                <a href="#" class="tags"><img src="<?php echo BASEURL; ?>/img/tags.png" width="100%" alt="img" class="text-center"></a>-->

            </div>

        </div>
    </div>
</section>  

<div class="clearfix"></div>