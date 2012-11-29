<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Modules extends Controller_CMS_Main
{
	public function action_read()
	{
		// get template id
		$t = ORM::factory('template')->where('active','=','1')->find();

		echo json_encode(
			array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				ORM::factory('module')
					->where('template_id','=',$t->id)
					->find_all()
					->as_array()
			)
		);
		die();
	}
}