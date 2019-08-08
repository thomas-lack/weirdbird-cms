		<hr/>

		<footer>
			<p>
				<? 
				// display the name of the company
				echo $system['companyname'] . ',' . $system['info'];
				
				// add disclaimer legal info link according to page language
				if ($system['pagelanguage'] == 'de')
				{
					echo '<span class="pull-right"><a href="/de/impressum">Impressum</a></span>';
				}
				else if ($system['pagelanguage'] == 'en')
				{
					echo '<span class="pull-right"><a href="/en/disclaimer">Disclaimer</a></span>';
				}
				?>
			</p>
		</footer>
	</div>
	
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