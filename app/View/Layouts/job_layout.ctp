<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Digimetrik');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="demo-1 no-js">
    <!--<![endif]-->
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <script type="text/javascript">
            //<![CDATA[
            try {
                if (!window.CloudFlare) {
                    var CloudFlare = [{verbose: 0, p: 0, byc: 0, owlid: "cf", bag2: 1, mirage2: 0, oracle: 0, paths: {cloudflare: "/cdn-cgi/nexp/dokv=88e434a982/"}, atok: "39ae65e46552ac35b6a524ca972ddd33", petok: "dd05b8668fbd16179fafbdd8532a425297906b66-1407480698-1800", zone: "mannatstudio.com", rocket: "0", apps: {}}];
                    CloudFlare.push({"apps": {"ape": "5087202e9271f79f53ea993851a0312c"}});
                    !function(a, b) {
                        a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "<?php echo BASEURL; ?>/js/cloudflare.min.js", b.parentNode.insertBefore(a, b)
                    }()
                }
            } catch (e) {
            }
            ;
            //]]>
        </script>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/base.css">
        <link rel="stylesheet" class="alt" href="<?php echo BASEURL; ?>/css/theme-red.css">
        <script src="<?php echo BASEURL; ?>/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!--[if lt IE 7]>
                    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                <![endif]-->
        <?php
//        echo $this->Html->meta('icon');
//        echo $this->fetch('meta');
//        echo $this->Html->css('rockox.css');
//        echo $this->Html->css('animate.css');
//        echo $this->Html->css('pie-charts-style.css');
//        echo $this->Html->css('jquery.fancybox8cbb.css?v=2.1.5');
//        echo $this->Html->css('skin.css');
        echo $this->Html->css('bootstrap.css');
//        echo $this->Html->css('style.css');
//        echo $this->Html->css('jquery.selectBox.css');
//        echo $this->Html->css('flexslider.css');
//        echo $this->Html->css('responsive.css');
//        echo $this->fetch('scsript');
        ?>   
        <script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.js"></script> 
    </head>
    <body class="boxed">
        <?php echo $this->element('google_analytics'); ?>
        <div id="pageloader">
            <div class="loader-item"> <img src="<?php echo BASEURL; ?>/images/loader-dark.gif" alt='loader'/> </div>
        </div>
        <div id="nav-bar">
            
        </div>
        <?php echo $this->element('job_header'); ?>
        

        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('job_footer'); ?>
        <?php // echo $this->element('sql_dump'); ?>
    </body>
</html>
