/**
 * Create symlink to the application 
 */
module.exports = {
	options: {
		overwrite: true
	},
	theme: {
		src: '<%= config.template.src %>',
		dest: '<%= config.template.build %>'
	},
	assets: {
		src: '<%= config.assets.build %>',
		dest: '<%= config.template.src %>/assets'
	},
	cli: {
		src: '<%= config.config.cli %>',
		dest: 'wp-cli.yml'
	},
	wp: {
		src: '<%= config.config.wp %>',
		dest: '<%= config.web %>/wp-config.php'
	}
};
