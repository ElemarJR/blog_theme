/**
 * Manipulate header to show after load the font
 */
define( [ 'swiper/dist/js/swiper' ], function ( Swiper ) {

	var swiper = new Swiper({
        el: '.swiper-container',
        initialSlide: 0,
        speed: 800,
        slidesPerView: 2,
        spaceBetween: 100,
        breakpoints: {
            1366: {
                slidesPerView: 1,
                spaceBetween: 50
            }
        },

        on: {
            init: function () {
                fixSliderHeight();
            },
            resize: function () {
                fixSliderHeight();
            },
        },
        autoplay: {
            delay: 4000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        centeredSlides: true,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: 'true',
        }
    });
});


jQuery( window ).resize(function() {
    setTimeout(function(){ fixSliderHeight(); }, 300);
});


function fixSliderHeight()
    {
        if (typeof maxHeight === 'undefined' || maxHeight === null) {
           var maxHeight = 0
        }
        maxHeight = 0;

        jQuery( '.slider-content' ).css('height', 'unset');
        jQuery( '.footer' ).css({"position": "unset", "bottom": "0px"});

        jQuery( '.slider-content' ).each(function() {
            maxHeight = Math.max( jQuery(this).height(), maxHeight );
        });

        jQuery( '.slider-content' ).height( maxHeight );
        jQuery( '.footer' ).css({"position": "absolute", "bottom": "30px"});

        jQuery( '.testimonial-nav' ).css('width', 'calc(50% - '+jQuery( '.slider-content' ).width() /2+'px )');

    }