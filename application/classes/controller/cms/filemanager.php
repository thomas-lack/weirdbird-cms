<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_FileManager extends Controller_Cms_Data 
{
	public function action_data()
	{
		$files = array_map(
			create_function(
				'$obj',
				'return $obj->as_array();'
			),
			ORM::factory('File')->find_all()->as_array()		
		);

		for($i=0; $i<count($files); $i++)
		{
			// replace user id's with user names
			$user = ORM::factory('User', $files[$i]['user_id']);
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

		$this->template->result = $files;
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

				// make sure the filename is valid by replacing not allowed characters with an underscore _
				//$newFilename = strtolower(preg_replace(array('/[^\w\(\).-]/i','/(_)\1+/'),'_', $f['name']));
				$newFilename = preg_replace('/[\/:*?"<>|ßäöüÄÖÜ\']/', '', $f['name']);
				$newFilename = strtolower(preg_replace(array('/[^\w\(\).-]/i','/(_)\1+/'),'_', $newFilename));

				// get upload directory
				$dest = $this->mapType($f['type'], true) . DIRECTORY_SEPARATOR . $newFilename;
				if ( ! move_uploaded_file($f['tmp_name'], $dest) )
					$currentResult = false;

				// create thumbnail if src file is an image file
				if ($this->isImage($f['type']))
					$this->createThumbnail($dest, 60, 60, $newFilename);
				
				if ($currentResult) 
				{
					$fe = ORM::factory('File');
					$fe->active = 1;
					$fe->user_id = $user->id;
					$fe->filename = $newFilename;
					$fe->type = $f['type'];
					$fe->description = $this->request->post('form-description');
					$fe->creationdate = date('Y-m-d H:i:s', time());
					$fe->save();
				}
				else
					$result = false;
			}
		}

		$this->template->result = array( 'success' => $result );
	}

	public function action_destroy()
	{
		$request = json_decode($this->request->body());
		
		$file = ORM::factory('File', $request->id);

		// get correct upload directory
		$typeDir = $this->mapType($file->type, true);
		$filename = $file->filename;
		$type = $file->type;
		
		// delete file, thumbnail and db entry
		$file->delete();
		unlink($typeDir.DIRECTORY_SEPARATOR.$filename);
		if ($this->isImage($type))
			unlink($typeDir.DIRECTORY_SEPARATOR.IMAGETHUMBSDIR.DIRECTORY_SEPARATOR.$filename);
		
		$this->template->result = array( 'success' => true );

		// delete system-setting logo references if necessary
		$settingsImageId = ORM::factory('System_Setting')->get_brandImage();
		if ($settingsImageId == $request->id)
		{
			ORM::factory('System_Setting')->set_value_by_fieldname('brandimage', '');
		}

		// delete structure background image references if necessary
		$structureOptions = ORM::factory('Structure_Option')->find_all();
		foreach($structureOptions as $so)
		{
			if ($so->file_id == $request->id)
			{
				$so->file_id = null;
				$so->save();
			}
		}
	}

	public function action_update()
	{
		$r = json_decode($this->request->body());

		$f = ORM::factory('File', $r->id);

		// update data
		$f->active = $r->active;
		$f->creationdate = $r->creationdate;
		$f->description = $r->description;
		$f->save();

		$this->template->result = array( 'success' => true );
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
		$targetFileName = UPLOADPATH.UPLOADIMAGEDIR.DIRECTORY_SEPARATOR.IMAGETHUMBSDIR.DIRECTORY_SEPARATOR.$imgName;
		
		// do we have an png image ? then we have to make sure, that the alpha channel is supported for
		// image transparency
		if ($type == 3)
		{
			imagealphablending($sampleImage, false);
			imagesavealpha($sampleImage, true);
			$transparent = imagecolorallocatealpha($sampleImage, 255, 255, 255, 127);
     		imagefilledrectangle($sampleImage, 0,  0, $nw, $nh,  $transparent);
			imagecopyresampled($sampleImage, $tmpImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $srcWidth, $srcHeight);
			imagepng($sampleImage, $targetFileName);
		}
		else
		{
			imagecopyresampled($sampleImage, $tmpImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $srcWidth, $srcHeight);
			imagejpeg($sampleImage, $targetFileName);
		}

		// delete temp calculation files
		imagedestroy($tmpImage);
		imagedestroy($sampleImage);
	}
}