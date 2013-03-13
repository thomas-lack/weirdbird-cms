<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_StructureColumnMapping extends ORM {

	protected $_table_name = 'wb_structure_column_mappings';

	protected $_has_many = array(
        'articles' => array()
    );
}