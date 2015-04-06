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
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->Html->css('rockox.css');
        echo $this->Html->css('animate.css');
        echo $this->Html->css('pie-charts-style.css');
        echo $this->Html->css('jquery.fancybox8cbb.css?v=2.1.5');
        echo $this->Html->css('skin.css');
        echo $this->Html->css('bootstrap.css');
        echo $this->Html->css('style.css');
        echo $this->Html->css('jquery.selectBox.css');
        echo $this->Html->css('flexslider.css');
        echo $this->Html->css('responsive.css');
//        echo $this->fetch('scsript');
        ?>   
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--> 
        <?php
        ?>
    </head>
    <body>

        <?php echo $this->element('home_header'); ?>
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('home_footer'); ?>
        <?php // echo $this->element('sql_dump'); ?>
    </body>
</html>
