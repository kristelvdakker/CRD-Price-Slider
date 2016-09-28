/**
 * The "watch" task
 *
 * Run tasks whenever watched files change.
 *
 * npm install grunt-contrib-watch --save-dev
 * grunt.loadNpmTasks('grunt-contrib-watch');
 */
module.exports = {
    scripts: {
        files: ['assets/js/*.js', 'assets/css/less/*.less'],
        tasks: ['less', 'csscomb', 'concat_css'],
        options: {
            spawn: false
        }
    }
};
