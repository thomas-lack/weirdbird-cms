<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mail extends Controller
{
	/**
	 * Sends a message to the standard mail address, as configured in the cms.
	 * 
	 * It requires two fields: 'email' and 'message', which are transmitted by using POST
	 */
	public function action_contact()
	{
		$sender = $this->request->post('email');
		$message = $this->request->post('message');

		if ($sender == '' || $message == '')
		{
			echo '{"success":"false"}';
			die();
		}

		// add some info to the message
		$language = ORM::factory('System_Setting')->get_language();
		if ($language->shortform == 'en')
		{
			$message
			. '\n\n--\n'
			. 'This message was sent by a standard contact formular of the following website:\n'
			. 'http://' . $_SERVER['HTTP_HOST'];	
		}
		else if ($language->shortform == 'de')
		{
			$message
			. '\n\n--\n'
			. 'Diese Nachricht wurde versendet durch das standard Kontaktformular der folgenden Webseite:\n'
			. 'http://' . $_SERVER['HTTP_HOST'];
		}
		
		// get standard email as posted in the cms
		$receiver = ORM::factory('system_setting')
						->where('fieldname','=','contactemail')
						->find();
		$about = '[wb cms] Contact message from ' . $_SERVER['HTTP_HOST'];
		
		// now fly little bird (\(°v°)/)
		try
		{
			mail($receiver->content, $about, $message, 'From: '.$sender);	
		}
		catch(Exception $e)
		{
			echo '{"success":"false","message":"' . $e->getMessage() . '"}';
		}

		echo '{"success":"true"}';
	}
}