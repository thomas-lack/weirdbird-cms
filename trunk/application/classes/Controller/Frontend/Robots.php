<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Robots extends Controller_Template {
	
	public $template;

	public function before()
	{
		// set output type and template file
		$this->template = 'frontend/robots';
		$this->response->headers('Content-Type', 'text/plain');
		
		// package all needed directories in a nice array
		$disallowedDirectories = array( 'application', 'assets', 'modules', 'site-templates', 'system' );

		// init template
		parent::before();

		// forward relevant informations to the view
		$this->template->disallowedDirectories = $disallowedDirectories;
	}

	public function action_index()
	{
		
	}
}