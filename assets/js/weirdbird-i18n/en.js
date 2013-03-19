Ext.define('WeirdbirdCMS.language.Definition', {
	
	// Navigation
	nav: {
		headline: 'navigate to:',
		dashboard: 'Dashboard',
		templates: 'Templates',
		structures: 'Structures',
		articles: 'Articles',
		filemanager: 'File Manager',
		user: 'User',
		system: 'System'
	},

	// top bar
	top: {
		logout: 'Logout'
	},

	// bottom bar
	bottom: {
		created: 'Created 2012 / 2013.',
		moreinfo: 'For more information please visit the',
		moreinfo2: 'project page'
	},

	// Dashboard
	dashboard: {
		title: 'Dashboard',
		button: {},
		grid: {},
		form: {},
		message: {
			error: 'The dashboard could not be loaded'
		}
	},

	// Templates
	templates: {
		title: 'Available Site Templates',
		button: {
			import: 'Import Templates',
			active: 'Set Template Active'
		},
		grid: {
			active: 'Active?',
			preview: 'Preview',
			description: 'Description'
		},
		form: {},
		message: {
			title: 'Really import templates?',
			content: 'If you proceed, all your layout and module mappings will be lost. Do you really want to import all templates again?',
			success: 'Templates were imported successfully. Do not forget to set one to active.',
			error: '',
		},
		message2: {
			success: 'The following template was set to active:'
		}
	},

	// Structures
	structures: {
		title: 'Manage categories and according layouts / column modules',
		button: {
			add: 'Add category',
			remove: 'Remove category'
		},
		grid: {
			title: 'Categories',
			active: 'Active?',
			titleCol: 'Title',
			description: 'Description',
			user: 'User'
		},
		form: {
			title: 'Layout and module selection',
			layout: 'Layout',
			column: 'Area',
			module: 'module',
			emptyText: 'Choose layout...',
			emptyText2: 'Choose module...'
		},
		form2: {
			title: 'Optional settings',
			headline1: 'Headline 1 (big)',
			headline2: 'Headline 2 (medium)',
			headline3: 'Headline 3 (small)',
			background: 'Hintergrundbild',
			backgroundBtn: 'Choose image',
			backgroundDescription: 'Image description',
			saveBtn: 'Save optional settings',
			saveSuccess1: 'Success',
			saveSuccess2: 'The optional settings were successfully saved.',
			saveError: 'The optional settings could not be saved.'
		},
		message: {
			title: 'Really delete category?',
			content: 'Do you really want to delete the selected category?',
			error: ''
		}
	},

	// Articles
	articles: {
		title: 'Manage article positioning and edit content',
		button: {
			add: 'Add article',
			save: 'Save article',
			delete: 'Delete article'
		},
		grid: {
			title: 'Category/Column selection'
		},
		tab1: {
			title: 'Edit article settings',
			active: 'Active',
			titleLable: 'Title',
			description: 'Description',
			language: 'Language'
		},
		tab2: {
			title: 'Edit teaser',
			teaserImage: 'Teaser image',
			teaserHeadline: 'Teaser headline',
			teaser: 'Teaser',
			changeBtn: 'Change image'
		},
		tab3: {
			title: 'Edit article',
			article: 'Article',
			image: 'Insert an image',
			document: 'Generate link to a pdf document'
		},
		message: {
			error: 'The article could not be moved'
		},
		message2: {
			error: 'The article data could not be loaded'
		},
		message3: {
			success: 'The article was saved successfully.',
			error: 'The article could not be saved'
		},
		message4: {
			title: 'Delete article?',
			content: 'Do you really want to delete the current article?',
			error: 'The article could not be deleted'
		},
		message5: {
			error: 'The new article could not be created'
		},
		message6: {
			title: 'Notification',
			error: 'No image was selected.'
		},
		message7: {
			error: 'The sort order of the articles could not be changed.'
		},
		message8: {
			error: 'The "title" Field is not allowed to contain empty spaces, neither can it be left empty.'
		},
		window: {
			title: 'Select image',
			select: 'Select image',
			cancel: 'Cancel'
		},
		window2: {
			title: 'Select document',
			select: 'Select document',
			cancel: 'Cancel',
			name: 'Filename',
			description: 'Description',
			linkname: 'pdf file'
		},
		window3: {
			title: 'Save changes?',
			content: 'The current articles data has been changed. Save changes before proceeding?'
		}
	},

	// File Manager
	filemanager: {
		title: 'Manage image and document (pdf) files',
		button: {
			upload: 'Upload file',
			delete: 'Delete file'
		},
		grid: {
			active: 'Active?',
			creation: 'Creation',
			user: 'Uploader',
			name: 'Filename',
			type: 'Type',
			description: 'Description',
			preview: 'Preview'
		},
		form: {
			
		},
		message: {
			title: 'Really delete file?',
			content: 'Do you really want to delete the selected file?',
			error: ''
		},
		window: {
			title: 'Upload file',
			description: 'Description',
			file: 'File',
			emptyText: 'Select an image or pdf document...',
			save: 'Save',
			reset: 'Reset'
		},
		tpl: {
			openfile: 'open file'
		}
	},

	// User
	user: {
		title: 'Manage cms users',
		button: {
			add: 'Add user',
			delete: 'Delete user',
			reset: 'Reset password',
			change: 'Change password',
			waitMsg: 'Adding new user and sending confirmation mail...',
			waitMsg2: 'Resetting password...'
		},
		grid: {
			name: 'Name',
			email: 'Email',
			logins: 'Logins',
			lastlogin: 'Last login',
			roles: 'Roles'
		},
		form: {},
		message: {
			title: 'Really delete user?',
			content: 'Do you really want to delete the selected user?',
			error: ''
		},
		window: {
			title: 'Add new user',
			name: 'Name',
			email: 'Email',
			save: 'Save',
			reset: 'Reset'
		},
		window2: {
			title: 'Change password',
			current: 'Current password',
			new1: 'New password',
			new2: 'Repeat new password',
			save: 'Save',
			reset: 'Reset',
			error: 'The new password and the repeated password are not the same.'
		},
		window3: {
			title: 'User notified',
			message: 'An email notification with further instructions has been sent to the new user.'
		},
		window4: {
			title: 'Really reset password?',
			message: 'Do you really want to reset the password of the currently selected user?',
			success: 'The selected user received an email with further instructions.',
			error:  'An error occurred during the user notification. Please try again later.'
		},
		window5: {
			title: 'Data already set',
			message: 'The new user name and / or email address is already in use by another user. The name and email address for a user must be unique.'
		}
	},

	// System
	system: {
		title: 'System settings',
		button: {
			save: 'Save settings'
		},
		grid: {},
		form: {
			title: 'System wide settings',
			companyname: 'Company / User name',
			additionalinfo: 'Additional info',
			contactemail: 'Contact email address',
			address: 'Address',
			brand: 'Brand',
			brandBtn: 'Select image',
			language: 'Standard language',
			emptyText: 'Choose language...'
		},
		form2: {
			title: 'System revision'
		},
		message: {
			success1: 'The system settings were updated successfully.',
			success2: 'Remember, that a changed language will have effect on the next login.',
			error: 'The system settings could not be updated'
		},
		message2: {
			waitMsg: 'Retrieving current revision info from code.google.com ...',
			success: 'Your installation of weirdbird cms is up to date.',
			error: 'The system settings could not be loaded',
			error2: 'Your installation of weirdbird cms is not up to date.',
			error3: 'Please see the',
			error4: 'google code page',
			error5: 'for further details.',
			error6: 'current system rev :',
			error7: 'current development rev :'
		}
	}
});