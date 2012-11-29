<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_StructureColumnMappings extends Controller_CMS_Main
{
	public function action_index() {}

	public function action_read()
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

	public function action_update()		// works as UPDATE and CREATE method
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