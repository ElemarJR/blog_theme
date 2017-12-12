/**
 * The RequireJS main file.
 *
 * Config the app and libs paths. The libs is automagically loaded with the
 * grunt-bower task.
 */
requirejs.config({
    baseUrl: elemarjr_script.base_url,
    paths: {
        app: '../app',
        libs: '../libs'
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
    'app/font',
    'app/site-navigation',
    'app/site-search'
], function() {});
