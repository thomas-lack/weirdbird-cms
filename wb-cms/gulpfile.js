"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass");

sass.compiler = require("node-sass");

gulp.task("sass", function() {
	return gulp.src("./site-templates/reichertpsychotherapie/css/**/*.scss")
		.pipe(sass({outputStyle: "compressed"}).on("error", sass.logError))
		.pipe(gulp.dest("./site-templates/reichertpsychotherapie/css"));
});

gulp.task("sass:watch", function() {
	gulp.watch("./site-templates/**/*.scss", gulp.series("sass"));
});
