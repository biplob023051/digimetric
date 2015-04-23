<script type="text/javascript">
    function validateemail(x) {
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Not a valid e-mail address");
            return false;
        }
    }

    function saveuser() {
//        console.log('hit')
        var link = "<?php echo $this->Html->url('/users/ajax_signup', true); ?>";
//        console.log($("#UserHomeForm").serializeArray());
        var first_name = $("#first_name").val().trim()
        var last_name = $("#last_name").val().trim()
        var email = $("#email_signup").val().trim()
        var password_s = $("#password_s").val().trim()
        var r_password_s = $("#r_password_s").val().trim()
        var company_name = $("#company_name").val().trim()
        var country = $("#country").val().trim()
        if (first_name == '' && last_name == '' && email == '' && password_s == '' && r_password_s == '' && company_name == '' && country == '') {
            alert('All fields are necessary!');
            return false;
        }
        if (first_name == '') {
            alert('Please enter first name');
            return false;
        }

        if (last_name == '') {
            alert('Please enter last name');
            return false;
        }

        if (password_s == '' || r_password_s == '') {
            alert('Please enter Password and Retype password');
            return false;
        }

        if (password_s.length < 5) {
            alert('Password must be atleast 6 characters long');
            return false;
        }

        if (password_s != r_password_s) {
            alert('Password and Retype password fields do not match');
            return false;
        }

        if (email == '') {
            alert('Please enter email');
            return false;
        }

        if (validateemail(email) == 0) {
            return false;
        }

        if (country == '' || country == 0) {
            alert('Please select some country');
            return false;
        }

        if (company_name == '') {
            alert('Please enter your company name');
            return false;
        }

        $.ajax({
            type: "POST",
            url: link + "/" + first_name + "/" + last_name + "/" + email + "/" + password_s + "/" + r_password_s + "/" + company_name + "/" + country,
//            data:$( "#UserHomeForm" ).serialize(),
            beforeSend: function(data) {
                $(".processing_signup_form").show();
//                $('#confirmation_code').attr('disabled', 'disabled');
//                $("#candidate_email").attr('disabled', 'disabled');
//                $("#candidate_no").attr('disabled', 'disabled');
            },
            success: function(rep) {
                $(".processing_signup_form").hide();
                obj = JSON.parse(rep);

                if (obj.status == 1) {
                    // redirect to jobs page here
                    alert(obj.message);
                    $('#myModal3').modal('hide')
                    window.location.href = '<?php echo BASEURL . "/jobs/" ?>'
                } else if (obj.status == 0) {
                    // stay on same and show error 
                    alert(obj.message);
                }
            }
        });
        return false;
    }

    function loginuser() {
//        console.log('hit')
        var link = "<?php echo $this->Html->url('/users/ajax_signin', true); ?>";
//        console.log($("#UserHomeForm").serializeArray());
        var email_login = $("#email_login").val().trim()
        var password_login = $("#password_login").val().trim()
        if (email_login == '') {
            alert('Please enter email');
            return false;
        }
//        validateemail(email_login);
        if (validateemail(email_login) == 0) {
            return false;
        }

        if (password_login == '') {
            alert('Please enter Password');
            return false;
        }

        $.ajax({
            type: "POST",
            url: link + "/" + email_login + "/" + password_login,
//            data:$( "#UserHomeForm" ).serialize(),
            beforeSend: function(data) {
                $(".processing_login_form").show();
//                $('#confirmation_code').attr('disabled', 'disabled');
//                $("#candidate_email").attr('disabled', 'disabled');
//                $("#candidate_no").attr('disabled', 'disabled');
            },
            success: function(rep) {
                $(".processing_login_form").hide();
                obj = JSON.parse(rep);

                if (obj.status == 1) {
                    // redirect to jobs page here 
                    alert(obj.message);
                    $('#myModal').modal('hide')
                    window.location.href = '<?php echo BASEURL . "/jobs/" ?>'
                } else if (obj.status == 0) {
                    // stay on same and show error 
                    alert(obj.message);
                }
            }
        });
        return false;
    }

    function verfiycandidate() {
//        console.log('hit')
        var link = "<?php echo $this->Html->url('/users/ajax_signin_candidate', true); ?>";
//        console.log($("#UserHomeForm").serializeArray());
        var confirmation_code = $("#confirmation_code").val().trim()
        var candidate_email = $("#candidate_email").val().trim()
        var candidate_no = $("#candidate_no").val().trim()
        if (confirmation_code == '') {
            alert('Please enter confirmation code you received in email');
            return false;
        }

        if (candidate_email == '') {
            alert('Please enter your email');
            return false;
        }

//        validateemail(email_login);
        if (validateemail(candidate_email) == 0) {
            return false;
        }

        if (candidate_no == '') {
            alert('Please enter your phone no');
            return false;
        }

        $.ajax({
            type: "POST",
            url: link,
            data: {email: candidate_email, confirmation_code: confirmation_code, phone_no: candidate_no},
            beforeSend: function(data) {
                $(".processing_test_form").show();
                $('#confirmation_code').attr('disabled', true);
                $("#candidate_email").attr('disabled', true);
                $("#candidate_no").attr('disabled', true);
            },
            success: function(rep) {
                $(".processing_test_form").hide();
                obj = JSON.parse(rep);
//
                if (obj.status == 1) {
                    // redirect to jobs page here 
                    alert(obj.message);
                    $('#myModal2').modal('hide')
                    window.location.href = '<?php echo BASEURL . "/job_candidates/" ?>'
                } else if (obj.status == 0) {
                    // stay on same and show error 
                    alert(obj.message);
                }

                $('#confirmation_code').removeAttr('disabled');
                $("#candidate_email").removeAttr('disabled');
                $("#candidate_no").removeAttr('disabled');
//                $(".processing_test_form").show();
            },
            error: function(rep) {
                $('#confirmation_code').removeAttr('disabled');
                $("#candidate_email").removeAttr('disabled');
                $("#candidate_no").removeAttr('disabled');
                $(".processing_test_form").hide();
            }
        });
        return false;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#contact_form :input").not("[name='contact']").focus(function() {
            $(this).removeClass('error_signup');
        });
       
        $("#contact_form").submit(function(e) {
            e.preventDefault();
            var email_regex = /^[ A-Za-z0-9_@./#&+-]*$/;
            var reason = $("#reason").val().trim();
            var contact_name = $("#contact_name").val().trim();
            var contact_email = $("#contact_email").val().trim();
            var contact_message = $("#contact_message").val().trim();

            $("#contact_name_error").fadeOut();
            $("#contact_email_error").fadeOut();
            $("#contact_message_error").fadeOut();

            if (contact_name == '') {
                $("#contact_name").addClass('error_signup');
                $("#contact_name_error").text('Required').fadeIn();
                var err = 1;
            }

            if (contact_email == '') {
                $("#contact_email").addClass('error_signup');
                $("#contact_email_error").text('Required').fadeIn();
                var err = 1;
            }

            if (!validateEmail(contact_email)) {
                $("#contact_email").addClass('error_signup');
                $("#contact_email_error").text('Please enter valid email').fadeIn();
                var err = 1;
            }

            if (contact_message == '') {
                $("#contact_message").addClass('error_signup');
                $("#contact_message_error").text('Required').fadeIn();
                var err = 1;
            }

            if (err == 1) {
                return false;
            }

            $.ajax({
                type: 'POST',
                url: BASEURL + 'contact_us/submit_contact_info/',
                data: $("#contact_form").serialize(),
                beforeSend: function(res) {
                    $('.allerror_contact').text('');
                    $('.allsuccess_contact').text('');
//                    $('#contact').attr('disabled', 'disabled');
                },
                success: function(res) {
                    if (obj.status == 1) {
                        $('.allsuccess_contact').text(obj.message).show();
                    } else {
                        $('.allerror_contact').text(obj.message).show();
                    }
                }
            });
        });
    });

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>

<div class="modal fade" id="sign_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'ajax_signup'))); ?>
    <div class="modal-dialog mod_login_dialog">
        <div class="modal-content mod_login">
            <button type="button" class="close mod_close" data-dismiss="modal" aria-hidden="true"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_close.png"/></button>
            <div class="row">
                <div class="col-xs-11 col-md-9 col-md-9 text-center devices mauto" style="margin-bottom:5px;"> 
                    <div class="col-md-12 text-center devices mrg_btm_30 clearfix">
                        <div class="col-xs-1 col-sm-1 col-md-1 no_pad"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_lock.png"/></div>
                        <div class="col-xs-11 col-sm-11 col-md-11 color_orange fs_20">Create a New Account</div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-md-6 no_pad_lft">                        
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name"/>
                            </div>
                            <div class="col-xs-12 col-md-12 col-md-6 no_pad_rgt">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password_s" id="password_s" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="r_password_s" id="r_password_s" class="form-control" placeholder="Retype password">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="email" id="email_signup" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="col-lg-12" style="margin-bottom:20px;" id="select_country">
                        <?php // debug($all_locations); ?>
                        <select class="month form-control" name="country" id="country" >
                            <option value="0">Country </option>
                            <?php foreach ($all_locations as $key => $value) { ?>
                                <option value="<?php echo $value['Country']['country_name'] ?>"><?php echo $value['Country']['country_name'] ?></option>

                            <?php } ?>
                        </select>       
                    </div> 
                    <div class="col-md-12">
                        <input type="text" name="company" id="company_name" class="form-control" placeholder="Company name"/>
                    </div>

                    <div class="processing_signup_form">
                        <img src="<?php echo BASEURL; ?>/images/loader-dark.gif"/> 
                    </div>
                    <div class="col-md-12">
                        <input onclick="saveuser()" type="button" value="Sign Up" class="sbt_S bg_orange bdr_rad" id="btn_submit">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END DEVICES --> 
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<!--CANDIDATE LOGIN TO GIVE TEST -->
<div class="modal fade" id="take_test" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'ajax_signin_candidate'))); ?>
    <div class="modal-dialog mod_login_dialog">
        <div class="modal-content mod_login">
            <button type="button" class="close mod_close" data-dismiss="modal" aria-hidden="true"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_close.png"/></button>
            <div class="row">
                <div class="col-xs-11 col-md-9 col-md-9 text-center devices mauto" style="margin-bottom:5px;">
                    <!-- BEGIN DEVICES -->
                    <div class="col-md-12 text-center devices mrg_btm_30 clearfix">
                        <div class="col-xs-1 col-sm-1 col-md-1 no_pad"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_edit.png"/></div>
                        <div class="col-xs-11 col-sm-11 col-md-11 color_orange fs_20">Take a New Test</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="confirmation_code" id="confirmation_code" class="form-control" placeholder="Confirmation Code">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="candidate_email" id="candidate_email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="candidate_no" id="candidate_no" class="form-control" placeholder="Phone number">
                    </div>
                    <div class="processing_test_form">
                        <img src="<?php echo BASEURL; ?>/images/loader-dark.gif"/> 
                    </div>
                    <div class="col-md-12">
                        <input type="button" value="Take Test" class="sbt_S bg_orange bdr_rad" id="btn_submit" onclick="verfiycandidate();">
                        <!--<input type="button" value="Take Test" class="sbt_S bg_orange bdr_rad" id="btn_submit" onclick="proceed();">-->
                    </div>
                    <div class="form_pae col-lg-12">
                        Note : Confirmation code will be valid for 10 different tries.
                    </div>
                    <div class="form_pae col-lg-12 sbt_ms">
                        <a href="#" class="color_blue">Terms of Service</a>&nbsp; | &nbsp;<a href="#" class="color_blue">Privacy Policy</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END DEVICES --> 
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog mod_login_dialog">
        <div class="modal-content mod_login">
            <button type="button" class="close mod_close" data-dismiss="modal" aria-hidden="true"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_close.png"/></button>
            <div class="row">
                <div class="col-xs-11 col-md-9 col-md-9 text-center devices mauto" style="margin-bottom:5px;">
                    <!-- BEGIN DEVICES -->
                    <div class="col-md-12 text-center devices mrg_btm_30 clearfix">
                        <div class="col-xs-1 col-sm-1 col-md-1 no_pad"><img alt="x" src="<?php echo BASEURL; ?>/img/icon_user.png"/></div>
                        <div class="col-xs-11 col-sm-11 col-md-11 color_orange fs_20">Sign in to Digimetrik</div>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="email" id="email_login" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="email" id="password_login" class="form-control" placeholder="Password">
                    </div>
                        <div class="processing_login_form form_pae">
                            <img src="<?php echo BASEURL; ?>/images/loader-dark.gif"/> 
                        </div>
                    <div class="col-md-12">
                        <input type="submit" value="Sign In" class="sbt_S bg_orange bdr_rad" id="btn_submit" onclick="loginuser();">
                    </div>
                    <div class="form_pae col-lg-12">
                        If you'd like an account for your organization,<br> please 
                        contact us to request more info
                    </div>
                    <div class="form_pae col-lg-12 sbt_ms">
                        <a href="#" class="color_blue">Terms of Service</a>&nbsp; | &nbsp;<a href="#" class="color_blue">Privacy Policy</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END DEVICES -->
        </div>
    </div>
    <div class="clear"></div>
</div>

<div id="wrapper">
    <!-- BEGIN HEADER -->
    <header id="home" class="navbar navbar-fixed-top">
        <div id="header_top">
            <div class="container clearfix">
                <ul class="logs">
                    <li><a class="btn btn_no_bg" href="#login" id="dem" data-toggle="modal" data-target="#login">Sign In</a></li>
                    <li><a class="btn btn_no_bg" href="#sign_up" id="dem" data-toggle="modal" data-target="#sign_up">Sign up</a></li>
                    <li id="candidates_tab"><a href="#take_test" id="dem" data-toggle="modal" data-target="#take_test">For Candidates</a></li>                      
                </ul>
            </div>
        </div>
        
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
                        <li class="<?php echo ($this->params['controller'] == 'pages') ? 'active' : ''; ?>">
                            <a id="home_page" href="<?php echo BASEURL; ?>">Home</a>
                        </li>
                        <li><a id="hire_sm" href="<?php echo BASEURL; ?>#intel">How It Works</a></li>
                        <li><a id="bloh_home" href="<?php echo BASEURL; ?>/blogs" class="<?php echo ($this->params['controller'] == 'blogs') ? 'active' : ''; ?>">Blog</a></li>
                        <li><a id="about" href="<?php echo BASEURL; ?>/about" class="<?php echo ($this->params['controller'] == 'about') ? 'active' : ''; ?>">About</a></li>
                        <li><a id="contact_us_home" href="<?php echo BASEURL; ?>/contact_us" class="<?php echo ($this->params['controller'] == 'contact_us') ? 'active' : ''; ?>">Contact</a></li>
                    </ul>
                </nav>                
                <div class="container clearfix"></div>
                <div id="lang_place" class="hidden-xs">
                    <a href="#" class="active">ENG</a>
                    <a href="#">TUR</a>
                </div>
            </div>
        </div> 
    </header><!-- END HEADER -->
<!-- BEGIN BANNER -->