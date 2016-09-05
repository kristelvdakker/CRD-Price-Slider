/**
 * The "devUpdate" task
 *
 * This plugin allows you to both update your dependencies and devDependencies with an automated task.
 *
 * npm install --save-dev grunt-dev-update
 * grunt.loadNpmTasks('grunt-dev-update');
 */
module.exports = {
    main: {
        options: {
            updateType: 'force',        //just report outdated packages
            reportUpdated: false,       //don't report up-to-date packages
            semver: true,               //stay within semver when updating
            packages: {
                devDependencies: true,  //only check for devDependencies
                dependencies: true
            },
            packageJson: null,          //use matchdep default findup to locate package.json
            reportOnlyPkgs: []          //use updateType action on all packages
        }
    }
};
