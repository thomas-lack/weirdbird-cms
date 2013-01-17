<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_CMS_System extends Controller_CMS_Data 
{
	
	public function action_read()
	{
		$system = array(
			'email' => ORM::factory('system_setting')->get_email(),
			'language' => ORM::factory('system_setting')->get_language()->name
		);
		
		// get current list of cms project changes
		$html = file_get_contents('http://code.google.com/p/weirdbird-cms/source/list');
		$dom = new DOMDocument();   
		@$dom->loadHTML($html);
		$tablefields = $dom->getElementById('resultstable')->getElementsByTagName('td');
		
		$revision = array(
			'system' => REVISION
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
		
		$this->template->result = $system;

		//echo json_encode($system);
		//die();
	}

	public function action_update()
	{
		$data = $this->request->post();
		$email = $data['email'];
		$languageId = $data['language'];
		$setting = ORM::factory('system_setting');

		// update data
		$setting->set_value_by_fieldname('contactemail', $email);
		$setting->set_value_by_fieldname('language_id', $languageId);

		$this->template->result = array( 'success' => true );
	}

	public function action_languages() 
	{
		$result = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('language')->find_all()->as_array()		
		);

		$this->template->result = $result;
	}
}