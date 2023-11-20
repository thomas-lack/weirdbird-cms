<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Structure extends Controller_Frontend_Main {
	
	public function before()
	{
		// save a reference to the current structure
		$this->structureRef = $this->request->param('structure');

		// and call the standard loader for the site afterwards
		parent::before();
	}
}