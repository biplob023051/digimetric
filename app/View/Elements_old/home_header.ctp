<!--<div class="logo"><?php echo $this->Html->link($this->Html->image('front/index.jpg', array('alt' => 'logo')), array(), array('escape' => false)); ?></div>
   
   begin navigation
   <div class="outer_menu">
     <ul id="awesome-menu">
                <li><?php echo $this->Html->link('business', array('controller' => 'owners', 'action' => 'businessData'), array('class' => 'first')); ?></li>
        <li><?php echo $this->Html->link('search', array('controller' => 'pages', 'action' => 'search'), array('class' => 'second')); ?></li>
        <li><a href="#third" class="third">profile</a></li>
        </ul>
   </div>
   
     end navigation
   
   <div class="top_right">
     <div class="reg"><?php echo $this->Html->link('Registration', array('controller' => 'users', 'action' => 'add')); ?></div>
     
       begin form
<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'), 'class' => 'form')); ?>
       <input type="text" name="data[User][username]"   value="User Name" onblur="if(this.value=='') this.value='User Name';" onclick="if(this.value=='User Name') this.value='';">
       <input type="Password"  name="data[User][password]"  value="Password" onblur="if(this.value=='') this.value='Password';" onclick="if(this.value=='Password') this.value='';">
       <input type="image" src="/spotshop/img/front/go_btn.png" value="submit" class="go">
<?php echo $this->Form->end(); ?>
       <div class="for"><?php echo $this->Html->link('Forgot your password?', array('controller' => 'users', 'action' => 'forgotpwd')); ?></div>
       end form
   </div>-->
<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '723482987739904',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>-->
<!--<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>-->
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
//                    $("#job_"+jobid).html('');
            },
            success: function(rep) {

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
//        validateemail(email_login)
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
//                    $("#job_"+jobid).html('');
            },
            success: function(rep) {

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

</script>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupfull">,  'default' =>FALSE-->
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'ajax_signup'))); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="row">
                <div class="col-lg-9 text-center devices mmatis " > 
                    <!-- BEGIN DEVICES -->
                    <div class="col-md-12 text-center devices"> <img src="<?php echo BASEURL; ?>/img/logo.png" alt=""></div>

                </div>
                <div class="clear"></div>
                <script type="text/javascript">


                </script>
                <div class="form_pae col-lg-12 text-center mmatis">
                    Enter your information below. All fields are required
                </div>
                <div class="col-lg-9 text-center devices mauto" style="margin-top:0px;" > 
                    <div class="centrza">
                        <div class="col-md-12">
                            <input type="text" name="first_name" id="first_name" placeholder="First name"/>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="last_name" id="last_name" placeholder="Last name" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password_s" id="password_s" placeholder="Password"/>
                        </div>


                        <div class="col-md-12">
                            <input type="password" name="r_password_s" id="r_password_s" placeholder="Retype password">
                        </div>



                        <div class="col-md-12">
                            <input type="text" name="email" id="email_signup" placeholder="Email"/>
                        </div>

                        <div class="col-lg-12" style="margin-bottom:20px;">
                            <?php // debug($all_locations); ?>
                            <select  class="month" name="country" id="country">
                                <option value="0">Country </option>
                                <?php foreach ($all_locations as $key => $value) { ?>
                                    <option value="<?php echo $value['Country']['country_name'] ?>"><?php echo $value['Country']['country_name'] ?></option>

                                <?php } ?>
                            </select>       
                        </div> 

                        <div class="col-md-12">
                            <input type="text" name="company" id="company_name" placeholder="Company name"/>
                        </div>


                        <div class="col-md-12">
                            <input onclick="saveuser()" type="button" value="Sign Up" class="sbt_S" id="btn_submit">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <!-- END DEVICES --> 

        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="row">
                <div class="col-lg-9 text-center devices mauto" > 
                    <!-- BEGIN DEVICES -->
                    <div class="col-md-12 text-center devices"> <img src="<?php echo BASEURL; ?>/img/logo.png" alt=""></div>
                    <div class="centrz">
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" placeholder="Confirmation Code">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" placeholder="PhoneNumber">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="sbt_S" id="btn_submit" onclick="proceed();">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <!-- END DEVICES --> 

        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="row">
                <div class="col-lg-9 text-center devices mauto" >
                    <!-- BEGIN DEVICES -->
                    <div class="col-md-12 text-center devices">
                        <img src="<?php echo BASEURL; ?>/img/logo.png" alt=""></div>

                    <div class="form_pae col-lg-12">
                        Enter your account e-mail to login
                    </div>
                    <div class="col-md-12"><input type="text" name="email" id="email_login" placeholder="Email">
                    </div>


                    <div class="col-md-12"><input type="password" name="email" id="password_login" placeholder="Password">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Submit" class="sbt_S" id="btn_submit" onclick="loginuser();"></div>

                    <div class="form_pae col-lg-12">


                        If you'd like an account for your organization, please 
                        contact us to request more info

                    </div>

                    <div class="form_pae col-lg-12 sbt_ms"> By submitting your information, you acknowledge that you have read and agree 
                        .with our <a href="#" >Terms of Service</a> and <a href="#" >Privacy Policy</a></div>
                </div>
            </div>

            <!-- END DEVICES -->



        </div>
    </div>
    <div class="clear"></div>
</div>

<div id="wrapper">
    <!-- BEGIN HEADER -->
    <header id="home" class="home">
        <div class="row cut">
            <div class="tp">	
                <div class="container">
                    <ul class="logs">
                        <li><a href="#myModal2"  id="dem" data-toggle="modal" data-target="#myModal2">Take Test      </a></li>
                        <li>|</li>
                        <li><a href="#myModal"  id="dem" data-toggle="modal" data-target="#myModal">Login     </a></li>
                        <li>|</li>
                        <li><a href="myModal3"  id="dem" data-toggle="modal" data-target="#myModal3">Sign up</a></li>
                        <li><select class="selectBox-dropdown selectBox" >
                                <option class="opo"> Language</option>
                                <option> English</option>
                                <option> Turkish</option>
                            </select></li>  </ul><div class="clearfix"></div>
                </div>
                <div class="clear"></div> </div>


            <div class=" clearfix newnav">
                <div class="container">
                    <a class="pull-left"  href="<?php echo BASEURL; ?>" ><img src="<?php echo BASEURL; ?>/img/logo.png" height="60" class="logo" alt=""></a>
                    <a href="#" class="toogimg"><img src="<?php echo BASEURL; ?>/img/toogle.png" height="40" width="40" alt="toogle"></a>
                    <ul class="list">
                        <li><a href="<?php echo BASEURL; ?>" class="active">Home</a></li>
                        <li><a href="#intel" >Intelligent Hiring</a></li>
                        <li><a href="contactus.html">Contact</a></li>
                        <li><a href="<?php echo BASEURL; ?>/blogs">Blog</a></li>

                    </ul>
                </div>
            </div>  
            <!-- END HEADER -->
            <!-- BEGIN BANNER -->
            