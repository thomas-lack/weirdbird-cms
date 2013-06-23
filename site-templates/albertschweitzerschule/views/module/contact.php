<?
/************************************************************************************
*
*	weirdbird CMS
*	Template: 	Albert-Schweitzer-Schule
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
	<h5>Ihre Email Adresse:</h5>
	<input type="text" value="" name="frmEmail" maxlength="60">
	<br>
	
	<div id="contact_form_email_error" class="alert alert-block alert-error fade in">
		<i class="icon-warning-sign">&nbsp;</i> Bitte geben Sie eine korrekte Email Adresse an.
	</div>

	<br>
	<h5>Ihre Nachricht:</h5>
	<textarea name="frmText" rows="12"></textarea>
	<br>
	
	<div id="contact_form_message_error" class="alert alert-block alert-error fade in">
		<i class="icon-warning-sign">&nbsp;</i> Bitte geben Sie eine Nachricht ein.
	</div>
	
	<br>
	<input type="submit" value="Nachricht schicken" class="button button-rounded button-flat-action"> <!-- btn-primary ? -->
</div>

<div id="contact_form_success" class="alert alert-block">
	<h4 class="alert-heading"><i class="icon-ok">&nbsp;</i> Ihre Nachricht wurde versendet!</h4>
	<p>&nbsp;</p>
	<p>Vielen Dank f&uuml;r Ihre Nachricht!</p>
	<p>Wir bem&uuml;hen uns um eine schnelle Bearbeitung.</p>
</div>

<div id="contact_form_failure" class="alert alert-block alert-error">
	<h4 class="alert-heading"><i class="icon-warning-sign">&nbsp;</i> Leider ist beim Versenden der Nachricht ein Fehler aufgetreten!</h4>
	<p>&nbsp;</p>
	<p style="text-align:justify;">Bitte versuchen Sie es zu einem sp&auml;teren Zeitpunkt erneut oder schicken Sie eine Email an 
	die angegebenen Kontaktadressen.</p>
	<p>&nbsp;</p>
	<p>Vielen Dank f&uuml;r Ihr Verst&auml;ndnis.</p>
</div>