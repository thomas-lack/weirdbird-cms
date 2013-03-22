<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert Schweitzer Schule
*	Purpose:	3 column article float Layout
*
*	Variables the cms backend has to deliver:
*	$currentStructure 		string 		Name of the structure currently in use
* 	$structures				array 		Array of structure objects
* 	$structureOptions		array 		object containing structure
*	$columnContent			array 		Array of strings containing the column html's
*	$system 				array 		Array of string containing system values
*	$styles 				array 		Array of strings containing stylesheet files
* 	$scripts 				array 		Array of strings containing scripts
*	$externalScripts		array 		Array of strings containing script URI's
*
************************************************************************************/
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $system['companyname'] .', '. $system['info'] ?></title>
    <meta name="author" content="Thomas Lack" />
    <meta name="description" content="">
    <meta name="keywords" content="Schule, Grundschule, Frankfurt, Main, F&ouml;rderstufe, Frankfurter Berg, Nachmittagsbetreuung" />
	<meta name="robots" content="index" />
    <meta name="viewport" content="width=device-width">

    <?
    foreach ($styles as $file)
    	echo HTML::style($file), "\n";
    foreach ($externalScripts as $file)
		echo '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
	foreach ($scripts as $file) 
		echo HTML::script($file), "\n";
    ?>
</head>

<body>
	 <!-- ### navigation bar (headline) ### -->
	 <div class="navbar">
		<div class="container navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="/" 
						<? 
						// if we have a logo the padding and margin of the brand box have to be adjusted
						echo (($system['brandimagepath'] == '') ? '' : 'style="padding:0;margin-left:0;min-width:310px;"'); 
						?>
					>
						<?
						// insert brand image if one is set in the cms system settings
						if (is_string($system['brandimagepath']) && $system['brandimagepath'] != '')
							echo '<img src="' . $system['brandimagepath'] . '"/>';
						?>
						<span class="brandname"><?= $system['companyname'] ?></span>
					</a>
					<ul class="nav pull-right">
						<?
						foreach ($structures as $s) {
							if ($s->title != 'Impressum') {
								$listItem = '<li ' 
									. (($currentStructure == '' || $s->title == $currentStructure) ? 'class="active"' : '') 
									. '>'
									. '<a href="/' . $s->title . '">'
									. $s->title
									. '</a></li>';
							
								echo $listItem;	
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- ### structure image (if available) ### -->
	<?
	if ($structureOptions->file_id != null)
	{
		$out = ''
			// a fallback image shall be shown if ie8 or less is used - since those browsers
			// are not capable of css3 command 'background-size'
			. '<!--[if lte IE 8]><div id="structure-header" class="header ie-fallback-headerimage"><![endif]-->'
			// otherwise show the image defined by the cms
			. '<!--[if gt IE 8]><!-->'
			. '<div id="structure-header" class="header" style="background:url(\'' . $structureOptions->get_imageFilePath() . '\') '
			. 'no-repeat center center; background-size:cover;" data-stellar-background-ratio="0.5">'
			. '<!--<![endif]-->'
			. "\n"
			. '<div class="container"><div class="headlinewrapper"><div class="headline">'
			. (($structureOptions->headline1 != null) ? '<h1>'.nl2br($structureOptions->headline1).'</h1><br/>' : '')
			. (($structureOptions->headline2 != null) ? '<h2>'.nl2br($structureOptions->headline2).'</h2><br/>' : '')
			. (($structureOptions->headline3 != null) ? '<h3>'.nl2br($structureOptions->headline3).'</h3><br/>' : '')
			. "\n"
			. '</div></div></div>'
			. "\n"
			. '</div>';	

		// add invisible tag that can be shown if the viewport is too small and has to be hidden
		$out2 = ''
			. '<div id="structure-header-noimage">'
			. (($structureOptions->headline1 != null) ? '<h1>'.nl2br($structureOptions->headline1).'</h1>' : '')
			. (($structureOptions->headline2 != null) ? '<h2>'.nl2br($structureOptions->headline2).'</h2>' : '')
			. (($structureOptions->headline3 != null) ? '<h3>'.nl2br($structureOptions->headline3).'</h3>' : '')
			. '</div>';
		
		echo $out;
		echo $out2;
	}
	?>

	<!-- ### content + footer ### -->
	<div class="container">

		<!-- Where am i navigation / picture description -->
		<div class="row infonavbar">
			<?
			// create a list of links for navigation convenience
			$out = '<a href="/' . $structures[0]->title . '">' . $structures[0]->title . '</a>';

			if ($currentStructure != $structures[0]->title)
				$out .= ' &nbsp; &raquo; &nbsp; <a href="/' . $currentStructure . '">' . $currentStructure . '</a>';

			// if an article was loaded directly, add another link
			if ($currentArticle != null)
				$out .= ' &nbsp; &raquo; &nbsp; <a href="/' . $currentStructure . '/' . $currentArticle 
					. '">' . $currentArticle . '</a>';
			
			echo $out;
			?>
			<div class="pull-right imagedescription">
				<?= $structureOptions->backgroundDescription; ?>
			</div>
		</div>