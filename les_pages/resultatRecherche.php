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
		$query=$db->prepare('SELECT * FROM trajet WHERE (ville_depart= :depart OR ville_intermediaire1= :depart OR ville_intermediaire2= :depart OR ville_intermediaire3 = :depart OR ville_intermediaire4= :depart) AND ville_arriver= :arrivee AND date_depart= :date_depart');
						    
						    $query->bindValue(':depart', $depart, PDO::PARAM_STR);
						    $query->bindValue(':arrivee', $arrivee, PDO::PARAM_STR);
						    $query->bindValue(':date_depart', $date_depart, PDO::PARAM_STR);
						    $query->execute();

						    echo "<table>
						    		<caption>Résultat de votre recherche</caption>
						    		<thead>
						    			<tr>
						    				<th>Départ</th>
						    				<th>arrivée</th>
											<th>date de depart</th>
						    				<th>heure de depart</th>
						    				<th>tarif</th>
						    				<th>places disponibles</th>
						    			</tr>
						    		</thead>
						    		<tbody>";

						    while ( $data=$query->fetch() ) {
						    	# code...
						    	if ($data['est_complet'] == 0) {
						    	# code...
						
						    	echo '<tr><form action="./ReserverVoyage.php" method="post" accept-charset="utf-8">
						    		
						    	
						    				<td>'.$data['ville_depart'].'<input type="hidden" name="depart" value="'.$data['ville_depart'].'"></td>
						    				<td>'.$data['ville_arriver'].'<input type="hidden" name="arrivee" value="'.$data['ville_arriver'].'"></td>
						    				<td>'.$data['date_depart'].'<input type="hidden" name="date_depart" value="'.$data['date_depart'].'"></td>
						    				<td>'.$data['heure_depart'].'<input type="hidden" name="id_trajet" value="'.$data['id_trajet'].'"></td>
						    				<td>'.$data['tarif'].'</td>
						    				<td>'.$data['nbr_place'].'</td>
						    				<td><input type="submit" name="" value="CHOISIR"></td>
						    			</form></tr>';
		 
						    }
						    };

						    echo "</tbody></table>";
						    
						    
		
		?>
	</div>
	