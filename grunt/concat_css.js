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
        src: [
            'assets/css/min/grid.min.css',
            'assets/css/min/styles.min.css',
            'assets/css/min/layout.min.css',
            'assets/css/min/shortcodes.min.css',
            'assets/css/min/temp.min.css'
        ],
        dest: 'build/css/styles.min.css'
    }
};
