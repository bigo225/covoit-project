<?php
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

	//on recupère les valeurs
	if (!isset($_SESSION['id'])) {
		header('Location: ./connexion.php');

	}


	$id_personne = $_SESSION['id'];

	//pour l'aller
	$villeAD = $_POST['villeAD'];
	//$intermediaire1 = null;
	$villeAA = $_POST['villeAA'];
	$heureA = $_POST['heureA'];
	$dateA = $_POST['dateA'];
	$dureeA = $_POST['dureeA'];
	$tarif = $_POST['tarif'];
	$nbr_place = $_POST['nbrPlace'];

	// Gestion de l'heure
	$h =  strtotime($dureeA);
	$h2 = strtotime($heureA);
	 
	$minute = date("i", $h2);
	//$second = date("s", $heureA);
	$hour = date("H", $h2);
	 
	$convert = strtotime("+$minute minutes", $h);
	//$convert = strtotime("+$second seconds", $convert);
	$convert = strtotime("+$hour hours", $convert);
	$heure_arriverA = date('H:i:s', $convert);
	

	$intermediaire1 = (isset($_POST['intermediaire1'])) ? $_POST['intermediaire1'] : null ;
	$intermediaire2 = (isset($_POST['intermediaire2'])) ? $_POST['intermediaire2'] : null ;
	$intermediaire3 = (isset($_POST['intermediaire3'])) ? $_POST['intermediaire3'] : null ;
	$intermediaire4 = (isset($_POST['intermediaire4'])) ? $_POST['intermediaire4'] : null ;
	//echo $intermediaire4;


	$query=$db->prepare('INSERT INTO trajet (id_personne, ville_depart, ville_arriver, date_depart,ville_intermediaire1,ville_intermediaire2,ville_intermediaire3,ville_intermediaire4,heure_depart, heure_arriver,tarif,nbr_place)
						        VALUES (:id_personne, :ville_depart, :ville_arriver, :date_depart,:ville_intermediaire1,:ville_intermediaire2,:ville_intermediaire3,:ville_intermediaire4, :heure_depart, :heure_arriver,:tarif,:nbr_place)');
						    
						   	$query->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
						    $query->bindValue(':ville_depart', $villeAD, PDO::PARAM_STR);
						    $query->bindValue(':ville_arriver', $villeAA, PDO::PARAM_STR);
						    $query->bindValue(':date_depart', $dateA, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire1', $intermediaire1, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire2', $intermediaire2, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire3', $intermediaire3, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire4', $intermediaire4, PDO::PARAM_STR);
						    $query->bindValue(':heure_depart', $heureA, PDO::PARAM_STR);
						    $query->bindValue(':heure_arriver', $heure_arriverA, PDO::PARAM_STR);
						    $query->bindValue(':tarif', $tarif, PDO::PARAM_INT);
						    $query->bindValue(':nbr_place', $nbr_place, PDO::PARAM_INT);
						    $query->execute();

	// pour le Retour
	if (isset($_POST['dateR']) ){
		
		$dateR = $_POST['dateR'];


		$h =  strtotime($_POST['dureeR']);
		$h2 = strtotime($_POST['heureR']);
		 
		$minute = date("i", $h2);
		$hour = date("H", $h2);	 
		$convert = strtotime("+$minute minutes", $h);
		$convert = strtotime("+$hour hours", $convert);
		$heure_arriverR = date('H:i:s', $convert);

		$query=$db->prepare('INSERT INTO trajet (id_personne, ville_depart, ville_arriver, date_depart,ville_intermediaire4,ville_intermediaire3,ville_intermediaire2,ville_intermediaire1, heure_depart, heure_arriver,tarif,nbr_place)
						        VALUES (:id_personne, :ville_depart, :ville_arriver, :date_depart,:ville_intermediaire4,:ville_intermediaire3,:ville_intermediaire2,:ville_intermediaire1, :heure_depart, :heure_arriver,:tarif,:nbr_place)');
						    
						   	$query->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
						    $query->bindValue(':ville_depart', $villeAA, PDO::PARAM_STR);
						    $query->bindValue(':ville_arriver', $villeAD, PDO::PARAM_STR);
						    $query->bindValue(':date_depart', $dateR, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire4', $intermediaire1, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire3', $intermediaire2, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire2', $intermediaire3, PDO::PARAM_STR);
						    $query->bindValue(':ville_intermediaire1', $intermediaire4, PDO::PARAM_STR);
						    //$query->bindValue(':date_arriver', $date_arriver, PDO::PARAM_DATE);
						    $query->bindValue(':heure_depart', $_POST['heureR'], PDO::PARAM_STR);
						    $query->bindValue(':heure_arriver', $heure_arriverR, PDO::PARAM_STR);
						    $query->bindValue(':tarif', $tarif, PDO::PARAM_INT);
						    $query->bindValue(':nbr_place', $nbr_place, PDO::PARAM_INT);
						    $query->execute();
	}



	echo '<a href="./proposerTrajet.php">retour à proposeTrajet</a>';
	$query->CloseCursor();

	echo "id = ".$id_personne." "."date_arriver = ".$dateA." "."heure_arriver = ".$heure_arriverR;

?>