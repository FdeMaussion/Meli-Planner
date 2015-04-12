module.exports = function(grunt) {
  grunt.initConfig({
    sass:{
      dist: {
        options: {
          style: 'nested',
        },
        files: {
          'css/styles.min.css': 'sass/main.scss',
        }
      }
    },
    watch: {
      css: {
        files: ['sass/**/*.scss'],
        tasks: ['default'],
        options: {
          livereload: true,
        },
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass']);

};