<?php 
	session_start(); 

?>
<!DOCTYPE html> 
	<html>

		<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
		<script src="todo_liste.js"></script>
		<link rel="stylesheet" type="text/css" href="todo.css">
		</head>

		<body>
		
			<div>
			<?php 
				if (!isset($_SESSION['mail'])) {
				echo '<a href="les_pages/connexion.php"><button  type="">connexion</button></a>
				<a href="les_pages/inscription.php"><button type="">inscription</button></a> 
				<a href="les_pages/rechercheTrajet.php"><button type="">rechercher un trajet</button></a>
				<a href="les_pages/proposerTrajet.php"><button type="">Proposer un trajet</button></a> '; 
			}
				// on affiche l'option profil à condition qu'il ai eu connexion et donc qu'une adresse mail est été renseignée
				if (isset($_SESSION['mail'])) { 
					echo '<a href="les_pages/rechercheTrajet.php"><button type="">rechercher un trajet</button></a>
						  <a href="les_pages/proposerTrajet.php"><button type="">Proposer un trajet</button></a>
						  <a href="les_pages/deconnexion.php"><button  type="">deconnexion</button></a>
						  <a href="les_pages/profil.php"><button  type="">Profil</button></a>';
					echo $_SESSION['mail'];
					//$_SESSION['mail']=null;
				}

				?>

			</div>

		</body>
	
	</html>
	<?php  ?>