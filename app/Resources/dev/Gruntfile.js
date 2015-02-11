module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    noCache: true
                },
                files: {
                    '../../../web/assets/css/bootstrap.css': 'custom-sass/bootstrap.scss',
                }
            }
        },
        watch: {
            options: {
                livereload: true,
            },
            css: {
                files: ['custom-sass/*.scss'],
                tasks: ['compass', 'cssmin'],
                options: {
                    spawn: false,
                }
            },
            scripts: {
                files: ['inc/js/dev/scripts.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false,
                }
            }
        },
        cssmin: {
            my_target: {
                files: [{
                    expand: true,
                    cwd: 'inc/css/',
                    src: ['bootstrap.css'],
                    dest: 'inc/css/',
                    ext: '.min.css'
                }]
            }
        },
        uglify: {
            build: {
                src: 'inc/js/dev/scripts.js',
                dest: 'inc/js/scripts.min.js'
            }
        },
        uncss: {
            dist: {
                options: {
                  stylesheets: ['inc/css/global.css', 'inc/css/media-queries.css', 'inc/css/homepage.css']
                },
                files: {
                    'inc/css/tidy.css': ['front-page.php']
                }
            }
        },
        compass: {
            dev: {
                options: {
                    sassDir: 'custom-sass',
                    cssDir: '../../../web/assets/css/',
                    environment: 'development'
                }
            }
        }        
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-compass');


    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['compass', 'watch', 'cssmin', 'uglify']);
    grunt.registerTask('clean', ['uncss']);
    grunt.registerTask('comp', ['compass']);
    grunt.registerTask('sa', ['sass']);
    

};

