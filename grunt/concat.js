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
        src: ['js/avia-compat.js', 'js/avia.js'],
        dest: 'js/build/functions.js',
    },
    vendor: {
        src: ['js/vendor/**.js'],
        dest: 'js/build/vendor.js'
    }
};
