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

	/**
	*	Returns the mapped categories/columns/articles, so that EXTJS can
	*	handle it as nested data and produce a nice treeview
	*/
	public function action_treeview()
	{
		$template = ORM::factory('template')->where('active','=','1')->find();
		
		$modules = ORM::factory('module')->where('template_id','=',$template->id);
		$mappings = ORM::factory('structurecolumnmapping')->find_all();

		$outArr = array('root' => array());
		
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
								/*'id' => $a->id,
								'title' => $a->title*/
							);
						}

						$columnsArr[] = array(
							'text' => 'Column ' . ($m->column + 1),
							'mapping_id' => $m->id,
							'expanded' => false,
							'children' => $articlesArr
							/*'column_number' => $m->column,
							'module_name' => $module->name,
							'editable' => $module->allowarticles,
							'articles' => $articlesArr*/
						);
					}
				}
			}

			// now that we have all data, the output array can be wrapped up
			$outArr['root']['expanded'] = true;
			$outArr['root']['children'][] = array(
				'text' => $s->title,
				'expanded' => false,
				'children' => $columnsArr
				/*'id' => $s->id,
				'active' => $s->active,
				'title' => $s->title,
				'columns' => $columnsArr*/
			);
		}

		echo json_encode($outArr);
		die();
	}
}