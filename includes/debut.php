<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>

	<?php 
	include ("../includes/fonctions.php");

	?>
	<?php
		//Si le titre est indiqué, on l'affiche entre les balises <title>
		echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Forum </title>';
	?>

	<meta charset="utf-8" />
	<link rel="stylesheet" media="screen" type="text/css" title="Design" href="../css/design.css" />
	<?php

		//Attribution des variables de session
		$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
		$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
		$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';
	?>
</head>