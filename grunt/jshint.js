/**
 * The "jshint" task
 *
 * Validate files with JSHint.
 *
 * npm install grunt-contrib-jshint --save-devs
 * grunt.loadNpmTasks('grunt-contrib-jshint');
 */
module.exports = {
    options: {
        "bitwise": true,
        "browser": true,
        "curly": true,
        "eqeqeq": true,
        "eqnull": true,
        "es5": true,
        "esnext": true,
        "immed": true,
        "jquery": true,
        "latedef": true,
        "newcap": true,
        "noarg": true,
        "node": true,
        "strict": false,
        "trailing": true,
        "undef": true,
        "globals": {
            "jQuery": true,
            "alert": true
        }
    },
    all: [
        'Gruntfile.js',
        'assets/js/*.js'
    ]
};
