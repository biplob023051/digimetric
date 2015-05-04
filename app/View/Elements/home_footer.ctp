
<footer class="no_pad">
    <section class="bg_white">
        <div class="container footer_block">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h2 class="kapftr_title">Menu</h2>
                <ul class="foot_qlink">
                    <li><a href="<?php echo BASEURL ?>">Home</a></li>
                    <li><a href="<?php echo BASEURL ?>/pages/how_it_works">How It Works</a></li>
                    <li><a href="<?php echo BASEURL ?>/blogs">Blog</a></li>
                    <li><a href="<?php echo BASEURL ?>/about">About</a></li>
                    <li><a href="<?php echo BASEURL ?>/contact_us">Contact</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h2 class="kapftr_title">About Us</h2>
                <ul class="foot_qlink">
                    <li><a href="#">Company Profile</a></li>
                    <li><a href="#">Corporate</a></li>
                    <li><a href="#">Mission</a></li>
                    <li><a href="#">Vision</a></li>
                    <li><a href="#">Testimonial</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h2 class="kapftr_title">Support</h2>
                <ul class="foot_qlink">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &AMP; Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">FAQ&apos;s</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h2 class="kapftr_title">Keep In Touch</h2>
                <ul class="foot_qlink foot_qlink_social">
                    <li class="fb"><a href="#" target="_blank">Facebook</a></li>
                    <li class="twt"><a href="#" target="_blank">Twitter</a></li>
                    <li class="lin"><a href="#" target="_blank">LinkedIn</a></li>
                    <li class="gplus"><a href="#" target="_blank">Google Plus</a></li>
                    <li class="ytube"><a href="#" target="_blank">You Tube</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="bg_gray footer_btm">
        <div class="container text-center copyright_txt">&COPY; 2015 DIGIMETRIC.COM. all rights reserved.</div>
    </section>
</footer>
</div>
<!-- end #wrapper -->

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

<script type="text/javascript" src="<?php echo BASEURL; ?>/js/jquery.selectBox.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/selectbox.js"></script>
<!-- FlexSlider -->
<script defer src="<?php echo BASEURL; ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: false,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });

        $('.flexslider2').flexslider({
            animation: "slide",
            directionNav: false,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<script src="<?php echo BASEURL; ?>/js/site.js" type="text/javascript"></script>    
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/share42/share42.js"></script>
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
            var fname_contact = $("#fname_contact").val().trim();
            var lname_contact = $("#lname_contact").val().trim();
            var email_contact = $("#email_contact").val().trim();
            var company_contact = $("#company_contact").val().trim();

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
                        $('.bs-example-modal-lg').modal('hide');
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
