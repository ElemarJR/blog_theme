/**
 * Watch for changes for files and execute an execute a task
 */
module.exports = {
	livereload: {
		files: ['<%= config.template.build %>/**/*', 'src/**/*'],
		options: {
			livereload: true
		}
	},
	stylus: {
		files: ['.stylintrc', '<%= config.assets.src %>/stylus/**/*.styl'],
		tasks: ['stylint', 'stylus:dev']
	},
	js: {
		files: ['<%= config.assets.src %>/theme/js/**/*.js'],
		tasks: ['sync:requirejs']
	},
	bower: {
		files: ['bower_components/**/*'],
		tasks: ['bower:dev']
	},
	config: {
		files: ['<%= config.config.dir %>/**/*'],
		tasks: ['symlink']
	}
};
