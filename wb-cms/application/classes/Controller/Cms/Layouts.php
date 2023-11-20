<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Layouts extends Controller_Cms_Data
{
	public function action_read()
	{
		$t = ORM::factory('Template')->where('active','=','1')->find();

	  $objToArr = function($obj) {
      return $obj->as_array();
    };

		$result = array_map(
      $objToArr,
			ORM::factory('Layout')
				->where('template_id','=',$t->id)
				->find_all()
				->as_array()
		);
		
		$this->template->result = $result;
	}
}
