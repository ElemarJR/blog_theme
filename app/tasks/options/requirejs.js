/**
 * RequireJS optimized file generation
 */
module.exports = {
	compile: {
		options: {
			baseUrl: 'bower_components',
			include: [ 'almond/almond' ],
			paths: {
				app: '../app/assets/js/app'
			},
			name: 'app',
			out: '<%= config.assets.build %>/js/app.dist.js'
		}
	},
	nooptimize: {
		options: {
			baseUrl: 'bower_components',
			include: [ 'almond/almond' ],
			paths: {
				app: '../app/assets/js/app'
			},
			name: 'app',
			out: '<%= config.assets.build %>/js/app.dist.js',
			optimize: 'none'
		}
	}
};
