import gulp from 'gulp';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import browserSync from 'browser-sync';

const paths = {
    styles: {
        src: 'assets/scss/**/*.scss',
        dest: 'assets/css'
    }
};

function style() {
    return gulp.src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        proxy: "prueba-netforemost.local"
    });
    gulp.watch(paths.styles.src, style);
    gulp.watch("**/*.php").on('change', browserSync.reload);
}

export { style, watch };
