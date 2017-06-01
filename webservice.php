<?php

///////////////////////////////////// POUR ANIME ///////////////////////////////////////////////////////////////////////////////////
function SaisieAnime(){
	

	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO anime (nom, duree, support) VALUES ('".$_POST['nom']."', '" .$_POST['duree']. "','" .$_POST['support']. "')";
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}

function ListeAnime(){
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=$conn->prepare("SELECT COUNT(*) AS total FROM anime"); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$conn->prepare("SELECT * FROM anime ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Support"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
				
		echo "<tr><th>"; echo (utf8_encode(stripslashes($donnees_messages['nom']))); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['support']); echo "</th>";
		echo "<th>"; echo '<a href="?id2='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
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
		 echo ' <a href="anime.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}


function DernierAnime(){
			
		$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM anime ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Duree"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th>";
				echo "<th>"; echo "Modifier"; echo "</th>";
				echo "<th>"; echo "Supprimer"; echo "</th></tr>";
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo (utf8_encode($toto['nom'])); echo "</th>";
				echo "<th>"; echo $toto['duree']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th>";
				echo "<th>"; echo '<a href="?id2='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
						
			
		}
		echo "</table>";
}
	
// appel pour la suppression

if (isset($_GET['id1'])){
	deleteAnime();
}	
	
function deleteAnime(){

		try {
				$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stm = $conn->prepare("delete from anime where id=' " .$_GET['id1']. " '"); 
				$stm->execute();
			
			}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}
	
function TotalAnime(){
		
		// Nombre de anime

		$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $bdd->prepare("select COUNT(nom) from anime");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Anime"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}	
// appel modif	
if (isset($_GET['id2'])){
modificationAnime();
	
}	
	
function modificationAnime(){
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
					$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM anime where id=' " .$_GET['id2']. " '"); 
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
							<input type="submit" id="modifAnime" name="modifAnime" value="Modifier" onclick="javascript:location.reload();">
						  </form>
						</div> <?php
							
					}
				
}	
	
if (isset($_POST['modifAnime'])){
	UpdateAnime();
}

function UpdateAnime(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		// Permet de mettre à jour les informations dans la base de données
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE anime SET nom='" .$_POST['nom']. "',duree='" .$_POST['duree']. "',support='" .$_POST['support']. "' WHERE id='" .$_GET['id2']. "'";
			
				$bdd->exec($sql);
				
				echo "Modification réussi";
				
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}	
		

///////////////////////////////////// POUR FILM ///////////////////////////////////////////////////////////////////////////////

function SaisieFilm(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO film (nom, auteur, annee ,duree, support) VALUES ('" .$_POST['nom']. "', '" .$_POST['auteur']. "', '" .$_POST['annee']. "','" .$_POST['duree']. "','" .$_POST['support']. "')";
			
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}	

function ListeFilm(){
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=$conn->prepare("SELECT COUNT(*) AS total FROM film"); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$conn->prepare("SELECT * FROM film ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
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
				
		echo "<tr><th>"; echo (utf8_encode(stripslashes($donnees_messages['nom']))); echo "</th>";
		echo "<th>"; echo (utf8_encode(stripslashes($donnees_messages['auteur']))); echo "</th>";
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

function DernierFilm(){
			
		$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM film ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Auteur"; echo "</th>";
				echo "<th>"; echo "Année"; echo "</th>";
				echo "<th>"; echo "Duree"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th>";
				echo "<th>"; echo "Modifier"; echo "</th>";
				echo "<th>"; echo "Supprimer"; echo "</th></tr>";
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo (utf8_encode($toto['nom'])); echo "</th>";
				echo "<th>"; echo (utf8_encode($toto['auteur'])); echo "</th>";
				echo "<th>"; echo $toto['annee']; echo "</th>";
				echo "<th>"; echo $toto['duree']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th>";
				echo "<th>"; echo '<a href="?id3='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
						
			
		}
		echo "</table>";
}

// appel pour la suppression

if (isset($_GET['id1'])){
	deleteFilm();
}	
	
function deleteFilm(){

		try {
				$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stm = $conn->prepare("delete from film where id=' " .$_GET['id1']. " '"); 
				$stm->execute();
			
			}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}
	
function TotalFilm(){
		
		
		$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $bdd->prepare("select COUNT(nom) from film");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Film"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}

// appel modif	
if (isset($_GET['id3'])){
	modificationFilm();
}	
	
function modificationFilm(){
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
					$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM film where id=' " .$_GET['id3']. " '"); 
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
							<input type="submit" id="modifFilm" name="modifFilm" value="Modifier" onclick="javascript:location.reload();">
						  </form>
						</div> <?php
					}					
}	
	
if (isset($_POST['modifFilm'])){
	UpdateFilm();
}

function UpdateFilm(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		// Permet de mettre à jour les informations dans la base de données
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE film SET nom='" .$_POST['nom']. "', auteur='" .$_POST['auteur']. "', annee='" .$_POST['annee']. "',duree='" .$_POST['duree']. "',support='" .$_POST['support']. "' WHERE id='" .$_GET['id3']. "'";
			
				$bdd->exec($sql);
				
				echo "Modification réussi";
				
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}	

///////////////////////////////////// POUR MANGA ///////////////////////////////////////////////////////////////////////////

function SaisieManga(){
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO manga (nom, episode, saison,annee,duree, support) VALUES ('" .$_POST['nom']. "', '" .$_POST['episode']. "', '" .$_POST['saison']. "','" .$_POST['annee']. "','" .$_POST['duree']. "','" .$_POST['support']. "')";
			
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}	

function ListeManga(){
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=$conn->prepare("SELECT COUNT(*) AS total FROM manga"); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$conn->prepare("SELECT * FROM manga ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Episode"; echo "</th>";
		echo "<th>"; echo "Saison"; echo "</th>";
		echo "<th>"; echo "Année"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Support"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
				
		echo "<tr><th>"; echo (utf8_encode(stripslashes($donnees_messages['nom']))); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['episode']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['saison']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['annee']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['support']); echo "</th>";
		echo "<th>"; echo '<a href="?id4='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
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
		 echo ' <a href="manga.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}

function DernierManga(){
			
		$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM manga ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Episode"; echo "</th>";
				echo "<th>"; echo "Saison"; echo "</th>";
				echo "<th>"; echo "Année"; echo "</th>";
				echo "<th>"; echo "Duree"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th>";
				echo "<th>"; echo "Modifier"; echo "</th>";
				echo "<th>"; echo "Supprimer"; echo "</th></tr>";						
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo (utf8_encode($toto['nom'])); echo "</th>";
				echo "<th>"; echo $toto['episode']; echo "</th>";
				echo "<th>"; echo $toto['saison']; echo "</th>";
				echo "<th>"; echo $toto['annee']; echo "</th>";
				echo "<th>"; echo $toto['duree']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th>";
				echo "<th>"; echo '<a href="?id4='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";		
			
		}
		echo "</table>";
}	


if (isset($_GET['id1'])){
	deleteManga();
}	
	
	
function deleteManga(){

		try {
				$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stm = $conn->prepare("delete from manga where id=' " .$_GET['id1']. " '"); 
				$stm->execute();
			
			}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}

function TotalManga(){
		
		
		$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $bdd->prepare("select COUNT(nom) from manga");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Manga"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}

// appel modif	
if (isset($_GET['id4'])){
	modificationManga();
}	
	
function modificationManga(){
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
					$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM manga where id=' " .$_GET['id4']. " '"); 
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
							<label for="episode">Episode</label>
							</br>
							<input type="text" id="episode" name="episode" value="<?php echo $toto['episode']; ?>">
							</br>
							<label for="saison">Saison</label>
							</br>
							<input type="text" id="saison" name="saison" value="<?php echo $toto['saison']; ?>">
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
							<input type="submit" id="modifManga" name="modifManga" value="Modifier" onclick="javascript:location.reload();">
						  </form>
						</div> <?php
					}					
}	
	
if (isset($_POST['modifManga'])){
	UpdateManga();
}

function UpdateManga(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		// Permet de mettre à jour les informations dans la base de données
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE manga SET nom='" .$_POST['nom']. "', episode='" .$_POST['episode']. "', saison='" .$_POST['saison']. "',annee='" .$_POST['annee']. "',duree='" .$_POST['duree']. "',support='" .$_POST['support']. "' WHERE id='" .$_GET['id4']. "'";
			
				$bdd->exec($sql);
				
				echo "Modification réussi";
				
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}		


///////////////////////////////////// POUR SERIE ///////////////////////////////////////////////////////////////////////////

function SaisieSerie(){
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO series (nom, episode, saison,annee,duree, support) VALUES ('" .$_POST['nom']. "', '" .$_POST['episode']. "', '" .$_POST['saison']. "','" .$_POST['annee']. "','" .$_POST['duree']. "','" .$_POST['support']. "')";
			
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}	

function ListeSerie(){
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=$conn->prepare("SELECT COUNT(*) AS total FROM series"); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$conn->prepare("SELECT * FROM series ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Episode"; echo "</th>";
		echo "<th>"; echo "Saison"; echo "</th>";
		echo "<th>"; echo "Année"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Support"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
				
		echo "<tr><th>"; echo (utf8_encode(stripslashes($donnees_messages['nom']))); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['episode']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['saison']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['annee']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['support']); echo "</th>";
		echo "<th>"; echo '<a href="?id5='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
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
		 echo ' <a href="serie.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}

function DernierSerie(){
			
		$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM series ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Episode"; echo "</th>";
				echo "<th>"; echo "Saison"; echo "</th>";
				echo "<th>"; echo "Année"; echo "</th>";
				echo "<th>"; echo "Duree"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th>";
				echo "<th>"; echo "Modifier"; echo "</th>";		
				echo "<th>"; echo "Supprimer"; echo "</th></tr>";	
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo (utf8_encode($toto['nom'])); echo "</th>";
				echo "<th>"; echo $toto['episode']; echo "</th>";
				echo "<th>"; echo $toto['saison']; echo "</th>";
				echo "<th>"; echo $toto['annee']; echo "</th>";
				echo "<th>"; echo $toto['duree']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th>";
				echo "<th>"; echo '<a href="?id5='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";	
						
			
		}
		echo "</table>";
}		

if (isset($_GET['id1'])){
	deleteSerie();
}	
	
	
function deleteSerie(){

		try {
				$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stm = $conn->prepare("delete from series where id=' " .$_GET['id1']. " '"); 
				$stm->execute();
			
			}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}

function TotalSerie(){
		
		
		$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $bdd->prepare("select COUNT(nom) from series");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Série"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}	

// appel modif	
if (isset($_GET['id5'])){
	modificationSerie();
}	
	
function modificationSerie(){
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
					$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM series where id=' " .$_GET['id5']. " '"); 
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
							<label for="episode">Episode</label>
							</br>
							<input type="text" id="episode" name="episode" value="<?php echo $toto['episode']; ?>">
							</br>
							<label for="saison">Saison</label>
							</br>
							<input type="text" id="saison" name="saison" value="<?php echo $toto['saison']; ?>">
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
							<input type="submit" id="modifSerie" name="modifSerie" value="Modifier" onclick="javascript:location.reload();">
						  </form>
						</div> <?php
					}					
}	
	
if (isset($_POST['modifSerie'])){
	UpdateSerie();
}

function UpdateSerie(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		// Permet de mettre à jour les informations dans la base de données
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE series SET nom='" .$_POST['nom']. "', episode='" .$_POST['episode']. "', saison='" .$_POST['saison']. "',annee='" .$_POST['annee']. "',duree='" .$_POST['duree']. "',support='" .$_POST['support']. "' WHERE id='" .$_GET['id5']. "'";
			
				$bdd->exec($sql);
				
				echo "Modification réussi";
				
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}		

///////////////////////////////////// POUR SPECTACLE ///////////////////////////////////////////////////////////////////

function SaisieSpectacle(){
	
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "Insert INTO spectacle (nom, auteur, annee, support) VALUES ('" .$_POST['nom']. "', '" .$_POST['auteur']. "','" .$_POST['annee']. "','" .$_POST['support']. "')";
			
				$bdd->exec($sql);
				
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}

}

function ListeSpectacle(){
 echo '<div class="pagination">';	
$messagesParPage=12; //Nous allons afficher 10 messages par page.
 
$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=$conn->prepare("SELECT COUNT(*) AS total FROM spectacle"); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=$conn->prepare("SELECT * FROM spectacle ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Auteur"; echo "</th>";
		echo "<th>"; echo "Année"; echo "</th>";
		echo "<th>"; echo "Support"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle

     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
				
		echo "<tr><th>"; echo (utf8_encode(stripslashes($donnees_messages['nom']))); echo "</th>";
		echo "<th>"; echo (utf8_encode(stripslashes($donnees_messages['auteur']))); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['annee']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['support']); echo "</th>";
		echo "<th>"; echo '<a href="?id6='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
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
		 echo ' <a href="spectacle.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';
}		

function DernierSpectacle(){
			
		$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM spectacle ORDER BY id DESC LIMIT 3"); 
		$stmt->execute();

			echo "<table id='dernier' align='center'>";

				echo "<tr><th>"; echo "Nom"; echo "</th>";
				echo "<th>"; echo "Auteur"; echo "</th>";
				echo "<th>"; echo "Année"; echo "</th>";
				echo "<th>"; echo "Support"; echo "</th>";
				echo "<th>"; echo "Modifier"; echo "</th>";
				echo "<th>"; echo "Supprimer"; echo "</th></tr>";				
		
		foreach(($stmt->fetchAll()) as $toto){
							
				echo "<tr><th>"; echo (utf8_encode($toto['nom'])); echo "</th>";
				echo "<th>"; echo (utf8_encode($toto['auteur'])); echo "</th>";
				echo "<th>"; echo $toto['annee']; echo "</th>";
				echo "<th>"; echo $toto['support']; echo "</th>";
				echo "<th>"; echo '<a href="?id6='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
				echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
						
			
		}
		echo "</table>";
}	

if (isset($_GET['id1'])){
	deleteSpectacle();
}	
	
	
function deleteSpectacle(){

		try {
				$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stm = $conn->prepare("delete from spectacle where id=' " .$_GET['id1']. " '"); 
				$stm->execute();
			
			}catch(Exception $e){
			
			echo("<h1>Erreur : Base de données </h1>");
			die('Erreur : ' .$e->getMessage());
		
		}
}

function TotalSpectacle(){
		
		
		$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis");
		$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $bdd->prepare("select COUNT(nom) from spectacle");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Total Spectacle"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
				echo "</table>";
			}
}	


// appel modif	
if (isset($_GET['id6'])){
	modificationSpectacle();
}	
	
function modificationSpectacle(){
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
					$conn = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM spectacle where id=' " .$_GET['id6']. " '"); 
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
							<input type="submit" id="modifSpecacle" name="modifSpecacle" value="Modifier" onclick="javascript:location.reload();">
						  </form>
						</div> 
						<?php
									
					}
}	
	
if (isset($_POST['modifSpecacle'])){
	UpdateSpectacle();
}

function UpdateSpectacle(){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		// Permet de mettre à jour les informations dans la base de données
		try {
				
				$bdd = new PDO("mysql:host=localhost;dbname=videotheque","root","arcanis",$options);
				$bdd -> setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE spectacle SET nom='" .$_POST['nom']. "', auteur='" .$_POST['auteur']. "', annee='" .$_POST['annee']. "', support='" .$_POST['support']. "' WHERE id='" .$_GET['id6']. "'";
			
				$bdd->exec($sql);
				
				echo "Modification réussi";
				
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
}		

//////////////////////////////// AUTRES /////////////////////////////////////////////////////////////////////////////////

function dumpMySQL(){
	
	$output = shell_exec('mysqldump -uroot -parcanis videotheque > /var/www/html/videotheque/videotheque.sql');
	echo "<pre>$output</pre>";
	
}


?>
