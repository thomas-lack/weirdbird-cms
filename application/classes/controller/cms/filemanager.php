<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_FileManager extends Controller_CMS_Main 
{
	public function action_data()
	{
		$files = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('file')->find_all()->as_array()		
		);

		for($i=0; $i<count($files); $i++)
		{
			// replace user id's with user names
			$user = ORM::factory('user', $files[$i]['user_id']);
			$files[$i]['user_id'] = $user->username;

			// create a suitable link for the image
			$type = $files[$i]['type'];
			if ($this->isImage($type))
			{
				$files[$i]['link'] = 
					$this->mapType($type, false).'/'.IMAGETHUMBSDIR.'/'.$files[$i]['filename'];	
			}
			else
			{
				$files[$i]['link'] =
					$this->mapType($type, false).'/'.$files[$i]['filename'];
			}
		}

		echo json_encode($files);
		die();
	}

	public function action_read() 
	{
		$this->action_data();
	}

	public function action_create()
	{
		$result = true;
		$user = Auth::instance()->get_user();

		if (isset($_FILES))
		{
			foreach($_FILES as $f) 
			{
				$currentResult = true;

				// get upload directory
				$dest = $this->mapType($f['type'], true);
				$dest .= DIRECTORY_SEPARATOR.$f['name'];
				if ( ! move_uploaded_file($f['tmp_name'], $dest) )
					$currentResult = false;

				// create thumbnail if src file is an image file
				if ($this->isImage($f['type']))
					$this->createThumbnail($dest, 60, 60, $f['name']);
				
				if ($currentResult) 
				{
					$fe = ORM::factory('file');
					$fe->active = 1;
					$fe->user_id = $user->id;
					$fe->filename = $f['name'];
					$fe->type = $f['type'];
					$fe->description = $this->request->post('form-description');
					$fe->creationdate = date('Y-m-d H:i:s', time());
					$fe->save();
				}
				else
					$result = false;
			}
		}

		echo '{"success":"' . (($result) ? 'true' : 'false') . '"}';
		die();
	}

	public function action_destroy()
	{
		$request = json_decode($this->request->body());
		
		$file = ORM::factory('file', $request->id);

		// get correct upload directory
		$typeDir = $this->mapType($file->type, true);
		$filename = $file->filename;
		$type = $file->type;
		
		// delete file, thumbnail and db entry
		$file->delete();
		unlink($typeDir.DIRECTORY_SEPARATOR.$filename);
		if ($this->isImage($type))
			unlink($typeDir.DIRECTORY_SEPARATOR.IMAGETHUMBSDIR.DIRECTORY_SEPARATOR.$filename);
				
		echo '{"success":"true"}';
		die();
	}

	public function action_update()
	{
		$r = json_decode($this->request->body());

		$f = ORM::factory('file', $r->id);

		// update data
		$f->active = $r->active;
		$f->creationdate = $r->creationdate;
		$f->description = $r->description;
		$f->save();

		echo '{"success":"true"}';
		die();
	}

	/**
	 * Helper method to map a type like "image/jpeg" to the "images" directory
	 *
	 * $real indicates, if you want the real file path or the web path
	 */
	private function mapType($type, $real = false)
	{
		$typeDir = (($real) ? UPLOADPATH : (UPLOADDIR.'/')) . UPLOADMISCDIR;
		if ($this->isImage($type))
			$typeDir = (($real) ? UPLOADPATH : (UPLOADDIR.'/')) . UPLOADIMAGEDIR;
		elseif (strpos($type, 'pdf') !== false)
			$typeDir = (($real) ? UPLOADPATH : (UPLOADDIR.'/')) . UPLOADPDFDIR;	
		
		return $typeDir;
	}

	/**
	 * Helper method to identify if a file type is an image
	 */
	private function isImage($type)
	{
		if (strpos($type, 'image') !== false)
			return true;

		return false;
	}

	/**
	 * Creates a thumbnail of a given image with the given maximum size
	 * and keeps the aspect ratio intact. The thumbnail is saved in the 
	 * configured thumbnail folder.
	 */
	private function createThumbnail($imgSrc, $maxWidth, $maxHeight, $imgName)
	{
		list($srcWidth, $srcHeight, $type) = getimagesize($imgSrc);
		
		// keep aspect ratio for new image if necessary
		if ($srcWidth <= $maxWidth && $srcHeight <= $maxHeight)
		{
			$maxWidth = $srcWidth;
			$maxHeight = $srcHeight;
		}
		else
		{
			$ratio = $srcWidth / $srcHeight;
			if ($maxWidth/$maxHeight > $ratio)
				$maxWidth = floor($maxHeight * $ratio);
			else
				$maxHeight = floor($maxWidth / $ratio);	
		}
		
		// create temporary jpg image
		switch ($type)
		{
			case 1: // gif -> jpg
				$tmpImage = imagecreatefromgif($imgSrc);
				break;
			case 2: // jpeg -> jpg
				$tmpImage = imagecreatefromjpeg($imgSrc);
				break;
			case 3: // png -> jpg
				$tmpImage = imagecreatefrompng($imgSrc);
				break;
		}
		
		// resample temp image and save it as thumbnail
		$sampleImage = imagecreatetruecolor($maxWidth, $maxHeight);
		imagecopyresampled($sampleImage, $tmpImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $srcWidth, $srcHeight);
		imagejpeg(
			$sampleImage, 
			UPLOADPATH.UPLOADIMAGEDIR.DIRECTORY_SEPARATOR.IMAGETHUMBSDIR.DIRECTORY_SEPARATOR.$imgName
		);

		// delete temp calculation files
		imagedestroy($tmpImage);
		imagedestroy($sampleImage);
	}
}