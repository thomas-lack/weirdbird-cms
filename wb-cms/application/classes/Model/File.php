<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_File extends ORM {
    
    protected $_table_name = 'wb_files';

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

    public function get_files_by_type($type)
    {
        return ORM::factory('file')
                ->where('type','=',$type)
                ->order_by('filename', 'asc')
                ->find_all();
    }

    public function get_imageFilePath($id = null, $thumb = false)
    {
        $filename = '';
        if ($id == null)
            $filename = $this->filename;
        else
        {
            $f = ORM::factory('File', $id);
            $filename = $f->filename;
        }
        
        if ($filename == '')
            return null;
        else
            return '/'.UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'. (($thumb) ? IMAGETHUMBSDIR.'/' : '') . $filename;
    }
}