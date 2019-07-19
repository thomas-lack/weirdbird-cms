<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_User_Pending extends ORM {
    
    protected $_table_name = 'wb_user_pending';

    public function is_unique_reference($reference)
    {
    	$pendings = ORM::factory('User_Pending')
    					->where('reference','=',$reference)
    					->count_all();

    	// if one or more entries are found -> return false (no unique entry)
        return (intval($pendings) == 0);
    }

    public function delete_invalid_pendings()
    {
        $pendings = ORM::factory('User_Pending')
                        ->find_all();

        $now = time();
        foreach ($pendings as $p)
        {
            $date = intval($p->valid_until);
            if ($date < $now)
                $p->delete();
        }
    }
}