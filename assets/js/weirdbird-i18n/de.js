Ext.define('WeirdbirdCMS.language.Definition', {
	
	// Navigation
	nav: {
		headline: 'navigieren zu:',
		dashboard: 'Dashboard',
		templates: 'Schablonen',
		structures: 'Rubriken',
		articles: 'Artikel',
		filemanager: 'Dateimanager',
		user: 'Benutzer',
		system: 'System'
	},

	// top bar
	top: {
		logout: 'Ausloggen'
	},

	// bottom bar
	bottom: {
		created: 'Erstellt 2012 / 2013.',
		moreinfo: 'F&uuml;r mehr Informationen besuchen Sie bitte die ',
		moreinfo2: 'Projektseite'
	},

	// Dashboard
	dashboard: {
		title: 'Dashboard',
		button: {},
		grid: {},
		form: {},
		message: {
			error: 'Das Dashboard konnte nicht geladen werden'
		}
	},

	// Templates
	templates: {
		title: 'Verf&uuml;gbare Schablonen f&uuml;r die Webseite',
		button: {
			import: 'Schablonen importieren',
			active: 'Schablone aktivieren'
		},
		grid: {
			active: 'Aktiv?',
			preview: 'Vorschau',
			description: 'Beschreibung'
		},
		form: {},
		message: {
			title: 'Schablonen wirklich importieren?',
			content: 'Wenn Sie fortfahren, werden alle Ihre Layout- und Modulzuordnungen verloren gehen. Wollen Sie wirklich alle Schablonen erneut importieren?',
			success: 'Schablonen wurden erfolgreich importiert. Vergessen Sie nicht, eine Schablone zu aktivieren.',
			error: '',
		},
		message2: {
			success: 'Die folgende Schablone wurde aktiviert:'
		}
	},

	// Structures
	structures: {
		title: 'Verwaltung von Rubriken und zugeh&ouml;rigen Layouts / Modulen',
		button: {
			add: 'Rubrik hinzuf&uuml;gen',
			remove: 'Rubrik l&ouml;schen'
		},
		grid: {
			title: 'Rubriken',
			active: 'Aktiv?',
			titleCol: 'Titel',
			description: 'Beschreibung',
			user: 'Benutzer'
		},
		form: {
			title: 'Auswahl von Layout und Modulen',
			layout: 'Layout',
			column: 'Abschnitt',
			module: 'Modul',
			emptyText: 'Layout bestimmen...',
			emptyText2: 'Modul bestimmen...'
		},
		form2: {
			title: 'Optionale Einstellungen',
			headline1: '&Uuml;berschrift 1 (gro&szlig;)',
			headline2: '&Uuml;berschrift 2 (mittel)',
			headline3: '&Uuml;berschrift 3 (klein)',
			background: 'Hintergrundbild',
			backgroundBtn: 'Bild ausw&auml;hlen',
			saveBtn: 'Optionale Einstellungen speichern',
			saveSuccess1: 'Erfolg',
			saveSuccess2: 'Die optionalen Einstellungen wurden erfolgreich gespeichert.',
			saveError: 'Die optionalen Daten konnten nicht gespeichert werden.'
		},
		message: {
			title: 'Rubrik wirklich l&ouml;schen?',
			content: 'Wollen Sie wirklich die ausgew&auml;hlte Rubrik l&ouml;schen?',
			error: ''
		}
	},

	// Articles
	articles: {
		title: 'Verwaltung von Artikelzuordnungen / Artikeleingabe',
		button: {
			add: 'Artikel hinzuf&uuml;gen',
			save: 'Artikel speichern',
			delete: 'Artikel l&ouml;schen'
		},
		grid: {
			title: 'Auswahl von Rubrik / Abschnitt'
		},
		tab1: {
			title: 'Artikeleinstellungen',
			active: 'Aktiv',
			titleLable: 'Titel',
			description: 'Beschreibung',
			language: 'Sprache'
		},
		tab2: {
			title: 'Teasereingabe',
			teaserImage: 'Teaserbild',
			teaserHeadline: 'Teaser&uuml;berschrift',
			teaser: 'Teaser',
			changeBtn: 'Bild ausw&auml;hlen'
		},
		tab3: {
			title: 'Artikeleingabe',
			article: 'Artikel',
			image: 'Bild einf&uuml;gen',
			document: 'Link zu einem PDF einf&uuml;gen'
		},
		message: {
			error: 'Der Artikel konnte nicht verschoben werden'
		},
		message2: {
			error: 'Der Artikel konnte nicht geladen werden'
		},
		message3: {
			success: 'Der Artikel wurde erfolgreich gespeichert.',
			error: 'Der Artikel konnte nicht gespeichert werden'
		},
		message4: {
			title: 'Artikel l&ouml;schen?',
			content: 'Wollen Sie wirklich den ausgew&auml;ten Artikel l&ouml;schen?',
			error: 'Der Artikel konnte nicht gel&ouml;scht werden'
		},
		message5: {
			error: 'Der neue Artikel konnte nicht erzeugt werden'
		},
		message6: {
			title: 'Hinweis',
			error: 'Es wurde kein Bild ausgew&auml;hlt.'
		},
		message7: {
			error: 'Die Sortierreihenfolge f&uuml;r die Artikel konnte nicht gespeichert werden.'
		},
		window: {
			title: 'Bild ausw&auml;hlen',
			select: 'Bild ausw&auml;hlen',
			cancel: 'Abbruch'
		},
		window2: {
			title: 'Dokument ausw&auml;hlen',
			select: 'Dokument ausw&auml;hlen',
			cancel: 'Abbruch',
			name: 'Dateiname',
			description: 'Beschreibung',
			link: 'pdf Datei'
		}
	},

	// File Manager
	filemanager: {
		title: 'Verwaltung von Bild- und Dokumentdateien (pdf)',
		button: {
			upload: 'Datei hochladen',
			delete: 'Datei l&ouml;schen'
		},
		grid: {
			active: 'Aktiv?',
			creation: 'Erstelldatum',
			user: 'Benutzer',
			name: 'Dateiname',
			type: 'Dateityp',
			description: 'Beschreibung',
			preview: 'Vorschau'
		},
		form: {
			
		},
		message: {
			title: 'Datei wirklich l&ouml;schen?',
			content: 'Wollen Sie die ausgew&auml;hlte Datei wirklich l&ouml;schen?',
			error: ''
		},
		window: {
			title: 'Datei hochladen',
			description: 'Beschreibung',
			file: 'Datei',
			emptyText: 'Auswahl einer Bild- oder Dokumentdatei...',
			save: 'Speichern',
			reset: 'Zur&uuml;cksetzen'
		},
		tpl: {
			openfile: 'Datei &ouml;ffnen'
		}
	},

	// User
	user: {
		title: 'Benutzerverwaltung',
		button: {
			add: 'Benutzer hinzuf&uuml;gen',
			delete: 'Benutzer l&ouml;schen',
			reset: 'Passwort zur&uuml;cksetzen',
			change: 'Passwort &auml;ndern',
			waitMsg: 'F&uuml;ge neuen Benutzer hinzu und versende Best&auml;tigunsmail...',
			waitMsg2: 'Setze neues Passwort...'
		},
		grid: {
			name: 'Name',
			email: 'Email',
			logins: 'Logins',
			lastlogin: 'Letzter Login',
			roles: 'Nutzerrollen'
		},
		form: {},
		message: {
			title: 'Benutzer wirklich l&ouml;schen?',
			content: 'M&ouml;chten Sie wirklich den ausgew&auml;hlten Benutzer l&ouml;schen?',
			error: ''
		},
		window: {
			title: 'Neuen Benutzer hinzuf&uuml;gen',
			name: 'Name',
			email: 'Email',
			save: 'Speichern',
			reset: 'Zur&uuml;cksetzen'
		},
		window2: {
			title: 'Passwort &auml;ndern',
			current: 'Aktuelles Passwort',
			new1: 'Neues Passwort',
			new2: 'Passwort wiederholen',
			save: 'Speichern',
			reset: 'Zur&uuml;cksetzen',
			error: 'Das neue Passwort stimmt nicht mit der Wiederholung des Passwortes &uuml;berein.'
		},
		window3: {
			title: 'Benutzer wurde benachrichtigt',
			message: 'Eine Nachricht mit weiterf&uuml;hrenden Informationen wurde per Email an die angegebene Adresse verschickt.'
		},
		window4: {
			title: 'Passwort wirklich zur&uuml;cksetzen?',
			message: 'M&ouml;chten Sie wirklich das Passwort des aktuell ausgew&auml;hlten Benutzers zur&uuml;cksetzen?',
			success: 'Der ausgew&auml;hlte Benutzer hat eine Email mit weiterf&uuml;hrenden Informationen erhalten.',
			error:  'Ein Fehler ist aufgetreten bei der &Uuml;bermittlung der Benutzerinformation. Bitte versuchen Sie es sp&auml;ter erneut.'
		},
		window5: {
			title: 'Daten bereits vorhanden',
			message: 'Der Name und / oder die Emailadresse sind bereits vergeben. Jeder Nutzer muss einen einzigartigen Namen und Emailadresse besitzen.'
		}
	},

	// System
	system: {
		title: 'Verwaltung der Systemeinstellungen',
		button: {
			save: 'Einstellungen speichern'
		},
		grid: {},
		form: {
			title: 'Systemweite Einstellungen',
			companyname: 'Betreibername',
			additionalinfo: 'Zusatzinformationen',
			contactemail: 'Kontakt-Emailadresse',
			language: 'Sprache',
			emptyText: 'Auswahl der Sprache...'
		},
		form2: {
			title: 'System revision'
		},
		message: {
			success1: 'Die Systemeinstellungen wurden erfolgreich gespeichert.',
			success2: 'Bitte beachten Sie, dass sich eine &Auml;nderung der Sprache erst bei einem erneuten Login auswirkt.',
			error: 'Die Systemeinstellungen konnten nicht gespeichert werden'
		},
		message2: {
			waitMsg: 'Hole aktuelle Revisionsdaten von code.google.com ...',
			success: 'Ihre Installation von weirdbird cms ist auf dem neuesten Stand.',
			error: 'Die Systemeinstellungen konnten nicht geladen werden',
			error2: 'Ihre Installation von weirdbird cms ist nicht auf dem neuesten Stand.',
			error3: 'Bitte besuchen Sie die',
			error4: 'google-code Seite',
			error5: 'f&uuml;r weiterf&uuml;hrende Details.',
			error6: 'Installierte Revision :',
			error7: 'Letzte gefundene Revision :'
		}
	}
});