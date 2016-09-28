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
            'build/js/functions.min.js': ['assets/js/functions.js'],
            'build/js/vendor.min.js': ['assets/js/build/vendor.js']
        }
    }
};
