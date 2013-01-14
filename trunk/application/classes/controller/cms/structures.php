<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Structures extends Controller_CMS_Main
{
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
		
		// the structure title 'mail' is not allowed, since it is used for mailing 
		// functionality of the cms AND the website 
		// (for reference see 'application/classes/controller/mail.php')
		if ($d->title == 'mail')
		{
			echo '{"success":"false", "message":"The title is not allowed."}';
			die();
		}

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
			// also delete the reference of articles to the deleted mappings
			$articles = ORM::factory('article')
				->where('structure_column_mapping_id','=',$m->id)
				->find_all();

			foreach ($articles as $article) {
				$article->structure_column_mapping_id = null;
				$article->active = 0;
				$article->save();
			}

			$m->delete();
		}
		
		echo '{"success":"true"}';
		die();
	}
}