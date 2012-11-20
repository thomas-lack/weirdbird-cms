<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Structures extends Controller_CMS_Main
{
	public $template = 'cms/structures/template';
	
	public function action_index()
	{
		$this->template->category = 'Structures';
	}
	
	public function action_data()
	{
		echo json_encode(
			array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				ORM::factory('structure')->order_by('position', 'asc')->find_all()->as_array()		
			)
		);
		die();
	}
	
	public function action_read()
	{
		$this->action_data();
	}
	
	public function action_create()
	{
		// if a record with the same position already exists,
		// then do not create a new record
		$t = ORM::factory('structure')->where('position','=',$_POST['position'])->count_all();
		
		if ($t != '0') {
			echo '{"success":"false"}';
		}
		else {
			// find out the real last position
			$f = ORM::factory('structure')->order_by('position','desc')->limit(1)->find();
			
			// INSERT query
			$structure = ORM::factory('structure');
			$structure->active = $_POST['active'];
			$structure->position = ($f->position != null) ? $f->position + 1 : $_POST['position'];
			$structure->title = $_POST['title'];
			$structure->description = $_POST['description'];
			$structure->layout = $_POST['layout'];
			$structure->save();
			
			echo '{"success":"true"}';
		}
		
		die();
	}
	
	public function action_update()
	{
		$id = $this->request->param('id');
		
		// create model instance
		$structure = ORM::factory('structure', $id);
		
		// UPDATE query
		$structure->active = $_POST['active'];
		$structure->position = $_POST['position'];
		$structure->title = $_POST['title'];
		$structure->description = $_POST['description'];
		$structure->layout = $_POST['layout'];
		$structure->save();
		
		// TODO : save user who changed something
		
		echo '{"success":"true"}';
		die();
	}
	
	public function action_destroy()
	{
		$id = $this->request->param('id');
		
		ORM::factory('structure', $id)->delete();
		
		echo '{"success":"true"}';
		die();
	}
}