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
* 	$currentArticle			string 		Name of the article currently in use
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
    // stylesheet files are loaded at the beginning of the page
    // js files are prepackaged and loaded at the end of the loading process -> see _common-after.php
    foreach ($styles as $file) {
    	echo HTML::style($file), "\n";
  	}
    ?>
</head>

<body>
	 <!-- ### navigation bar (headline) ### -->
	 <div class="navbar">
		<div class="container navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- collapsed menu button -->
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>
					<!-- branding -->
					<a class="brand" href="/<?= ($system['pagelanguage'] !== null) ? $system['pagelanguage'] . '/' : '' ?>" 
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
					<!-- nav menu entries -->
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<?
							foreach ($structures as $s) {
								if ($s->mainnavigation) {
									$listItem = '<li ' 
										. (($currentStructure == '' || $s->title == $currentStructure) ? 'class="active"' : '') 
										. '>'
										. '<a href="/' . (($system['pagelanguage'] !== null) ? $system['pagelanguage'] . '/' : '') . strtolower($s->title) . '">'
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
	</div>

	<!-- ### structure image (if available) ### -->
	<?
	if ($structureOptions->file_id != null)
	{
		$headlines = ''
			. (($structureOptions->headline1 != null) ? '<h1>'.nl2br($structureOptions->headline1).'</h1><br/>' : '')
			. (($structureOptions->headline2 != null) ? '<h2>'.nl2br($structureOptions->headline2).'</h2><br/>' : '')
			. (($structureOptions->headline3 != null) ? '<h3>'.nl2br($structureOptions->headline3).'</h3><br/>' : '');

		$ie8warning = ''
			. '<p><strong>Warnung!</strong> Sie scheinen den Internet Explorer 8 oder niedriger zu benutzen. '
  			. 'Das bedeutet Ihr Browser ist mehr als 5 Jahre alt, was ihn fehleranf&auml;llig, unsicher und '
  			. 'unf&auml;hig zur Darstellung moderner Webseiten macht.</p>'
  			. '<p>Bitte aktualisieren Sie Ihren Browser oder bitten Sie Ihren Administrator dies zu tun.</p>';

		// add standard visible block to the viewport
		$out = ''
			// a fallback image could be shown if ie8 or less is used by using css class .ie-fallback-headerimage
			// - since those browsers are not capable of css3 command 'background-size'
			// but instead we show a warning message and an empty hero unit
			. '<!--[if lte IE 8]>' 
				
			// the warning message
			. '<div class="container top-80">'
			. '<div class="alert hidden-phone">'
			. '<button type="button" class="close" data-dismiss="alert">&times;</button>'
  			. $ie8warning
			. '</div>'

			// the hero unit
			. '<div class="hero-unit hidden-phone">'
			. '<div><div>' // keep the number of closing div's equal to the number of opening div's
			. '<![endif]-->'
			// end of <IE8 comparison
			
			// otherwise show the image defined by the cms
			. '<!--[if gt IE 8]><!-->'
			. '<div class="header hidden-phone" style="background:url(\'' . $structureOptions->get_imageFilePath() . '\') '
			. 'no-repeat center center; background-size:cover;" data-stellar-background-ratio="0.5">'
			. "\n"
			. '<div class="container"><div class="headlinewrapper"><div class="headline">'
			. '<!--<![endif]-->'
			// end of >=IE8 comparison

			// show headline content	
			. $headlines
			. "\n"
			. '</div></div></div>'
			. "\n"
			. '</div>';	

		// add invisible block that can be shown if the viewport is too small and has to be hidden
		$out2 = ''
			. '<div class="hero-unit no-padding-lr center visible-phone">'
			. $headlines
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
			$out = '<a href="/' 
				. (($system['pagelanguage'] != null) ? $system['pagelanguage'] . '/' : '')
				. strtolower($structures[0]->title) . '">' 
				. $structures[0]->title . '</a>';

			if ($currentStructure != $structures[0]->title)
			{
				$out .= ' &nbsp; &raquo; &nbsp; <a href="/' 
					. (($system['pagelanguage'] != null) ? $system['pagelanguage'] . '/' : '')
					. strtolower($currentStructure) . '">' 
					. $currentStructure . '</a>';
			}

			// if an article was loaded directly, add another link
			if ($currentArticle != null)
			{
				$out .= ' &nbsp; &raquo; &nbsp; <a href="/' 
					. (($system['pagelanguage'] != null) ? $system['pagelanguage'] . '/' : '')
					. strtolower($currentStructure) . '/' . strtolower($currentArticle)
					. '">' . $currentArticle . '</a>';
			}
			
			echo $out;
			?>
			<div class="pull-right imagedescription">
				<?= $structureOptions->backgroundDescription; ?>
			</div>
		</div>