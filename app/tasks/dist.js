/**
 * Build installation process
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
		'stylus:dist',
		'requirejs:compile',
		'sync:adminjs',
		'sync:font-icon',
		'imagemin',
		'symlink:theme',
		'symlink:assets',
		'symlink:cli',
		'symlink:wp'
	] );
};
