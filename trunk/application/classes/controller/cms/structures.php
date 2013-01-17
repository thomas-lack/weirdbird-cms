<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Structures extends Controller_CMS_Data
{
	public function action_data()
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('structure')
				->order_by('position', 'asc')
				->find_all()
				->as_array()		
		);
		
		for ($i = 0; $i < count($result); $i++)
		{
			$result[$i]['user_name'] = ORM::factory('user',$result[$i]['user_id'])->username;
		}
		
		$this->template->result = $result;
	}
	
	public function action_read()
	{
		$this->action_data();
	}
	
	public function action_create()
	{
		$d = json_decode($this->request->body());
		$user = Auth::instance()->get_user();

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
		$structure->user_id = $user->id;
		$structure->save();
		
		$this->template->result = array( 'success' => true );
	}
	
	public function action_update()
	{
		$d = json_decode($this->request->body());
		$user = Auth::instance()->get_user();

		// the structure title 'mail' is not allowed, since it is used for mailing 
		// functionality of the cms AND the website 
		// (for reference see 'application/classes/controller/mail.php')
		if ($d->title == 'mail')
		{
			$this->template->result = array(
				'success' => false,
				'message' => 'This title is not allowed.'
			);
		}
		else
		{
			// UPDATE query
			$structure = ORM::factory('structure', $d->id);
			$structure->active = ($d->active) ? 1 : 0;
			$structure->position = $d->position;
			$structure->title = $d->title;
			$structure->description = $d->description;
			$structure->layout_id = (isset($d->layout_id)) ? $d->layout_id : null;
			$structure->user_id = $user->id;
			$structure->save();
			
			$this->template->result = array( 'success' => true );
		}
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
		
		$this->template->result = array( 'success' => true );
	}
}