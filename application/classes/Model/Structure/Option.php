<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Structure_Option extends ORM {

	protected $_table_name = 'wb_structure_options';

	public function get_imageFilePath($id = null)
	{
		$file = null;

		// get file object depending on given id
		if ($id == null)
		{
			if ($this->file_id == null)
				return null;
			else
				$file = ORM::factory('File', $this->file_id);
		}
		else
		{
			$o = ORM::factory('Structure_Option', $id);
			if ($o->file_id == null)
				return null;
			else
				$file = ORM::factory('File', $o->file_id);
		}
			

		// return resulting filepath
		return $file->get_imageFilePath();
	}
}