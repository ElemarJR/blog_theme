/**
 * Lint JS files
 */
module.exports = {
	options: {
		jshintrc: true
	},
	files: [
		'Gruntfile.js',
		'app/assets/js/**/*.js',
		'app/tasks/**/*.js'
	]
};
