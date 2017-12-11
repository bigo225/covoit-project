<?php
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

	//on recupère les valeurs
	//$id_personne = $_SESSION['id'];
	?>
	
	<div>
		<form action="resultatRecherche" method="post" accept-charset="utf-8">
			<input type="text" name="depart" placeholder="depart">
			<input type="text" name="arrivee" placeholder="arrivé">
			<input type="date" name="date_depart" placeholder="date du depart"><br><br>
			<button type="">rechercher</button>
		</form>
		
	</div>
	