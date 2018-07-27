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
		files: ['<%= config.assets.src %>/js/**/*'],
		tasks: ['jshint']
	}
};
