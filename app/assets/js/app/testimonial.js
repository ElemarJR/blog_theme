var swiper;

/**
 * Manipulate header to show after load the font
 */
define( [ 'swiper/dist/js/swiper' ], function ( Swiper ) {
    var $testimonial = jQuery('.front-page--testimonial');

	swiper = new Swiper({
        el: '.swiper-container',
        initialSlide: 0,
        speed: 800,
        slidesPerView: 2,
        spaceBetween: 100,
        breakpoints: {
            1189: {
                slidesPerView: 1,
                spaceBetween: 50
            }
        },
        on: {
            init: function () {
                fixSliderHeight();
                jQuery('.swiper-slide-prev').find( '.slider-content .footer').hide();
                jQuery('.swiper-slide-next').find( '.slider-content .footer').hide();

                jQuery('.swiper-slide-prev').find( '.slider-content .testimoial-foto').hide();
                jQuery('.swiper-slide-next').find( '.slider-content .testimoial-foto').hide();

            },
            resize: function () {
                fixSliderHeight();
            },
            transitionStart: function() {
                jQuery('.swiper-slide-next').find( '.slider-content .footer ').fadeOut(600);
                jQuery('.swiper-slide-prev').find( '.slider-content .footer').fadeOut(600);

                jQuery('.swiper-slide-prev').find( '.slider-content .testimonial-foto').fadeOut(600);
                jQuery('.swiper-slide-next').find( '.slider-content .testimonial-foto').fadeOut(600);

                jQuery('.swiper-slide-active').find( '.slider-content .footer').show();
                jQuery('.swiper-slide-active').find( '.slider-content .testimonial-foto').show();

                // set the position of bullets
                var height = $testimonial
                                .find('.swiper-slide-active')
                                    .find('.slider-content--wrapper')
                                        .outerHeight( true );
                $testimonial.find( '.swiper-pagination' ).css('top', height + 'px' );
            }
        },
        autoplay: {
            delay: 40000,
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

    jQuery( window ).resize(function() {
        setTimeout(function(){ fixSliderHeight(); }, 300);
    });


    function fixSliderHeight() {
        var maxHeight = 0,
            bulletsOffset = 29;

        if ( jQuery( window ).width() >= 480 ) {
            bulletsOffset = 60;
        }

        $testimonial
            .find( '.swiper-slide' ).each(function() {
                maxHeight = Math.max( jQuery( this ).outerHeight( true ), maxHeight );
            })
            .end()
            .find( '.swiper-container' )
                .height( maxHeight + bulletsOffset );


        jQuery( '.testimonial-nav' ).css('width', 'calc(50% - '+jQuery( '.slider-content' ).width() /2+'px )');
    }
});