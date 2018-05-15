/**
 * Watch for changes for files and execute an execute a task
 */
module.exports = {
	livereload: {
		files: ['<%= config.template.src %>/**/*', '<%= config.assets.build %>/js/**/*.js'],
		options: {
			livereload: true
		}
	},
	stylus: {
		files: ['.stylintrc', '<%= config.assets.src %>/stylus/**/*.styl'],
		tasks: ['stylint', 'stylus:dev']
	},
	js: {
		files: ['<%= config.assets.src %>/js/**/*.js'],
		tasks: ['sync:requirejs']
	},
	images: {
		files: ['<%= config.assets.src %>/images/**/*.{png,jpg,gif,svg}'],
		tasks: ['imagemin']
	},
	bower: {
		files: ['bower_components/**/*'],
		tasks: ['bower:copy']
	},
	config: {
		files: ['<%= config.config.dir %>/**/*'],
		tasks: ['symlink']
	},
	'font-icon': {
		files: ['theme/font-icon/fonts/**/*'],
		tasks: ['sync:font-icon']
	}
};
