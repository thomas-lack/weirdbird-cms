var karmeliterschule = {
	init: function() {
		this.addStandardHandler();
		this.hideArticles(0);
	},

	addStandardHandler: function() {
		// school mascot handler
		var speechBubble = $('#karmi > #karmiWelcome');
		var origText = $(speechBubble).html();
		
		$('#karmi > div.pdficon > a').each(function(i, el){
			if (typeof $(el).attr('bubbletext') != 'undefined') {
				var newText = $(el).attr('bubbletext');	
				$(el).mouseover(function(){
					$(speechBubble).html(newText);
				});
				$(el).mouseout(function(){
					$(speechBubble).html(origText);
				});
			}
		});

		// Navigationhandler
		$('ul.program_nav > li > a').each(function(i, el){
			var elId = $(el).attr('id');
			$(el).unbind();
			$(el).bind('click', function(){
				karmeliterschule.hideArticles();
				karmeliterschule.showArticle(elId.substr(4));
			});
		});
	},

	// hide every article
	hideArticles: function(exception) {
		if (typeof exception == 'undefined')
			exception = -1;
		$('#col1_content > div.article').each(function(i, el){
			if (i != exception)
				$(el).hide();
		});
	},

	showArticle: function(idx) {
		console.log('showing', idx, typeof idx);
		
			$('#col1_content > div.article').each(function(i, el){
				
				
				if ((typeof idx == 'number' && i == idx) || (typeof idx == 'string' && $(el).attr('id') == idx))
					$(el).show();

			});
		//else
//			$('#col1_content > div.article[id="arcticle_' + idx + '"]').show();
	}
}

$(document).ready(function(){
	// hide the javascript warning div, since we can assure now that we have js
	$('#javascriptWarning').hide();

	// start the engines up
	karmeliterschule.init();
});