/**
 * The "uglify" task
 *
 * Minify javascript files with UglifyJS.
 *
 * npm install grunt-contrib-uglify --save-dev
 * grunt.loadNpmTasks('grunt-contrib-uglify');
 */
module.exports = {
    dist: {
        files: {
            'build/js/scripts.min.js': ['assets/js/scripts.js']
        }
    }
};
