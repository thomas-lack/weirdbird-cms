<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Layouts extends Controller_CMS_Main
{
	public function action_index() {}

	public function action_read()
	{
		$t = ORM::factory('template')->where('active','=','1')->find();

		echo json_encode(
			array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				ORM::factory('layout')
					->where('template_id','=',$t->id)
					->find_all()
					->as_array()
			)
		);
		die();
	}
}