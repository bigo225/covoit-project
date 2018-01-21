<?php
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

	//on recupère les valeurs
	$depart = $_POST['depart'];
	$arrivee = $_POST['arrivee'];
	$date_depart = $_POST['date_depart'];
	$id_trajet = $_POST['id_trajet'];
	$id_personne = $_SESSION['id'];

	$query=$db->prepare('INSERT INTO participation (id_personne, id_trajet)
						        VALUES (:id_personne, :id_trajet)');

						   	$query->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
						    $query->bindValue(':id_trajet', $id_trajet, PDO::PARAM_INT);
						    $query->execute();

	echo $depart;
	//$id_personne = $_SESSION['id'];
	?>