<?php
include("../includes/bdd.php"); 

						$email_erreur1 = NULL;
    					$email_erreur2 = NULL;

						// on recupere les valeurs
						$i=0;
					    $genre=$_POST['genre'];
					 	$nom = $_POST['nom'];
					 	$prenoms = $_POST['prenoms'];
					    $email = $_POST['email'];
					    $tel = $_POST['tel'];

					    $pass = md5($_POST['password']);
					    $confirm = md5($_POST['confirmPassword']);
					    $naissance = $_POST['naissance'] ;

    					//Vérification de l'adresse email

    					//Il faut que l'adresse email n'ait jamais été utilisée
					    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM personne WHERE mail =:mail');
					    $query->bindValue(':mail',$email, PDO::PARAM_STR);	
					    $query->execute();

					    $mail_free=($query->fetchColumn()==0)?1:0;// verifie s'il y'a deja des adresses du meme genre

					    $query->CloseCursor();
					    
					    if(!$mail_free)
					    {
					        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
					        $i++;
					    }

					    //On vérifie la forme maintenant
					    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
					    {
					        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
					        $i++;
					    }

					    if ($i==0)
						{
						   
						    $query=$db->prepare('INSERT INTO personne (nom, prenoms, mail, annee_naissance, genre, mdp, telephone)
						        VALUES (:nom, :prenoms, :email, :naissance, :genre, :pass, :telephone)');
						    //VALUES (":nom", ":prenoms", ":email", 19, ":genre", ":pass")');
						    /*try {
						    	$query->execute(array(
						    	'nom' => $nom,
						    	'prenoms' => $prenoms,
						    	'email' => $email,
						    	'naissance' => $naissance,
						    	'genre' => $genre,
						    	'pass' => $pass,

						    	 ));
						    	 	
						    } catch (Exception $e) {
						    	die('Erreur : ' . $e->getMessage());
						    }*/
						    

						   	$query->bindValue(':nom', $nom, PDO::PARAM_STR);
						    $query->bindValue(':prenoms', $prenoms, PDO::PARAM_STR);
						    $query->bindValue(':email', $email, PDO::PARAM_STR);
						    $query->bindValue(':naissance', $naissance, PDO::PARAM_INT);
						    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
						    $query->bindValue(':pass', $pass, PDO::PARAM_STR);
						    $query->bindValue(':telephone', $tel, PDO::PARAM_STR);
						    $query->execute();
						    //echo "nom: ".$nom." prenoms: ". $prenoms." mdp : ".$pass." naissance: ".$naissance ;
						    echo "<h1>INSCRIPTION REUSSIE <h1>";
						    
						    
						    
						    

						    //$query->CloseCursor();

						    //Et on définit les variables de sessions
						     /*   $_SESSION['pseudo'] = $pseudo;
						        $_SESSION['id'] = $db->lastInsertId(); ;
						        $_SESSION['level'] = 2;
						        $query->CloseCursor();*/
					    }
					    else {
					    	echo'<h1>Inscription interrompue</h1>';
					        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
					        echo'<p>'.$i.' erreur(s)</p>';
					        echo'<p>'.$email_erreur1.'</p>';
					        echo'<p>'.$email_erreur2.'</p>';
					    }
					    
					    
					 ?>