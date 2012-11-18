<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Main extends Controller_Template {
	
	public $template;
	public $config;

	public function before() {
		// get first active template we find
		$this->config = ORM::factory('template')->where('active','=','1')->find();

		// if none is found send an error
		if (!isset($this->config)) {
			$this->template = 'frontend/error';
			parent::before();
			$this->template->error = 'Template not found.';
		}
		// otherwise start loading the template
		else {
			$this->template = '../../' 
				. $this->config->folder 
				. '/'
				. $this->config->folder_views
				. '/layout/'
				. $this->config->standardlayout;

			parent::before();

			$structures = ORM::factory('structure')
				->where('active','=','true')
				->order_by('position', 'asc')
				->find_all();
			
			if ($this->auto_render) {
				$this->template->styles = array();
				$this->template->scripts = array();
				$this->template->externalScripts = array();
				$this->template->structures = $structures;
			}
		}
	}
	
	public function after() {
		
		if ($this->auto_render) {
			
			$loadfile = ORM::factory('loadfile')
				->where('template_id','=',$this->config->id)
				->order_by('id', 'asc')	//to maintain the correct loading order given in the config.xml
				->find_all();
			
			$styles = array();
			$scripts = array();
			$externalScripts = array();

			foreach ($loadfile as $lf) {
				
				// add css files
				if ($lf->type == 'css') {
					array_push($styles, 
						$this->config->folder . '/' . 
						$this->config->folder_css . '/' . 
						$lf->filename
					);
				}
					
				// add javascript files
				else if ($lf->type == 'js') {
					if ($lf->custom_type == 'external') {
						array_push($externalScripts, 
							$lf->filename
						);
					}
						
					else {
						array_push($scripts, 
							$this->config->folder . '/' .
							$this->config->folder_js . '/' .
							$lf->filename
						);
					}
						
				}
			}
			
			// merge into our own styles and js
			$this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
            $this->template->externalScripts = array_merge( $this->template->externalScripts, $externalScripts);
		}

		parent::after();
	}

	public function action_index() {
		
	}

}