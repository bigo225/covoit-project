<?php 
	session_start(); 
	include("../includes/bdd.php");
	include ("../includes/fonctions.php");
	//$_SESSION['i']=null;
	//$_SESSION['i'] = (isset($_SESSION['i'])) ? $_SESSION['i'] : null;
	
	// la partie qui suit gère la mise  à jour de l'information personnelle du client
	if (isset($_POST['nom']) && isset($_POST['prenoms']) && isset($_POST['email']) && isset($_POST['naissance']) && isset($_POST['tel'])){
		echo $_SESSION['mail'];
		modifier($_POST['nom'], $_POST['prenoms'], $_POST['email'], $_POST['naissance'], $_POST['tel']);// fonction qui met à jour les données de l'utilisateur
		$_SESSION['i'] = null;
	}

	$query=$db->prepare('SELECT *
				        FROM personne WHERE id = :id');
	$query->bindValue(':id',$_SESSION['id'], PDO::PARAM_INT);
	$query->execute();
	$data=$query->fetch(); // $data à toutes les données du client connecté

	//la partie qui suit est pour la gestion en php de l'avatar(la photo de profil)
	if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){
		$taillemax = 2097152; // represente 2 megaoctet
		$extensionsValides = array('jpg','gif','png','jpeg');

		if ($_FILES['avatar']['size'] <= $taillemax) {
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			
			if (in_array($extensionUpload, $extensionsValides)) {
				$chemins = "../membres/avatars/".$_SESSION['id'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemins);

				if ($resultat) {
					$requpdateavatar = $db->prepare('UPDATE personne SET avatar = :avatar WHERE id = :id');
					$requpdateavatar->bindValue(':avatar',$_SESSION['id'].".".$extensionUpload, PDO::PARAM_STR);
					$requpdateavatar->bindValue(':id',$_SESSION['id'], PDO::PARAM_INT);
					$requpdateavatar->execute();

					//header('Location: profil.php?id='.$_SESSION['id']);
				}
				else{
					$msg = " Erreur lors de l'importation de votre photo de profil";
				}
			}
		}
		else {
			$msg = "Votre photo ne doit pas depasser 2 Mo";
		}

	}

	
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
				<ul>
					<li>photo</li>
					<li>infos pers</li>
					<li>préférence</li>
					<li>vehicules</li>
					<li>vérifications</li>
				</ul>		
			</div>
			<div>
				<div>
					<img src="../membres/avatars/<?php echo $data['avatar']; ?>" width= "150" alt = "photo de profil">		
				</div>
				<form action="profil.php" method="post" enctype="multipart/form-data">
					<label>Veuillez télécharger votre photo de profil. Mannci</label><br>
					<input type="file" name="avatar">
					<input type="submit" name="Bavatar" value="enrégistré">
				
				</form>
				
			</div>

				<div>  
				<form action="./profil.php" method="post" accept-charset="utf-8">

						<input name="prenoms" type="text" id="prenoms" placeholder="Prénom" value="<?php echo $data['prenoms']; ?>" required /> <input name="nom" type="text" id="nom" placeholder="Nom" value="<?php echo $data['nom']; ?>" required /><br>

						<input name="email" type="text" id="email" placeholder="adresse mail" value="<?php echo $data['mail']; ?>" required /><br>
						

						<input type="tel" name="tel" id="tel" placeholder="n° tel" value="<?php echo $data['telephone']; ?>" /><br>


						<label for="naissance">année de naissance

						<select name="naissance" id="naissance">
							<option ><?php echo $data['annee_naissance']; ?></option>
							option
							<?php 
								for ($i=1999; $i >1917 ; $i--) { 
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
							 ?>
							
						</select></label><br>

						<input type="submit" value="enrégistrer" />
					
					</form>
					</div>
					
			<div>
				
			</div>

			<div>
				
			</div>

		</body>
	
	</html>