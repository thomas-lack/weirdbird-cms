<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Structure extends ORM {
 
    protected $_table_name = 'wb_structures';

    protected $_has_one = array(
    	'layout' => array()
    );

    // define validation rules
	protected $_rules = array(
        // field 'id' is assumed by kohana as primary and unique
		
		'active' => array(
			'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(5)
		),
		'position' => array(
			'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(32)
		),
		'title' => array(
			'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(128)
		),
		'description' => array(
			'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256)
		),
		'layout_id' => array(
			'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(128)
		),
		'language_id' => array(
			'not_empty' => NULL,
			'min_length' => array(1),
			'max_length' => array(128)
		),
		'mainnavigation' => array(
			'not_empty' => '0',
			'min_length' => array(1),
			'max_length' => array(1)
		)
    );
}