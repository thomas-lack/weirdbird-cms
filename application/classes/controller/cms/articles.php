<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Articles extends Controller_CMS_Main 
{

	public $template = 'cms/articles/template';

	public function action_index() 
	{
		$this->template->category = 'Articles';
	}

	public function action_activestructures()
	{
		echo json_encode(
			array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				ORM::factory('structure')
					->where('active','=','true')
					->order_by('position', 'asc')
					->find_all()
					->as_array()
			)
		);
		die();
	}

	public function action_layout()
	{
		$id = $this->request->param('id');
	}
}