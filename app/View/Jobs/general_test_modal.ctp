        <div class="modal-dialog delmod">
            
            <button type="button" class="closeb" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="col-lg-12 memop padd_zero">

                <!--CONTENT-->
                <table class="tbtesting">
                                            <tbody>
                                                <tr>
                                                    <th colspan="3"><span class=" pull-left  glyphicon glyphicon-info-sign"></span>Test Completed</th>

                                                </tr>

                                                <tr>
                                                    <td>Test Title</td>
                                                    <td>Post Date</td>
                                                </tr>
                                                <?php //debug($tests); ?>

                                                 <?php if(!empty($tests)){ ?>
                                                <?php foreach ($tests as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $value['Test']['title']; ?></td>
                                                    <td><?php 
echo date("d-m-Y", strtotime($value['Test']['created_on']));                                                        
//echo date($value['Test']['created_on']); ?></td>
                                                </tr>
                                                <?php } ?>
                                                <?php } ?>



                                            </tbody>
                                        </table>
                <!--CONTENT-->
                <div class="clearfix"></div>
            </div>
            <div class="clear"></div>
            <!-- END DEVICES --> 
        </div>