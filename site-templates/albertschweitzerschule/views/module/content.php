<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert Schweitzer Schule
*	Purpose:	Content Module
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
if ($articles != null)
{
	for ($i=0; $i<count($articles); $i++)
	{
		$out = '<div id="article_' . $articles[$i]->id . '" class="article">'
			. $articles[$i]->content
			. '</div>'
			. "\n";

		echo $out;

		if ($i < count($articles) - 1)
			echo '<hr/>' . "\n";
	}	
}
?>