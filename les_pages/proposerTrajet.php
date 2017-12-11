<?php 
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");

?>
<!DOCTYPE html> 
	<html>

		<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
		<script src="../js/app.js"></script>
		<script src="../js/controllers/proposeTrajetCtrl.js"></script>
		<link rel="stylesheet" type="text/css" href="todo.css">
		</head>

		<body ng-app="ngCovoit">
		
			<div ng-controller="proposeTrajetCtrl">
				
				
					<form action="./proposeTrajetOk.php"  method="post" accept-charset="utf-8">
						<div>
							<fieldset>
								<legend><input type="checkbox" name="" value="" ng-model="checkRetour">Aller-Retour</legend>
								<fieldset>
									
									<label> Ville Départ <input type="text" name="villeAD" value=""></label>
									<label> Ville Arrivée <input type="text" name="villeAA" value=""></label><br><br>
									<label> Tarif par personne <input type="text" name="tarif" value=""></label>
									<label> Nombre de places proposées <input type="number" min="1" max="4" name="nbrPlace" value="3"></label>
								</fieldset><br>

								<label> Ajouté un trajet ... </label>
								<input type="text" name="intermediaire1" value="" placeholder="Ville" ng-if="dataset1[0]">
								<input type="text" name="intermediaire2" value="" placeholder="Ville" ng-if="dataset1[1]">
								<input type="text" name="intermediaire3" value="" placeholder="Ville" ng-if="dataset1[2]">
								<input type="text" name="intermediaire4" value="" placeholder="Ville" ng-if="dataset1[3]">
								<button type="button" ng-click = "add()">+</button><button type="button" ng-click = "rmv()">-</button>
								<br>								

								<fieldset>
									<legend>Date Aller</legend>
									<label> date </label><input type="date" name="dateA" value="">
									<label> heure <input type="time" name="heureA" value=""></label>
									<label> Estimation du trajet en heure <input type="time" name="dureeA" value=""><labe>
								</fieldset><br>

								<div ng-show = "checkRetour">
								<fieldset>
									<legend>Date Retour</legend>
									<label> date </label><input type="date" name="dateR" value="">
									<label> heure <input type="time" name="heureR" value=""></label>
									<label> Estimation du trajet <input type="time" name="dureeR" value=""><label>
								</fieldset><br>
								</div>
								
							</fieldset>
						<input type="submit" name="" value="ENREGISTRER">
					
						</div>
		
					</form><br>

					<a href="./rechercheTrajet.php"><button type="button">Rechercher un trajet</button></a>
					
						

				<?php 
				

				?>

				<div>

					
				</div>

			</div>

		</body>
	
	</html>