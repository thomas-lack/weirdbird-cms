<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="description" content="Example Auth with ORM for Kohana 3.1" />
<meta name="author" content="Thomas Lack" />
<meta name="copyright" content="Copyright 2011 Thomas Lack." />
<meta name="language" content="de-DE" />
<title>WeirdBird cms login</title>
<link href="/assets/css/cms_login_screen.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div id="centerBox">
		<h5>
			<?
			if (!isset($headline))
				echo 'weirdbird cms // login';
			else
				echo $headline;
			?>
		</h5>
		<div id="content">
		    <?= $content; ?>
		</div>
	</div>
</body>
</html>