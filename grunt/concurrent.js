/**
 * The "concurrent" task
 *
 * Run grunt tasks concurrently.
 *
 * npm install --save-dev grunt-concurrent
 * require('load-grunt-tasks')(grunt);
 */
module.exports = {
    target: [['makepot', 'addtextdomain'], 'imagemin']
};
