<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Cms_System extends Controller_Cms_Data 
{
	
	public function action_read()
	{
		$system = array(
			'email' => ORM::factory('System_Setting')->get_email(),
			'language' => ORM::factory('System_Setting')->get_language()->name,
			'companyname' => ORM::factory('System_Setting')->get_companyName(),
			'info' => ORM::factory('System_Setting')->get_info()
		);
		
		// get current list of cms project changes (if allowed by the server)
		if(function_exists('curl_init'))
		{
			//$html = file_get_contents('http://code.google.com/p/weirdbird-cms/source/list');
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, 'http://code.google.com/p/weirdbird-cms/source/list');
			$html = curl_exec($c);
			curl_close($c);
			$dom = new DOMDocument();   
			@$dom->loadHTML($html);
			
			$tablefields = $dom->getElementById('resultstable')->getElementsByTagName('td');
			
			$revision = array(
				'system' => REVISION,
				'error' => null
			);
			$fieldcounter = 0; 
			// 0 => latest revision
			// 1 => latest update message
			// 2 => update time
			// 3 => updated by
			foreach ($tablefields as $field)
			{
				if ($fieldcounter == 0)
					$revision['current'] = $field->nodeValue;
				if ($fieldcounter == 3)
					$revision['creationdate'] = $field->nodeValue;

				$fieldcounter++;
				if ($fieldcounter > 3)
					break;
			}
			
			// return result set
			$system['revision'] = $revision;	
		}
		else
		{
			$revision = array(
				'system' => REVISION,
				'error' => 'The system is not able to read from other servers (cURL library missing).'
			);
			$system['revision'] = $revision;
		}
		
		$this->template->result = $system;
	}

	public function action_update()
	{
		$data = $this->request->post();
		$email = $data['email'];
		$languageId = $data['language'];
		$companyName = $data['companyname'];
		$info = $data['info'];
		$setting = ORM::factory('System_Setting');

		// check if language id is an int value
		if (is_numeric($languageId))
		{
			// update data
			$setting->set_value_by_fieldname('contactemail', $email);
			$setting->set_value_by_fieldname('language_id', $languageId);
			$setting->set_value_by_fieldname('companyname', $companyName);
			$setting->set_value_by_fieldname('info', $info);

			$this->template->result = array( 'success' => true );
		}
		else
		{
			$this->template->result = array(
				'success' => false,
				'error' => 'Parameter language id was not set correctly.'
 			);
		}
	}

	public function action_languages() 
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('Language')->find_all()->as_array()		
		);

		$this->template->result = $result;
	}
}