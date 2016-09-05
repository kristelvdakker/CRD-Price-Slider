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
            'css/comb/styles.css': "css/less/styles.less",
            'css/comb/shortcodes.css': "css/less/shortcodes.less",
            'css/comb/grid.css': "css/less/grid.less",
            'css/comb/layout.css': "css/less/layout.less",
            'css/comb/print.css': "css/less/print.less",
            'css/comb/rtl.css': "css/less/rtl.less",
            'css/comb/temp.css': "css/less/temp.less"
        }
    }
};
