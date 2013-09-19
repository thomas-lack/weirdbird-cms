<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Sitemap extends Controller_Template {
	
	public $template;

	public function before()
	{
		$structures = ORM::factory('Structure')
			->where('active','=','1')
			->order_by('position', 'asc')
			->find_all();

		$languages = ORM::factory('Language')
			->find_all();

		// reduce the languages to a mapping array containing id/shortform
		$languages = $languages->as_array('id', 'shortform');

		$this->template = 'frontend/sitemap';
		$this->response->headers('Content-Type', 'text/xml');
		
		// init template
		parent::before();

		// forward relevant informations to the view
		$this->template->structures = $structures;
		$this->template->languages = $languages;
	}

	public function action_index()
	{
		
	}
}