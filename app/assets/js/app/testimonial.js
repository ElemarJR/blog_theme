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
              // Responsive breakpoints
              breakpoints: {
                // when window width is <= 800px
                800: {
                  slidesPerView: 1,
                  spaceBetween: 50
                }
              },
              autoplay: {
    			delay: 5000,
  			  },
            centeredSlides: true,
            loop: true,
            pagination: {
              el: '.swiper-pagination',
            }
        });
});