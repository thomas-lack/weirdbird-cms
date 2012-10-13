<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Dashboard extends Controller_CMS_Main
{
	public $template = 'cms/dashboard/template';
	
	public function action_index()
	{
		$this->template->category = 'Dashboard';
	}
}