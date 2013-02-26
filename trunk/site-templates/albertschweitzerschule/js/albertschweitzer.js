// enable parallax scrolling
$(function(){
	// internet explorer is not able to render nicely, so we exclude parallax feature for now (most likely forever)
	if(navigator.appVersion.indexOf("MSIE") == -1) {
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 40
		});
	}
});