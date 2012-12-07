<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Template extends ORM {
    
    // access the loadfiles of the current template via $template->loadfiles
    // (and the layouts, models, etc...)
    protected $_has_many = array(
        'loadfiles' => array(),
        'layouts' => array(),
        'modules' => array()
    );

    protected $_rules = array(
        'active' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(1)
        ),
        'name' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256)
        ),
        'folder' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256)
        ),
        'folder_css' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256),
            'folder_css' => NULL,
        ),
		'folder_js' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256),
            'folder_js'  => NULL,
        ),
		'folder_views' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256),
            'folder_views' => NULL,
        ),
		'folder_images' => array(
            'not_empty'  => NULL,
            'min_length' => array(1),
            'max_length' => array(256),
            'folder_images' => NULL,
        )
    );
}