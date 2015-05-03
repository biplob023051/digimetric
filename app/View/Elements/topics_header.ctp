
<!--<div id="wrapper">-->
<header id="home_header" class="navbar navbar-fixed-top">
    <div id="header_menu">
        <div class="container clearfix">
            <div class="navbar-header">                           
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".app-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="brand">
                    <a href="<?php echo BASEURL; ?>"><img class="img-responsive" src="<?php echo BASEURL; ?>/img/logo.png" alt="DIGIMETRIK"/></a>  
                </div>
            </div>
            <nav class="collapse navbar-collapse app-navbar-collapse" role="navigation"> 
                <ul class="nav navbar-nav navbar-right top_nav">
                    <li <?php if ($this->params['controller'] == 'jobs' && $this->params['action'] == 'index') echo ' class="active"'; ?>>
                        <a id="" href="<?php echo BASEURL; ?>/jobs">Jobs</a>
                    </li>
                    <li <?php if ($this->params['controller'] == 'pages' && $this->params['action'] == 'display') echo ' class="active"'; ?>>
                        <a id="" href="<?php echo BASEURL; ?>/pages/topics">Topics</a>
                    </li>
                    <li class="<?php //echo ($this->params['controller'] == 'tests') ? 'active' : ''; ?>">
                        <a id="" href="<?php echo BASEURL; ?>">Test</a>
                    </li>
                    <li class="<?php //echo ($this->params['controller'] == 'about') ? 'active' : ''; ?>">
                        <a id="about" href="<?php echo BASEURL; ?>">Activities</a>
                    </li>
                </ul>
            </nav>                
            <div class="container clearfix"></div>
            <div id="lang_place" class="hidden-xs">
                <a href="#" class="active">ENG</a>
                <a href="#">TUR</a>
            </div>
        </div>
    </div> 

    <div id="header_top" style="min-height: 40px;height: auto;">
        <div class="container clearfix">
            <ul class="nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle color_white fw_400" data-toggle="dropdown">
                        Enda&nbsp;<img alt="" src="<?php echo BASEURL; ?>/img/profile.png"/>&nbsp;
                        <!--<i class="fa fa-caret-down"></i>-->
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">aaaaa</a></li>
                        <li><a href="#">aaaaa</a></li>
                        <li><a href="#">aaaaa</a></li>
                    </ul>
                </li>
            </ul>
            <div class="user_bar_search_panel">
                <form action="" method="get">
                    <input type="search" id="user_bar_search_box" class="form-control user_bar_search_box"/>
                    <input type="button" id="user_bar_search_btn" class="user_bar_search_btn" value="Go"/>
                </form>
            </div>
        </div>
    </div>
</header>
    <div id="page_indicator_bar">
        <div class="container clearfix">
            <ul class="nav pi_menu">
                <li>
                    <a href="#"><span class="pim_icon pim_hir"></span>Hiring</a>
                </li>
                <li>
                    <a href="#"><span class="pim_icon pim_cands"></span>Candidates</a>
                </li>
                <li>
                    <a href="#"><span class="pim_icon pim_sta"></span>Statistics</a>
                </li>
                <li>
                    <a href="#"><span class="pim_icon pim_set"></span>Settings</a>
                </li>
            </ul>
        </div>
    </div>