<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Main extends Controller_Template
{
	public $template = 'cms/mainlayout';
	
	public function action_index() { }

	public function before() 
	{
        // Load the user information
        $user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
        {
           HTTP::redirect('http://' . $_SERVER['HTTP_HOST'] . '/cms/user/login');
        }
		
		// set standard variables 
		parent::before();
        if ($this->auto_render) 
		{
            $this->template->title   	= 'weirdbird cms';
			$this->template->content 	= '';
            $this->template->username	= $user->username;
			$this->template->styles 	= array();
            $this->template->scripts	= array();
        }
    }
	
	public function after() 
	{
        if ($this->auto_render) 
		{
            $styles = array(
					'assets/css/ext-all-gray.css' => 'screen, projection',
					'assets/css/CheckHeader.css' => 'screen, projection',
					'assets/css/cms_screen2.css' => 'screen, projection'
				);
            
            $lang = ORM::factory('System_Setting')->get_language()->shortform;

            $scripts = array(
					'assets/js/ext-all.js',					// extjs framework (productive version)
					//'assets/js/ext-all-debug.js',				// extjs framework (debug version)
					'assets/js/CheckColumn.js',					// ext plugin for checkboxes in grid columns
					'assets/js/tiny_mce.js',					// tinymce wysiwyg editor
					'assets/js/ext-tinymce-ux.js',				// setup for tinymce as ext plugin
					'assets/js/weirdbird-i18n/' . $lang . '.js',// language file for weirdbird cms
					//'assets/js/weirdbird-cms-min.js'			// weirdbird cms (productive version)
					'assets/js/weirdbird-cms.js'				// weirdbird cms (development version)
				);
            $this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
        }
        
		parent::after();
    }
}