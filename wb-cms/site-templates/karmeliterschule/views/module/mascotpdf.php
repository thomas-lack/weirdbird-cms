<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	School mascot with speech bubble Module
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

// Please note: the description field for Project pdf files contains 2 strings
// separated by "###"
//
// e.g. "Projektwoche 2011###In diesem Jahr ging es um das Thema Gesundheit."
//
// Schulzeitung pdf files have only "Schulzeitung" as description as defined by the author.
$files = ORM::factory('File')
			->where('active','=','1')
			->where('type','=','application/pdf')
			->order_by('creationdate','desc')
			->find_all();

$path = '/'.UPLOADDIR.'/'.UPLOADPDFDIR.'/'; // as defined in index.php
?>

<div id='karmi'>
	<div id='karmiWelcome'>
		<br/><br/>
		<p>Hallo, mein Name ist Karmi!</p>
		<p>Ich bin der Namenspatron der Schulzeitung.</p>
		<p>Gerade lese ich die letzte Ausgabe der Karmi-Post!</p>
	</div>

	<h1>Projekte</h1>
	<?
		$counter = 0;
		foreach($files as $f)
		{
			if ($counter == 9)
				break;

			// check for defined project description schema
			if (strpos($f->description, '###') !== false)
			{
				$dArr = explode('###', $f->description);
				echo '<div class="pdficon">';
				echo '<a href="' . $path.$f->filename . '" bubbletext="' . $dArr[1] . '">' . $dArr[0] . '</a>';
				echo '</div>';

				$counter++;
			}
		}
	?>

	<p>&nbsp;</p>
	<h1>Schulzeitung</h1>
	<?
		$counter = 0;

		foreach($files as $f)
		{
			if ($counter == 6)
				break;

			if ($f->description == 'Schulzeitung')
			{
				$date = strtotime($f->creationdate);
				$date = date('d.m.Y', $date);
				echo '<div class="pdficon">';
				echo '<a href="' . $path.$f->filename . '">Schulzeitung ' . $date . '</a>';
				echo '</div>';

				$counter++;
			}
		}
	?>
</div>