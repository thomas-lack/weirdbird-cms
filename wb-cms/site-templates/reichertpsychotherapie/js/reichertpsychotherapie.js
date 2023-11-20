"use strict";

$(document).ready(function () {
	const toggleOverlay = function () {
		$(".nav-mobile-overlay").toggleClass("active");
	};

	const toggleMenuIcon = function (element) {
		const menuElement = $(element).first();
		menuElement.toggleClass('active');
	};

	$(".nav-mobile .activate-menu").click(function (event) {
		toggleMenuIcon(event.target);
		toggleOverlay();
	});
});
