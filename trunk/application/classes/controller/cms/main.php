<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Main extends Controller_Template
{
	public $template = 'cms/mainlayout';
	
	public function before() 
	{
        // Load the user information
        $user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
        if (!$user)
        {
            Request::current()->redirect('cms/user/login');
        }
		
		// set standard variables 
		parent::before();
        if ($this->auto_render) 
		{
            $this->template->title   	= 'weirdbird cms';
			$this->template->content 	= '';
            $this->template->username	= $user->username;
			$this->template->category	= 'Dashboard';
			$this->template->styles 	= array();
            $this->template->scripts	= array();
        }
    }
	
	public function after() 
	{
        if ($this->auto_render) 
		{
            $styles = array(
					'assets/css/kendo.common.min.css' => 'screen, projection',
					'assets/css/kendo.default.min.css' => 'screen, projection',
					'assets/css/cms_screen2.css' => 'screen, projection'
				);
            $scripts = array(
					'assets/js/jquery.min.js',
					'assets/js/jquery.blockui.js',
					'assets/js/weirdbird-cms.js',
					'assets/js/kendo.web.min.js'
				);
            $this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
        }
        
		parent::after();
    }
	
	public function action_index()
	{
		// start cms screen presentation with dashboard as standard
		$this->template->content = View::factory('cms/dashboard/template')
			->bind('username', $this->template->username)
			->bind('category', $this->template->category);
	}

}