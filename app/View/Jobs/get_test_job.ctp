        <script>
        function remove_action(action, id) {
        
        if(action=='test'){
            $("#jt_"+id).hide();
            //$("#jtinput_"+id).val(1); 
            $("#jtinput_"+id).attr('checked',true);
        }else if(action=='candidate'){
            $("#jc_"+id).hide();
            //$("#jcinput_"+id).val(1);    
            $("#jcinput_"+id).attr('checked',true);
        }
        
    }       
    function update_test_candidate(job_id){
        
        var baseurl = '<?php echo BASEURL; ?>';
        var formdata = $("#formuupdatedata_" + job_id).serializeArray()
        console.log(formdata);
            $.ajax({
            type: "POST",
            data: formdata,
            url: baseurl + '/jobs/update_test_candidate',
            success: function(rep) {
                console.log(rep)
obj = JSON.parse(rep);
                if (obj.status == 1) {
                    alert(obj.message);
                } else {
                    alert(obj.message);
                }

                

            }
        });

        }





        </script>

        <div class="modal-dialog delmod">
            
            <button type="button" class="closeb" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="col-lg-12 memop padd_zero">
                <form id="formuupdatedata_<?php echo $job_id; ?>" action="" method="post">
                <table>
                    <tr>
                        <td>
                            <h2 class="text-center">
                                TESTS
                            </h2>

                            
                               
                                <ul class="text-left ratios1">
                                    <?php //debug($all_tests); ?>
                                    <?php if(!empty($all_tests)){ ?>
                                    <?php foreach ($all_tests as $key => $value) { ?>    
                                    <li class="filter" id="jt_<?php echo $value['JobTest']['id']; ?>">
                                        <a href="javascript:void(0)"><?php echo $value['Test']['title']; ?> 
                                           <input value="<?php echo $value['JobTest']['id']; ?>" id="jtinput_<?php echo $value['JobTest']['id']; ?>" style="display:none" name="jt[]" type="checkbox" class="styled"> 
                                            <span onclick="remove_action('test',<?php echo $value['JobTest']['id']; ?>)" class="img-responsive pull-right">
                                                <img src="<?php echo BASEURL; ?>/img/del.jpg" alt="del"> 
                                            </span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <li><a>No test(s)</a></li>
                                    <?php } ?>
                                </ul>
                            
                        </td>
                      <td>
                            <h2 class="text-center">
                                CANDIDATES
                            </h2>
                            
                                
                                <ul class="text-left ratios1">
                                    <?php //debug($all_candidates); ?>
                                    <?php if(!empty($all_candidates)){ ?>
                                    <?php foreach ($all_candidates as $key => $value) { ?>
                                        <li id="jc_<?php echo $value['JobCandidate']['id']; ?>">
                                        <a href="javascript:void(0)"> <?php echo $value['JobCandidate']['email']; ?>
                                            <input value="<?php echo $value['JobCandidate']['id']; ?>" id="jcinput_<?php echo $value['JobCandidate']['id']; ?>" name="jc[]" type="checkbox" class="styled" style="display:none">
                                            <span onclick="remove_action('candidate',<?php echo $value['JobCandidate']['id']; ?>)" class="img-responsive pull-right">
                                                <img src="<?php echo BASEURL; ?>/img/del.jpg" alt="del">
                                            </span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <li><a>No Candidate(s)</a></li>
                                    <?php } ?>

                                </ul>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="subi">
                                <li>
                                    <input onclick="update_test_candidate(<?php echo $job_id; ?>)" type="button" value="Save" class="btnis">
                                </li>
                                <li>
                                    <input type="submit" data-dismiss="modal" aria-hidden="true" value="Cancel" class="btnis">
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clear"></div>
            <!-- END DEVICES --> 
        </div>