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
    dev: {
        src: ['assets/js/scripts.js'],
        dest: 'assets/js/concat/scripts.js'
    }
};
