<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Templates extends Controller_CMS_Main
{
	public $template = 'cms/templates/template';
	public $siteTemplatesFolder = SITETEMPLATEPATH; // as defined in index.php
	
	public function action_index()
	{
		$this->template->category = 'Templates';
	}
	
	private function getTemplateFolders()
	{
		return glob($this->siteTemplatesFolder . '/*' , GLOB_ONLYDIR);
	}
	
	private function getTemplateConfigs($templateFolders)
	{
		$t = ORM::factory('template')->where('active', '=', '1')->find();
		
		$ret = array();
		$id = 0;
		foreach ($templateFolders as $folder)
		{
			$str = file_get_contents($folder . '/config.xml');
			
			$xml = simplexml_load_string($str);
			$json = json_encode($xml);
			$arr = json_decode($json, TRUE);
			$arr['templatefolder'] = $folder;
			$arr['id'] = $id;
			
			if (isset($t) && $t->name == $arr['name'])
				$arr['active'] = 1;
			else
				$arr['active'] = 0;
			
			$ret[] = $arr;
			$id++;
		}
		return $ret;
	}
	
	public function action_data()
	{
		$templateFolders = $this->getTemplateFolders();
		$templateConfigs = $this->getTemplateConfigs($templateFolders);
		echo json_encode($templateConfigs);
		die();
	}
	
	public function action_settemplate()
	{
		$id = $this->request->param('id');
		
		// collect template data from xml again
		$templateFolder = $this->getTemplateFolders();
		$templateConfig = $this->getTemplateConfigs(array($templateFolder[$id]));
		$templateConfig = $templateConfig[0];
		
		// test output
		//var_dump($templateConfig);
		
		// set previously active template to non-active
		$t = ORM::factory('template')->where('active', '=', '1')->find();
		$t->active = '0';
		$t->save();
		
		// insert/update database
		$t = ORM::factory('template')->where('name', '=', $templateConfig['name'])->find();
		$t->active = '1';
		$t->name = $templateConfig['name'];
		$t->folder = $templateConfig['templatefolder'];
		$t->folder_css = $templateConfig['stylesheet']['folder'];
		$t->folder_js = $templateConfig['javascript']['folder'];
		$t->folder_views = $templateConfig['views']['folder'];
		$t->folder_images = $templateConfig['images']['folder'];
		$t->save();
		
		// just in case
		die();
	}
}