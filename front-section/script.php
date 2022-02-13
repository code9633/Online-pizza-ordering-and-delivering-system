<script type='text/javascript' src='js/jquery/jquery.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='rs-slider/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='rs-slider/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyD3rVzWhxb6EGiqAD9HSrKb22gTo2HTqoA&amp;ver=1.0'></script>

    <script type='text/javascript' src='js/modernizr.custom.js'></script>
    <script type='text/javascript' src='js/jquery.animsition.min.js'></script>
    <script type='text/javascript' src='js/superfish.js'></script>
    <script type='text/javascript' src='js/waypoints.min.js'></script>
    <script type='text/javascript' src='js/jquery.mobilemenu.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script type='text/javascript' src='js/custom-inline-js.js'></script>
    <script type='text/javascript' src='js/jquery.isotope.min.js'></script>

    <script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>
    <script>
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        var htmlDivCss = "";
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script>
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        var htmlDivCss = "";
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script type="text/javascript">
        /******************************************
        				-	PREPARE PLACEHOLDER FOR SLIDER	-
        			******************************************/

        var setREVStartSize = function() {
            try {
                var e = new Object,
                    i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                e.c = jQuery('#rev_slider_1_1');
                e.responsiveLevels = [1240, 1024, 778, 480];
                e.gridwidth = [1240, 1024, 778, 480];
                e.gridheight = [868, 768, 960, 720];

                e.sliderLayout = "fullscreen";
                e.fullScreenAutoWidth = 'off';
                e.fullScreenAlignForce = 'off';
                e.fullScreenOffsetContainer = '';
                e.fullScreenOffset = '';
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })

            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };

        setREVStartSize();

        var tpj = jQuery;

        var revapi1;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "js/extensions/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "metis",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 50,
                            space: 5,
                            tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner0",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>
    <script>
        var htmlDivCss = unescape("%23rev_slider_1_1%20.metis%20.tp-bullet%20%7B%20%0A%20%20%20%20opacity%3A1%3B%0A%20%20%20%20width%3A50px%3B%0A%20%20%20%20height%3A50px%3B%20%20%20%20%0A%20%20%20%20padding%3A3px%3B%0A%20%20%20%20background-color%3Argba%280%2C%200%2C%200%2C0.25%29%3B%0A%20%20%20%20margin%3A0px%3B%0A%20%20%20%20box-sizing%3Aborder-box%3B%0A%20%20%20%20transition%3Aall%200.3s%3B%0A%20%20%20%20-webkit-transition%3Aall%200.3s%3B%0A%20%20%20%20border-radius%3A50%25%3B%0A%20%20%7D%0A%0A%23rev_slider_1_1%20.metis%20.tp-bullet-image%20%7B%0A%0A%20%20%20border-radius%3A50%25%3B%0A%20%20%20display%3Ablock%3B%0A%20%20%20box-sizing%3Aborder-box%3B%0A%20%20%20position%3Arelative%3B%0A%20%20%20%20-webkit-box-shadow%3A%20inset%205px%205px%2010px%200px%20rgba%280%2C0%2C0%2C0.25%29%3B%0A%20%20-moz-box-shadow%3A%20inset%205px%205px%2010px%200px%20rgba%280%2C0%2C0%2C0.25%29%3B%0A%20%20box-shadow%3A%20inset%205px%205px%2010px%200px%20rgba%280%2C0%2C0%2C0.25%29%3B%0A%20%20width%3A100%25%3B%0A%20%20height%3A100%25%3B%0A%20%20background-size%3Acover%3B%0A%20%20background-position%3Acenter%20center%3B%0A%20%7D%20%20%0A%23rev_slider_1_1%20.metis%20.tp-bullet-title%20%7B%20%0A%20%20%20%20%20position%3Aabsolute%3B%20%0A%20%20%20%20%20bottom%3A50px%3B%0A%20%20%20%20%20margin-bottom%3A10px%3B%0A%20%20%20%20%20display%3Ainline-block%3B%0A%20%20%20%20%20left%3A50%25%3B%0A%20%20%20%20%20background%3A%23000%3B%0A%20%20%20%20%20background%3Argba%280%2C%200%2C%200%2C0.75%29%3B%0A%20%20%20%20%20color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%20%20%20%20%20padding%3A10px%2030px%3B%0A%20%20%20%20%20border-radius%3A4px%3B%0A%20%20%20-webkit-border-radius%3A4px%3B%0A%20%20%20%20%20opacity%3A0%3B%0A%20%20%20%20%20%20transition%3Aall%200.3s%3B%0A%20%20%20%20-webkit-transition%3Aall%200.3s%3B%0A%20%20%20%20transform%3A%20translatez%280.001px%29%20translatex%28-50%25%29%20translatey%2814px%29%3B%0A%20%20%20%20transform-origin%3A50%25%20100%25%3B%0A%20%20%20%20-webkit-transform%3A%20translatez%280.001px%29%20translatex%28-50%25%29%20translatey%2814px%29%3B%0A%20%20%20%20-webkit-transform-origin%3A50%25%20100%25%3B%0A%20%20%20%20opacity%3A0%3B%0A%20%20%20%20white-space%3Anowrap%3B%0A%20%7D%0A%0A%23rev_slider_1_1%20.metis%20.tp-bullet%3Ahover%20.tp-bullet-title%20%7B%0A%20%20%20%20%20transform%3Arotatex%280deg%29%20translatex%28-50%25%29%3B%0A%20%20%20%20-webkit-transform%3Arotatex%280deg%29%20translatex%28-50%25%29%3B%0A%20%20%20%20opacity%3A1%3B%0A%7D%0A%0A%23rev_slider_1_1%20.metis%20.tp-bullet.selected%2C%0A%23rev_slider_1_1%20.metis%20.tp-bullet%3Ahover%20%20%7B%0Abackground%3A%20-moz-linear-gradient%28top%2C%20%20rgba%28255%2C%20255%2C%20255%2C%201%29%200%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%20100%25%29%3B%0Abackground%3A%20-webkit-gradient%28left%20top%2C%20left%20bottom%2C%20color-stop%280%25%2C%20rgba%28255%2C%20255%2C%20255%2C%201%29%29%2C%20color-stop%28100%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%29%29%3B%0Abackground%3A%20-webkit-linear-gradient%28top%2C%20rgba%28255%2C%20255%2C%20255%2C%201%29%200%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%20100%25%29%3B%0Abackground%3A%20-o-linear-gradient%28top%2C%20rgba%28255%2C%20255%2C%20255%2C%201%29%200%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%20100%25%29%3B%0Abackground%3A%20-ms-linear-gradient%28top%2C%20rgba%28255%2C%20255%2C%20255%2C%201%29%200%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%20100%25%29%3B%0Abackground%3A%20linear-gradient%28to%20bottom%2C%20rgba%28255%2C%20255%2C%20255%2C%201%29%200%25%2C%20rgba%28119%2C%20119%2C%20119%2C%201%29%20100%25%29%3B%0A%20%20%7D%0A%23rev_slider_1_1%20.metis%20.tp-bullet-title%3Aafter%20%7B%0A%20%20%20%20content%3A%22%20%22%3B%0A%20%20%20%20position%3Aabsolute%3B%0A%20%20%20%20left%3A50%25%3B%0A%20%20%20%20margin-left%3A-8px%3B%0A%20%20%20%20width%3A%200%3B%0A%20%20%20%20height%3A%200%3B%0A%20%20%20%20border-style%3A%20solid%3B%0A%20%20%20%20border-width%3A%208px%208px%200%208px%3B%0A%20%20%20%20border-color%3A%20rgba%280%2C%200%2C%200%2C0.75%29%20transparent%20transparent%20transparent%3B%0A%20%20%20%20bottom%3A-8px%3B%0A%20%20%20%7D%0A%0A%0A%0A%2F%2A%20VERTICAL%20RIGHT%20%2A%2F%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-right%20.tp-bullet-title%20%7B%20%0A%20%20%20margin-bottom%3A0px%3B%20top%3A50%25%3B%20right%3A50px%3B%20left%3Aauto%3B%20bottom%3Aauto%3B%20margin-right%3A10px%3B%20%20transform%3A%20translateX%28-10px%29%20translateY%28-50%25%29%3B-webkit-transform%3A%20translateX%28-10px%29%20translateY%28-50%25%29%3B%20%0A%7D%20%20%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-right%20.tp-bullet-title%3Aafter%20%7B%20%0A%20%20border-width%3A%2010px%200%2010px%2010px%3B%0A%20%20border-color%3A%20%20transparent%20transparent%20transparent%20rgba%280%2C%200%2C%200%2C0.75%29%20%3B%0A%20%20right%3A-10px%3B%0A%20%20left%3Aauto%3B%20%20%0A%20%20bottom%3Aauto%3B%0A%20%20top%3A10px%3B%20%20%20%20%0A%7D%0A%0A%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-right%20.tp-bullet%3Ahover%20.tp-bullet-title%7B%0A%20%20%20transform%3AtranslateY%28-50%25%29%20translateX%280px%29%3B%0A%20%20-webkit-transform%3AtranslateY%28-50%25%29%20translateX%280px%29%3B%0A%7D%0A%0A%2F%2A%20VERTICAL%20LEFT%20%26%26%20CENTER%2A%2F%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-left%20.tp-bullet-title%2C%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-center%20.tp-bullet-title%20%7B%20%0A%20%20%20margin-bottom%3A0px%3B%20top%3A50%25%3B%20left%3A50px%3B%20right%3Aauto%3B%20bottom%3Aauto%3B%20margin-left%3A10px%3B%20%20transform%3A%20translateX%2810px%29%20translateY%28-50%25%29%3B-webkit-transform%3A%20translateX%2810px%29%20translateY%28-50%25%29%3B%20%0A%7D%20%20%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-left%20.tp-bullet-title%3Aafter%2C%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-center%20.tp-bullet-title%3Aafter%20%7B%20%0A%20%20border-width%3A%2010px%2010px%2010px%200%3B%0A%20%20border-color%3A%20%20transparent%20rgba%280%2C%200%2C%200%2C0.75%29%20%20transparent%20transparent%20%3B%0A%20%20left%3A-2px%3B%0A%20%20right%3Aauto%3B%20%20%0A%20%20bottom%3Aauto%3B%0A%20%20top%3A10px%3B%20%20%20%20%0A%7D%0A%0A%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-left%20.tp-bullet%3Ahover%20.tp-bullet-title%2C%0A%23rev_slider_1_1%20.metis.nav-dir-vertical.nav-pos-hor-center%20.tp-bullet%3Ahover%20.tp-bullet-title%7B%0A%20%20%20transform%3AtranslateY%28-50%25%29%20translateX%280px%29%3B%0A%20%20-webkit-transform%3AtranslateY%28-50%25%29%20translateX%280px%29%3B%0A%7D%0A%0A%0A%2F%2A%20HORIZONTAL%20TOP%20%2A%2F%0A%23rev_slider_1_1%20.metis.nav-dir-horizontal.nav-pos-ver-top%20.tp-bullet-title%20%7B%20%0A%20%20%20margin-bottom%3A0px%3B%20top%3A50px%3B%20left%3A50%25%3B%20bottom%3Aauto%3B%20margin-top%3A10px%3B%20right%3Aauto%3B%20transform%3A%20translateX%28-50%25%29%20translateY%2810px%29%3B-webkit-transform%3A%20translateX%28-50%25%29%20translateY%2810px%29%3B%20%0A%7D%20%20%0A%23rev_slider_1_1%20.metis.nav-dir-horizontal.nav-pos-ver-top%20.tp-bullet-title%3Aafter%20%7B%20%0A%20%20border-width%3A%200%2010px%2010px%2010px%3B%0A%20%20border-color%3A%20%20transparent%20transparent%20rgba%280%2C%200%2C%200%2C0.75%29%20transparent%3B%0A%20%20right%3Aauto%3B%0A%20%20left%3A50%25%3B%0A%20%20margin-left%3A-10px%3B%0A%20%20bottom%3Aauto%3B%0A%20%20top%3A-10px%3B%0A%20%20%20%20%0A%7D%0A%0A%0A%23rev_slider_1_1%20.metis.nav-dir-horizontal.nav-pos-ver-top%20.tp-bullet%3Ahover%20.tp-bullet-title%7B%0A%20%20%20transform%3AtranslateX%28-50%25%29%20translatey%280px%29%3B%0A%20%20-webkit-transform%3AtranslateX%28-50%25%29%20translatey%280px%29%3B%0A%7D%0A%0A%0A");
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>