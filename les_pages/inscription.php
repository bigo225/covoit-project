<?php 
	include("../includes/bdd.php"); 
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
				<div>
					<a href="https://www.facebook.com/">inscription avec facebook</a>  <?php //recuperer l'adresse mail via facebook ?>
				</div>

				<div>
					<form action="./inscriptionReussie.php" method="post" accept-charset="utf-8">

						<label for="genre"><input type="radio" name="genre" value="Homme">Homme</label>  <label for="genre"><input type="radio" name="genre" value="Femme">Femme</label> <br>

						<input name="prenoms" type="text" id="prenoms" placeholder="Prénom" required /> <input name="nom" type="text" id="nom" placeholder="Nom" required /><br>

						<input name="email" type="text" id="email" placeholder="adresse mail" required /><br>
						<input type="password" name="password" id="password" placeholder="Mot de Passe(8 caractères au moins)" required /><br>
						<input type="password" name="confirmPassword" id="nconfirmPassword" placeholder="Confirmer le Mot de Passe" required /><br>
						
						<input type="tel" name="tel" id="tel" placeholder="n° tel" /><br>

						<select name="naissance" id="naissance">
							<option value="annee_naissance">Année de naissance</option>
							option
							<?php 
								for ($i=1999; $i >1917 ; $i--) { 
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
							 ?>
							
						</select><br>

						<input type="checkbox" name="choix1" value="" required><label for="choix1">j'accepte les conditions d'utilisations</label><br>

						<input type="submit" value="incription" />

						<a href="./connexion.php">deja inscrit ?</a>
					
					</form>

					

				</div>
				

			</div>

		</body>
	
	</html>