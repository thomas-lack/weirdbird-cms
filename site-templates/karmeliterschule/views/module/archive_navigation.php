<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	Archive navigation Module
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
$files = ORM::factory('file')
			->where('active','=',1)
			->where('type','=','application/pdf')
			->order_by('creationdate','desc')
			->find_all();
$years = array();
foreach ($files as $f)
{
	$datetime = strtotime($f->creationdate);
	$years[] = date('Y', $datetime);
}
$years = array_unique($years);
?>

<h1>&Uuml;bersicht</h1>
<p>&nbsp;</p>

<p>
	<ul class="program_nav">
		<li><a href="#" id="ref_archive_all">Gesamt&uuml;bersicht</a></li>

		<?
		foreach ($years as $year)
		{
			echo '<li>';
			echo '<a href="#" id="ref_archive_' . $year . '">Jahrgang ' . $year . '</a>';
			echo '</li>';	
		}
		?>
		
	</ul>
</p>