/**
 * Compile stylus file
 */
module.exports = {
	dev: {
		options: {
			compress: false,
			linenos: true
		},
		files : {
			'<%= config.assets.build %>/css/style.css' : '<%= config.assets.src %>/stylus/style.styl',
			'<%= config.assets.build %>/css/prioritize.css' : '<%= config.assets.src %>/stylus/prioritize.styl'
		}
	},
	dist: {
		files : {
			'<%= config.assets.build %>/css/style.css' : '<%= config.assets.src %>/stylus/style.styl',
			'<%= config.assets.build %>/css/prioritize.css' : '<%= config.assets.src %>/stylus/prioritize.styl'
		}
	}
};
