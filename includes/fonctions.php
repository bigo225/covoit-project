<?php
include ("../includes/constants.php");

				function  modifier($nom, $prenoms, $email, $naissance, $telephone){	
						include("../includes/bdd.php");
						//session_start();
						$email_erreur1 = NULL;
    					$email_erreur2 = NULL;
    					echo $email;
						// on recupere les valeurs
						$i=0;
					    
					 	//$nom = $_POST['nom'];
					 	//$prenoms = $_POST['prenoms'];
					    //$email = $_POST['email'];

					    //$naissance = $_POST['naissance'] ;

    					//Vérification de l'adresse email

    					//Il faut que l'adresse email n'ait jamais été utilisée
					    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM personne WHERE mail =:mail');
					    $query->bindValue(':mail',$email, PDO::PARAM_STR);	
					    $query->execute();

					    $mail_free=($query->fetchColumn()==0)?1:0;// verifie s'il y'a deja des adresses du meme genre

					    $query->CloseCursor();
					    

					    if($_SESSION['mail']!=$email){
					    	echo $_SESSION['mail'];
					    	if(!$mail_free)
					    	{
					        	$email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
					        	$i++;
					    	}
						}

					    //On vérifie la forme maintenant
					    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
					    {
					        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
					        $i++;
					    }

					    if ($i==0)
						{
						   
						    $query=$db->prepare('UPDATE personne SET nom = :nom, prenoms = :prenoms, mail = :mail, annee_naissance = :naissance, telephone = :telephone WHERE id = :id');
						    //VALUES (":nom", ":prenoms", ":email", 19, ":genre", ":pass")');
						    /*try {
						    	$query->execute(array(
						    	'nom' => $nom,
						    	'prenoms' => $prenoms,
						    	'email' => $email,
						    	'naissance' => $naissance,
						    	'telephone' => $telephone,
						    	'id' => $_SESSION['id'], 
						    	 ));
						    	 	
						    } catch (Exception $e) {
						    	die('Erreur : ' . $e->getMessage());
						    }*/
						    

						   	$query->bindValue(':nom', $nom, PDO::PARAM_STR);
						    $query->bindValue(':prenoms', $prenoms, PDO::PARAM_STR);
						    $query->bindValue(':mail', $email, PDO::PARAM_STR);
						    $query->bindValue(':naissance', $naissance, PDO::PARAM_INT);
						    $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
						    $query->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
						    $query->execute();
						    echo "nom: ".$nom." prenoms: ". $prenoms." naissance: ".$naissance ;
						    echo "<h1>INSCRIPTION REUSSIE <h1>";
						    
						    
						    
						    

						    $query->CloseCursor();

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
					}    
					    
					 ?>

<?php 
	
function erreur($err='')
{
    header('Location:../les_pages/connexion_er.php');
    exit();
   $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
   exit('<div id="forum_body"><div id="banniere_forum">
                    <div id="banniere_forum_picture">
                        <img src="../images/forum/denied.jpg" id="forum_picture" />
                    </div>
                    <div>
                        <h2 class="forum_title">Access</h2>
                    </div>
                </div><div id="error"><p class="mess">'.$mess.'</p>
   <p>Cliquez <a href="./index.php">ici</a> pour revenir &agrave; la page d\'accueil</p></div></div></body></html>');
}
		 ?>