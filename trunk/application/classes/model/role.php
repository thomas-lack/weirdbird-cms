<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_Role extends Model_Auth_Role {
    
    protected $_table_name = 'wb_roles';

    // Relationships
	protected $_has_many = array(
		'users' => array('model' => 'User','through' => 'wb_roles_users'),
	);
}