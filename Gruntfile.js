module.exports = function(grunt) {
    pkg: grunt.file.readJSON('package.json'),

    require('load-grunt-tasks')(grunt, {
        config: 'package.json',
        scope: 'devDependencies',
        requireResolution: true
    });

    require('load-grunt-config')(grunt);
};
