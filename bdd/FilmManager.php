<?php

class FilmManager{
    
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }

  function ListeFilm($db){
      
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$retour_total=$db->prepare("SELECT COUNT(*) AS total FROM film"); //Nous récupérons le contenu de la requête dans $retour_total
$retour_total->execute();

$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])){ 
	// Si la variable $_GET['page'] existe...
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages){
		// Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         $pageActuelle=$nombreDePages;
     }
} else{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=$db->prepare("SELECT * FROM film ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Auteur"; echo "</th>";
		echo "<th>"; echo "Année"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Support"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
				
		echo "<tr><th>"; echo (stripslashes($donnees_messages['nom'])); echo "</th>";
		echo "<th>"; echo (stripslashes($donnees_messages['auteur'])); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['annee']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['support']); echo "</th>";
		echo "<th>"; echo '<a href="?id3='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees_messages['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";

}
		echo "</table>";
 
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages

for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

     //On va faire notre condition
     if($i==$pageActuelle){ //Si il s'agit de la page actuelle...
     
         echo ' [ '.$i.' ] '; 
     }	
     else{
		 echo ' <a href="film.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}	
  
  function DernierFilm($db){
			
		$stmt = $db->prepare("SELECT * FROM film ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Auteur"; echo "</th>";
				echo "<th>"; echo "Année"; echo "</th>";
				echo "<th>"; echo "Duree"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th></tr>";
				//echo "<th>"; echo "Modifier"; echo "</th>";
				//echo "<th>"; echo "Supprimer"; echo "</th></tr>";
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo ($toto['nom']); echo "</th>";
				echo "<th>"; echo ($toto['auteur']); echo "</th>";
				echo "<th>"; echo $toto['annee']; echo "</th>";
				echo "<th>"; echo $toto['duree']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th></tr>";
				//echo "<th>"; echo '<a href="?id3='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				//echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
						
			
		}
		echo "</table>";
}
  
  
  function SaisieFilm($db,$nom,$auteur,$annee,$duree,$support){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO film (nom, auteur, annee ,duree, support) VALUES ('" .$nom. "', '" .$auteur. "', '" .$annee. "','" .$duree. "','" .$support. "')";
			
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}
  
  function TotalFilm($db){
		
		$stmt = $db->prepare("select COUNT(nom) from film");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Film"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}
  
function deleteFilm($db){

		try {
			$stm = $db->prepare("delete from film where id=' " .$_GET['id1']. " '"); 
			$stm->execute();
			
		}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}  
  
function modificationFilm($db){
					$stmt = $db->prepare("SELECT * FROM film where id=' " .$_GET['id3']. " '"); 
					$stmt->execute();
					
					foreach(($stmt->fetchAll()) as $toto){
						?>
						<div>
						  <form id="saisieForm" method="post" action="">
							</br>
							<label for="nom">Nom</label>
							</br>
							<input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
							</br>
							<label for="auteur">Auteur</label>
							</br>
							<input type="text" id="auteur" name="auteur" value="<?php echo $toto['auteur']; ?>">
							</br>
							<label for="annee">Année</label>
							</br>
							<input type="text" id="annee" name="annee" value="<?php echo $toto['annee']; ?>">
							</br>
							<label for="duree">Durée</label>
							</br>
							<input type="text" id="duree" name="duree" value="<?php echo $toto['duree']; ?>">						
							</br>
							<label for="support">Support</label>
							</br>
							<select name="support" id="support">
								   <option value="<?php echo $toto['support']; ?>"><?php echo $toto['support']; ?></option> <!-- genre en base -->
								   <option value="PC">PC</option> 
								   <option value="CD">CD</option>
								   <option value="DVD">DVD</option>
								   <option value="PC/DVD">PC/DVD</option>
							</select>
							</br>
							<input type="submit" id="modifFilm" name="modifFilm" value="Modifier">
						  </form>
						</div> <?php
					}					
}	

function UpdateFilm($db){

		try {
				
				$sql = "UPDATE film SET nom='" .$_POST['nom']. "', auteur='" .$_POST['auteur']. "', annee='" .$_POST['annee']. "',duree='" .$_POST['duree']. "',support='" .$_POST['support']. "' WHERE id='" .$_GET['id3']. "'";
			
				$db->exec($sql);
				
				echo "Modification réussi";
				echo '<meta http-equiv="refresh" content="0;URL=film.php?id='.$_GET['id'].'">';
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}	
  

function searchFilm($db){
				if(isset($_POST['search'])) {
				$chainesearch = addslashes($_POST['search']);  
							
				$requete = "SELECT * from film WHERE nom LIKE '%". $chainesearch ."%'"; 
							
				// Exécution de la requête SQL
				$resultat = $db->query($requete) or die(print_r($db->errorInfo()));
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
     
}
}
  

  public function setDb(PDO $db){
    $this->_db = $db;
  }
}
?>


