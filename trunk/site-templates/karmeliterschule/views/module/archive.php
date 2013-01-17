<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	Archive Module
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

$archive = array();
foreach($files as $f)
{
	$datetime = strtotime($f->creationdate);
	$year = date('Y', $datetime);
	$link = '/'.UPLOADDIR.'/'.UPLOADPDFDIR.'/'.$f->filename;

	if ($f->description == 'Schulzeitung')
	{
		$archive[$year][] = array(
			'link' => $link,
			'title' => 'Schulzeitung vom ' . date('d.m.Y', $datetime),
			'description' => null
		);
	}
	else if (substr_count($f->description, '###') > 0)
	{
		$dArr = explode('###', $f->description);
		
		$archive[$year][] = array(
			'link' => $link,
			'title' => $dArr[0],
			'description' => $dArr[1]
		);
	}
	else
	{
		$archive[$year][] = array(
			'link' => $link,
			'title' => $f->description,
			'description' => null
		);
	}
}
?>

<h1>Archiv</h1>
<p>&nbsp;</p>

<div id="archivewelcome">
	<h2>Willkommen</h2>
	<p>Im Archiv von Karmeliterschule.de finden Sie alle Berichte über unsere Projekte oder Aktionen, 
		die bisher unter dieser Adresse	veröffentlicht wurden.</p>
	<p>Zusätzlich finden Sie auch alle bisher digitalisierten Schulzeitungen.</p>
	<p>Wir wünschen Ihnen viel Spaß beim Stöbern.</p>
</div>

<?

foreach ($archive as $year => $yearArr)
{
	echo '<div id="archive_' . $year . '">';
	echo '<h2>Jahrgang ' . $year . '</h2>';
	echo '<ul class="bubble_ul">';
	
	foreach ($yearArr as $entry)
	{
		echo '<li>';
		echo '<a href="' . $entry['link'] . '" target="_blank">';
		echo $entry['title'];
		echo '</a>';

		if ($entry['description'] != null)
		{
			echo '<br/>';
			echo $entry['description'];
		}

		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>