/**
 * Image assets otimization
 */
module.exports = {
	images: {
        files: [{
            expand: true,
            cwd: '/app/<%= config.assets.src %>/images',
            src: ['**/*.{png,jpg,gif,svg}'],
            dest: '<%= config.assets.build %>/images'
        }]
    }
};
