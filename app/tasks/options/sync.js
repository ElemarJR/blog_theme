/**
 * Synchronize files between to directories  
 */
module.exports = {
	requirejs: {
		files : [{
			cwd : '<%= config.assets.src %>/js',
			src : '**',
			dest : '<%= config.assets.build %>/js'
		}],
		pretend : false,
		verbose: true,
		updateAndDelete: true,
		ignoreInDest: 'libs/**'
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
