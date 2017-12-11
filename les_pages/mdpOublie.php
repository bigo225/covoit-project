<?php 
	//session_start();
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
		<?php  
			//$_SESSION['i']=0;

		
			if (!isset($_POST['mail'])) {
				echo'
			<div>
				<form action="mdpOublie.php" method="post" accept-charset="utf-8">
					<label>ENTREZ VOTRE ADRESSE MAIL ET VOUS RECEVREZ VOTRE MOT DE PASSE</label><br />
					<input name="mail" type="text" id="mail" placeholder="E-mail" required /><br />
					

					<p><input type="submit" value="envoyer" /></p></form>

					<a href="./inscription.php">je ne suis pas encore inscrit ?</a>
					
				</form>

			</div>';
			}
			else {

					$_SESSION['i']=1;
					$query=$db->prepare('SELECT mail,mdp
				        FROM personne WHERE mail = :mail');
					$query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
		        	$query->execute();

		        	$data=$query->fetch();
		        
					if (isset($data['mdp'])) // Acces OK !
					{
					    
		
						$mail = $_POST['mail'];// //Déclaration de l'adresse de destination.

						if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.

						{

						    $passage_ligne = "\r\n";

						}

						else

						{

						    $passage_ligne = "\n";

						}

						//=====Déclaration des messages au format texte et au format HTML.

						$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP. mot de passe est :". $data['mdp'];

						$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>. mot de passe est :</body></html> ". $data['mdp'];

						//==========

						 

						//=====Création de la boundary

						$boundary = "-----=".md5(rand());

						//==========

						 

						//=====Définition du sujet.

						$sujet = "Hey mon ami !";

						//=========

						 

						//=====Création du header de l'e-mail.

						$header = "From: \"WeaponsB\"<angekragbe@gmail.com>".$passage_ligne;

						$header.= "Reply-to: \"WeaponsB\" <angekragbe@gmail.com>".$passage_ligne;

						$header.= "MIME-Version: 1.0".$passage_ligne;

						$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

						//==========

						 

						//=====Création du message.

						$message = $passage_ligne."--".$boundary.$passage_ligne;

						//=====Ajout du message au format texte.

						$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;

						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

						$message.= $passage_ligne.$message_txt.$passage_ligne;

						//==========

						$message.= $passage_ligne."--".$boundary.$passage_ligne;

						//=====Ajout du message au format HTML

						$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;

						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

						$message.= $passage_ligne.$message_html.$passage_ligne;

						//==========

						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

						//==========

						 

						//=====Envoi de l'e-mail.

						mail($mail,$sujet,$message,$header);
						echo $_POST['mail'];
						//==========

					}
					else
					{
						echo'<h1>adresse mail incorect</h1>
							<div>
								<form action="mdpOublie.php" method="post" accept-charset="utf-8">
									<label>ENTREZ VOTRE ADRESSE MAIL ET VOUS RECEVREZ VOTRE MOT DE PASSE</label><br />
									<input name="mail" type="text" id="mail" placeholder="E-mail" required /><br />
									

									<p><input type="submit" value="envoyer" /></p></form>

									<a href="./inscription.php">je ne suis pas encore inscrit ?</a>
									
								</form>

							</div>';
					}
			}
			

		?>

		</body>
	
	</html>