/**
 * The "ftp-deploy" task
 *
 * This is a grunt task for code deployment over the ftp protocol.
 *
 * npm install grunt-ftp-deploy --save-dev
 * grunt.loadNpmTasks('grunt-ftp-deploy');
 */
module.exports = {
    build: {
        auth: {
            host: 'relianceas.com',
            port: 21,
            authKey: 'key1'
        },
        src: '/Users/kristelvdakker/Dropbox/sites/MagnaVersum/wordpress/wp-content/themes/enfold',
        dest: 'wp-content/themes/enfold',
        exclusions: [
            '/Users/kristelvdakker/Dropbox/sites/MagnaVersum/wordpress/wp-content/themes/enfold/**/.DS_Store',
            '/Users/kristelvdakker/Dropbox/sites/MagnaVersum/wordpress/wp-content/themes/enfold/**/Thumbs.db',
            '/Users/kristelvdakker/Dropbox/sites/MagnaVersum/wordpress/wp-content/themes/enfold/node_modules',
            '/Users/kristelvdakker/Dropbox/sites/MagnaVersum/wordpress/wp-content/themes/enfold/.ftppass'
        ]
    }
};
