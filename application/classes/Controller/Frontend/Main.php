<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Main extends Controller_Template {
	
	public $template;
	public $config;
	public $structureRef;
	public $articleRef = null;
	public $langRef = null;
	public $pageLanguage = null;

	public function before() {
		// remember chosen language
		if ($this->request->param('language') != '')
		{
			$this->pageLanguage = strtolower($this->request->param('language'));
		}
		// if no language was chosen -> select the standard language given by the cms
		else
		{
			$this->pageLanguage = ORM::factory('System_Setting')->get_language()->shortform;
		}
		$this->langRef = ORM::factory('Language')->get_id_by_shortform($this->pageLanguage);
					
		// get first active template we find
		$this->config = ORM::factory('Template')->where('active','=','1')->find();
		
		// if none is found send an error
		if (!$this->config->loaded()) {
			$this->template = 'frontend/error';
			parent::before();
			$this->template->error = 'No template set to active.';
		}
		// otherwise start loading the template
		else 
		{
			$structures = ORM::factory('Structure')
				->where('active','=','1')
				->where('language_id', '=', $this->langRef)
				->order_by('position', 'asc')
				->find_all();
			
			// set the 1st structure as standard if none is given
			if ($this->structureRef === null)
			{
				$this->structureRef = $structures[0]->title;
			}

			// set layout
			$layout = null;
			$structureId = null;
			foreach ($structures as $s)
			{
				// enable also only lowercase structure names
				if (strtolower($s->title) == strtolower($this->structureRef))
				{
					// if the given url parameter was lowercase -> remap into our own structure title
					if ($s->title != $this->structureRef)
						$this->structureRef = $s->title;
					
					$layout = ORM::factory('Layout', $s->layout_id);
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
			// special case: an article was directly addressed via URL -> post it
			// as only article to the first possible column
			else if ($this->articleRef != null)
			{
				// is the current article reference an id ?
				if (is_numeric($this->articleRef))
				{
					$article = ORM::factory('Article', $this->articleRef);
				}
				// or a title string
				else
				{
					$article = ORM::factory('Article')
								->where('active','=', 1)
								->where('title','=', $this->articleRef)
								->find_all();
				}

				for ($i=0; $i < $layout->columns; $i++)
				{
					if ($i == 0)
					{
						$columnContent[] = $this->generateColumnContent(0, $structureId, $structures, $article);
					}
					else
					{
						$columnContent[] = $this->generateColumnContent($i, $structureId, $structures);
					}
				}
			}
			else {
				for ($i=0; $i < $layout->columns; $i++)
				{
					$columnContent[] = $this->generateColumnContent($i, $structureId, $structures);
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
				$this->template->currentArticle = $this->articleRef;
				$this->template->structures = $structures;
				$this->template->structureOptions = ORM::factory('Structure_Option')
														->where('structure_id','=',$structureId)
														->find();
				$this->template->columnContent = $columnContent;
				$this->template->system = $this->getSystemValues();
			}
		}
	}
	
	private function getSystemValues()
	{
		return array(
			'standardlanguage' => ORM::factory('System_Setting')->get_language(),
			'pagelanguage' => $this->pageLanguage,
			'contactemail' => ORM::factory('System_Setting')->get_email(),
			'companyname' => ORM::factory('System_Setting')->get_companyName(),
			'address' => ORM::factory('System_Setting')->get_address(),
			'info' => ORM::factory('System_Setting')->get_info(),
			'brandimagepath' => ORM::factory('System_Setting')->get_brandImagePath()
		);
	}

	/**
	 * Generate a html parse string of the given column
	 */
	private function generateColumnContent($column, $structureId, $structures, $articleRequest = null)
	{
		// get the mapping for column <-> module / articles
		$mapping = ORM::factory('StructureColumnMapping')
			->where('structure_id','=',$structureId)
			->where('column','=',$column)
			->find();

		// get the used module for this column
		$module = ORM::factory('Module', $mapping->module_id);

		// get the articles for this column
		$articles = null;
		if ($module->allowarticles == 1 && $articleRequest == null)
		{
			// if a language was selected only get those articles
			if ($this->langRef != null)
			{
				$articles = ORM::factory('Article')
					->where('active','=',1)
					->where('structure_column_mapping_id','=',$mapping->id)
					//->where('language_id','=',$this->langRef) // obsolete with implemented structure languages
					->order_by('position', 'asc')
					->find_all();
			}
			else
			{
				$articles = ORM::factory('Article')
					->where('active','=',1)
					->where('structure_column_mapping_id','=',$mapping->id)
					->order_by('position', 'asc')
					->find_all();
			}

			// enable lowercase addressing of articles (via teaser link)
		}
		else if ($articleRequest != null)
		{
			$articles = $articleRequest;
		}

		// was articleRequest set ?
		$articleRequest = ($articleRequest != null);

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
			->bind('articleRequest', $articleRequest)
			->bind('module', $module)
			->bind('mapping', $mapping)
			->bind('column', $column)
			->bind('structureId', $structureId)
			->bind('structures', $structures)
			->bind('pagelanguage', $this->pageLanguage);

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
			
			$loadfile = ORM::factory('Loadfile')
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