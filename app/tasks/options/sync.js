/**
 * Synchronize files between to directories
 */
module.exports = {
	requirejs: {
		files : [{
			cwd : '<%= config.assets.src %>/js',
			src : ['app/**', 'app.js', 'config.js'],
			dest : '<%= config.assets.build %>/js'
		}],
		pretend : false,
		verbose: true,
		updateAndDelete: true,
		ignoreInDest: 'bower_components'
	},
	adminjs: {
		files : [{
			cwd : '<%= config.assets.src %>/js/admin',
			src : '**',
			dest : '<%= config.assets.build %>/js/admin'
		}],
		pretend : false,
		verbose: true,
		updateAndDelete: true,
		ignoreInDest: 'bower_components'
	},
	'font-icon': {
		files : [ {
			cwd : '<%= config.assets.src %>/font-icon/fonts',
			src : ['*'],
			dest : '<%= config.assets.build %>/fonts/icons'
		} ],
		pretend : false,
		verbose: true,
		updateAndDelete: true
	}
};
