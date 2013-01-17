<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Dashboard extends Controller_CMS_Main
{
	public $template = null;
	
	public function before()
	{
		$lang = ORM::factory('system_setting')->get_language();
		$this->template = 'cms/dashboard/' . $lang->shortform . '/template';

		parent::before();
	}

	public function action_index()
	{
		$this->template->category = 'Dashboard';
	}
}