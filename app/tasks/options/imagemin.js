/**
 * Image assets otimization
 */
module.exports = {
	images: {
        files: [{
            expand: true,
            cwd: '<%= config.assets.src %>/images',
            src: ['**/*.{png,jpg,gif,svg}'],
            dest: '<%= config.assets.build %>/images'
        }]
    }
};
