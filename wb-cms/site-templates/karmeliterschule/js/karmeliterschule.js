var karmeliterschule = {
	init: function() {
		this.addStandardHandler();
		this.hideArticles(0);
		this.hideArchiveEntries();
		this.hideContactSuccess();
		this.hideContactErrors();
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
		$('ul.program_nav > li > a[id^="ref_article_"]').each(function(i, el){
			var elId = $(el).attr('id');
			$(el).unbind();
			$(el).bind('click', function(){
				karmeliterschule.hideArticles();
				karmeliterschule.showArticle(elId.substr(4));
			});
		});

		// Navigationhandler (pdf archive)
		$('ul.program_nav > li > a[id^="ref_archive_"]').each(function(i, el){
			var elId = $(el).attr('id');
			$(el).unbind();
			$(el).bind('click', function(){
				if (elId == 'ref_archive_all') {
					$('div#archivewelcome').hide();
					karmeliterschule.showAllArchiveEntries();
				}
				else {
					$('div#archivewelcome').hide();
					karmeliterschule.hideArchiveEntries();
					karmeliterschule.showArchiveEntry(elId.substr(4));
				}
			});
		});

		// TODO: Handler fuer kontaktaufnahme
		$('#contact_form > input.submit').bind('click', function(){
			karmeliterschule.hideContactErrors();
			var error = false;
			var email = $('input[name="frmEmail"]').val();
			var message = $('textarea[name="frmText"]').val();

			if( ! karmeliterschule.validateEmail(email)) {
				error = true;
				$('#contact_form_email_error').show();
			}
			
			if ( typeof message == 'undefined' || message == '' ) {
				error = true;
				$('#contact_form_message_error').show();
			}

			if (!error) {
				karmeliterschule.hideContactErrors();

				// send mail via backend
				$.ajax({
					type: 'POST',
					url: '/mail/contact',
					data: { 
						email: email,
						message: message
					}
				}).done(function(response){
					$('#contact_form').hide();
					$('#contact_form_success').show();
				}).fail(function(response){
					$('#contact_form').hide();
					$('#contact_form_failure').show();
				});
			}
		});
	},

	validateEmail: function(mail) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		if( mail == '' || !emailReg.test( mail ))
		  return false;
		else 
		  return true;
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

	// hide every archive entry
	hideArchiveEntries: function() {
		$('div[id^="archive_"]').hide();
	},

	hideContactSuccess: function() {
		$('#contact_form_success').hide();
	},

	hideContactErrors: function() {
		$('#contact_form > div[id$="_error"]').hide();
		$('#contact_form_failure').hide();
	},

	showArticle: function(idx) {
		$('#col1_content > div.article').each(function(i, el){
			if ((typeof idx == 'number' && i == idx) || 
				(typeof idx == 'string' && $(el).attr('id') == idx))
				$(el).show();
		});
	},

	showAllArchiveEntries: function() {
		$('#col1_content > div[id^="archive_"]').show();
	},

	showArchiveEntry: function(id) {
		$('#col1_content > div[id="' + id + '"]').show();
	},

	showContactSuccess: function() {
		$('#contact_form_success').show();
	}
}

$(document).ready(function(){
	// hide the javascript warning div, since we can assure now that we have js
	$('#javascriptWarning').hide();

	// start the engines up
	karmeliterschule.init();
});