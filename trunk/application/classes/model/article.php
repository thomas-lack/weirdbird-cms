<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Article extends ORM {
    
    protected $_belongs_to = array(
        'structurecolumnmapping' => array()
    );

    // data verification at saving
    protected $_rules = array(
    );
}