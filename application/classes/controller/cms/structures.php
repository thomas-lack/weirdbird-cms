<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Structures extends Controller_Cms_Data
{
	public function action_data()
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('Structure')
				->order_by('position', 'asc')
				->find_all()
				->as_array()		
		);
		
		for ($i = 0; $i < count($result); $i++)
		{
			$result[$i]['user_name'] = ORM::factory('User',$result[$i]['user_id'])->username;
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
		$structure = ORM::factory('Structure');
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
			$structure = ORM::factory('Structure', $d->id);
			$structure->active = ($d->active) ? 1 : 0;
			$structure->position = $d->position;
			$structure->title = $d->title;
			$structure->description = $d->description;
			$structure->layout_id = (isset($d->layout_id)) ? $d->layout_id : null;
			$structure->user_id = $user->id;
			$structure->save();
			
			// mark all articles as 'orphans' that were bound to the changed layout
			$this->orphanateArticles($d->id);

			$this->template->result = array( 'success' => true );
		}
	}
	
	public function action_destroy()
	{
		$d = json_decode($this->request->body());
		
		// delete the structure and all corresponding mappings
		ORM::factory('structure', $d->id)->delete();
		$this->orphanateArticles($d->id);
		
		$this->template->result = array( 'success' => true );
	}

	/**
	 * read/write method to load or save the optional data of a given structure
	 *
	 * param: structure id
	 * post data: update data
	 */
	public function action_optional()
	{
		$id = $this->request->param('id');

		// load data
		if (HTTP_REQUEST::GET == $this->request->method())
		{
			$result = ORM::factory('Structure_Option')
					->where('structure_id','=',$id)
					->find()
					->as_array();
			
			if (is_numeric($result['file_id']))
			{
				$image = ORM::factory('File')
						->where('id','=', $result['file_id'])
						->find();
				
				$result['background'] = '<img src="' 
					.'/'.UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.IMAGETHUMBSDIR.'/'.$image->filename
					. '">';
			}
			

			$this->template->result = $result;
		}

		// write data
		else if (HTTP_REQUEST::POST == $this->request->method())
		{
			$data = $this->request->post();

			$optional = ORM::factory('Structure_Option')
						->where('structure_id','=',$id)
						->find();

			$optional->structure_id = $id;
			$optional->file_id = (is_numeric($data['image_id'])) ? $data['image_id'] : null;
			$optional->headline1 = $data['headline1'];
			$optional->headline2 = $data['headline2'];
			$optional->headline3 = $data['headline3'];
			$optional->save();

			$this->template->result = array( 'success' => true );
		}

		else
			$this->template->result = array( 'success' => false );
	}

	/**
	 * Identifies articles that were bound to a structure that was changed or deleted.
	 * All of those articles are marked as 'orphans', since their state is unknown for now.
	 * (All of the mappings necessary to bind an article to a structure are also deleted.)
	 *
	 * params:
	 * $structureId 		int 		Id of the structure that was changed / deleted
	 */
	private function orphanateArticles($structureId, $deleteMappings = FALSE)
	{
		$mappings = ORM::factory('StructureColumnMapping')
			->where('structure_id','=',$structureId)
			->find_all();
		
		foreach ($mappings as $m) {
			// also delete the reference of articles to the deleted mappings
			$articles = ORM::factory('Article')
				->where('structure_column_mapping_id','=',$m->id)
				->find_all();

			foreach ($articles as $article) {
				$article->structure_column_mapping_id = null;
				$article->active = 0;
				$article->save();
			}

			$m->delete();
		}
	}
}