/**
 * Build installation process
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
		'stylus:dist',
		'requirejs:compile',
		'imagemin',
		'symlink'
	] );
};
