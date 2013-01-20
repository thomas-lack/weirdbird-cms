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

	public function delete_user($id)
	{
		$roles = ORM::factory('user',$id)->roles->find_all();

		foreach ($roles as $role)
		{
			$role->delete();
		}

		ORM::factory('user', $id)->delete();
	}

	public function create_user($name, $email)
	{
		// TODO : implement
	}
}