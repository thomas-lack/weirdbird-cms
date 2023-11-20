<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Data extends Controller_Template
{
	public $template = 'queryresult';

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
            $this->template->encoding   = 'JSON';
        }
    }
	
	public function after() 
	{
        parent::after();
    }
}