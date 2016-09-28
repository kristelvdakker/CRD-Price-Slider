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
        files: {'assets/css/comb/styles.css': "assets/css/less/styles.less"}
    }
};
