/**
 * Build installation process
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
		'clean',
		'stylus:dist',
		'requirejs:compile',
		// 'imagemin',
		'copy',
		'compress'
	] );
};
