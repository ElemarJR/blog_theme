var swiper;

/**
 * Manipulate header to show after load the font
 */
define( [ 'swiper/dist/js/swiper' ], function ( Swiper ) {
    var $testimonial = jQuery('.front-page--testimonial'),
        $pagination = $testimonial.find( '.swiper-pagination' );

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
                jQuery('.swiper-slide-prev').find( '.slider-content .footer').hide();
                jQuery('.swiper-slide-next').find( '.slider-content .footer').hide();

                jQuery('.swiper-slide-prev').find( '.slider-content .testimoial-foto').hide();
                jQuery('.swiper-slide-next').find( '.slider-content .testimoial-foto').hide();

                update();

            },
            resize: function () {
                update();
            },
            transitionStart: function() {
                jQuery('.swiper-slide-next').find( '.slider-content .footer ').fadeOut(600);
                jQuery('.swiper-slide-prev').find( '.slider-content .footer').fadeOut(600);

                jQuery('.swiper-slide-prev').find( '.slider-content .testimonial-foto').fadeOut(600);
                jQuery('.swiper-slide-next').find( '.slider-content .testimonial-foto').fadeOut(600);

                jQuery('.swiper-slide-active').find( '.slider-content .footer').show();
                jQuery('.swiper-slide-active').find( '.slider-content .testimonial-foto').show();

                update();
            }
        },
        autoplay: {
            delay: 20000
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        centeredSlides: true,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: 'true'
        }
    });

    jQuery( window ).resize(function() {
        setTimeout(function(){ fixSliderHeight(); }, 300);
    });

    /**
     * Update element behavior based in some event
     */
    function update() {
        bulletsPosition();
        fixSliderHeight();
    }

    /**
     * Set the position of bullets near the slides until medium
     * screens and in large screen fix in the bottom of container
     */
    function bulletsPosition() {
        if( jQuery( window ).width() <= 1189 ) {
            var height = $testimonial
                            .find( '.swiper-slide-active' )
                                .find( '.slider-content--wrapper' )
                                    .outerHeight( true );
            $pagination.css( {
                'top' : height + 'px',
                'bottom' : 'auto'
            } );
        } else {
            $pagination.css( {
                'top' : 'auto',
                'bottom' : '0'
            } );
        }
    }

    /**
     * Adjust the slider container size
     */
    function fixSliderHeight() {
        var maxHeight = 0;

        $testimonial.find( '.swiper-container' ).height( 'auto' );

        $testimonial
            .find( '.swiper-slide' ).each(function() {
                maxHeight = Math.max( jQuery( this ).outerHeight( true ), maxHeight );
            })
            .end()
            .find( '.swiper-container' )
                .height( maxHeight + $pagination.outerHeight(true) );

        jQuery( '.testimonial-nav' ).css( 'width', 'calc( 50% - ' + jQuery( '.slider-content' ).width() / 2 + 'px )' );
    }
});