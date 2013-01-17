<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_CMS_User extends Controller_Template {
	
	// override standard template file 'template'
	public $template = 'cms/user/template';
	
    public function action_index()
    {
        $this->template->content = View::factory('cms/user/info')
            ->bind('user', $user);
         
        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
            Request::current()->redirect('cms/user/login');
        }
    }
 
    public function action_read()
    {
        if (HTTP_Request::GET == $this->request->method())
        {
            try 
            {
               $users = array_map(
                    create_function(
                        '$obj',
                        'return $obj->as_array();'
                    ),
                    ORM::factory('user')
                            ->find_all()
                            ->as_array()        
                );

               // delete password hashes before delivery
               for ($i=0; $i<count($users); $i++)
               {
                    $users[$i]['password'] = '';
                    $users[$i]['last_login'] = date('Y-m-d 00:00:00', $users[$i]['last_login']);
               }

               echo json_encode($users);
               
            }
            catch (Exception $e)
            {
                echo '{"success":"false","message":"' . $e->getMessage() . '"}';
            }
        }
        die();
    }

    public function action_create()
    {
        /*$this->template->content = View::factory('cms/user/create')
            ->bind('errors', $errors)
            ->bind('message', $message);
        */

        if (HTTP_Request::POST == $this->request->method())
        {          
            try {
                
                $new_password = $this->getRandomPassword();

                $new_user = array(
                    'username' => $this->request->post('username'),
                    'password' => $new_password,
                    'email' => $this->request->post('email')
                );
                var_dump($new_user);die();
                $user = ORM::factory('User')->create_user($new_user, array(
                    'username',
                    'password',
                    'email',
                ));
                $user->add('roles', ORM::factory('role'), array('name' => 'administrator'));

                /*
                // Create the user using form values
                $user = ORM::factory('user')->create_user($this->request->post(), array(
                    'username',
                    'password',
                    'email'            
                ));
                 
                // Grant user login role
                $user->add('roles', ORM::factory('role', array('name' => 'login')));
                 
                // Reset values so form is not sticky
                $_POST = array();
                
                // Set success message
                $message = "You have added user '{$user->username}' to the database";
                */
                echo '{"success":"true","message":"' . $new_password . '"}';    
            } 
            catch (Exception $e)
            {
                echo '{"success":"false","message":"' . $e->getMessage() . '"}';
            }
            /*catch (ORM_Validation_Exception $e) {
                 
                // Set failure message
                $message = 'There were errors, please see form below.';
                 
                // Set errors using custom messages
                $errors = $e->errors('models');
            }
            */
        }
        die();
    }
    
    /**
     * Helper method to generate randomized passwords for new users
     */
    private function getRandomPassword() 
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

	public function action_login()
    {
        $this->template->content = View::factory('cms/user/login')
            ->bind('message', $message);
             
        if (HTTP_Request::POST == $this->request->method())
        {
            // Attempt to login user
            $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
            $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
             
            // If successful, redirect user
            if ($user)
            {
                HTTP::redirect('cms');
            }
            else
            {
                $message = 'Login failed';
            }
        }
    }
     
    public function action_logout()
    {
        // Log user out
        Auth::instance()->logout();
         
        // Redirect to login page
        HTTP::redirect('cms');
    }
}