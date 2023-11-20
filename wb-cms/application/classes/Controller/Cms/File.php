<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_File extends Controller_Cms_Data 
{
	public function action_images()
	{
		if (HTTP_Request::GET == $this->request->method())
        { 
			$imageTypes = array('image/jpeg', 'image/gif', 'image/png', 'image/jpg');

			$files = ORM::factory('File')
						->where('type','IN',$imageTypes)
						->where('active','=','1')
						->order_by('filename', 'asc')
						->find_all()
						->as_array();

      $objToArray = function($obj) {
        return $obj->as_array();
      };

			$f = array_map(
        $objToArray,
				$files
			);
			
			for ($i=0; $i<count($f); $i++)
			{
				$user = ORM::factory('User', $f[$i]['user_id']);
				$f[$i]['user_id'] = $user->username;

				$f[$i]['link'] = UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.$f[$i]['filename'];
				$f[$i]['thumb'] = UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.IMAGETHUMBSDIR.'/'.$f[$i]['filename'];
			}

			$this->template->result = $f;
		}
	}

	/**
	 * Creates a result set of all active pdf files including links
	 */
	public function action_pdf()
	{
		if (HTTP_Request::GET == $this->request->method())
        { 
			$files = ORM::factory('File')
					->where('type','=','application/pdf')
					->where('active','=','1')
					->order_by('filename', 'asc')
					->find_all()
					->as_array();

			$filesArr = array_map(
				create_function(
					'$obj',
					'return $obj->as_array();'
				),
				$files
			);

			for($i=0; $i < count($filesArr); $i++)
			{
				$user = ORM::factory('User', $filesArr[$i]['user_id']);
				$filesArr[$i]['user_id'] = $user->username;

				$filesArr[$i]['link'] = UPLOADDIR.'/'.UPLOADPDFDIR.'/'.$filesArr[$i]['filename'];
			}

			$this->template->result = $filesArr;
		}
	}

	/**
	 * Creates a result set of all pdf files
	 */
	public function action_documents()
	{
		if (HTTP_Request::GET == $this->request->method()) { 
      $objToArr = function($obj) {
        return $obj->as_array();
      };

			$docs = array_map(
        $objToArr,
				ORM::factory('File')->get_files_by_type('application/pdf')->as_array()		
			);

			for ($i = 0; $i < count($docs); $i++)
			{
				$docs[$i]['link'] = UPLOADDIR.'/'.UPLOADPDFDIR.'/'.$docs[$i]['filename'];
			}
			
			$this->template->result = $docs;
		}
	}
}
