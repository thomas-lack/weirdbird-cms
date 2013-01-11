<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Main extends Controller_Template
{
	public $template = 'cms/mainlayout';
	
	public function action_index() {}

	public function before() 
	{
        // Load the user information
        $user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
        if (!$user)
        {
           HTTP::redirect('cms/user/login');
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
            $scripts = array(
					'assets/js/ext-all-debug.js',
					'assets/js/CheckColumn.js',
					'assets/js/tiny_mce.js',
					'assets/js/ext-tinymce-ux.js',
					'assets/js/weirdbird-cms.js'
				);
            $this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
        }
        
		parent::after();
    }
}