<?php
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

	//on recupère les valeurs
	$depart = $_POST['depart'];
	$arrivee = $_POST['arrivee'];
	$date_depart = $_POST['date_depart'];

	//$id_personne = $_SESSION['id'];
	?>
	
	<div>
		<?php 
		$query=$db->prepare('SELECT * FROM trajet WHERE ville_depart= :depart AND ville_arriver= :arrivee AND date_depart= :date_depart');
						    
						    $query->bindValue(':depart', $depart, PDO::PARAM_STR);
						    $query->bindValue(':arrivee', $arrivee, PDO::PARAM_STR);
						    $query->bindValue(':date_depart', $date_depart, PDO::PARAM_STR);
						    $query->execute();

						    $data=$query->fetch();

						    foreach ($data as $key) {
						    		echo $key;
						    		echo '<br>';
						    	}

						    if ($data['est_complet'] != 0) {
						    	# code...
						    	foreach ($data as $key) {
						    		echo $key;
						    	}
						    	
						    }
		 ?>
		
	</div>
	