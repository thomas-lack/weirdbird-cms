<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Language extends ORM {

	protected $_table_name = 'wb_languages';

	public function get_id_by_name($name)
	{
		$lang = ORM::factory('Language')
					->where('name','=',$name)
					->find();

		return $lang->id;
	}

	public function get_id_by_shortform($shortform)
	{
		$lang = ORM::factory('Language')
					->where('shortform','=',strtolower($shortform))
					->find();

		return $lang->id;
	}
}