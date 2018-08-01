var swiper;

/**
 * Manipulate header to show after load the font
 */
define( [ 'swiper/dist/js/swiper' ], function ( Swiper ) {
    var counter = document.querySelector( '.swiper-counter' );

    swiper = new Swiper( '.swiper-container', {
        on: {
            init: draw,
            slideChange: draw
        },
        pagination: {
            el: '.swiper-pagination'
        }
    } );

    function draw() {
        if ( counter ) {
            counter.innerHTML = ( this.activeIndex + 1 ) + '/' + this.slides.length;
        }
    }
});
