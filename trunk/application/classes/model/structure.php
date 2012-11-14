<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Structure extends ORM {
 
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
		// format is a mapping string to symbolize the format of the current page (e.g. '2col')
		'format' => array(
			'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(128)
		)
    );
}