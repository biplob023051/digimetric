<ul id="gn-menu" class="gn-menu-main">
    <li class="gn-trigger"> <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
        <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
                <ul class="gn-menu">
                    <!---   <li class="gn-search-item"> <a class="glyphicon glyphicon-search">
                         <input placeholder="Search" type="search" class="gn-search " >
                         </a> </li>---->
                    <?php if(isset($job_li)){ echo $job_li; } ?>
                    <li> <a class="glyphicon glyphicon-user"> PROFILE </a> </li>
                    <li> <a href="<?php echo BASEURL ?>/jobs/add" class="glyphicon glyphicon-th-list"> CREATE JOB </a> </li>
                    <li> <a class="glyphicon glyphicon-briefcase"> CANDIDATE </a> </li>
                    <li> <a class=" glyphicon glyphicon-comment"> CHATS </a> </li>
                    <li> <a class="glyphicon glyphicon-flash"> STATISTICS </a> </li>
                    <li> <a class="glyphicon glyphicon-cog"> SETTINGS </a> </li>
                    <li><a href="<?php echo BASEURL ?>/users/logout" class="glyphicon glyphicon-off"> QUIT</a></li>
                </ul>
            </div>
            <!-- /gn-scroller --> 
        </nav>
    </li>
</ul>