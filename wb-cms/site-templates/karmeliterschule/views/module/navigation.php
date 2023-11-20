<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	Navigation column (overview)
*
*	Variables the cms backend has to deliver:
* 	$articles				array 		Array of ORM objects representing a row in the 
*										'articles' database table (possibly null if no 
*										articles are allowed for this column)
*	$module 				ORM object 	The current module row of the according db table
*	$mapping				ORM object 	Table row of the structure <-> module/column mapping
*	$column 				int 		Number of the column this view is rendered to
* 	$structureId 			int 		ID of the current structure
*
************************************************************************************/
?>
<h1>&Uuml;bersicht</h1>
<p>&nbsp;</p>
<p>
	<ul class="program_nav">
	<?
	$mappings = ORM::factory('StructureColumnMapping')
					->where('structure_id','=',$structureId)
					->where('column','!=',$column)
					->find_all();

	foreach($mappings as $m)
	{
		$tmpModule = ORM::factory('Module', $m->module_id);
		if ($tmpModule->allowarticles == 1)
		{
			$articles = ORM::factory('Article')
						->where('active','=',1)
						->where('structure_column_mapping_id','=',$m->id)
						->order_by('id','asc')
						->find_all();

			// since we have only two columns, this is the only result set
			// that we can possibly get -> hence we do not need to insert
			// sort another set of articles
			foreach ($articles as $a)
			{
				echo '<li><a href="#" id="ref_article_' . $a->id . '">' . $a->title . '</a></li>';
			}
		}
	}
	?>
	</ul>
</p>