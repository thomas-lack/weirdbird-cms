<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_System_Setting extends ORM {

	protected $_table_name = 'wb_system_settings';

	public function get_language()
	{
		$setting = $this->where('fieldname','=','language_id')->find();
		$language = ORM::factory('Language', $setting->content);

		return $language;
	}

	public function get_email()
	{
		$setting = $this->where('fieldname','=','contactemail')->find();
		return $setting->content;
	}

	public function get_companyName()
	{
		$setting = $this->where('fieldname','=','companyname')->find();
		return $setting->content;
	}

	public function get_info()
	{
		$setting = $this->where('fieldname','=','info')->find();
		return $setting->content;
	}

	public function get_value_by_fieldname($name)
	{
		$setting = ORM::factory('System_Setting')
					->where('fieldname','=',$name)
					->find();

		return $setting->content;
	}

	public function set_value_by_fieldname($name, $value)
	{
		$setting = ORM::factory('System_Setting')
					->where('fieldname','=',$name)
					->find();

		$setting->content = $value;
		$setting->save();

		return true;
	}
}