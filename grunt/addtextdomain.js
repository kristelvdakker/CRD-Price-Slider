/**
 * The "addtextdomain" task
 *
 * Add the text domain to gettext functions in your plugin or theme.
 *
 * npm install grunt-wp-i18n --save-dev
 * grunt.loadNpmTasks('grunt-wp-i18n');
 */
module.exports = {
    options: {
        textdomain: 'crd_framework',        // Project text domain.
        updateDomains: ['ps_translate']     // List of text domains to replace.
    },
    target: {
        files: {}
    }
};
