/**
 * The "concat_css" task
 *
 * The grunt plugin for sorting CSS properties in specific order.
 *
 * npm install grunt-concat-css --save-dev
 * grunt.loadNpmTasks('grunt-csscomb');
 */
module.exports = {
    options: {
        // Task-specific options go here.
    },
    all: {
        src: ['assets/css/min/styles.min.css'],
        dest: 'build/css/styles.min.css'
    }
};
