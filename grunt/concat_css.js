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
            'css/min/grid.min.css',
            'css/min/styles.min.css',
            'css/min/layout.min.css',
            'css/min/shortcodes.min.css',
            'css/min/temp.min.css'
        ],
        dest: 'dist/css/styles.min.css'
    }
};
