<!--<section class="contact-us no-padding-bottom" id="contact-us">-->
<section class="contact-us no-padding-bottom" id="letstest">
    <a href="#." class="back-to-topa" id="back-to-topa"><img src="<?php echo BASEURL ?>/img/top.png" alt="img"/></a>
    <div class="container">
        <!-- BEGIN HEADING -->
        <h1 class="orange text-center"><img src="<?php echo BASEURL ?>/img/round6.png" alt=""/><span>Sign up for early access</span></h1>
        <!-- END HEADING -->

        <!-- BEGIN THANK YOU MESSAGE -->
        <div id="contact_message" class="success-msg">Thank you for contact us.</div>
        <!-- END THANK YOU MESSAGE -->

        <div class="form rollIn">
            <!-- BEGIN FORM -->
            <form id="contact_form" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="name" id="first_name_footer" placeholder="Name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="email" id="email_signup_footer" placeholder="Email">
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="company" id="company_name_footer" placeholder="Company">
                    </div>

                    <div class="col-md-12">
                        <input type="button" value="LET'S test IT" class="sbt btn btn-orange" id="btn_submit" onClick="saveuserfooter();">
                    </div>
                </div>
            </form>

            <!-- END FORM -->
            <ul class="social">
                <li class="bounceIn" data-delay="0">
                    <a href="<?php echo BASEURL ?>/users/loginwith/twitter">
                        <img src="<?php echo BASEURL ?>/img/twitter.png" alt="img"/>
                    </a>
                </li>

                <li class="bounceIn" data-delay="100">
                    <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http://digimetrik.com/users/login/&client_id=516719797095-8doc2ulrfnfacv0ppkf72lgevqvf7881.apps.googleusercontent.com&scope=https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email&access_type=offline&approval_prompt=force">
                        <img src="<?php echo BASEURL ?>/img/mail.png" alt="img"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>

</section>
<!-- END CONTACT US CONTAINER -->


            <!-- BEGIN GO TO TOP --<a href="#." class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a><!-- END GO TO TOP -->

</div><!-- end #wrapper -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo BASEURL; ?>/js/jquery.min.js"></script>
<!-- parallax -->
<script src="<?php echo BASEURL; ?>/js/jquery.stellar.js"></script>
<script src="<?php echo BASEURL; ?>/js/custom.js"></script>
<!-- jcarousel -->
<script src="<?php echo BASEURL; ?>/js/jquery.jcarousel.min.js"></script>
<!-- way point -->
<script src="<?php echo BASEURL; ?>/js/waypoints.js"></script>
<!-- Add piecharts -->
<script src="<?php echo BASEURL; ?>/js/jquery.easypiechart.min.js"></script>
<!-- navigation classes change on scroll -->
<script src="<?php echo BASEURL; ?>/js/nimble.js"></script>
<script src="<?php echo BASEURL; ?>/js/scrollspy.js"></script>
<!-- fancybox -->
<script src="<?php echo BASEURL; ?>/js/jquery.fancybox.pack8cbb.js?v=2.1.5"></script>
<!-- appear -->
<script src="<?php echo BASEURL; ?>/js/jquery.appear.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo BASEURL; ?>/js/bootstrap.min.js"></script>
<!-- nimble effect -->

<script type="text/javascript" src="<?php echo BASEURL; ?>/js/jquery.selectBox.js">

</script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/selectbox.js"></script>


<!-- FlexSlider -->
<script defer src="<?php echo BASEURL; ?>/js/jquery.flexslider.js"></script>

<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<script  src="<?php echo BASEURL; ?>/js/site.js" type="text/javascript">

</script>    
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/share42/share42.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#hire_sm').on('click', function() {
            $('#home_page').removeClass('active')
            $('#contact_us_home').removeClass('active')
            $('#bloh_home').removeClass('active')
            $('#hire_sm').addClass('active')
        });
        var hash = window.location.hash;
//        console.log(hash)
//        alert(hash)
        if (hash != '') {
            if (hash == '#intel') {
                $('#home_page').removeClass('active')
                $('#contact_us_home').removeClass('active')
                $('#bloh_home').removeClass('active')
                $('#hire_sm').addClass('active')
            }
        }
    });


</script>
<script type="text/javascript">
    $(document).ready(function() {
<?php if ($this->request->query['gm'] <> "" && $this->request->query['gm'] == "exists") { ?>
            alert("You have successfully signup as early user we will contact you soon");
<?php } ?>

<?php if ($this->request->query['gm'] <> "" && $this->request->query['gm'] == "already") { ?>
            alert("You already have signup as early user");
<?php } ?>

<?php if ($this->request->query['gm'] <> "" && $this->request->query['gm'] == "notexists") { ?>
            alert("No such email id exists in our database");
<?php } ?>

        $('#contact_form_real').submit(function(e) {
            var link = "<?php echo $this->Html->url('/contact_us/ajax_submit_contact_info', true); ?>";
//            console.log($("#contact_form").serialize())

            var fname_contact = $("#fname_contact").val().trim()
            var lname_contact = $("#lname_contact").val().trim()
            var email_contact = $("#email_contact").val().trim()
            var company_contact = $("#company_contact").val().trim()
            if (fname_contact == '') {

                alert('Please enter first name');
                return false;

            }
            if (lname_contact == '') {

                alert('Please enter last name');
                return false;

            }

            if (email_contact == '') {

                alert('Please provide your email id');
                return false;

            }
            if (validateemail(email_contact) == 0) {
                return false;
            }
            if (company_contact == '') {

                alert('Please provide company name');
                return false;

            }
            $.ajax({
                type: "POST",
                url: link,
                data: $("#contact_form_real").serialize(),
                beforeSend: function(data) {
//                    $("#job_"+jobid).html('');
                },
                success: function(rep) {
                    console.log(rep)
                    obj = JSON.parse(rep);

                    if (obj.status == 1) {
                        // redirect to jobs page here

                        alert(obj.message);
                        $('.bs-example-modal-lg').modal('hide')
//                    $('#myModal3').modal('hide')
//                        window.location.href = '<?php echo BASEURL . "/jobs/" ?>'
                    } else if (obj.status == 0) {
                        // stay on same and show error 
                        alert(obj.message);
                    }

                }
            });
            return false;

        });

    });

</script>
<script type="text/javascript">

    function saveuserfooter() {

        var link = "<?php echo $this->Html->url('/users/ajax_signup_footer', true); ?>";
        var first_name = $("#first_name_footer").val().trim()
        var email = $("#email_signup_footer").val().trim()
        var company_name = $("#company_name_footer").val().trim()
        if (first_name == '') {

            alert('Please enter name');
            return false;

        }

        if (email == '') {

            alert('Please enter email');
            return false;

        }
        if (validateemail(email) == 0) {
            return false;
        }
        if (company_name == '') {

            alert('Please enter your company name');
            return false;

        }
        $.ajax({
            type: "POST",
            url: link + "/" + first_name + "/" + email + "/" + company_name,
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
//                    window.location.href = '<?php echo BASEURL . "/jobs/" ?>'
                } else if (obj.status == 0) {
                    // stay on same and show error 
                    alert(obj.message);
                }

            }
        });


        return false;
    }
</script>