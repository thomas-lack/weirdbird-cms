<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert Schweitzer Schule
*	Purpose:	Archive module (prints all active pdf files as accordeon archive)
*
*	Variables the cms backend has to deliver:
* 	$articles				array 		Array of ORM objects representing a row in the 
*										'articles' database table (possibly null if no 
*										articles are allowed for this column)
* 	$articleRequest			boolean		normally FALSE, but if set to TRUE it indicates
* 										that the given articles shall be printed to the view
*										in any case
*	$module 				ORM object 	The current module row of the according db table
*	$mapping				ORM object 	Table row of the structure <-> module/column mapping
*	$column 				int 		Number of the column this view is rendered to
* 	$structureId 			int 		ID of the current structure
*	$structures 			array 		Array of ORM objects containing all structure
*										informations
*
************************************************************************************/

// get all active pdf files from the db
$files = ORM::factory('File')
			->where('active','=','1')
			->where('type','=','application/pdf')
			->order_by('creationdate', 'desc')
			->find_all();

// group files into years
$years = array();
foreach($files as $f)
{
	// extract the current files year of creation
	$datetime = strtotime($f->creationdate);
	$year = date('Y', $datetime);

	// add new array if year is not remembered until now
	if (!isset($years[$year]))
		$years[$year] = array();

	// add the file information object to the current years array
	array_push($years[$year], $f);
}

// check, if we have an pdf icon
$icon = ORM::factory('File')
			->where('description','=','pdf icon')
			->find();
if ($icon->filename != null)
	$icon = '<img src="/' .UPLOADDIR.'/'.UPLOADIMAGEDIR.'/'.$icon->filename . '" alt="[pdf]"/>';
else
	$icon = null;
?>

<h1>Dokumentarchiv</h1>
<p style="text-align:justify;">
	Nachfolgend finden Sie ein &Uuml;bersicht aller Dokumente, die von der Albert-Schweitzer-Schule ver&ouml;ffentlicht
	wurden. 
</p>

<!-- use twitter bootstrap accordion to display the pdf archive information nicely -->
<div class="accordion" id="pdfarchive">
	<?
	$out = '';
	foreach ($years as $year => $fileObjects)
	{
		$out .= '<div class="accordion-group">'
				. "\n"
				. '<div class="accordion-heading">'
				. "\n"
				. '<a class="accordion-toggle" data-toggle="collapse" data-parent="#pdfarchive" href="#collapse' . $year . '">'
				. 'Jahrgang ' . $year
				. '</a>'
				. "\n"
				. '</div><!-- End of accordion-heading -->'
				. "\n"
				. '<div id="collapse' . $year . '" class="accordion-body collapse">'
				. "\n"
				. '<div class="accordion-inner">'
				. "\n";

		// add current years document files
		$isFirst = true;
		foreach ($fileObjects as $f)
		{
			if ($isFirst)
				$isFirst = false;
			else
				$out .= '<hr style="margin:10px 0;"/>' . "\n";

			$link = '/'.UPLOADDIR.'/'.UPLOADPDFDIR.'/'.$f->filename;

			$out .= '<p>'
					. (($icon != null) ? $icon . ' ' : '')
					. '<a href="' . $link . '">'
					. $f->description 
					. '</a>'
					. ' ('
					. date('d.m.Y', strtotime($f->creationdate))
					. ')'
					. '</p>'
					. "\n";
		}

		$out .= '</div><!-- End of accordion-inner -->'
				. "\n"
				.'</div><!-- End of accordion-body -->'
				. "\n"
				. '</div><!-- End of accordion-group -->';
	}

	echo $out;
	?>
</div>

<p style="text-align:justify;" class="well">
	<small>* S&auml;mtliche Dokumente liegen im pdf-Format vor. Sollten Sie die Dokumente nicht automatisch &ouml;ffnen
	k&ouml;nnen, finden Sie an <a href="http://www.adobe.de/products/acrobat/readstep.html">an dieser Stelle</a> die
	kostenlose Version des Adobe Reader, der zur Betrachtung von pdf Dateien genutzt werden kann.</small>
</p>
