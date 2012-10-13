<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Main extends Controller {
	
	private $template = array(
		'name'	=> 'karmeliterschule',
	);
	
	public function action_index()
	{
		$this->response->body(View::factory('templates/'. $this->template['name'] .'/pages/mainlayout'));
	}

}