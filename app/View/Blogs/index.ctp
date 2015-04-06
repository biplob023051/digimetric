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
            <?php // echo $selectedtag;
// debug($all_blogs); ?>
            <div class="col-lg-8 col-sm-8 ">
                <div class="blog_list">
                    <ul>
                        <?php if (!empty($all_blogs)) { ?>
                            <?php foreach ($all_blogs as $key => $value) { ?>
                                <?php // debug($value); ?>
                                <li>
                                    <a href="<?php echo BASEURL; ?>/blog/<?php echo $value['Blog']['slug']; ?>" class="tit_blog"> 
                                        <?php echo $value['Blog']['title']; ?>
                                    </a>

                                    <div class="blogu_likn">
                                        <span class="dateaug"> 
                                            <?php // $date = DateTime::createFromFormat('Y-m-d', $value['Blog']['published_on']); ?>
                                            <?php // echo $date->format('M d,Y'); ?>
                                            <?php echo $value['Blog']['published_on']; ?>
                                        </span>  
                                        <span class="marks"> by <a href="javascript:void(0)"><?php echo ucfirst($value['Blog']['publish_by']); ?></a>
                                        </span>
                                        <?php
                                        $tag_array = $value['BlogTag'];
                                        $all_tags = array();
                                        $color = '';
                                        if (!empty($tag_array)) {
                                            foreach ($tag_array as $keyt => $valuet) {
//                                                debug($value);
                                                $bid = $valuet['tag'];
                                                if (!empty($selectedtag)) {
                                                    if (trim(strtolower($selectedtag)) == trim(strtolower($bid))) {
                                                        $color= '#ff5c00';
                                                    }  else {
                                                        $color = '';
                                                    }
                                                }
                                                $all_tags[] = "<a style='color:".$color."' href='" . BASEURL . "/blogs/index/".trim($bid)."'>".$valuet['tag']."</a>";
                                            }
                                        }
                                        ?>
                                        <?php // echo BASEURL; ?>
                                        <!--/blogs/index/-->
                                        <?php // echo $value['BlogTag']['tag'];  ?>
                                        <span class="marks_tags"> 
                                            <?php echo!empty($all_tags) ? "Tags : " . implode(",",$all_tags) : ''; ?>
                                        </span> 

                                        <div class="clear"></div>

                                    </div>
                                    <div class="clear"></div>



                                    <div class="sbpar_blog">   
                                        <?php echo $value['Blog']['description']; ?>
                                    </div>
                                    <?php if (!empty($value['BlogFile'])) { ?>
                                        <?php // debug($value['BlogFile']); ?>
                                        <?php foreach ($value['BlogFile'] as $keys => $values) { ?>
                                            <?php if($keys==0){
                                            $bimg = $values['file'];
                                            } ?>

                                            <div class="row">
                                                <!-- BEGIN DEVICES -->
                                                <div class=" text-center devices bounceInUp vedio" data-delay="100">
                                                    <img src="<?php echo BASEURL; ?>/uploads/<?php echo $values['file']; ?>" width="100%"  alt="">
                                                </div>

                                                <!-- END DEVICES -->
                                            </div>
                                        <?php } ?>
                                        <!--                                    <div class="row">
                                                                                 BEGIN DEVICES 
                                                                                <div class=" text-center devices bounceInUp vedio" data-delay="100">
                                                                                    <img src="<?php echo BASEURL; ?>/uploads/<?php echo $value['BlogFile']['file']; ?>" width="100%"  alt="">
                                                                                </div>
                                        
                                                                                 END DEVICES 
                                                                            </div>-->
                                    <?php }else{ ?>
                                    <?php $bimg = ''; } ?>
                                        <div data-image="<?php echo BASEURL; ?>/uploads/<?php echo $bimg; ?>" data-url="<?php echo BASEURL; ?>/blog/<?php echo $value['Blog']['slug']; ?>" data-title="<?php echo $value['Blog']['title']; ?>" class="share42init">
                                        </div>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>
                                <div class="tit_blog"> 
                                    Sorry!,No blogs 

                                </div>
                            </li>
                        <?php } ?>


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
                    <form action="<?php echo BASEURL; ?>/blogs/index/" method="post">
                        <?php // echo !empty($selectedtag) ? $selectedtag :''  ?>
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
                <style>
                    .tagclass a:visited{
                        font-weight: bold;
                    }
                </style>
                <div class="clear"></div>
                <div class="tit_blog_bord m_top "> Tags</div>
                <?php if (!empty($all_tagss)) { ?>
                    <?php foreach ($all_tagss as $key => $value) { ?>               
                        <div class="tagclass">
                            <a <?php if (!empty($selectedtag)) { if (trim(strtolower($selectedtag)) == trim(strtolower($value['BlogTag']['tag']))) { ?> style="font-weight: bold;" <?php }} ?> href="<?php echo BASEURL; ?>/blogs/index/<?php echo trim($value['BlogTag']['tag']); ?>" class="tags"><?php echo $value['BlogTag']['tag']; ?>
                            </a>
                        </div>
                    <?php } ?>

                <?php } ?>


            </div>

        </div>
    </div>
</section>  

<div class="clearfix"></div>