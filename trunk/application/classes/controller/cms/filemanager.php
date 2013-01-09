<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_FileManager extends Controller_CMS_Main 
{
	public $template = 'cms/filemanager/template';

	public function action_index() 
	{
		$this->template->category = 'File Manager';
	}
}