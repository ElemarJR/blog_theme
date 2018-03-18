/**
 * The RequireJS config file.
 *
 * Config the app and libs paths. The libs is automagically loaded with the
 * grunt-bower task.
 */

var require = {
    config: function (c) {
        require = c;
    }
}

require.config({
    baseUrl: elemarjr_script.base_url,
    paths: {
        app: '../app'
    },
    deps: ['app']
});
