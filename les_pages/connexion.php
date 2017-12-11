<?php 
	session_start(); 
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
			<?php
				if (!isset($_POST['mail'])){
				echo '
				<form action="./connexion.php" method="post" accept-charset="utf-8">
					<input name="mail" type="text" id="mail" placeholder="E-mail" required /><br />
					<input type="password" name="password" id="password" placeholder="Mot de passe" required />

					<p><input type="submit" value="Connexion" /></p></form>

					<a href="./mdpOublie.php">mot de passe oublié ?</a>

					<a href="./inscription.php">je ne suis pas encore inscrit ?</a>
					
				</form>';
				}
				else 
				{
				        $query=$db->prepare('SELECT mail,mdp,id
				        FROM personne WHERE mail = :mail');
				        $query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
				        $query->execute();
				        $data=$query->fetch();
					if ($data['mdp'] == md5($_POST['password'])) // Acces OK !
					{
					    $_SESSION['mail'] = $data['mail'];
					    $_SESSION['id'] = $data['id'];
					    header('Location: ../index.php'); 
					}
					else // Acces pas OK !
					{
					    echo ($message = '<p>Une erreur s\'est produite 
					    pendant votre identification.<br /> Le mot de passe ou le pseudo 
				            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
					    pour revenir à la page précédente
					    <br /><br />Cliquez <a href="./index.php">ici</a> 
					    pour revenir à la page d accueil</p>');
					}
				    $query->CloseCursor();

				}    

			?>

			</div>

		</body>
	
	</html>