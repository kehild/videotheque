<?php
include_once "header.php";
include_once "webservice.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
					<?php
					// connexion bdd    
					$BDD_hote = 'localhost';
					$BDD_bd = 'videotheque';
					$BDD_utilisateur = 'root';
					$BDD_mot_passe = '';
						if(isset($_POST['search'])) {
					$chainesearch = addslashes($_POST['search']);  
						/* echo 'Vous avez recherché : ' . $chainesearch . '<br />';       */

						try{
						$bdd = new PDO('mysql:host='.$BDD_hote.';dbname='.$BDD_bd, $BDD_utilisateur, $BDD_mot_passe);
							$bdd->exec("SET CHARACTER SET utf8");
							$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
						}
							catch(PDOException $e){
							echo 'Erreur : '.$e->getMessage();
							echo 'N° : '.$e->getCode();
						}      
							
						$requete = "SELECT * from film WHERE nom LIKE '%". $chainesearch ."%'"; 
							
						// Exécution de la requête SQL
						$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
						//echo 'Les résultats de recherche sont : <br />';     
						$nb = 0;
						
						echo "<table id='dernier' align='center'>";
								echo "<tr><th>"; echo "Nom"; echo "</th>";
								echo "<th>"; echo "Auteur"; echo "</th>";
								echo "<th>"; echo "Année"; echo "</th>";
								echo "<th>"; echo "Duree"; echo "</th>";
								echo "<th>"; echo "Support"; echo "</th>";
								echo "<th>"; echo "Modifier"; echo "</th>";
								echo "<th>"; echo "Supprimer"; echo "</th></tr>";
						
						while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
						$nb = $nb +1;
									
							echo "<tr><th>"; echo $donnees['nom']; echo "</th>";
							echo "<th>"; echo $donnees['auteur']; echo "</th>";
							echo "<th>"; echo $donnees['annee']; echo "</th>";
							echo "<th>"; echo $donnees['duree']; echo "</th>";
							echo "<th>"; echo $donnees['support'];  echo "</th>";
							echo "<th>"; echo '<a href="?id3='.$donnees['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
							echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
								
						}
						echo "</table>";
						echo "</br>";
						echo "Il y a ".$nb." résultats"; 
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
}
include_once "footer.php";	

?>
