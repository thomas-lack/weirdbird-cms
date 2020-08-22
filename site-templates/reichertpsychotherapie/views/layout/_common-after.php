		<!-- mobile fullscreen navigation overlay -->
		<div class="nav-mobile-overlay">
			<div class="overlay-content">
				<?php
					$pagelanguage = ($system["pagelanguage"] !== NULL) ? $system["pagelanguage"]."/" : "";

					$currentlyInRow = false;
					foreach ($structures as $structure) {

						$isSubNavItem = substr($structure->description, 0, 3) === "-> ";
						$description = str_replace("-> ", "", $structure->description);

						if ($structure->mainnavigation) {
							if ($isSubNavItem && !$currentlyInRow) {
								$currentlyInRow = true;
								echo "<div class='row'>";
							}
							if (!$isSubNavItem && $currentlyInRow) {
								$currentlyInRow = false;
								echo "</div>";
							}

							echo "<a href='/" . $pagelanguage . strtolower($structure->title) . "'>"
								. $description
								. "</a>";
						}
					}

					echo "<a href='/".$pagelanguage."impressum' class='overlay-impressum overlay-bottom'>Impressum</a>";
					echo "<a href='/".$pagelanguage."datenschutz' class='overlay-datenschutz overlay-bottom'>Datenschutz</a>";
				?>
			</div>
		</div>

	</div><!-- div.content -->

	<?
	// including external javascript files
	foreach ($externalScripts as $file) {
		echo '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
	}

	// packaging all local javascript files and adding them to the output
	$outjs = '';
	foreach ($scripts as $file) {
		$outjs .= file_get_contents($file);
	}
	echo '<script type="text/javascript">' . $outjs . '</script>' . "\n";

	?>
</body>
