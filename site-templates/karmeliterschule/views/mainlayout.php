<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	Main Layout
*
************************************************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>karmeliterschule.de - Grund- und Hauptschule in Frankfurt am Main</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="Thomas Lack" />
	<meta name="description" content="Karmeliterschule Frankfurt am Main" />
	<meta name="keywords" content="Schule, Grundschule, Frankfurt, Main, F&ouml;rderstufe, mitSprache, Karmi, Karmeliter, Gutleut, Bahnhof" />
	<meta name="robots" content="index" />
	
	<?
		foreach ($styles as $file) 
			echo HTML::style($file), "\n";
		foreach ($scripts as $file) 
			echo HTML::script($file), "\n";
	?>
	<!--[if lte IE 7]>
	<link href="site-templates/karmeliterschule/css/patches/patch_grids.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<style type="text/css">
		#main {padding: 10px 20px;}
	</style>
	
</head>
<body>
<div id="page_margins">
	<div id="page">
		<div id="javascriptWarning">
			<p>Bitte beachten Sie, dass Javascript aktiviert sein muss, um die volle Funktionalit&auml;t dieser Webseite zu garantieren!</p>
		</div>
		<div id="header">
			<div id="header_logo"></div>
			
			<div id="topnav">
				<!-- start: skip link navigation -->
				<a class="skip" href="#navigation" title="skip link">Skip to the navigation</a><span class="hideme">.</span>
				<a class="skip" href="#content" title="skip link">Skip to the content</a><span class="hideme">.</span>
				<!-- end: skip link navigation -->
				<a href="kontakt">Kontakt</a> | 
				<a href="impressum">Impressum</a></span> 
			</div>
		</div>
		<!-- begin: main navigation #nav -->
		<div id="nav"> <a id="navigation" name="navigation"></a>
			<!-- skiplink anchor: navigation -->
			<div id="nav_main">
				<ul>
					<? 
						foreach($structures as $s)
							echo '<li>' . $s . '</li>';
					?>
				</ul>
			</div>
		</div>
		<!-- end: main navigation -->
		<!-- begin: main content area #main -->
		<div id="main">
			<!-- begin: #col1 - first float column -->
			<div id="col1">
				<div id="col1_content" class="clearfix"> <a id="content" name="content"></a>
					
					
				
				</div>
			</div>

			<!-- end: #col1 -->
			<!-- begin: #col3 static column -->
			<div id="col3">
				<div id="col3_content" class="clearfix">
					
					
	
				</div>
				<div id="ie_clearing">&nbsp;</div>
				<!-- End: IE Column Clearing -->
			</div>
			<!-- end: #col3 -->
		</div>

		<!-- end: #main -->
		<!-- begin: #footer -->
		<div id="footer">
			<a href="kontakt">Kontakt</a> &nbsp; 
			<a href="impressum">Impressum</a> &nbsp; 
			<a href="http://www.stadtschulamt.stadt-frankfurt.de/">Stadtschulamt</a> &nbsp;
			<a href="http://dms.bildung.hessen.de/news/index.html">Bildungsserver Hessen</a> &nbsp;
		</div>
		<!-- end: #footer -->
	</div>
</div>
</body>
</html>