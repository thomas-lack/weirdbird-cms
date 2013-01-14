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
		$message
			. '\n\n--\n'
			. 'This message was sent by a standard contact formular of the following website:\n'
			. 'http://' . $_SERVER['HTTP_HOST'];

		// TODO: standard email auslesen und einfuegen
		$receiver = 'post.thomas.lack@gmail.com';
		$about = '[wb cms] Contact message from ' . $_SERVER['HTTP_HOST'];
		
		// now fly little bird (\(°v°)/)
		mail($receiver, $about, $message, 'From: '.$sender);

		echo '{"success":"true"}';
		die();
	}
}