<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Main extends Controller_Template {
	
	public $template;
	public $config;
	public $structureRef;

	public function before() {
		// get first active template we find
		$this->config = ORM::factory('template')->where('active','=','1')->find();
		
		// if none is found send an error
		if (!$this->config->loaded()) {
			$this->template = 'frontend/error';
			parent::before();
			$this->template->error = 'No template set to active.';
		}
		// otherwise start loading the template
		else {
			
			$structures = ORM::factory('structure')
				->where('active','=','1')
				->order_by('position', 'asc')
				->find_all();
			
			// set the 1st structure as standard if none is given
			if ($this->structureRef === null)
				$this->structureRef = $structures[0]->title;

			// set layout
			$layout = null;
			$structureId = null;
			foreach ($structures as $s)
			{
				if ($s->title == $this->structureRef)
				{
					$layout = ORM::factory('layout', $s->layout_id);
					$structureId = $s->id;
					break;
				}
			}
			// standard layout if none was set before
			if ($layout == null || $layout->view == null)
				$this->setLayout($this->config->standardlayout);
			// otherwise the one that was set before via cms
			else
				$this->setLayout($layout->view);

			// get the content for all the columns
			$columnContent = array();
			if ($layout == null || $layout->columns == null)
			{
				// provide standard fields containing error messages
				for ($i=0; $i < 5; $i++)
				{
					$error = 'No module defined for this data field.';
					$columnContent[] = (string) View::factory('frontend/error')
													->bind('error', $error);
				}
			}
			else {
				for ($i=0; $i < $layout->columns; $i++)
				{
					$columnContent[] = $this->generateColumnContent($i, $structureId);
				}	
			}
			
			// do the kohana magic
			parent::before();

			// set needed attributes
			if ($this->auto_render) {
				$this->template->styles = array();
				$this->template->scripts = array();
				$this->template->externalScripts = array();
				$this->template->currentStructure = $this->structureRef;
				$this->template->structures = $structures;
				$this->template->columnContent = $columnContent;
			}
		}
	}
	
	/**
	 * Generate a html parse string of the given column
	 */
	private function generateColumnContent($column, $structureId)
	{
		// get the mapping for column <-> module / articles
		$mapping = ORM::factory('structurecolumnmapping')
			->where('structure_id','=',$structureId)
			->where('column','=',$column)
			->find();

		// get the used module for this column
		$module = ORM::factory('module', $mapping->module_id);

		// get the articles for this column
		$articles = null;
		if ($module->allowarticles == 1)
		{
			$articles = ORM::factory('article')
				->where('active','=',1)
				->where('structure_column_mapping_id','=',$mapping->id)
				->order_by('id', 'asc')
				->find_all();	
		}

		// now get the html string of the parsed view
		$viewFile = '../../'
			.$this->config->folder
			.'/'
			.$this->config->folder_views
			.'/module/'
			.$module->view;

		// and we also give all informations we have to the template
		// view - so the programmer of the view has all info at hand
		$view = View::factory($viewFile)
			->bind('articles', $articles)
			->bind('module', $module)
			->bind('mapping', $mapping)
			->bind('column', $column)
			->bind('structureId', $structureId);

		return (string) $view;
	}

	/**
	 * Helper method to set the template layout for the current page
	 */
	private function setLayout($layoutRef)
	{
		$this->template = '../../' 
					. $this->config->folder 
					. '/'
					. $this->config->folder_views
					. '/layout/'
					. $layoutRef;
	}

	/**
	 * Add external file references (css, js) to the delivered page
	 */
	public function after() {
		
		if ($this->auto_render && $this->config->loaded()) {
			
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