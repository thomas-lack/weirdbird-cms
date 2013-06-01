var $ = $, navigator = navigator, google = google, document = document;

var wbTemplate = {
	init: function () {
		"use strict";
        // internet explorer is not able to render nicely, so we exclude 
		// parallax feature for now (most likely forever)
		if (navigator.appVersion.indexOf("MSIE") === -1) {
            this.enableParallaxScrolling();
        }

		this.addStandardHandler();
		this.hideContactSuccess();
		this.hideContactErrors();
		this.addGoogleMapSupport();
	},

	enableParallaxScrolling: function () {
		"use strict";
        $(function () {
            $.stellar({
				horizontalScrolling: false,
				verticalOffset: 40
			});
		});
	},

	addStandardHandler: function () {
		"use strict";
        $('#contact_form > input.submit').bind('click', function () {
            wbTemplate.hideContactErrors();
			var error = false,
                email = $('input[name="frmEmail"]').val(),
                message = $('textarea[name="frmText"]').val();

			if (!wbTemplate.validateEmail(email)) {
				error = true;
				$('#contact_form_email_error').fadeIn('slow');
			}
			
			if (typeof message === 'undefined' || message === '') {
				error = true;
				$('#contact_form_message_error').fadeIn('slow');
			}

			if (!error) {
				wbTemplate.hideContactErrors();

				// send mail via backend
				$.ajax({
					type: 'POST',
					url: '/mail/contact',
					data: {
                        email: email,
						message: message
					}
				}).done(function (response) {
					$('#contact_form').hide();
					$('#contact_form_success').fadeIn('slow');
				}).fail(function (response) {
					$('#contact_form').hide();
					$('#contact_form_failure').fadeIn('slow');
				});
			}
		});
	},

	hideContactSuccess: function () {
		"use strict";
        $('#contact_form_success').hide();
	},

	hideContactErrors: function () {
		"use strict";
        $('#contact_form > div[id$="_error"]').hide();
		$('#contact_form_failure').hide();
	},

	validateEmail: function (mail) {
		"use strict";
        var emailReg = /^([\w-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/;
		
		if (mail === '' || !emailReg.test(mail)) {
            return false;
        } else {
            return true;
        }
	},

	addGoogleMapSupport: function () {
		"use strict";
        // do we have a mapview div ? otherwise we have nothing to do...
		
            
		if ($('div#mapview').size() > 0) {
			var mapviewDiv = $('div#mapview'),
                mapOptions = {
                    // center: latlong if needed
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                },
                map = new google.maps.Map(document.getElementById('mapview'), mapOptions),
                // get the company address from the cms, after that
                //  - find the latitude / longitude for the given address
                //  - set the new center of the map to those coordinates
                //  - also add a pin and a description bubble to the map
                address = mapviewDiv.attr('address'),
                companyname = mapviewDiv.attr('companyname'),
                geocoder = new google.maps.Geocoder();
            
            // adjust the size of the mapview wrapping div according to the
			// parent div's width
			mapviewDiv.css('width', function () {
				return mapviewDiv.parent().innerWidth() - 10;
			});
			mapviewDiv.css('height', 370);

			// create a simple google map with random center
			geocoder.geocode({'address': address}, function (result, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					map.setCenter(result[0].geometry.location);
					
					var marker = new google.maps.Marker({
                            map: map,
                            position: result[0].geometry.location,
                            title: companyname
                        }),
                        infoString = '<div id="content">'
									+ '<h5 id="firstHeading" class="firstHeading">' + companyname + '</h5>'
									+ '<div id="bodyContent"><p>' + address + '</p></div>'
									+ '</div>',
                        infowindow = new google.maps.InfoWindow({
                            content: infoString,
                            width: 150,
                            height: 100
                        });

					google.maps.event.addListener(marker, 'click', function () {
						infowindow.open(map, marker);
					});

					infowindow.open(map, marker);
				}
			});
		}
	}
};

$(document).ready(function () {
	"use strict";
    wbTemplate.init();
});