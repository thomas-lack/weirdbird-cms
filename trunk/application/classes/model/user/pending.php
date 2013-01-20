<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_User_Pending extends ORM {
    
    protected $_table_name = 'wb_user_pending';

    public function is_unique_reference($reference)
    {
    	$pendings = ORM::factory('User_Pending')
    					->where('reference','=',$reference)
    					->find_all();

    	foreach ($pendings as $pending)
    		return false;

    	return true;
    }
}