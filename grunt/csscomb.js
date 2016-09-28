/**
 * The "csscomb" task
 *
 * The grunt plugin for sorting CSS properties in specific order.
 *
 * npm install grunt-csscomb --save-dev
 * grunt.loadNpmTasks('grunt-csscomb');
 */
module.exports = {
    csscomb: {
        options: {
            config: '.csscombDev.json'
        },
        files: {
            'assets/css/less/styles.less': ['assets/css/less/styles.less']
        }
    },
    dist: {
        files: {
            'assets/css/min/styles.min.css': ['assets/css/comb/styles.css'],
            'assets/css/min/shortcodes.min.css': ['assets/css/comb/shortcodes.css'],
            'assets/css/min/grid.min.css': ['assets/css/comb/grid.css'],
            'assets/css/min/layout.min.css': ['assets/css/comb/layout.css'],
            'assets/css/min/print.min.css': ['assets/css/comb/print.css'],
            'assets/css/min/rtl.min.css': ['assets/css/comb/rtl.css'],
            'assets/css/min/temp.min.css': ['assets/css/comb/temp.css']
        }
    }
};
