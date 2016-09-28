/**
 * The "concat" task
 *
 * Concatenate files.
 *
 * npm install grunt-contrib-concat --save-dev
 * grunt.loadNpmTasks('grunt-contrib-concat');
 */
module.exports = {
    options: {
        stripBanners: true
    },
    dist: {
        src: ['assets/js/scripts.js', 'assets/js/functions.js'],
        dest: 'build/js/functions.js'
    },
    vendor: {
        src: ['assets/js/vendor/**.js'],
        dest: 'build/js/vendor.js'
    }
};
