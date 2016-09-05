/**
 * The "makepot" task
 *
 * Generate a POT file for translators to use when translating your plugin or theme.
 *
 * npm install grunt-wp-i18n --save-dev
 * grunt.loadNpmTasks('grunt-wp-i18n');
 */
module.exports = {
    target: {
        options: {
            cwd: '',                                            // Directory of files to internationalize.
            domainPath: '/lang',                                // Where to save the POT file.
            exclude: [],                                        // List of files or directories to ignore.
            include: [],                                        // List of files or directories to include.
            mainFile: 'style.css',                              // Main project file.
            potComments: 'MagnaVersum Copyright (c) {{year}}',  // The copyright at the beginning ofthe POT file.
            potFilename: '<%= package.name %>-en_US.pot',       // Name of the POT file.
            processPot: null,                                   // A callback function for manipulating the POT file.
            type: 'wp-theme',                                   // Type of project (wp-plugin or wp-theme).
            updateTimestamp: true                               // Whether the POT-Creation-Date should be updated without other changes.
        }
    }
};
