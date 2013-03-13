<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Articles extends Controller_Cms_Data 
{
	public function action_activestructures()
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('Structure')
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

		$this->template->result = ORM::factory('Article',$id)->as_array();
	}

	public function action_update()
	{
		$id = $this->request->param('id');
		
		$a = ORM::factory('Article', $id);
		
		// set standard value if no language was selected
		$language_id = $this->request->post('language_id');
		if (!is_numeric($language_id))
			$language_id = null;

		$a->language_id = $language_id;
		$a->active = ($this->request->post('active') == 'true') ? 1 : 0;
		$a->title = $this->request->post('title');
		$a->description = $this->request->post('description');
		$a->teaser = $this->request->post('teaser');
		$a->content = $this->request->post('content');
		$a->save();

		$this->template->result = array( 'success' => true );
	}

	public function action_create()
	{
		$a = ORM::factory('Article');
		$a->structure_column_mapping_id = $this->request->post('mapping_id');
		$a->position = 1000; // we want a new article to be positioned at the end of the articles list for the current node
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

		ORM::factory('Article',$id)->delete();

		$this->template->result = array( 'success' => true );
	}

	/**
	 * This method can be remotely called if an articles parent structure was changed
	 * -> hence the mapping between the article and the structure has to be updated
	 *
	 * param: article id
	 * post data: new 'mapping_id'
	 */
	public function action_changemapping()
	{
		$id = $this->request->param('id');

		$a = ORM::factory('Article', $id);
		$a->structure_column_mapping_id = $this->request->post('mapping_id');
		$a->save();

		$this->template->result = array( 'success' => true );
	}

	/**
	 * This method can be remotely called if the ordering of articles is to be changed
	 *
	 * post data: array of article id's given in the new sort order
	 */
	public function action_changepositions()
	{
		$sortOrder = $this->request->post('sortOrder');

		$i = 0;
		foreach ($sortOrder as $id) 
		{
			$a = ORM::factory('Article', $id);
			$a->position = $i;
			$a->save();

			$i++;
		}

		$this->template->result = array( 'success' => true );	
	}

	/**
	* 	Returns the path to the css file so that an editor like tinymce can
	*	load the additional css classes.
	*/
	public function action_css()
	{
		$template = ORM::factory('Template')->where('active','=','1')->find();

		$cssfiles = ORM::factory('Loadfile')
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
		$template = ORM::factory('Template')->where('active','=','1')->find();
		
		$modules = ORM::factory('Module')->where('template_id','=',$template->id);
		$mappings = ORM::factory('StructureColumnMapping')->find_all();

		$outArr = array(
			'root' => array()
		);
		
		$language = ORM::factory('System_Setting')->get_language()->shortform;

		$structures = ORM::factory('Structure')
			->order_by('position','asc')
			->find_all();

		foreach ($structures as $s) {
			$columnsArr = array();
			$mappings = ORM::factory('StructureColumnMapping')->find_all();

			foreach($mappings as $m) {
				// if the current mapping has the same category (structure)
				// we want to add it with all article references in the output
				// array
				if ($m->structure_id == $s->id) {
					$module = ORM::factory('Module')
						->where('id','=',$m->module_id)
						->find();

					// insert articles (if allowed by module)
					if ($module->allowarticles == 1) {
						$articlesArr = array();
						$articles = ORM::factory('Article')
							->where('structure_column_mapping_id','=',$m->id)
							->order_by('position', 'ASC')
							->find_all();

						foreach($articles as $a) {
							$articlesArr[] = array(
								'text' => $a->title,
								'id' => $a->id,
								'leaf' => true
							);
						}

						$columnsArr[] = array(
							'text' => (($language == 'en') ? 'Area ' : 'Abschnitt ') . ($m->column + 1),
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
		$articles = ORM::factory('Article')
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
				'text' => (($language == 'en') ? 'ORPHANED ARTICLES' : 'VERWAISTE ARTIKEL'),
				'expanded' => false,
				'allowDrop' => true,
				'mapping_id' => null,
				'children' => $articlesArr
			);
		}			

		$this->template->result = $outArr;
	}
}