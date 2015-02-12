module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

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
                    cwd: '../../../web/assets/css/',
                    src: ['bootstrap.css', 'cover.css'],
                    dest: '../../../web/assets/css/dist/',
                    ext: '.min.css'
                }]
            }
        },
        uglify: {
            build: {
                src: '../../../web/assets/js/scripts.js',
                dest: '../../../web/assets/js/dist/scripts.min.js'
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
        },
        coffee: {
            compile: {
                files: {
                    '../../../web/assets/js/scripts.js': 'coffee/scripts.coffee'
                }
            }
        }        
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-coffee');


    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['compass', 'cssmin', 'coffee', 'uglify']);
    
};

