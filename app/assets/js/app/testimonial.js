var swiper;

/**
 * Manipulate header to show after load the font
 */
define( [ 'swiper/dist/js/swiper' ], function ( Swiper ) {
    var $testimonial = jQuery('.front-page--testimonial'),
        $pagination = $testimonial.find( '.swiper-pagination' ),
        $slides = $testimonial.find( '.swiper-slide' );

    if ( 0 === $testimonial.length ) {
        return;
    }

    swiper = new Swiper({
        el: '.swiper-container',
        initialSlide: 0,
        speed: 800,
        slidesPerView: 'auto',
        spaceBetween: 100,
        breakpoints: {
            1189: {
                slidesPerView: 1,
                spaceBetween: 50
            }
        },
        on: {
            resize: function () {
                $slides.css( 'width', '' );
                update();
            },
            transitionStart: function() {
                if ( ! isLargeScreen() ) {
                    bulletsPosition();
                }
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

    // Use interval to continuos fix slide container size
    setInterval(function() {
        swiper.update();
        update();
    }, 300);

    /**
     * Verify if the screen is large
     *
     * @return {Boolean} True if is large, false otherwise
     */
    function isLargeScreen() {
        return jQuery( window ).width() > 1189;
    }

    /**
     * Update element behavior based in some event
     */
    function update() {
        bulletsPosition();
        fixSliderSizes();
    }

    /**
     * Set the position of bullets near the slides until medium
     * screens and in large screen fix in the bottom of container
     */
    function bulletsPosition() {
        if ( isLargeScreen() ) {
            $pagination.css( {
                'top' : 'auto',
                'bottom' : '0'
            } );
        } else {
            var height = $testimonial
                            .find( '.swiper-slide-active' )
                                .find( '.slider-content--wrapper' )
                                    .outerHeight( true );
            $pagination.css( {
                'top' : height + 'px',
                'bottom' : 'auto'
            } );
        }
    }

    /**
     * Adjust the slider container and prev/next size
     */
    function fixSliderSizes() {
        var maxHeight = 0,
            paginationHeight = $pagination.outerHeight( true ),
            $swiperContainer = $testimonial.find( '.swiper-container' );

        $swiperContainer.height( 'auto' );

        $slides.each(function() {
            maxHeight = Math.max( jQuery( this ).outerHeight( true ), maxHeight );
        });

        /*
         * Firefox BUG
         * When the scroll arrive in the page end, the scroll up a little. The `containerIsVisible` function fix it
         * applying the container height ajust just if it's visible.
         */
        if( containerIsVisible() ) {
            $swiperContainer.height( maxHeight + paginationHeight );
        }

        if ( isLargeScreen() ) {
            jQuery( '.testimonial-nav' ).css( 'width', 'calc( 50% - ' + jQuery( '.slider-content' ).width() / 2 + 'px )' );
        }
    }

    /**
     * Verify if a part of the swiper container is being shown in the screen
     */
    function containerIsVisible() {
        var $swiperContainer = $testimonial.find( '.swiper-container' ),
            docViewTop = jQuery( window ).scrollTop(),
            docViewBottom = docViewTop + jQuery( window ).height(),
            elemTop = $swiperContainer.offset().top,
            elemBottom = elemTop + $swiperContainer.height();

        return ( elemTop > docViewTop && elemTop < docViewBottom ) || ( elemBottom > docViewTop && elemBottom < docViewBottom );
    }
});
