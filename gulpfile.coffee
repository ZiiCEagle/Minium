gulp = require("gulp")
autoprefixer = require('gulp-autoprefixer')
bower = require('gulp-bower')
browserSync = require("browser-sync")
clean = require('gulp-clean')
concat = require('gulp-concat')
csscomb = require('gulp-csscomb')
minifyCss = require('gulp-minify-css')
notify = require("gulp-notify")
rename = require("gulp-rename")
sass = require('gulp-sass')
size = require('gulp-size')

paths =
  bower: "bower_components/"
  font_awesome: "bower_components/font-awesome/"
  normalize: "bower_components/normalize-css/"
  sass: "assets/scss/"
  js: "assets/js/"
  img: "assets/img/"

browsers = [
  "last 2 versions"
]

# Task for styles files
gulp.task "styles", [ "bower", "csscomb" ], ->

  src = [
    paths.sass + "style.scss"
  ]

  gulp.src src
  .pipe sass()
    .on("error", notify.onError((err) ->
      "Check error(s) in console"
    ))
    .on("error", sass.logError)
  .pipe autoprefixer
    browsers: browsers
  .pipe minifyCss()
  .pipe concat "style.css"
  .pipe size()
  .pipe notify
      title: "SASS task"
      message: "Done"
  .pipe gulp.dest "./"

# Browser-sync task to watch modifications and init server
gulp.task 'browser-sync', ->
  browserSync.init
    proxy: 'localhost/blog',
    files: "style.css",
    notify: false

# Copy fonts files and associated scss files
gulp.task 'fonts', ['bower'], ->
  gulp.src paths.font_awesome + 'fonts/**.*'
  .pipe gulp.dest 'assets/fonts'

gulp.task 'csscomb', ->
  gulp.src "assets/scss/**"
  .pipe csscomb()
  .pipe gulp.dest "assets/scss"

# execute bower
gulp.task "bower", ->
  bower()

# Watch task
gulp.task "watch", [ "default" ], ->
  gulp.watch paths.sass + "**", [ "styles" ]
  gulp.watch paths.js + "*.coffee", [ "scripts" ]

# Dafault task
gulp.task "default", [ "bower", "styles" ], ->
