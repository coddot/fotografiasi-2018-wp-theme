// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function() {
    
    gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('css'))
        // .pipe(gulp.dest(function(f) {
        //     return f.base;
        // }))
});

// de concatenat tot intr-un fisier
// gulp.task('sass', function() {
//     gulp.src('./scss/*.scss')
//         .pipe(sass())
//         .pipe(concat('style.css')) // this is what was missing
//         .pipe(gulp.dest('./')); // output to theme root
//   });

gulp.task('default', ['sass'], function() {
    gulp.watch('sass/*.scss', ['sass']);
})