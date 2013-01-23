<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_CMS_User extends Controller_Template {
	
	// override standard template file 'template'
	public $template = 'cms/user/template';

    private $language = null;

    public function before()
    {
        parent::before();
        $this->language = ORM::factory('System_Setting')->get_language();
    }
	
    /**
     * Standard view delivered by this controller class
     */
    public function action_index()
    {
        $this->template->content = View::factory('cms/user/login');
         
        // Load the user information
        $user = Auth::instance()->get_user();
         
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
            HTTP::redirect('cms/user/login');
        }
    }
 
    /**
     * Read all user data if a user is logged in and show the result unparsed as json string
     */
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

    /**
     * Updating a user entry in the db silently (without rendering an extra view)
     */
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
     * Deletion of an user db entry (silently).
     */
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

    /**
     * The action_create() method is a first step method in the process of 
     * creating a new user. In this step, the potential new user is written to 
     * an extra table in the database and notified via mail to activate the 
     * new account.
     */
    public function action_create()
    {
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
                //$validTime = date('Y-m-d H:i:s', $validTime);
                
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
                $message = '';
                $subject = '';
                $sender = ORM::factory('System_Setting')->get_email();
                if ($sender == null)
                    $sender = 'noreply@' . $_SERVER['HTTP_HOST'];

                if ($this->language->shortform == 'en')
                {
                    $subject = '[weirdbird cms] invitation';

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
                else if ($this->language->shortform == 'de')
                {
                    $subject = '[weirdbird cms] Einladung';

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

                mail($email, $subject, $message, 'From: '.$sender);
                echo '{"success":true}'; 
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
    
    /**
     * Adds an entry to the db about a pending user action: reset a password
     */
    public function action_resetpassword()
    {
        if (HTTP_Request::POST == $this->request->method())
        {          
            try 
            {
                // post data was found -> so an input was given
                // check if the input was a username or an email address
                $user = ORM::factory('User')
                            ->where('username','=',$this->request->post('userdata'))
                            ->find();
                
                if (!$user->loaded()) 
                {
                    $user = ORM::factory('User')
                                ->where('email','=',$this->request->post('userdata'))
                                ->find();
                }

                // if still not loaded, there exists no entry with the given information
                // -> show error message
                if (!$user->loaded())
                {
                    if ($this->language->shortform == 'en')
                    {
                        $message = '<p>Error</p><p>No user with the given data could be found.</p>';
                        $headline = 'weirdbird cms // password reset';
                    }
                    else if ($this->language->shortform == 'de')
                    {
                        $message = '<p>Error</p><p>Es konnte kein Nutzer gefunden werden der zu den angegebenen Daten passt.</p>';
                        $headline = 'weirdbird cms // passwort reset';
                    }

                    $this->template->headline = $headline;
                    $this->template->content = View::factory('cms/user/resetpassword')
                        ->bind('message', $message);
                }
                // otherwise create a pending user entry in the db and send a verification email
                else
                {
                    $validTime = time() + (24 * 60 * 60);
                    $reference = $this->getRandomString(16);

                    // create a new db entry
                    $pending = ORM::factory('User_Pending');
                    $pending->type = 'resetpw';
                    $pending->reference = $reference;
                    $pending->username = $user->username;
                    $pending->email = $user->email;
                    $pending->user_id = $user->id;
                    $pending->valid_until = $validTime;
                    $pending->save();

                    // send email notification to user email address
                    $link = 'http://'.$_SERVER['HTTP_HOST'].'/'.'cms/user/validate/'.$reference;
                    $this->sendResetPasswordValidationMail($link);

                    if ($this->language->shortform == 'en')
                        $message = 'A verification email was sent to the users address. Please check your emails.';
                    else if ($this->language->shortform == 'de')
                        $message = 'Eine Email wurde an die Adresse des Nutzers versendet. Bitte &uuml;berpr&uuml;fen Sie Ihr Postfach.';
                    $this->template->content = View::factory('cms/user/login')
                        ->bind('language', $this->language)
                        ->bind('message', $message); 
                }
                
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
            }
        }
        // no post data was found -> no silent mode, because 'forgot password'
        // link at the login page was clicked
        else
        {
            if ($this->language->shortform == 'en')
            {
                $message = 'Please enter your weirdbird cms <b>user name</b> <i>or</i> <b>email address</b> into the field above.'
                    . ' After clicking the <i>Reset</i> button an email with further instructions will be send to your email address.';
                $headline = 'weirdbird cms // password reset';
            }
            else if ($this->language->shortform == 'de')
            {
                $message = '<p>Bitte geben Sie Ihren weirdbird cms <i>Nutzernamen</i> oder Ihre <i>Emailadresse</i> in das obige Feld ein.</p>'
                    . '<p>Nach klicken des <i>Reset</i> Buttons wird eine Nachricht mit weiteren Instruktionen an Ihre Emailadresse geschickt.</p>';
                $headline = 'weirdbird cms // passwort reset';
            }

            $this->template->headline = $headline;
            $this->template->content = View::factory('cms/user/resetpassword')
                ->bind('message', $message);
        }
    }

    /**
     * Adds an entry to the db about a pending user action: reset a password
     * (This is called silently without an extra rendered view as output)
     */
    public function action_silentresetpassword()
    {
        if (!Auth::instance()->get_user()) HTTP::redirect('cms/user/login');

        if (HTTP_Request::POST == $this->request->method())
        {          
            try 
            {
                $data = $this->request->post();
                $validTime = time() + (24 * 60 * 60);
                $reference = $this->getRandomString(16);

                // create a new db entry
                $pending = ORM::factory('User_Pending');
                $pending->type = 'resetpw';
                $pending->reference = $reference;
                $pending->username = $data['username'];
                $pending->email = $data['email'];
                $pending->user_id = $data['id'];
                $pending->valid_until = $validTime;
                $pending->save();

                // send email notification to user email address
                $link = 'http://'.$_SERVER['HTTP_HOST'].'/'.'cms/user/validate/'.$reference;
                $this->sendResetPasswordValidationMail($link);

                echo '{"success":true}';
            }
            catch (Exception $e)
            {
                echo '{"success":false,"message":"' . $e->getMessage() . '"}';
            }
        }
        die();
    }

    /**
     * Helper method to send a standard email to validate a password resetting request.
     *
     * $link        String          A link that is posted in the email pointing to the validation url
     */
    private function sendResetPasswordValidationMail($link)
    {
        $message = '';
        $subject = '';
        $sender = ORM::factory('System_Setting')->get_email();
        if ($sender == null)
            $sender = 'noreply@' . $_SERVER['HTTP_HOST'];

        if ($this->language->shortform == 'en')
        {
            $subject = '[weirdbird cms] password reset';

            $message .= 'Hi, '
                . '<br/><br/>'
                . 'you have requested a password reset for your account of the <i>weirdbird cms</i> of '
                . $_SERVER['HTTP_HOST']
                . '. Please validate this request by visiting the following link during the next 24 hours:'
                . '<br/><br/>'
                . '<a href="' . $link . '">' . $link . '</a>'
                . '<br/><br/>--</br>'
                . 'This message was sent automatically. Please ignore this email in case you have no clue what all this means.';
        }
        else if ($this->language->shortform == 'de')
        {
            $subject = '[weirdbird cms] Passwort Reset';

            $message .= 'Hi, '
                . '<br/><br/>'
                . 'Sie haben eine R&uuml;cksetzung des Passwortes Ihres <i>weirdbird cms</i> Accounts auf der Webseite '
                . $_SERVER['HTTP_HOST']
                . ' angefordert. Bitte validieren Sie diese Anfrage innerhalb der n&auml;chsten 24 Stunden durch das Aufrufen des folgenden Links:'
                . '<br/><br/>'
                . '<a href="' . $link . '">' . $link . '</a>'
                . '<br/><br/>--</br>'
                . 'Diese Nachricht wurde automatisch versendet. Bitte ignorieren Sie diese Email falls Sie nicht wissen worum es sich hierbei handelt.';
        }

        mail($email, $subject, $message, 'From: '.$sender);
    }

    /**
     *  2nd step in creating a new user and 
     */
    public function action_validate()
    {
        $reference = $this->request->param('id');

        // remove pendings that are no longer valid from the db
        ORM::factory('User_Pending')->delete_invalid_pendings();

        // get the current pending user data
        $pUser = ORM::factory('User_Pending')
                        ->where('reference','=',$reference)
                        ->find();
        
        // no pending entry found ?
        if (!$pUser->loaded())
        {
            $message = 'error';
            if ($this->language->shortform == 'en')
                $message = 'No validation possible.';
            else if ($this->language->shortform == 'de')
                $message = 'Keine Validierung m&ouml;glich.';
            
            // call standard login screen with error message
            $this->template->content = View::factory('cms/user/login')
                ->bind('message', $message);
        }
        
        // account activation
        else if ($pUser->type == 'activate')
        {
            $this->activate_account($pUser);
        }
        // password resetting
        else if ($pUser->type == 'resetpw')
        {
            $this->reset_password($pUser);
        }
    }

    /**
     * Helper method to validate and execute account activation
     */
    private function activate_account($pUser)
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
        $user = ORM::factory('user')->create_user($newUser, array(
            'username',
            'password',
            'email'            
        ));
        // grant user rights to login and administrate data
        // TODO: implement better user role system
        $user->add('roles', ORM::factory('role', array('name' => 'login')));
        $user->add('roles', ORM::factory('role', array('name' => 'admin')));    

        // delete pending user
        $pUser->delete();

        // go back to standard login screen with new pw as message
        $message = 'New Password: ' . $password;
        if ($this->language->shortform == 'en')
        {
            $message = 'Validation successful.<br/><br/>'
                . 'Your username:<br/><pre>' . $newUser['username'] . '</pre>'
                . '<br/>'
                . 'Your password:<br/><pre>' . $password . '</pre>';
        }
        else if ($this->language->shortform == 'de')
        {
            $message = 'Validierung erfolgreich.<br/><br/>'
                . 'Ihr Nutzername:<br/><pre>' . $newUser['username'] . '</pre>'
                . '<br/>'
                . 'Ihr Passwort:<br/><pre>' . $password . '</pre>'; 
        }

        $username = $newUser['username'];
        if ($this->language->shortform == 'en')
            $headline = 'weirdbird cms // activate account';
        else if ($this->language->shortform == 'de')
            $headline = 'weirdbird cms // account aktivieren';
        $this->template->headline = $headline;
        $this->template->content = View::factory('cms/user/validate')
            ->bind('message', $message)
            ->bind('username', $username)
            ->bind('password', $password);
    }

    /**
     * Helper method to validate and execute password resetting
     */
    private function reset_password($pUser)
    {
        $password = $this->getRandomString(8);

        $changeUser = array(
            'email' => $pUser->email,
            'username' => $pUser->username,
            'password' => $password,
            'password_confirm' => $password
        );

        $user = ORM::factory('User', $pUser->user_id)
            ->update_user($changeUser, array('email', 'username', 'password'));

        $pUser->delete();

        $message = 'New Password: ' . $password;
        if ($this->language->shortform == 'en')
        {
            $message = 'Validation successful.<br/><br/>'
                . 'Your new password:<br/><pre>' . $password . '</pre>';
        }
        else if ($this->language->shortform == 'de')
        {
            $message = 'Validierung erfolgreich.<br/><br/>'
                . 'Ihr neues Passwort:<br/><pre>' . $password . '</pre>'; 
        }

        $username = $changeUser['username'];
        if ($this->language->shortform == 'en')
            $headline = 'weirdbird cms // password reset';
        else if ($this->language->shortform == 'de')
            $headline = 'weirdbird cms // passwort reset';
        $this->template->headline = $headline;
        $this->template->content = View::factory('cms/user/validate')
            ->bind('message', $message)
            ->bind('username', $username)
            ->bind('password', $password);
    }

    /**
     * Login method for the cms
     */
    public function action_login()
    {
       $this->template->content = View::factory('cms/user/login')
            ->bind('message', $message)
            ->bind('language', $this->language);
             
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
                if ($this->language->shortform == 'en')
                    $message = 'Login failed';
                else if ($this->language->shortform == 'de')
                    $message = 'Login fehlgeschlagen';
            }
        }
    }

    /**
     *  User logout method
     */
    public function action_logout()
    {
        // Log user out
        Auth::instance()->logout();
         
        // Redirect to login page
        HTTP::redirect('cms');
    }

    /**
     * Action to call if a user password is to be changed
     */
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