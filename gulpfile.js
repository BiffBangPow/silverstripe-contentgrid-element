const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const {parallel, watch, src, dest} = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const mode = require('gulp-mode')({
    modes: ["production", "development"],
    default: "development",
    verbose: false
});

function processcss() {
    return src('client/src/scss/**/*.scss')
        .pipe(mode.development(sourcemaps.init()))
        .pipe(sass({
            includePaths: ['node_modules']
        })).on('error', sass.logError)
        .pipe(autoprefixer({'grid': 'no-autoplace'}))
        .pipe(mode.production(cleanCSS({level: 1, inline: ['local']})))
        .pipe(mode.development(sourcemaps.write('../../dist/css/maps')))
        .pipe(dest('client/dist/css'))
}

function watchfiles() {
    watch('client/src/scss/**/*.scss', {queue: false}, processcss);
}

exports.default = parallel(processcss);
exports.watch = watchfiles;
