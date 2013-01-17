<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Articles extends Controller_CMS_Data 
{
	public function action_activestructures()
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('structure')
				->where('active','=','true')
				->order_by('position', 'asc')
				->find_all()
				->as_array()
		);
		
		$this->template->result = $result;
	}

	public function action_read()
	{
		// get new active id
		$id = $this->request->param('id');

		$this->template->result = ORM::factory('article',$id)->as_array();
	}

	public function action_update()
	{
		$id = $this->request->param('id');
		
		$a = ORM::factory('article', $id);
		$a->active = ($this->request->post('active') == 'true') ? 1 : 0;
		$a->title = $this->request->post('title');
		$a->description = $this->request->post('description');
		$a->content = $this->request->post('content');
		$a->save();

		$this->template->result = array( 'success' => true );
	}

	public function action_create()
	{
		$a = ORM::factory('article');
		$a->structure_column_mapping_id = $this->request->post('mapping_id');
		$a->active = 0;
		$a->user_id = Auth::instance()->get_user()->id;
		$a->title = 'new title';
		$a->description = '';
		$a->content = '';
		$a->save();

		$this->template->result = array( 
			'success' => true ,
			'id' => $a->id
		);
	}

	public function action_destroy()
	{
		$id = $this->request->param('id');

		ORM::factory('article',$id)->delete();

		$this->template->result = array( 'success' => true );
	}

	public function action_changemapping()
	{
		$id = $this->request->param('id');

		$a = ORM::factory('article', $id);
		$a->structure_column_mapping_id = $this->request->post('mapping_id');
		$a->save();

		$this->template->result = array( 'success' => true );
	}

	/**
	* 	Returns the path to the css file so that an editor like tinymce can
	*	load the additional css classes.
	*/
	public function action_css()
	{
		$template = ORM::factory('template')->where('active','=','1')->find();

		$cssfiles = ORM::factory('loadfile')
						->where('template_id','=',$template->id)
						->where('type','=','css')
						->find_all();

		$outArr = array();

		foreach($cssfiles as $css) {
			$outArr[] = array(
				'path' => $template->folder . '/' . $template->folder_css . '/' . $css->filename
			);
		}

		$this->template->result = $outArr;
	}

	/**
	*	Returns the mapped categories/columns/articles, so that EXTJS can
	*	handle it as nested data and produce a nice treeview
	*/
	public function action_treeview()
	{
		$template = ORM::factory('template')->where('active','=','1')->find();
		
		$modules = ORM::factory('module')->where('template_id','=',$template->id);
		$mappings = ORM::factory('structurecolumnmapping')->find_all();

		$outArr = array(
			'root' => array()
		);
		
		$structures = ORM::factory('structure')
			->order_by('position','asc')
			->find_all();

		foreach ($structures as $s) {
			$columnsArr = array();
			$mappings = ORM::factory('structurecolumnmapping')->find_all();

			foreach($mappings as $m) {
				// if the current mapping has the same category (structure)
				// we want to add it with all article references in the output
				// array
				if ($m->structure_id == $s->id) {
					$module = ORM::factory('module')
						->where('id','=',$m->module_id)
						->find();

					// insert articles (if allowed by module)
					if ($module->allowarticles == 1) {
						$articlesArr = array();
						$articles = ORM::factory('article')
							->where('structure_column_mapping_id','=',$m->id)
							->find_all();

						foreach($articles as $a) {
							$articlesArr[] = array(
								'text' => $a->title,
								'id' => $a->id,
								'leaf' => true
							);
						}

						$columnsArr[] = array(
							'text' => 'Column ' . ($m->column + 1),
							'expanded' => false,
							'allowDrop' => true,
							'mapping_id' => $m->id,
							'children' => $articlesArr
						);
					}
				}
			}

			// now that we have all data, the output array can be wrapped up
			$outArr['root']['expanded'] = true;
			$outArr['root']['allowDrop'] = false;
			$outArr['root']['children'][] = array(
				'text' => $s->title,
				'expanded' => false,
				'allowDrop' => false,
				'children' => $columnsArr
			);
		}

		// finally we can add all the "orphaned" articles that are missing a mapping
		$articles = ORM::factory('article')
						->where('structure_column_mapping_id','=',null)
						->find_all();
		if ($articles->count() > 0)	{
			$articlesArr = array();
			foreach ($articles as $a) {
				$articlesArr[] = array(
					'text' => $a->title,
					'id' => $a->id,
					'leaf' => true
				);
			}
			$outArr['root']['children'][] = array(
				'text' => 'ORPHANED ARTICLES',
				'expanded' => false,
				'allowDrop' => true,
				'mapping_id' => null,
				'children' => $articlesArr
			);
		}			

		$this->template->result = $outArr;
	}
}