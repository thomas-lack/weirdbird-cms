<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_User extends Model_Auth_User {
    
    protected $_table_name = 'wb_users';

    /**
	 * A user has many tokens and roles
	 *
	 * @var array Relationhips
	 */
	protected $_has_many = array(
		'user_tokens' => array('model' => 'User_Token'),
		'roles'       => array('model' => 'Role', 'through' => 'wb_roles_users'),
	);
}