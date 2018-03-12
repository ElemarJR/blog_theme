/**
 * The RequireJS main file.
 *
 * Config the app and libs paths. The libs is automagically loaded with the
 * grunt-bower task.
 */
requirejs.config({
    baseUrl: elemarjr_script.base_url,
    paths: {
        app: '../app'
    }
});

// define the WordPress jQuery as a module
if (typeof jQuery === 'function') {
    define('jquery', function() {
        return jQuery;
    });
}

// start the application
requirejs([
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
    jQuery( window ).trigger('resize');
});
