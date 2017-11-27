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
	}
};
