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
		$about = '[wb cms]';

		if ($sender == '' || $message == '')
		{
			echo '{"success":"false"}';
			die();
		}

		// add some info to the message
		$language = ORM::factory('System_Setting')->get_language();
		if ($language->shortform == 'en')
		{
			$message .= '<br/><br/>--<br/>'
			. 'This message was sent by a standard contact formular of the following website:<br/>'
			. 'http://' . $_SERVER['HTTP_HOST'];
			$about .= ' Contact message from ' . $_SERVER['HTTP_HOST'];
		}
		else if ($language->shortform == 'de')
		{
			$message .= '<br/><br/>--<br/>'
			. 'Diese Nachricht wurde versendet durch das standard Kontaktformular der folgenden Webseite:<br/>'
			. 'http://' . $_SERVER['HTTP_HOST'];
			$about .= ' Kontaktanfrage von ' . $_SERVER['HTTP_HOST'];
		}
		
		// get standard email as posted in the cms
		$receiver = ORM::factory('system_setting')
						->where('fieldname','=','contactemail')
						->find();
		
		// define mail header
		$header = "From: <" . $sender . ">\r\n"
			. "Reply-To: " . $sender . "\r\n"
			. "Content-Type: text/html\r\n";

		// now fly little bird (\(°v°)/)
		$mailResult = mail($receiver->content, $about, $message, $header, '-f '.$receiver->content);
		// !! fifth parameter is hosteurope.de specific and has to be set to an email address that is !!s
		// !! registered within hosteurope !!
		
		echo '{"success":'.$mailResult.'}';
	}
}