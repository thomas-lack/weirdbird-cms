<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Main extends Controller_Template {
	
	public $template;
	public $config;

	public function before() {
		// get first active template we find
		$template = ORM::factory('template')->where('active','=','1');

		// if none is found send an error
		if ($template->count_all() == 0) {
			$this->template = 'frontend/error';
			parent::before();
			$this->template->error = 'Template not found.';
		}
		// otherwise start loading the template
		else {
			$this->config = $template->find();
			
			$this->template = '../../' 
				. $this->config->folder 
				. '/'
				. $this->config->folder_views
				. '/mainlayout';

			parent::before();

			$structures = ORM::factory('structure')
				->where('active','=','true')
				->order_by('position', 'asc')
				->find_all();
			
			$structs = array();
			foreach($structures as $s) {
				array_push($structs, $s->title);
			}

			if ($this->auto_render) {
				$this->template->styles = array();
				$this->template->scripts = array();
				$this->template->structures = $structs;
			}
		}
	}
	
	public function after() {
		if ($this->auto_render) {
			// include css definitions
			include_once(
				'/' . 
				$this->config->folder . 
				'/' . 
				$this->config->folder_css . 
				'/_config_css.php'
			);

			// include js definitions
			include_once(
				'/' . 
				$this->config->folder . 
				'/' . 
				$this->config->folder_js . 
				'/_config_js.php'
			);

			// merge into our own styles and js
			$this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
		}

		parent::after();
	}

	public function action_index() {
		
	}

}