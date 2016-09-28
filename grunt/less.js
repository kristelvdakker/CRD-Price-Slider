/**
 * The "less" task
 *
 * Compile LESS files to CSS.
 *
 * npm install grunt-contrib-less --save-dev
 * grunt.loadNpmTasks('grunt-contrib-less');
 */
module.exports = {
    development: {
        options: {
            compress: true,
            yuicompress: true,
            optimization: 2
        },
        files: {
            'assets/css/comb/styles.css': "assets/css/less/styles.less",
            'assets/css/comb/shortcodes.css': "assets/css/less/shortcodes.less",
            'assets/css/comb/grid.css': "assets/css/less/grid.less",
            'assets/css/comb/layout.css': "assets/css/less/layout.less",
            'assets/css/comb/print.css': "assets/css/less/print.less",
            'assets/css/comb/rtl.css': "assets/css/less/rtl.less",
            'assets/css/comb/temp.css': "assets/css/less/temp.less"
        }
    }
};
