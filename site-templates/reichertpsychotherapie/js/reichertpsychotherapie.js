"use strict";

$(document).ready(function () {
	$(".nav-mobile .activate-menu").click(function() {
		$(".nav-mobile-overlay").removeClass("hidden");
	});

	$(".nav-mobile-overlay .overlay-close").click(function() {
		$(".nav-mobile-overlay").addClass("hidden");
	});
});
