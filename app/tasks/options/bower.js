/**
 * Copy library dist files to the server js libs directory
 */
module.exports = {
	copy : {
		dest : '<%= config.assets.build %>/js/libs',
		options : {
			keepExpandedHierarchy: false
		}
	}
};
