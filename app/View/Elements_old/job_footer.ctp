
    <!--</div>-->
    <script type='text/javascript' src="<?php echo BASEURL; ?>/js/jquery.js"></script> 
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
    <script>
        var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
        (function(d, t) {
            var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
            g.src = '../../www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g, s)
        }(document, 'script'));
    </script>
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/component.css" />
<script src="<?php echo BASEURL; ?>/js/modernizr.custom.js"></script>
<script type="text/javascript">
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
</script>

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