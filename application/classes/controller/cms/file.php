<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_File extends Controller_CMS_Main 
{
	public function action_images()
	{
		
		$imageTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/jpg'];

		$files = ORM::factory('file')
					->where('type','IN',$imageTypes)
					->where('active','=','1')
					->order_by('filename', 'asc')
					->find_all()
					->as_array();

		$f = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			$files
		);
		
		for ($i=0; $i<count($f); $i++)
		{
			$user = ORM::factory('user', $f[$i]['user_id']);
			$f[$i]['user_id'] = $user->username;

			$f[$i]['link'] = UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.$f[$i]['filename'];
			$f[$i]['thumb'] = UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.IMAGETHUMBSDIR.'/'.$f[$i]['filename'];
		}

		echo json_encode($f);
		die();
	}

	public function action_pdf()
	{
		$files = ORM::factory('file')
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

		foreach ($filesArr as $f)
		{
			$user = ORM::factory('user', $f['user_id']);
			$f['user_id'] = $user->username;

			$f['link'] = UPLOADDIR.'/'.UPLOADPDFDIR.'/'.$f['filename'];
		}

		echo json_encode($filesArr);
		die();
	}
}