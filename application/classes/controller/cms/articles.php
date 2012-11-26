<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Articles extends Controller_CMS_Main 
{

	public $template = 'cms/articles/template';

	public function action_index() 
	{
		$this->template->category = 'Articles';

		
		// get needed information about modules and layouts
		$structures = ORM::factory('structure')->where('active','=','true')->order_by('position','asc')->find_all();
		$template = ORM::factory('template')->where('active','=','1')->find();
		$layouts = ORM::factory('layout')->where('template_id','=',$template->id)->find_all();
		$modules = ORM::factory('module')->where('template_id','=',$template->id)->find_all();

		// propose data to the view
		$this->template->structures = $structures;
		$this->template->layouts = $layouts;
		$this->template->modules = $modules;
		$this->template->mappings = array();

		// get all needed module <-> column mappings
		foreach ($structures as $s) {
			$mappings = ORM::factory('structurecolumnmapping')->where('structures_id','=',$s->id)->find_all();
			foreach($mappings as $m) {
				array_push($this->template->mappings, $m);
			}
		}
		
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
}