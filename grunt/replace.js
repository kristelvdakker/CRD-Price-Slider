/**
 * The "replace" task
 *
 * Replace text patterns with applause.
 *
 * npm install grunt-replace --save-dev
 * grunt.loadNpmTasks('grunt-replace');
 */
module.exports = {
    dist: {
        options: {
            patterns: [
                {
                    match: "version",
                    replacement: "<%= pkg.version %>"
                }

            ]
        },
        files: [
            {
                expand: true,
                flatten: true,
                src: ['package.json', 'functions.php']
            }
        ]
    }
};
