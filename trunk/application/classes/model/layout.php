<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Layout extends ORM {
    
    // access the template of the current loadfile via $loadfile->template
    protected $_belongs_to = array(
        'template' => array()
    );

    // data verification at saving
    protected $_rules = array(
    );
}