<?
/**
*	Sitemap generator
* 
*	Reference: http://www.sitemaps.org/de/protocol.html
*
*	Structural infos: $structures
*	Language Mapping Table: $languages
*/

function createUrl($location, $editDate = null, $changeFreq = 'monthly', $priority = 0.5) {
	$ret = ""
		. "<url>\n"
		. "\t<loc>" . $location . "</loc>\n"
		// currently no edit date is saved via the cms
		. (($editDate != null) ? ("\t<lastmod>" . $editDate . "</lastmod>\n") : "")
		. "\t<changefreq>" . $changeFreq . "</changefreq>\n" // monthly | weekly | daily
		. "\t<priority>". $priority ."</priority>\n" // on small pages every page gets a standard priority of 0.5
		. "</url>\n";

	return $ret; 
}

$out = ""
	. "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
	. "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

// build base url with protocol (in case of nginx index.php routing, remove that entry)
$baseUrl = URL::base(true, true);
$baseUrl = str_replace('index.php/', '', $baseUrl);
$out .= createUrl($baseUrl, null, 'monthly', 1);


foreach ($structures as $s) {
	$location = $baseUrl . $languages[$s->language_id] . "/" . strtolower($s->title);
	$editDate = null;
	$changeFreq = 'monthly';
	$priority = (strtolower($s->title) == 'impressum' || strtolower($s->title) == 'disclaimer') ? 0.2 : 0.5;

	$out .= createUrl($location, $editDate, $changeFreq, $priority);
}

$out .= "</urlset>";

// just to make sure no inappropriate character is left in the output string...
UTF8::clean($out);

echo $out;
?>