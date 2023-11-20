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

require_once('_common-before.php');
?>

<div class="column">
	<!-- column 1 -->
	<?= $columnContent[0] ?>
</div>

<? require_once('_common-after.php'); ?>
