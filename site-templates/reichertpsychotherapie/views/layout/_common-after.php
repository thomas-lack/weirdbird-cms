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
