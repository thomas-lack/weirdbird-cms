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

		// since we did a possible update of a module, it is possible, that
		// previously connected articles are not allowed anymore
		// -> mark those articles as 'orphaned' by deleting the mapping id
		$module = ORM::factory('module', $mapping->module_id);
		if ($module->allowarticles == 0) 
		{
			$articles = ORM::factory('article')
				->where('structure_column_mapping_id','=',$mapping->id)
				->find_all();

			foreach($articles as $article)
			{
				$article->structure_column_mapping_id = null;
				$article->active = 0;
				$article->save();
			}
		}

		echo '{"success":"true"}';
		die();
	}
}