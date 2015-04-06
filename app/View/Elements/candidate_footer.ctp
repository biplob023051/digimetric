
<!--</div>-->

<script type="text/javascript" src="<?php echo BASEURL; ?>/js/jquery.cookie.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/snap.svg-min.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.fancybox8cbb.js?v=2.1.5"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/bootstrap.min.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.easing.1.3.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.touchSwipe.min.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.appear.min.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.validate.min.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.liquid-slider.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/twitter/jquery.tweet.js"></script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/jflickrfeed.min.js"></script> 
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false"></script> 
<script>
    (function() {

        function init() {
            var speed = 500,
                    easing = mina.backout;

            [].slice.call(document.querySelectorAll('#grid > a')).forEach(function(el) {
                var s = Snap(el.querySelector('svg')), path = s.select('path'),
                        pathConfig = {
                    from: path.attr('d'),
                    to: el.getAttribute('data-path-hover')
                };

                el.addEventListener('mouseenter', function() {
                    path.animate({'path': pathConfig.to}, speed, easing);
                });

                el.addEventListener('mouseleave', function() {
                    path.animate({'path': pathConfig.from}, speed, easing);
                });
            });
        }

        init();

    })();
</script> 
<script type='text/javascript' src="<?php echo BASEURL; ?>/js/theme-custom.js"></script> 
<!--<script>
    var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
    (function(d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '../../www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>-->
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/component.css" />
<script src="<?php echo BASEURL; ?>/js/modernizr.custom.js"></script>
<!--<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-7243260-2']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>-->

<!-- /container -->
<script src="<?php echo BASEURL; ?>/js/classie.js"></script>
<script src="<?php echo BASEURL; ?>/js/gnmenu.js"></script>
<script>
    new gnMenu(document.getElementById('gn-menu'));
</script>
<!-- For the demo ad only -->
<script>
    $(document).ready(function() {
        $("#flip").click(function() {
            $("#panel").slideToggle("slow");
        });
    });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#todate").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#todate").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
//        $("a").click(function() {
//            $("a").toggleClass("main");
//        });

//        $("a.pop_d").click(function(event) {
//            //  alert(event.target.tagName);
////        alert(event.target.className);    
//            if (event.target.className != 'pop_d')
//                return;
//            var objCheckbox = $(this).find("input[type=checkbox]");
//            console.log(objCheckbox)
////        if (objCheckbox.length >= 1) {
////            objCheckbox.prop("checked", !objCheckbox.prop("checked"));
//            $(this).attr('class','pop_d_hover');
////            $( "this" ).removeClass( "pop_d" ).addClass( "pop_d_hover" );
////        }
//        });
//
//        $("a.pop_d_hover").click(function(event) {
//          console.log(event.target.className);
//            if (event.target.className != 'pop_d_hover')
//                return;
////        c+onsole.log(objCheckbox)
////        var objCheckbox = $(this).find("input[type=checkbox]");
////        console.log(objCheckbox)
////        if (objCheckbox.length >= 1) {
////            objCheckbox.prop("checked", !objCheckbox.prop("checked"));
////            $(this).attr('class','pop_d');
//            $(this).attr('class','pop_d');
////        }
//        });


    });

</script>
<script type="text/javascript">
    function remove(action, id) {
        
        if(action=='test'){
            $("#jt_"+id).remove();
        }else if(action=='candidate'){
            $("#jc_"+id).remove();
        
        }
        
    }
    function clone(job_id) {
//        console.log('hi');
//        $("#adduserdiv_"+job_id).clone()
//        $("#adduserdiv_" + job_id).children().clone(true, true).appendTo("#adduserdiv_" + job_id);
//        $("#adduserdiv_"+job_id).css('background','red')
        $("#adduserdiv_" + job_id).append('<input type="text" value="" name="candidate_email[]" placeholder="User email" class="popinp"/>');

    }
    function validateemail(x) {

        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Not a valid e-mail address");
            return false;
        }
    }
    function adduser(job_id) {

        var baseurl = '<?php echo BASEURL; ?>';

        var formdata = $("#formadduser_" + job_id).serializeArray()
        $.ajax({
            type: "POST",
            data: formdata,
            url: baseurl + '/jobs/add_user_to_job',
            success: function(rep) {
                console.log(rep)
                obj = JSON.parse(rep);

                if (obj.status == 1) {
                    // redirect to jobs page here 
                    var extended_msg = '';
                    if (obj.invited_before != '') {
                        var extended_msg = '.Users previously added will not be sent verification code again'
                    }
                    alert(obj.message + extended_msg);
//                    $('#myModal').modal('hide')
//                    window.location.href = '<?php echo BASEURL . "/jobs/" ?>'
                } else {
                    // stay on same and show error 
                    alert(obj.message);
                }

            }
        });

    }
    function delete_job(job_id) {
        var x;
        if (confirm("Are you sure you want to delete this job?") == true) {

            $("#job_" + job_id).fadeOut()
            //fire ajax and delete record with that job
            var baseurl = '<?php echo BASEURL; ?>';
            $.ajax({
                type: "POST",
                data: {job_id: job_id},
                url: baseurl + '/jobs/delete_job',
                success: function(rep) {

                }
            });

        } else {

        }
    }
    function searchtest(job_id) {

        var query = $("#search_" + job_id).val();

        var baseurl = '<?php echo BASEURL; ?>';

        $.ajax({
            type: "POST",
            data: {job_id: job_id, query: query},
            url: baseurl + '/jobs/searchtest',
            success: function(rep) {
                console.log(rep);
                obj = JSON.parse(rep);
                var jobid = obj.job;
                if (obj.status == 1) {
                    $("#testlist_" + jobid).html('');
                    $.each(obj.tests, function(index, value) {
                        if (value.is_added_before == 1) {
                            var liclass = 'pop_d_selected';
                            var aclass = 'pop_d_hover';
                            var checked = 'checked';
                        } else {
                            var liclass = '';
                            var aclass = 'pop_d';
                            var checked = '';
                        }
                        $("#testlist_" + jobid).append('<li class=' + liclass + '><a class=' + aclass + ' href="javascript:void(0)"> <input ' + checked + ' value="' + value.id + '" name="tests[]" type="checkbox"/> ' + value.title + ' </a></li>');
                    });

                } else {
                    $("#testlist_" + jobid).html(obj.message);
                }
            }
        });


    }
    function addtesttojob(job_id) {

        var baseurl = '<?php echo BASEURL; ?>';

        var formdata = $("#form_" + job_id).serializeArray()
        $.ajax({
            type: "POST",
            data: formdata,
            url: baseurl + '/jobs/add_test_to_job',
            success: function(rep) {
                console.log(rep)
                obj = JSON.parse(rep);

                var jobid = obj.job;
                if (obj.status == 1) {
                    $("#testlist_" + jobid).html('');
                    $.each(obj.tests, function(index, value) {
                        if (value.is_added_before == 1) {
                            var liclass = 'pop_d_selected';
                            var aclass = 'pop_d_hover';
                            var checked = 'checked';
                        } else {
                            var liclass = '';
                            var aclass = 'pop_d';
                            var checked = '';
                        }
                        $("#testlist_" + jobid).append('<li class=' + liclass + '><a class=' + aclass + ' href="javascript:void(0)"> <input ' + checked + ' value="' + value.id + '" name="tests[]" type="checkbox"/> ' + value.title + ' </a></li>');
                    });

                } else {
                    $("#testlist_" + jobid).html(obj.message);
                }

            }
        });

    }
</script>