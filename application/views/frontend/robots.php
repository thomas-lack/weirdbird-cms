<?
/**
*	robots.txt generator
* 
*	disallowed directories: $disallowedDirectories
*/

$baseUrl = URL::base(true, true);
$baseUrl = str_replace('index.php/', '', $baseUrl);

$out = "User-agent: *\n";

foreach ($disallowedDirectories as $d) {
	$out .= "Disallow: /" . $d . "\n";
}

$out .= "Sitemap: " . $baseUrl . "sitemap.xml";

// just to make sure no inappropriate character is left in the output string...
UTF8::clean($out);

echo $out;
?>