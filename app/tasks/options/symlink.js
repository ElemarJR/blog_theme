/**
 * Create symlink to the application
 */
module.exports = {
	options: {
		overwrite: true
	},
	theme: {
		src: '<%= config.template.src %>',
		dest: '<%= config.template.build %>'
	},
	cli: {
		src: '<%= config.config.cli %>',
		dest: 'wp-cli.yml'
	},
	wp: {
		src: '<%= config.config.wp %>',
		dest: '<%= config.web %>/wp-config.php'
	},
	images: {
		src : '<%= config.assets.src %>/images',
		dest : '<%= config.assets.build %>/images'
	},
	'font-icon': {
		src : '<%= config.assets.src %>/font-icon/fonts',
		dest : '<%= config.assets.build %>/fonts/icons'
	},
	js: {
		files : [
			// Bower components
			{
				src: 'bower_components',
				dest: '<%= config.assets.build %>/js/bower_components'
			},
			// RequireJS
			{
				cwd : '<%= config.assets.src %>/js',
				src : ['app', 'app.js', 'config.js'],
				dest : '<%= config.assets.build %>/js',
				expand: true
			},
			// Admin JS files
			{
				src : '<%= config.assets.src %>/js/admin',
				dest : '<%= config.assets.build %>/js/admin'
			}
		]
	},
	assets: {
		src: '<%= config.assets.build %>',
		dest: '<%= config.template.src %>/assets'
	}
};
