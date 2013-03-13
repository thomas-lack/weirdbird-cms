<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert Schweitzer Schule
*	Purpose:	Google Map Module (prints current modules articles followed by a
*				google map with a marker set at the given point)
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

// 1st of all, we print the articles (without horizontal line as separator) provided 
// by the cms, afterwards the address field of the cms is visualized via google maps

if ($articles != null)
{
	for ($i=0; $i<count($articles); $i++)
	{
		$out = '<div id="article_' . $articles[$i]->id . '" class="article">'
			. $articles[$i]->content
			. '</div>'
			. "\n";

		echo $out;
	}	
}

$companyname = ORM::factory('System_Setting')->get_companyName();
$address = ORM::factory('System_Setting')->get_address();
if (is_string($address) && $address != '')
{
	$adr = urlencode($address);
	$name = urlencode($companyname);

	$out = '<iframe id="google-map-view" width="360" height="400"' 
		. ' src="http://maps.google.de/maps?hl=de&q=' . $adr . '+(' . $name . ')' . '&ie=UTF8&t=&z=15&output=embed"'
		. ' frameborder="0" scrolling="no" marginheight="0" marginwidth="0" >'
		. '</iframe>'
		. "\n"
		. '<br/><small>'
		. '<a href="http://maps.google.de/maps?f=q&source=embed&hl=de&q=' . $adr . '&ie=UTF8&t=m&z=14&amp;iwloc=' . $name . '">'
		. 'Grö&szlig;ere Kartenansicht</a>'
		. '</small>'
		. "\n";

	//echo $out;
}



?>

<div id="mapview" companyname="<?= $companyname ?>" address="<?= $address ?>"></div>
<p>
	<a href="http://maps.google.de/maps?f=q&source=embed&hl=de&q=<?= urlencode($address) ?>&ie=UTF8&t=m&z=15">
		Grö&szlig;ere Kartenansicht
	</a>
</p>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>