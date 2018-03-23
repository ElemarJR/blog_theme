// define the WordPress jQuery as a module
if (typeof jQuery === 'function') {
    define('jquery', function() {
        return jQuery;
    });
}

// start the application
require([
    'app/animation',
    'app/font',
    'app/hero',
    'app/image-bg',
    'app/newsletter',
    'app/post-list',
    'app/scroll-button',
    'app/site-footer',
    'app/site-header',
    'app/site-navigation',
    'app/site-search',
    'app/testimonial'
], function() {
    setTimeout(function() {
        jQuery( window ).trigger('resize');
    }, 300);
});
