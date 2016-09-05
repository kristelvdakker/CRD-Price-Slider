/**
 * The "csscomb" task
 *
 * The grunt plugin for sorting CSS properties in specific order.
 *
 * npm install grunt-csscomb --save-dev
 * grunt.loadNpmTasks('grunt-csscomb');
 */
module.exports = {
    dist: {
        files: {
            'css/min/styles.min.css': ['css/comb/styles.css'],
            'css/min/shortcodes.min.css': ['css/comb/shortcodes.css'],
            'css/min/grid.min.css': ['css/comb/grid.css'],
            'css/min/layout.min.css': ['css/comb/layout.css'],
            'css/min/print.min.css': ['css/comb/print.css'],
            'css/min/rtl.min.css': ['css/comb/rtl.css'],
            'css/min/temp.min.css': ['css/comb/temp.css']
        }
    }
};
