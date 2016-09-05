/**
 * The "lintspaces" task
 *
 * A Grunt task for checking spaces in files depending on the node module lintspaces.
 *
 * npm install grunt-lintspaces --save-dev
 * grunt.loadNpmTasks('grunt-lintspaces');
 */
module.exports = {
    all: {
        src: [
            '**/*'
        ],
        options: {
            newline: true,
            newlineMaximum: 2,
            trailingspaces: true,
            indentation: 'spaces',
            spaces: 4
        }
    }
};
