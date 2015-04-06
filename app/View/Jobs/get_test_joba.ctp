<!--MODAL WINDOW-->
  <link href="<?php echo BASEURL; ?>/css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo BASEURL; ?>/css/style.css" rel="stylesheet"/>
        <link href="<?php echo BASEURL; ?>/css/responsive.css" rel="stylesheet"/>

    <link href="<?php echo BASEURL; ?>/css/stylelistu.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo BASEURL; ?>/js/custom-form-elements.js" type="text/javascript"></script>

    
    <body>
        <div class="modal-dialog delmod">
            <button type="button" class="closeb" data-dismiss="modal" aria-hidden="true">&times;</button>

            <div class="col-lg-12 memop padd_zero">
                <table>
                    <tr>
                        <td width="50%">
                            <h2 class="text-center">
                                TESTS
                            </h2>

                            <form id="something" action="" method="post">
                                <input type="hidden" name="filterform" value="1" />
                                <ul class="text-left ratios1">
                                    <li class="filter">
                                        <a href="#">Wireless Communication  
                                            <input value="100" name="catall" type="checkbox" class="styled"/>
                                            <span class="img-responsive pull-right">
                                                <img src="<?php echo BASEURL; ?>/img/del.jpg" alt="del"> 
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </form>
                        </td>
<!--                        <td width="50%">
                            <h2 class="text-center">
                                CANDIDATES
                            </h2>
                            <form id="something" action="" method="post">
                                <input type="hidden" name="filterform" value="1" />
                                <ul class="text-left ratios1">
                                    <li>
                                        <a href="#"> mailto@gmail.com
                                            <input value="100" name="catall" type="checkbox" class="styled">  
                                            <span class="img-responsive pull-right">
                                                <img src="<?php echo BASEURL; ?>/img/del.jpg" alt="del">
                                            </span>
                                        </a>
                                    </li>


                                </ul>
                            </form>
                        </td>-->
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="subi">
                                <li>
                                    <input type="submit" value="SAVE" class="btnis">
                                </li>
                                <li>
                                    <input type="submit" value="cancel" class="btnis">
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <div class="clearfix"></div>
            </div>
            <div class="clear"></div>
            <!-- END DEVICES --> 
        </div>
    </body>
<!--MODAL WINDOW-->
