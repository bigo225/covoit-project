<?php
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

	//on recupère les valeurs
	$id_personne = $_SESSION['id'];