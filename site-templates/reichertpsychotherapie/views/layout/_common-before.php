<?
	/************************************************************************************
	 *  weirdbird CMS
	 *  Template:  Reichert-Psychotherapie
	 *  Purpose:    3 column article float Layout
	 *  Variables the cms backend has to deliver:
	 *  $currentStructure  string    Name of the structure currently in use
	 * $structures          array    Array of structure objects
	 * $structureOptions    array    object containing structure
	 * $currentArticle      string    Name of the article currently in use
	 *  $columnContent      array    Array of strings containing the column html's
	 *  $system            array    Array of string containing system values
	 *  $styles            array    Array of strings containing stylesheet files
	 * $scripts            array    Array of strings containing scripts
	 *  $externalScripts    array    Array of strings containing script URI's
	 ************************************************************************************/
?>

<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta
			http-equiv="X-UA-Compatible"
			content="IE=edge,chrome=1">
		<title><?= $system['companyname'].', '.$system['info'] ?></title>
		<meta
			name="author"
			content="Thomas Lack" />
		<meta
			name="description"
			content="">
		<meta
			name="keywords"
			content="Therapie, Psychotherapie, Angermünde, Verhaltenstherapie, VT, Privatpraxis, Privatpatient, Privatsitz" />
		<meta
			name="robots"
			content="index" />
		<meta
			name="viewport"
			content="width=device-width">

		<?
			// stylesheet files are loaded at the beginning of the page
			// js files are prepackaged and loaded at the end of the loading process -> see _common-after.php
			foreach ($styles as $file) {
				echo HTML::style($file), "\n";
			}
		?>
	</head>

	<body>

		<!-- mobile fullscreen navigation overlay -->
		<div class="nav-mobile-overlay hidden">
			<i class="fas fa-times overlay-close"></i>

			<div class="overlay-content">
				<?php
					$pagelanguage = ($system["pagelanguage"] !== NULL) ? $system["pagelanguage"]."/" : "";

					foreach ($structures as $structure) {
						if ($structure->mainnavigation) {
							echo "<a href='/".$pagelanguage.strtolower($structure->title)."'>"
								.$structure->description
								."</a>";
						}
					}

					echo "<a href='/".$pagelanguage."impressum' class='overlay-impressum overlay-bottom'>Impressum</a>";
					echo "<a href='/".$pagelanguage."datenschutz' class='overlay-datenschutz overlay-bottom'>Datenschutz</a>";
				?>
			</div>
		</div>

		<!-- ### content + footer ### -->
		<div class="container">

			<!-- site navigation mobile / tablet -->
			<div class="nav-mobile">
				<i class="fas fa-bars activate-menu"></i>
				<div class="nav-header">
					<div class="name">Sonja Reichert</div>
					<div class="occupation">Psychologische Psychotherapeutin</div>
					<div class="location">Angermünde</div>
				</div>
			</div>

			<!-- site navigation desktop -->
			<div class="nav">
				<div class="logo">
					<div class="name">Sonja Reichert</div>
					<div class="occupation">Psychologische<br>Psychotherapeutin</div>
					<span class="location">Angermünde</span>
				</div>

				<nav>
					<ul>
						<?php
							foreach ($structures as $structure) {
								if ($structure->mainnavigation) {
									$listItem = "<li "
										.(($currentStructure == "" || $structure->title == $currentStructure) ? "class='active'" : "")
										.">"
										."<a href='/".(($system["pagelanguage"] !== NULL) ? $system["pagelanguage"]."/" : "").strtolower($structure->title)."'>"
										."<span class='nav-link-text'>".$structure->description."</span>"
										."<i class='fas fa-arrow-right'></i>"
										."</li>"
										."</a>";

									echo $listItem;
								}
							}
						?>
					</ul>
				</nav>

				<div class="legal-wrapper">
					<?php
						$pagelanguage = ($system["pagelanguage"] !== NULL) ? $system["pagelanguage"]."/" : "";

						echo "<a href='/".$pagelanguage."impressum'>Impressum</a>";
						echo "<a href='/".$pagelanguage."datenschutz'>Datenschutz</a>";
					?>
				</div>
			</div>

			<div class="content">
