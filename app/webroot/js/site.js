// JavaScript Document
$(document).ready(function() {
    $(".toogimg").click(function() {
        $(".list").slideToggle("slow");
    });
});

//slider
jQuery(function() {
    //parallaax
    jQuery.stellar({
        horizontalScrolling: false,
        verticalOffset: 0
    });
    
    //fancybox
    jQuery(".fancybox").fancybox();
    
    jQuery(".various").fancybox({
        maxWidth: 1100,
        maxHeight: 600,
        fitToView: false,
        width: '70%',
        height: '70%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });

    jQuery('#mycarousel').jcarousel({
        vertical: true


    });
    
    jQuery('#mycarouselb').jcarousel({
        vertical: true


    });
    
    jQuery('#mycarouselc').jcarousel({
        vertical: true


    });

    jQuery('#mycarouseld').jcarousel({
        vertical: true


    });
    
    jQuery('#mycarousele').jcarousel({
        vertical: true


    });
    
    jQuery('#mycarouselb').jcarousel({
        vertical: true


    });

    //smooth scroll to href value
    jQuery(".tabs-btn ul li a, .navbar-nav li a, .navbar-brand").click(function(event) {
//        event.preventDefault();
//        //calculate destination place
//        var dest = 0;
//        if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
//            dest = $(document).height() - $(window).height();
//        } else {
//            dest = $(this.hash).offset().top;
//        }
//        //go to destination
//        jQuery('html,body').animate({scrollTop: dest}, 1000, 'swing');
    });
    
    //toggle map
    jQuery(".map-title h4 span").click(function(e) {
        jQuery(".map iframe").slideToggle();
        jQuery(".map-title h4 span i").toggleClass("fa-angle-up fa-angle-down");
    });

    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 200) {
            jQuery("#back-to-topa").fadeIn(200);
        } else {
            jQuery("#back-to-topa").fadeOut(200);
        }
    });

    jQuery('#back-to-topa, .back-to-topa').click(function() {
        jQuery('html, body').animate({scrollTop: 0}, '2000');
        return false;
    });
    
    //pie charts	
    jQuery('#pie-charts').waypoint(function(direction) {
        jQuery('.chart').easyPieChart({
            barColor: "#5ecae6",
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }, {
        offset: function() {
            return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
        }
    });

    jQuery('#pie-charts').waypoint(function(direction) {
        jQuery('.green-circle').easyPieChart({
            barColor: "#bed431",
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }, {
        offset: function() {
            return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
        }
    });

    jQuery('#pie-charts').waypoint(function(direction) {
        jQuery('.red-circle').easyPieChart({
            barColor: "#e11e24",
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }, {
        offset: function() {
            return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
        }
    });

    jQuery('#pie-charts').waypoint(function(direction) {
        jQuery('.yellow-circle').easyPieChart({
            barColor: "#f6c715",
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }, {
        offset: function() {
            return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
        }
    });

    jQuery('#pie-charts').waypoint(function(direction) {
        jQuery('.purple-circle').easyPieChart({
            barColor: "#7251a2",
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }, {
        offset: function() {
            return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
        }
    });
});

//form submit
function checkmail(input){
    var pattern1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (pattern1.test(input)) {
        return true;
    } else {
        return false;
    }
}

function proceed() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var company = document.getElementById("company");
    var web = document.getElementById("website");
    var msg = document.getElementById("message");
    var errors = "";

    if (name.value == "")
    {
        name.className = 'error';
        return false;
    }

    else if (email.value == "")
    {
        email.className = 'error';
        return false;
    }
    else if (checkmail(email.value) == false)
    {
        alert('Please provide a valid email address.');
        return false;

    }
    else if (company.value == "")
    {
        company.className = 'error';
        return false;
    }
    else if (web.value == "")
    {
        web.className = 'error';
        return false;
    }
    else if (msg.value == "")
    {
        msg.className = 'error';
        return false;
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "process.php",
            data: $("#contact_form").serialize(),
            success: function(msg)
            {
                //alert(msg);
                if (msg == 'success') {
                    $('#contact_form').fadeOut(1000);
                    $('#contact_message').fadeIn(2000);
                    document.getElementById("contact_message").innerHTML = "Your email has been sent.";
                    return true;
                } else {

                    $('#contact_form').fadeOut(500);
                    $('#contact_message').fadeIn(2000);
                    document.getElementById("contact_message").innerHTML = "Your email has not been sent.";
                    return true;
                }
            }
        });
    }
}	