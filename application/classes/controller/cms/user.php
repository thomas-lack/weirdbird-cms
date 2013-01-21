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
            HTTP::redirect('cms/user/login');
        }
    }
 
    public function action_read()
    {
        // user validation
        if (!Auth::instance()->get_user()) HTTP::redirect('cms/user/login');

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

                    // add user roles to the output
                    $roles = ORM::factory('user',$users[$i]['id'])
                                ->roles
                                ->find_all();
                    $roleStr = '';
                    foreach($roles as $role) 
                    {
                        if ($roleStr != '')
                            $roleStr .= '; ';
                        $roleStr .= $role->name;
                    }
                    $users[$i]['roles'] = $roleStr;    
               }

               echo json_encode($users);
               
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
            }
        }
        die();
    }

    public function action_update()
    {
        // user validation
        if (!Auth::instance()->get_user()) Request::current()->redirect('cms/user/login');

        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
            HTTP::redirect('cms/user/login');
        }

        if (HTTP_Request::POST == $this->request->method())
        {
            try
            {
                $d = json_decode($this->request->body());
                $user = ORM::factory('user', $d->id);
                // check if the name stays the same
                if ($d->username == $user->username)
                {
                    $user->email = $d->email;
                    $user->save();

                    echo '{"success":true}';
                }
                // else check if the new name is not yet in use for another user
                else if ( ! ORM::factory('user')->unique_key_exists($d->username, 'username'))
                {
                    $user->username = $d->username;
                    $user->email = $d->email;
                    $user->save();

                    echo '{"success":true}';
                }
                // else give an error
                else
                {
                    echo '{"success":false,"message":"This username already exists."}';
                }
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';   
            }
        }
        die();
    }

    /**
     * The action_create() method is a first step method in the process of 
     * creating a new user. In this step, the potential new user is written to 
     * an extra table in the database and notified via mail to activate the 
     * new account.
     */
    public function action_create()
    {
        /*$user = Auth::instance()->get_user();
        
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
           HTTP::redirect('cms/user/login');
        }*/
        // user validation
        if (!Auth::instance()->get_user()) HTTP::redirect('cms/user/login');

        if (HTTP_Request::POST == $this->request->method())
        {          
            try {
                // create new pending user entry: activate account
                $reference = $this->getRandomString(16);
                if (! ORM::factory('User_Pending')->is_unique_reference($reference))
                    throw new Exception('Not able to generate unique reference. Please try again.');

                // create new time until the validation is empty
                $validTime = time() + (24 * 60 * 60); // add 24 hours to activate the account
                $validTime = date('Y-m-d H:i:s', $validTime);
                
                // get the current post data
                $username = $this->request->post('username');
                $email = $this->request->post('email');
                
                // create a new db entry
                $pending = ORM::factory('User_Pending');
                $pending->type = 'activate';
                $pending->reference = $reference;
                $pending->username = $username;
                $pending->email = $email;
                $pending->valid_until = $validTime;
                $pending->save();

                // send email notification to user email address
                $link = 'http://'.$_SERVER['HTTP_HOST'].'/'.'cms/user/validate/'.$reference;
                $language = ORM::factory('System_Setting')->get_language();
                $message = '';
                $subject = '';
                $sender = ORM::factory('System_Setting')->get_email();
                if ($sender == null)
                    $sender = 'noreply@' . $_SERVER['HTTP_HOST'];

                if ($language->shortform == 'en')
                {
                    $subject = 'weirdbird cms invitation';

                    $message .= 'Hi, '
                        . '<br/><br/>'
                        . 'someone added you to the <i>weirdbird cms</i> of '
                        . $_SERVER['HTTP_HOST']
                        . '. Please validate your account by visiting the following link during the next 24 hours:'
                        . '<br/><br/>'
                        . '<a href="' . $link . '">' . $link . '</a>'
                        . '<br/><br/>--</br>'
                        . 'This message was sent automatically. Please ignore this email in case you have no clue what all this means.';
                }
                else if ($language->shortform == 'de')
                {
                    $subject = 'weirdbird cms Einladung';

                    $message .= 'Hi, '
                        . '<br/><br/>'
                        . 'jemand hat Sie zum <i>weirdbird cms</i> der Webseite '
                        . $_SERVER['HTTP_HOST']
                        . ' eingeladen. Bitte validieren Sie innerhalb der n&auml;chsten 24 Stunden Ihren Account durch das Aufrufen des folgenden Links:'
                        . '<br/><br/>'
                        . '<a href="' . $link . '">' . $link . '</a>'
                        . '<br/><br/>--</br>'
                        . 'Diese Nachricht wurde automatisch versendet. Bitte ignorieren Sie diese Email falls Sie nicht wissen worum es sich hierbei handelt.';
                }

                //mail($email, $subject, $message, 'From: '.$sender);
                echo '{"success":true}'; 
                
                /*
                $newPassword = $this->getRandomString(8);

                $newUser = array(
                    'username' => $this->request->post('username'),
                    'password' => $newPassword,
                    'email' => $this->request->post('email')
                );
                var_dump(ORM::factory('User')->values($newUser, array('username','password','email')));
                $user = ORM::factory('User')->create_user($newUser, array(
                    'username',
                    'password',
                    'email',
                ));

                $user->add('roles', ORM::factory('role'), array('name' => 'admin'));
                */

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
                //echo '{"success":true,"message":"' . $newPassword . '"}';    
            } 
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
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
    
    public function action_validate()
    {
        $reference = $this->request->param('id');

        // remove pendings that are no longer valid from the db
        ORM::factory('User_Pending')->delete_invalid_pendings();

        // get the current pending user data
        $pUser = ORM::factory('User_Pending')
                        ->where('reference','=',$reference)
                        ->find();
        
        // get current system language
        $lang = ORM::factory('System_Setting')->get_language();

        // no pending entry found ?
        if (!$pUser->loaded())
        {
            $message = 'error';
            if ($lang->shortform == 'en')
                $message = 'No validation possible.';
            else if ($lang->shortform == 'de')
                $message = 'Keine Validierung m&ouml;glich.';
            
            // call standard login screen with error message
            $this->template->content = View::factory('cms/user/login')
                ->bind('message', $message);
        }
        
        // account activation
        else if ($pUser->type == 'activate')
        {
            $this->activate_account($pUser, $lang);
        }
        // password resetting
        else if ($pUser->type == 'resetpw')
        {
            // TODO: implement
        }
    }

    private function activate_account($pUser, $language)
    {
        // generate new password
        $password = $this->getRandomString(8);

        // add new user to the db
        $newUser = array(
            'email' => $pUser->email,
            'username' => $pUser->username,
            'password' => $password,
            'password_confirm' => $password
        );
        ORM::factory('User')->create_user($newUser, array_keys($newUser));

        // delete pending user
        $pUser->delete();

        // go back to standard login screen with new pw as message
        $message = 'New Password: ' . $password;
        if ($language->shortform == 'en')
        {
            $message = 'Validation successful.<br/><br/>'
                . 'Your username:<br/>' . $newUser['username']
                . '<br/><br/>'
                . 'Your password:<br/>' . $password;
        }
        else if ($language->shortform == 'de')
        {
            $message = 'Validierung erfolgreich.<br/><br/>'
                . 'Ihr Nutzername:<br/>' . $newUser['username']
                . '<br/><br/>'
                . 'Ihr Passwort:<br/>' . $password; 
        }

        $username = $pUser->username;
        $this->template->content = View::factory('cms/user/validate')
            ->bind('message', $message)
            ->bind('username', $username)
            ->bind('password', $password);
    }

    private function reset_password($pUser)
    {

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

    public function action_destroy()
    {
        // user validation
        if (!Auth::instance()->get_user()) HTTP::redirect('cms/user/login');

        if (HTTP_Request::POST == $this->request->method())
        {
            try
            {
                $request = json_decode($this->request->body());

                ORM::factory('user')->delete_user($request->id);
                echo '{"success":true}';    
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
            }
        }
        die();
    }
     
    public function action_logout()
    {
        // Log user out
        Auth::instance()->logout();
         
        // Redirect to login page
        HTTP::redirect('cms');
    }

    public function action_changepassword()
    {
        // user validation
        if (!Auth::instance()->get_user()) HTTP::redirect('cms/user/login');

        if (HTTP_Request::POST == $this->request->method())
        {
            try
            {
                $id = $this->request->post('id');
                $current = $this->request->post('currentpassword');
                $new1 = $this->request->post('newpassword1');
                $new2 = $this->request->post('newpassword2');

                if ($new1 == $new2)
                {
                    $user = ORM::factory('user',$id);
                    $user->password = $new1;
                    $user->save();  // the new password is automatically hashed in the user model
                    echo '{"success":true}';
                }
                else
                {
                    echo '{"success":false,"message":"The new password was not repeated correctly."}';       
                }
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
            }   
        }
        die();
    }

    /**
     * Helper method to generate randomized passwords for new users
     */
    private function getRandomString($length) 
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) 
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}