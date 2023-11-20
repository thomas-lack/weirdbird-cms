<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Karmeliterschule
*	Purpose:	Contact module
*
*	Variables the cms backend has to deliver:
* 	$articles				array 		Array of ORM objects representing a row in the 
*										'articles' database table (possibly null if no 
*										articles are allowed for this column)
*	$module 				ORM object 	The current module row of the according db table
*	$mapping				ORM object 	Table row of the structure <-> module/column mapping
*	$column 				int 		Number of the column this view is rendered to
* 	$structureId 			int 		ID of the current structure
*
************************************************************************************/
?>

<h1>Schreiben Sie uns...</h1>

<div id="contact_form">
	<br>
	<h3>Ihre Email Adresse:</h3>
	<input type="text" value="" name="frmEmail" maxlength="60" size="40">
	<br>
	<div id="contact_form_email_error">Bitte geben Sie eine korrekte Email Adresse an.</div>
	<br>
	<h3>Ihre Nachricht:</h3>
	<textarea name="frmText" cols="43" rows="28"></textarea>
	<br>
	<div id="contact_form_message_error">Bitte geben Sie eine Nachricht ein.</div>
	<br>
	<input type="submit" value="Nachricht schicken" class="submit">
</div>

<div id="contact_form_success">
	<p>&nbsp;</p>
	<p align=center>
		<div id="contact_form_butterfly"></div>
		<h2 align=center>
			Vielen Dank f&uuml;r Ihre Nachricht!<br>
			Wir bem&uuml;hen uns um eine schnelle Bearbeitung.
		</h2>
	</p>
</div>

<div id="contact_form_failure">
	<p>&nbsp;</p>
	<p align=center>
		<h2 align=center>
			<p>Leider ist beim Versenden der Nachricht ein <span style="color:red;">Fehler</span> aufgetreten.</p>
		</h2>
		<p>Bitte versuchen Sie es zu einem sp&auml;teren Zeitpunkt erneut oder schicken Sie eine Email an 
		die angegebenen Kontaktadressen.</p>
		<p>Vielen Dank f&uuml;r Ihr Verst&auml;ndnis.</p>
	</p>
</div>
