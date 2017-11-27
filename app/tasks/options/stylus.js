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
			'<%= config.assets.build %>/css/style.css' : '<%= config.assets.src %>/stylus/style.styl'
		}
	},
	dist: {
		files : {
			'<%= config.assets.build %>/css/style.css' : '<%= config.assets.src %>/stylus/style.styl'
		}
	}
};
