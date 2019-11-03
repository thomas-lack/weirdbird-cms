<h1>Vorlagen</h1>
<?

	echo "<h2>Ben&ouml;tigte Dokumente f&uuml;r die Kostenerstattung</h2>";

	$kostenerstattungFiles = ORM::factory("File")
		->where("active", "=", "1")
		->where("type", "=", "application/pdf")
		->where("description", "like", "kostenerstattung%")
		->order_by("creationdate", "desc")
		->find_all();

	echo "<ul class='file-list'>";
	foreach ($kostenerstattungFiles as $file) {
		$link = "/" . UPLOADDIR . "/" . UPLOADPDFDIR . "/" . $file->filename;
		$description = trim(str_replace("Kostenerstattung - ", "", $file->description));
		echo "<li><a href='$link'>$description</a></li>";
	}
	echo "</ul>";

	echo "<h2>Allgemeine Informationen &uuml;ber Psychotherapie</h2>";

	$allgemeineInformationenFiles = ORM::factory("File")
		->where("active", "=", "1")
		->where("type", "=", "application/pdf")
		->where("description", "like", "allgemeine informationen%")
		->order_by("creationdate", "desc")
		->find_all();

	echo "<ul class='file-list'>";
	foreach ($allgemeineInformationenFiles as $file) {
		$link = "/" . UPLOADDIR . "/" . UPLOADPDFDIR . "/" . $file->filename;
		$description = trim(str_replace("allgemeine Informationen - ", "", $file->description));
		echo "<li><a href='$link'>$description</a></li>";
	}
	echo "</ul>";
?>
