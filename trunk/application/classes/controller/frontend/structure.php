<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Structure extends Controller_Template {
	
	public $template = 'cms/mainlayout';

	public function action_index(){
		//from within a controller, normally Request::instance()->param('key_name');
		var_dump($this->request->param('structure'));
	}
}