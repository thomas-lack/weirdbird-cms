<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Dashboard extends Controller_Cms_Main
{
	public $template = null;
	
	public function before()
	{
		$lang = ORM::factory('System_Setting')->get_language();
		$this->template = 'cms/dashboard/' . $lang->shortform . '/template';

		parent::before();
	}

	public function action_index()
	{
		$this->template->category = 'Dashboard';
	}
}