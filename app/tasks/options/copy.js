/**
 * Clean files and folders
 */
module.exports = {
	assets: {
		expand: true,
		cwd: '<%= config.assets.build %>',
		src: '**/*',
		dest: '<%= config.template.src %>/assets/'
	}
};