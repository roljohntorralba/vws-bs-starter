const del = require('del');
const {src, dest, watch, series, parallel} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const mode = require('gulp-mode')();
const compiler = require("webpack");
const webpack = require("webpack-stream");
const webpackConf = require("./webpack.config.js");
const prefix = require('gulp-autoprefixer');
const webp = require('gulp-webp');

webpackConf.mode = mode.development() ? 'development' : 'production';

function buildStyles() {
    return src('./sass/*.scss')
        .pipe(mode.development(sourcemaps.init()))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(prefix())
        .pipe(rename({extname: ".min.css"}))
        .pipe(mode.development(sourcemaps.write('./')))
        .pipe(dest('dist/css'));
};

function buildScripts() {
    return src("./js/*.js")
        .pipe(webpack(webpackConf, compiler))
        .pipe(dest('dist/js'));
}

function buildImages() {
    return src('./img/*.{jpg,png,svg}')
        .pipe(dest('dist/img'))
        .pipe(webp({
            quality: 70,
            method: 6,
        }))
        .pipe(dest('dist/img'))
}

function clean() {
    return del(['dist']);
}
function cleanStyles() {
    return del(['dist/css']);
}
function cleanScripts() {
    return del(['dist/js']);
}
function cleanImages() {
    return del(['dist/img']);
}

exports.buildStyles = buildStyles;
exports.buildScripts = buildScripts;
exports.buildImages = buildImages;
exports.build = series(clean, parallel(buildScripts, buildStyles, buildImages));
exports.watch = series(parallel(cleanStyles, cleanScripts), parallel(buildScripts, buildStyles));
exports.default = function () {
    watch(['./sass/**/*.scss', './js/**/*.js', './img/**/*.{jpg,png,svg}', '!node_modules/**'], {ignoreInitial: false}, series('watch'));
};
