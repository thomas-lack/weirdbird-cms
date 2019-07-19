<?php defined('SYSPATH') or die('No direct script access.');

/**
 *	Controller for articles that shall be loaded directly
 */
class Controller_Frontend_DirectArticle extends Controller_Frontend_Main {
	
	public function before()
	{
		// save a reference to the current structure and article
		$this->structureRef = $this->request->param('structure');
		$this->articleRef = $this->request->param('article');

		// and call the standard loader for the site afterwards
		parent::before();
	}
}