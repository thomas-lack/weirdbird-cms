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
		$d = json_decode($this->request->body());

		// upon first creation (no entries) just return a success
		if (!$d->active && $d->position == "" && $d->title == "" && $d->description == "") {
			echo '{"success":"true"}';
			die();
		}

		// INSERT query
		$structure = ORM::factory('structure');
		$structure->active = ($d->active) ? 1 : 0;
		$structure->position = $d->position;
		$structure->title = $d->title;
		$structure->description = $d->description;
		$structure->layout_id = null;
		$structure->save();
		
		echo '{"success":"true"}';
		die();
	}
	
	public function action_update()
	{
		$d = json_decode($this->request->body());
		
		// UPDATE query
		$structure = ORM::factory('structure', $d->id);
		$structure->active = ($d->active) ? 1 : 0;
		$structure->position = $d->position;
		$structure->title = $d->title;
		$structure->description = $d->description;
		$structure->layout_id = (isset($d->layout_id)) ? $d->layout_id : null;
		$structure->save();
		
		// TODO : save user who changed something
		
		echo '{"success":"true"}';
		die();
	}
	
	public function action_destroy()
	{
		$d = json_decode($this->request->body());
		
		// delete the structure and all corresponding mappings
		ORM::factory('structure', $d->id)->delete();
		$mappings = ORM::factory('structurecolumnmapping')
			->where('structure_id','=',$d->id)
			->find_all();
		foreach ($mappings as $m) {
			$m->delete();
		}
		
		echo '{"success":"true"}';
		die();
	}

	public function action_readstructurecolumnmapping()
	{
		echo json_encode(
			array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				ORM::factory('structurecolumnmapping')->find_all()->as_array()		
			)
		);
		die();
	}

	public function action_createstructurecolumnmapping()
	{
		$data = $this->request->post();
		
		$mapping = ORM::factory('structurecolumnmapping')
			->where('structure_id','=',$data['structure_id'])
			->where('column','=',$data['column'])
			->find();
		// in case we cannot UPDATE we insert all the data again
		// to CREATE a new relation
		$mapping->structure_id = $data['structure_id'];
		$mapping->column = $data['column'];
		$mapping->module_id = $data['module_id'];
		$mapping->save();

		echo '{"success":"true"}';
		die();
	}
}