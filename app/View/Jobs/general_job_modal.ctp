        <div class="modal-dialog delmod">
            
            <button type="button" class="closeb" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="col-lg-12 memop padd_zero">
                <table class="tbtesting">
<?php //debug($posted_jobs); ?>
                                            <tbody>
                                                <tr>
                                                    <th colspan="3">
<span class=" pull-left  glyphicon glyphicon-info-sign">
</span>
Position Posted
</th>

                                                </tr>

                                                <tr>
                                                    <td>Job Title</td>
                                                    <td>Post Date</td>
                                                </tr>
                                                <?php if(!empty($posted_jobs)){ ?>
                                                <?php foreach ($posted_jobs as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $value['Job']['title']; ?></td>
                                                    <td><?php 
echo date("d-m-Y", strtotime($value['Job']['created_on']));                                                        
//echo date($value['Job']['created_on']); ?></td>
                                                </tr>
                                                <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                <div class="clearfix"></div>
            </div>
            <div class="clear"></div>
            <!-- END DEVICES --> 
        </div>