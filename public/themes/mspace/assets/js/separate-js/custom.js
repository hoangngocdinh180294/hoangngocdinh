/*
| ----------------------------------------------------------------------------------
| TABLE OF CONTENT
| ----------------------------------------------------------------------------------
-SETTING
-Preloader
-Sticky Header
-Scroll Animation
-Dropdown Menu Fade
-Menu Android
-Search Animation
-Disable Mobile Animated
-Animated Entrances
-Accordion
-Tooltip
-Ticker
-Zoom Images
-HOME SLIDER
-OWL Sliders
-Animated WOW
-Map
-Block view soure
-Block chuot phai
-Background effect
-Icon Load TOp
-OWL Project
*/




$(document).ready(function() {

    "use strict";


/////////////////////////////////////////////////////////////////
// Effect image pro
/////////////////////////////////////////////////////////////////
var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 100,
        modifier: 5,
        slideShadows: true
    },
    pagination: {
        el: '.swiper-pagination'
    }
});

/////////////////////////////////////////////////////////////////
// Icon Load TOp
/////////////////////////////////////////////////////////////////
        $(window).scroll(function(){
            if($(this).scrollTop() > 40){
                $('.topBtn').fadeIn();
            }else{
                $('.topBtn').fadeOut();
            }
        });
        $('.topBtn').click(function(){
            $('html ,body').animate({scrollTop : 0}, 1000, 'swing');
        });





/////////////////////////////////////////////////////////////////
// Background effect
/////////////////////////////////////////////////////////////////
        $('.section-downloads_mod-a').ripples({
            resolution: 512,
            dropRadius: 20, //px
            perturbance: 0.04,
        });
        $('.section-bg').ripples({
            resolution: 512,
            dropRadius: 20, //px
            perturbance: 0.04,
        });

/////////////////////////////////////////////////////////////////
// SETTING
/////////////////////////////////////////////////////////////////

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();


    var tabletWidth = 767;
    var mobileWidth = 640;



/////////////////////////////////////////////////////////////////
// Preloader
/////////////////////////////////////////////////////////////////


    var $preloader = $('#page-preloader'),
    $spinner   = $preloader.find('.spinner-loader');
    $spinner.fadeOut();
    $preloader.delay(50).fadeOut('slow');



/////////////////////////////////////
//  Sticky Header
/////////////////////////////////////


    if (windowWidth > tabletWidth) {

        var headerSticky = $(".layout-theme").data("header");
        var headerTop = $(".layout-theme").data("header-top");

        if (headerSticky.length) {
            $(window).on('scroll', function() {
                var winH = $(window).scrollTop();
                var $pageHeader = $('.wrap-nav');
                if (winH > headerTop) {

                    $('.yamm').addClass("animated");
                    $('.yamm').addClass("animation-done");
                    $('.yamm').addClass("bounce");
                    $pageHeader.addClass('sticky');

                } else {

                    $('.yamm').removeClass("bounce");
                    $('.yamm').removeClass("animated");
                    $('.yamm').removeClass("animation-done");
                    $pageHeader.removeClass('sticky');
                }
            });
        }
    }



/////////////////////////////////////
//  Scroll Animation
/////////////////////////////////////


    window.sr = ScrollReveal({
        reset:true,
    });

    sr.reveal('.wow');
    


/////////////////////////////////////////////////////////////////
//   Dropdown Menu Fade
/////////////////////////////////////////////////////////////////


    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );


    $(".yamm .navbar-nav>li").hover(
        function() {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function() {
            $('.dropdown-menu', this).fadeOut("fast");
        });


    window.prettyPrint && prettyPrint();
    $(document).on('click', '.yamm .dropdown-menu', function(e) {
        e.stopPropagation();
    });


    $(".yamm .navbar-collapse .nav > li > a").hover(
        function() {
            $('.navbar-collapse').addClass("open");
        },
        function() {
            $('.navbar-collapse').removeClass("open");
        });


/////////////////////////////////////
//  Menu Android
/////////////////////////////////////

$( '.navbar-nav li:has(ul)' ).doubleTapToGo();



/////////////////////////////////////
//  Search Animation
/////////////////////////////////////



    $('.search-open, .search-close').on('click', function(e) {
        e.preventDefault();
        $('.header-search ').toggleClass('open-search');
        $('.header-search').toggleClass('open');
    });




/////////////////////////////////////
//  Disable Mobile Animated
/////////////////////////////////////

    if (windowWidth < mobileWidth) {

        $("body").removeClass("animated-css");

    }


        $('.animated-css .animated:not(.animation-done)').waypoint(function() {

                var animation = $(this).data('animation');

                $(this).addClass('animation-done').addClass(animation);

        }, {
                        triggerOnce: true,
                        offset: '90%'
        });



//////////////////////////////
// Animated Entrances
//////////////////////////////



    if (windowWidth > 1200) {

        $(window).scroll(function() {
                $('.animatedEntrance').each(function() {
                        var imagePos = $(this).offset().top;

                        var topOfWindow = $(window).scrollTop();
                        if (imagePos < topOfWindow + 400) {
                                        $(this).addClass("slideUp"); // slideUp, slideDown, slideLeft, slideRight, slideExpandUp, expandUp, fadeIn, expandOpen, bigEntrance, hatch
                        }
                });
        });

    }



/////////////////////////////////////
//  Search Animation
/////////////////////////////////////


    $(document).on("click", ".btn_header_search", function (event) {
        event.preventDefault();
        $(".search-form-modal").addClass("open");
    });
    $(document).on("click", ".search-form_close", function (event) {
        event.preventDefault();
        $(".search-form-modal").removeClass("open");
    });




/////////////////////////////////////////////////////////////////
// Accordion
/////////////////////////////////////////////////////////////////

    $(".btn-collapse").on('click', function () {
            $(this).parents('.panel-group').children('.panel').removeClass('panel-default');
            $(this).parents('.panel').addClass('panel-default');
            if ($(this).is(".collapsed")) {
                $('.panel-title').removeClass('panel-passive');
            }
            else {$(this).next().toggleClass('panel-passive');
        };
    });




/////////////////////////////////////
//  Tooltip
/////////////////////////////////////


    $('.link-tooltip-1').tooltip({
    template: '<div class="tooltip tooltip-1" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
  });
    $('.link-tooltip-2').tooltip({
    template: '<div class="tooltip tooltip-2" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
  });




/////////////////////////////////////
//  Ticker
/////////////////////////////////////


    $("#myUl").endlessRiver({
        buttons: true,
        // speed: 200,
        pause: true
    });




/////////////////////////////////////
//  Zoom Images
/////////////////////////////////////


    $(".prettyPhoto").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000});





/////////////////////////////////////////////////////////////////
// Parralax
/////////////////////////////////////////////////////////////////


        $('.jarallax').jarallax()



////////////////////////////////////////////
// HOME SLIDER
///////////////////////////////////////////


    if ($('#main-slider').length > 0) {


            var sliderWidth = $("#main-slider").data("slider-width");
            var sliderHeigth = $("#main-slider").data("slider-height");

            $( '#main-slider' ).sliderPro({
                width:  sliderWidth,
                height: sliderHeigth,
                fade: true,
                arrows: true,
                buttons: true,
                waitForLayers: false,
                thumbnailPointer: false,
                touchSwipe: false,
                autoplay: true,
                autoScaleLayers: false
            });
    }



    if ($('#main-slider-2').length > 0) {


            var sliderWidth = $("#main-slider-2").data("slider-width");
            var sliderHeigth = $("#main-slider-2").data("slider-height");

            $( '#main-slider-2' ).sliderPro({
                width:  sliderWidth,
                height: sliderHeigth,
            fade: true,
            arrows: true,
            buttons: true,
            fullScreen: true,
            shuffle: true,
            smallSize: 500,
            mediumSize: 1000,
            largeSize: 3000,
            thumbnailWidth: 320,
            thumbnailHeight: 270,
            thumbnailArrows: true,
            autoplay: false,
            breakpoints: {
                800: {
                    thumbnailWidth: 150,
                    thumbnailHeight: 130
                }
            }
            });
    }



    if ($('#slider-1').length > 0) {


            var sliderWidth = $("#slider-1").data("slider-width");
            var sliderHeigth = $("#slider-1").data("slider-height");

            $( '#slider-1' ).sliderPro({
            width: 1200,
            height: 530,
            orientation: 'vertical',
            loop: false,
            buttons: false,
            autoplay: true,
            thumbnailsPosition: 'right',
            thumbnailPointer: true,
            thumbnailWidth: 400,
            thumbnailHeight: 130,
            thumbnailArrows: true,
            breakpoints: {
                800: {
                    thumbnailWidth: 0,
                    thumbnailHeight: 0,
                    thumbnailPointer: false,
                    orientation: 'horizontal'
                },
                500: {
                    thumbnailWidth: 0,
                    thumbnailHeight: 0,
                    thumbnailPointer: false,
                    orientation: 'horizontal',
                    height: 1100
                }
            }

            });
    }

/////////////////////////////////////////////////////////////////
// OWL Project
/////////////////////////////////////////////////////////////////

    var x = screen.width;
    var y = screen.height;
    if(x < 992) {
        $('.grid').addClass('owl-carousel');
        $('.grid').addClass('owl-theme');
        $('.grid').addClass('enable-owl-carousel');
        $('.grid').attr('data-min480', 1);
        $('.grid').attr('data-min768', 1);
        // $('.grid').attr('data-min992', 3);
        $('.grid').attr('data-pagination', false);
        $('.grid').attr('data-navigation', true);
        $('.grid').attr('data-auto-play', true);
        $('.grid').attr('data-stop-on-hover', true);
    }


/////////////////////////////////////////////////////////////////
// OWL Sliders
/////////////////////////////////////////////////////////////////

    var Core = {

        initialized: false,

        initialize: function() {

                if (this.initialized) return;
                this.initialized = true;

                this.build();

        },

        build: function() {

        // Owl Carousel

            this.initOwlCarousel();
        },
        initOwlCarousel: function(options) {

            $(".enable-owl-carousel").each(function(i) {
                var $owl = $(this);

                var itemsData = $owl.data('items');
                var navigationData = $owl.data('navigation');
                var paginationData = $owl.data('pagination');
                var singleItemData = $owl.data('single-item');
                var autoPlayData = $owl.data('auto-play');
                var transitionStyleData = $owl.data('transition-style');
                var mainSliderData = $owl.data('main-text-animation');
                var afterInitDelay = $owl.data('after-init-delay');
                var stopOnHoverData = $owl.data('stop-on-hover');
                var min480 = $owl.data('min480');
                var min768 = $owl.data('min768');
                var min992 = $owl.data('min992');
                var min1200 = $owl.data('min1200');

                $owl.owlCarousel({
                    navigation : navigationData,
                    pagination: paginationData,
                    singleItem : singleItemData,
                    autoPlay : autoPlayData,
                    transitionStyle : transitionStyleData,
                    stopOnHover: stopOnHoverData,
                    navigationText : ["<i></i>","<i></i>"],
                    items: itemsData,
                    itemsCustom:[
                                    [0, 1],
                                    [465, min480],
                                    [750, min768],
                                    [975, min992],
                                    [1185, min1200]
                    ],
                    afterInit: function(elem){
                                if(mainSliderData){
                                        setTimeout(function(){
                                                $('.main-slider_zoomIn').css('visibility','visible').removeClass('zoomIn').addClass('zoomIn');
                                                $('.main-slider_fadeInLeft').css('visibility','visible').removeClass('fadeInLeft').addClass('fadeInLeft');
                                                $('.main-slider_fadeInLeftBig').css('visibility','visible').removeClass('fadeInLeftBig').addClass('fadeInLeftBig');
                                                $('.main-slider_fadeInRightBig').css('visibility','visible').removeClass('fadeInRightBig').addClass('fadeInRightBig');
                                        }, afterInitDelay);
                                    }
                    },
                    beforeMove: function(elem){
                        if(mainSliderData){
                                $('.main-slider_zoomIn').css('visibility','hidden').removeClass('zoomIn');
                                $('.main-slider_slideInUp').css('visibility','hidden').removeClass('slideInUp');
                                $('.main-slider_fadeInLeft').css('visibility','hidden').removeClass('fadeInLeft');
                                $('.main-slider_fadeInRight').css('visibility','hidden').removeClass('fadeInRight');
                                $('.main-slider_fadeInLeftBig').css('visibility','hidden').removeClass('fadeInLeftBig');
                                $('.main-slider_fadeInRightBig').css('visibility','hidden').removeClass('fadeInRightBig');
                        }
                    },
                    afterMove: sliderContentAnimate,
                    afterUpdate: sliderContentAnimate,
                });
            });
            // $('.logo').ripples({
            //     resolution: 512,
            //     dropRadius: 20, //px
            //     perturbance: 0.04,
            // });
            function sliderContentAnimate(elem){
                var $elem = elem;
                var afterMoveDelay = $elem.data('after-move-delay');
                var mainSliderData = $elem.data('main-text-animation');
                if(mainSliderData){
                    setTimeout(function(){
                        $('.main-slider_zoomIn').css('visibility','visible').addClass('zoomIn');
                        $('.main-slider_slideInUp').css('visibility','visible').addClass('slideInUp');
                        $('.main-slider_fadeInLeft').css('visibility','visible').addClass('fadeInLeft');
                        $('.main-slider_fadeInRight').css('visibility','visible').addClass('fadeInRight');
                        $('.main-slider_fadeInLeftBig').css('visibility','visible').addClass('fadeInLeftBig');
                        $('.main-slider_fadeInRightBig').css('visibility','visible').addClass('fadeInRightBig');
                    }, afterMoveDelay);
                }
            }
        },

    };

    Core.initialize();
/////////////////////////////////////////////////////////////////
// image CEO effect
/////////////////////////////////////////////////////////////////

    // $('.single_box').tilt({
    //     disableAxis:    'x',
    //     disableAxis:    'y'
    //     // maxTilt: 10,
    //     // glare: true,
    //     // scale: 1.2,
    //     // maxGlare: .5,

    // });
    // $('.post-1').tilt({
    //     // maxTilt: 10,
    //     glare: true,
    //     scale: 1.2,
    //     maxGlare: .5,
    //     disableAxis:    'x',
    //     disableAxis:    'y'
    // });
    // $('.post-3').tilt({
    //     // maxTilt: 10,
    //     glare: true,
    //     scale: 1.2,
    //     maxGlare: .5,
    //     disableAxis:    'x',
    //     disableAxis:    'y'
    // });
    $('.logo').tilt({
        // maxTilt: 10,
        glare: true,
        scale: 1.2,
        maxGlare: .5,
        disableAxis:    'x',
        disableAxis:    'y'
    });

});





// /////////////////////////////////////////////////////////////////
// // Block view soure
// /////////////////////////////////////////////////////////////////

// shortcut = {
//     all_shortcuts: {},
//     add: function(a, b, c) {
//         var d = { type: "keydown", propagate: !1, disable_in_input: !1, target: document, keycode: !1 };
//         if (c)
//             for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]);
//         else c = d;
//         d = c.target, "string" == typeof c.target && (d = document.getElementById(c.target)), a = a.toLowerCase(), e = function(d) {
//             d = d || window.event;
//             if (c.disable_in_input) {
//                 var e;
//                 d.target ? e = d.target : d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e.parentNode);
//                 if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) return
//             }
//             d.keyCode ? code = d.keyCode : d.which && (code = d.which), e = String.fromCharCode(code).toLowerCase(), 188 == code && (e = ","), 190 == code && (e = ".");
//             var f = a.split("+"),
//                 g = 0,
//                 h = { "`": "~", 1: "!", 2: "@", 3: "#", 4: "$", 5: "%", 6: "^", 7: "&", 8: "*", 9: "(", 0: ")", "-": "_", "=": "+", ";": ":", "'": '"', ",": "<", ".": ">", "/": "?", "\\": "|" },
//                 i = { esc: 27, escape: 27, tab: 9, space: 32, "return": 13, enter: 13, backspace: 8, scrolllock: 145, scroll_lock: 145, scroll: 145, capslock: 20, caps_lock: 20, caps: 20, numlock: 144, num_lock: 144, num: 144, pause: 19, "break": 19, insert: 45, home: 36, "delete": 46, end: 35, pageup: 33, page_up: 33, pu: 33, pagedown: 34, page_down: 34, pd: 34, left: 37, up: 38, right: 39, down: 40, f1: 112, f2: 113, f3: 114, f4: 115, f5: 116, f6: 117, f7: 118, f8: 119, f9: 120, f10: 121, f11: 122, f12: 123 },
//                 j = !1,
//                 l = !1,
//                 m = !1,
//                 n = !1,
//                 o = !1,
//                 p = !1,
//                 q = !1,
//                 r = !1;
//             d.ctrlKey && (n = !0), d.shiftKey && (l = !0), d.altKey && (p = !0), d.metaKey && (r = !0);
//             for (var s = 0; k = f[s], s < f.length; s++) "ctrl" == k || "control" == k ? (g++, m = !0) : "shift" == k ? (g++, j = !0) : "alt" == k ? (g++, o = !0) : "meta" == k ? (g++, q = !0) : 1 < k.length ? i[k] == code && g++ : c.keycode ? c.keycode == code && g++ : e == k ? g++ : h[e] && d.shiftKey && (e = h[e], e == k && g++);
//             if (g == f.length && n == m && l == j && p == o && r == q && (b(d), !c.propagate)) return d.cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d.preventDefault()), !1
//         }, this.all_shortcuts[a] = { callback: e, target: d, event: c.type }, d.addEventListener ? d.addEventListener(c.type, e, !1) : d.attachEvent ? d.attachEvent("on" + c.type, e) : d["on" + c.type] = e
//     },
//     remove: function(a) {
//         var a = a.toLowerCase(),
//             b = this.all_shortcuts[a];
//         delete this.all_shortcuts[a];
//         if (b) {
//             var a = b.event,
//                 c = b.target,
//                 b = b.callback;
//             c.detachEvent ? c.detachEvent("on" + a, b) : c.removeEventListener ? c.removeEventListener(a, b, !1) : c["on" + a] = !1
//         }
//     }
// }, shortcut.add("Ctrl+U", function() { top.location.href = "/" });




// /////////////////////////////////////////////////////////////////
// // Block chuot phai
// /////////////////////////////////////////////////////////////////

// // window.onload = function() {
// document.addEventListener("contextmenu", function(e) {
//     e.preventDefault();
// }, false);
// document.addEventListener("keydown", function(e) {
//     //document.onkeydown = function(e) {
//     // "I" key
//     if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
//         disabledEvent(e);
//     }
//     // "J" key
//     if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
//         disabledEvent(e);
//     }
//     // "S" key + macOS
//     if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
//         disabledEvent(e);
//     }
//     // "U" key
//     if (e.ctrlKey && e.keyCode == 85) {
//         disabledEvent(e);
//     }
//     // "F12" key
//     if (event.keyCode == 123) {
//         disabledEvent(e);
//     }
// }, false);

// function disabledEvent(e) {
//     if (e.stopPropagation) {
//         e.stopPropagation();
//     } else if (window.event) {
//         window.event.cancelBubble = true;
//     }
//     e.preventDefault();
//     return false;
// }
// // };

/////////////////////////////////////////////////////////////////
// Map
/////////////////////////////////////////////////////////////////


//  if ($('.map').length > 0) {

//     // When the window has finished loading create our google map below
//     google.maps.event.addDomListener(window, 'load', init);

//     function init() {
//         // Basic options for a simple Google Map
//         // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
//         var mapOptions = {
//             // How zoomed in you want the map to start at (always required)
//             zoom: 11,

//             // The latitude and longitude to center the map (always required)
//             center: new google.maps.LatLng(40.6700, -73.9400), // New York

//             scrollwheel: false,

          
//             // How you would like to style the map.
//             // This is where you would paste any style found on Snazzy Maps.
//             styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
//         };

//         // Get the HTML DOM element that will contain your map
//         // We are using a div with id="map" seen below in the <body>
//         var mapElement = document.getElementById('map');

//         // Create the Google Map using our element and options defined above
//         var map = new google.maps.Map(mapElement, mapOptions);

//         // Let's also add a marker while we're at it
//         var marker = new google.maps.Marker({
//             position: new google.maps.LatLng(40.6700, -73.9400),
//             map: map,
//             title: 'Snazzy!'
//         });
//     }


//  }
