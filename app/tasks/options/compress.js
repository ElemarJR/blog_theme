/**
 * Compress build package to deploy
 */
module.exports = {
    theme: {
        options: {
            archive: '<%= pkg.name %>.zip'
        },
        files: [
            {
                expand: true,
                cwd: '.',
                src: ['composer.*', 'src/**/*'],
                dest: '.'
            }
        ]
    }
};
