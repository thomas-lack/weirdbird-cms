<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_File extends ORM {
    
    // data verification at saving
    protected $_rules = array(
        'active' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(1)
        ),
        'user_id' => array(
            'not_empty'  => NULL
        ),
        'filename' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256)
        ),
        'type' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(16)
        ),
		'creationdate' => array(
            'not_empty'  => NULL
        )
    );
}