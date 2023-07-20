(function ($) {

    "use strict";

    //===== Prealoder

    jQuery(window).on('load', function (event) {
        jQuery('.preloader').delay(500).fadeOut(500);
    });

    jQuery(document).on('ready', function () {

        //===== Sticky

        jQuery(window).on('scroll', function (event) {
            var scroll = jQuery(window).scrollTop();
            if (scroll < 110) {
                jQuery(".navigation").removeClass("sticky");
            } else {
                jQuery(".navigation").addClass("sticky");
            }
        });



        //===== stellarnav js 

        jQuery(document).ready(function ($) {
            jQuery('.stellarnav').stellarNav({
                theme: 'light',
                breakpoint: 991,
                position: 'right',
                phoneBtn: '18009997788',
                locationBtn: 'https://www.google.com/maps'
            });
        });



        //===== trending SLICK SLIDER

        var Slider1 = jQuery('.trending-slider');
        Slider1.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 500,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    }
                }
            ]
        });
        //===== trending SLICK SLIDER

        var SliderSearch = jQuery('.search-results-show');
        SliderSearch.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            speed: 5000,
        });
        //===== trending SLICK SLIDER

        var Slider2 = jQuery('.trending-image-slide');
        Slider2.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 500,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                    }
                }
            ]
        });


        //===== trending SLICK SLIDER

        var Slider3 = jQuery('.science-slide');
        Slider3.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 500,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        });


        //===== trending SLICK SLIDER

        var Slider4 = jQuery('.trending-slider-3');
        Slider4.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 500,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        });



        //===== BRAND SLICK SLIDER

        var Slider5 = jQuery('.post-slider');
        Slider5.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 1140,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });


        //===== gallery post slide slick slider
        var Slider6 = jQuery('.post_gallery_slider');
        Slider6.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.post_gallery_inner_slider'
        });
        var Slider7 = jQuery('.post_gallery_inner_slider');
        Slider7.slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            asNavFor: '.post_gallery_slider',
            dots: false,
            centerMode: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            centerPadding: "0",
            focusOnSelect: true,            
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 5,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        arrows: false,
                    }
                },
            ]
        });



        //===== BRAND SLICK SLIDER

        var Slider8 = jQuery('.feature-post-slider');
        Slider8.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 1140,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });

        //===== BRAND SLICK SLIDER

        var Slider9 = jQuery('.trending-news-slider');
        Slider9.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 1140,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });

        //===== BRAND SLICK SLIDER

        var Slider10 = jQuery('.trending-sidebar-slider');
        Slider10.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });

        //===== BRAND SLICK SLIDER

        var Slider11 = jQuery('.single-play-post-slider');
        Slider11.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });



        //===== BRAND SLICK SLIDER

        var Slider12 = jQuery('.feature-slider');
        Slider12.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });



        //===== BRAND SLICK SLIDER

        var Slider13 = jQuery('.latest-news-slider');
        Slider13.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                    }
                },
            ]
        });




        var niceSelect1 = jQuery('.nice-select-item select');
        niceSelect1.niceSelect();







        //====== Magnific Popup

        jQuery('.video-popup').magnificPopup({
            type: 'iframe'
            // other options
        });


        //===== Magnific Popup

        jQuery('.image-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        jQuery('.galleries-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
          
          // Inline popups
          jQuery('#inline-popups').magnificPopup({
            delegate: 'a',
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
            },
            midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            closeBtnInside: true
        });
  


        const $left = $(".left");
        const $gl = $(".gallery");
        const $gl2 = $(".gallery2");
        const $photosCounterFirstSpan = $(".photos-counter span:nth-child(1)");
        
        $gl2.on("init", (event, slick) => {
          $photosCounterFirstSpan.text(`${slick.currentSlide + 1}/`);
          $(".photos-counter span:nth-child(2)").text(slick.slideCount);
        });
        
        $gl.slick({
          rows: 0,
          slidesToShow: 2,
          arrows: false,
          draggable: false,
          useTransform: false,
          mobileFirst: true,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3
              }
            },
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 1,
                vertical: true
              }
            }
          ]
        });
        
        $gl2.slick({
          rows: 0,
          useTransform: false,
          prevArrow: ".arrow-left",
          nextArrow: ".arrow-right",
          fade: true,
          asNavFor: $gl
        });
        
        function handleCarouselsHeight() {
          if (window.matchMedia("(min-width: 1024px)").matches) {
            const gl2H = $(".gallery2").height();
            $left.css("height", gl2H);
          } else {
            $left.css("height", "auto");
          }
        }
        
        $(window).on("load", () => {
          handleCarouselsHeight();
          setTimeout(() => {
            $(".loading").fadeOut();
            $("body").addClass("over-visible");
          }, 300);
        });
        
        $(window).on(
          "resize",
          _.debounce(() => {
            handleCarouselsHeight();
            /*You might need this code in your projects*/
            //$gl1.slick("resize");
            //$gl2.slick("resize");
          }, 200)
        );
        
        $(".gallery .item").on("click", function() {
          const index = $(this).attr("data-slick-index");
          $gl2.slick("slickGoTo", index);
        });
        
        // Optional: Add a close button to the gallery
        $(".close-button").on("click", function() {
            // Hide the gallery
            $("#ugyen-uas-gallery").fadeOut();
        });


        // Go to Top

        // Scroll Event
        $(window).on('scroll', function () {
            var scrolled = $(window).scrollTop();
            if (scrolled > 300) $('.go-top').addClass('active');
            if (scrolled < 300) $('.go-top').removeClass('active');
        });

        // Click Event
        $('.go-top').on('click', function () {
            $("html, body").animate({
                scrollTop: "0"
            }, 1200);
        });
        
    });

})(jQuery);
