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

	// bottom bar
	bottom: {
		created: 'Created 2012, 2013 by',
		moreinfo: 'For more information please visit the',
		moreinfo2: 'google code project page'
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
			emptyText: 'Choose layout...'
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
		form: {
			title: 'Article editing',
			active: 'Active',
			titleLable: 'Title',
			description: 'Description',
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
			waitMsg: 'Adding new user and sending confirmation mail...'
		},
		grid: {
			name: 'Name',
			email: 'Email',
			logins: 'Logins',
			lastlogin: 'Last login'
		},
		form: {},
		message: {
			title: 'Really delete user?',
			content: 'Do you really want to delete the selected user?',
			error: 'The dashboard could not be loaded'
		},
		window: {
			title: 'Add new user',
			name: 'Name',
			email: 'Email',
			save: 'Save',
			reset: 'Reset'
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
			contactemail: 'Contact email address',
			language: 'Language',
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