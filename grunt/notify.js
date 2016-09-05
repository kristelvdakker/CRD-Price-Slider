/**
 * The "notify" task
 *
 * Automatic desktop notifications for Grunt errors and warnings.
 *
 * npm install grunt-notify --save-dev
 * grunt.loadNpmTasks('grunt-notify');
 */
module.exports = {
    imagemin: {
        options: {
            title: 'Build complete',  // optional
            message: '<%= pkg.name %> build finished successfully.' //required
        }
    }
}
