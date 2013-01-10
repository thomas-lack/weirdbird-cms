<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<title>
		<? echo $title; ?>
	</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<?
		foreach ($styles as $file => $type) 
			echo HTML::style($file, array('media' => $type)), "\n";
		foreach ($scripts as $file) 
			echo HTML::script($file), "\n";
	?>
</head>
<body>
	<!-- content is created via extjs viewport in weirdbird.js -->
</body>
</html>