<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_Modules extends Controller_Cms_Data
{
	public function action_read()
	{
		// get template id
		$t = ORM::factory('Template')->where('active','=','1')->find();

    $objToArr = function($obj) {
      return $obj->as_array();
    };

		$result = array_map(
      $objToArr,
			ORM::factory('Module')
				->where('template_id','=',$t->id)
				->find_all()
				->as_array()
		);
		
		$this->template->result = $result;
	}
}
