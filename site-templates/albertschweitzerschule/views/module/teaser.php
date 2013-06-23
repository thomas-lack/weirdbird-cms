<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert Schweitzer Schule
*	Purpose:	Teaser Module (if an article has a teaser it generates the teaser text 
				+ link, otherwise the standard article content is printed)
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
if ($articles != null)
{
	// identify the current structure for later link generation
	$currentStructure = null;
	foreach ($structures as $s)
	{
		if ($s->id == $structureId)
		{
			$currentStructure = $s;
			break;
		}	
	}

	// print article- and / or teaser-content
	for ($i=0; $i<count($articles); $i++)
	{
		// is a teaser given (and no request for direct printing indicated)? print it
		if (!$articleRequest && $articles[$i]->teaser != null && $articles[$i]->teaser != '') 
		{
			$link = '/' . $currentStructure->title . '/';
			// if no article title was given add the article id to the link
			if ($articles[$i]->title == null)
				$link .= $articles[$i]->id;
			// otherwise add the article title to the link for better readability
			else
				$link .= $articles[$i]->title;

			$out = '<div id="teaser_' . $articles[$i]->id . '" class="article-teaser">'
				. $articles[$i]->teaser
				. '<a class="button button-rounded button-flat-action button-small" href="' . $link . '">Weiterlesen &raquo;</a>'
				. '</div>'
				. "\n";
		}
		// otherwise print the article
		else 
		{ 
			$out = '<div id="article_' . $articles[$i]->id . '" class="article">'
				. $articles[$i]->content
				. '</div>'
				. "\n";
		}

		echo $out;

		if ($i < count($articles) - 1)
			echo '<hr/>' . "\n";
	}	
}
?>