<body>
<div class="BodyStandard">
<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/AnimeManager.php";
include_once "bdd/FilmManager.php";
include_once "bdd/MangaManager.php";
include_once "bdd/SerieManager.php";
include_once "bdd/SpectacleManager.php";


if(isset($_POST['ValiderAnime'])){
	$anime = new AnimeManager($db);
        $anime->SaisieAnime($db,$_POST['nom'],$_POST['duree'],$_POST['support']);	
}

if(isset($_POST['ValiderFilm'])){
    $film = new FilmManager($db);
    $film->SaisieFilm($db,$_POST['nom'],$_POST['auteur'],$_POST['annee'],$_POST['duree'],$_POST['support']);
}

if(isset($_POST['ValiderManga'])){
    $manga = new MangaManager($db);
    $manga->SaisieManga($db,$_POST['nom'],$_POST['episode'],$_POST['saison'],$_POST['annee'],$_POST['duree'],$_POST['support']);
}

if(isset($_POST['ValiderSerie'])){
    $serie = new SerieManager($db);
    $serie->SaisieSerie($db,$_POST['nom'],$_POST['episode'],$_POST['saison'],$_POST['annee'],$_POST['duree'],$_POST['support']);
}

if(isset($_POST['ValiderSpectacle'])){
    $spectacle = new SpectacleManager($db);
    $spectacle->SaisieSpectacle($db,$_POST['nom'],$_POST['auteur'],$_POST['annee'],$_POST['support']);
}


?>
   <script type="text/javascript">
      function catsel(sel) {
        //if (sel.value=="-1" ) return; 
        var opt=sel.getElementsByTagName("option");
        for (var i=0; i<opt.length; i++) {
          var x=document.getElementById(opt[i].value);
          if (x) x.style.display="none";
        }
        var cat = document.getElementById(sel.value);
        if (cat) cat.style.display="block";
      }
    </script>
		<section>
			<div class="transbox">
					Choix de la categorie
					</br>
					  <select onchange="catsel(this)" name="types" id="types">
					  <!--<option value="-1">None</option>!-->
						<option value="1">Anime</option>
						<option value="2">Film</option>
						<option value="3">Manga</option>
						<option value="4">Serie</option>
						<option value="5">Spectacle</option>
					  </select>
					</td>
							
					  <div id="1" style="display:block"> <!-- Anime -->
						<form method="post" action="">
								</br>
								<label for="nom">Nom</label>
								</br>
								<input type="text" id="nom" name="nom">
								</br>
								<label for="duree">Durée</label>
								</br>
								<input type="text" id="duree" name="duree">
								</br>
								<label for="support">Support</label>
								</br>
								<select name="support" id="support">
									<option value="PC">PC</option>
									<option value="CD">CD</option>
									<option value="DVD">DVD</option>
									<option value="PC/DVD">PC/DVD</option>								   
								</select>
								</br></br>
								<input type="submit" name="ValiderAnime" value="Valider">
							</br>
						</form>	
					  </div>
					  <div id="2" style="display:none"> <!-- Film -->
							<form method="post" action="">
								</br>
								<label for="nom">Nom</label>
								</br>
								<input type="text" id="nom" name="nom">
								</br>
								<label for="auteur">Auteur</label>
								</br>
								<input type="text" id="auteur" name="auteur">
								</br>
								<label for="annee">Année</label>
								</br>
								<input type="text" id="annee" name="annee">
								</br>
								<label for="duree">Durée</label>
								</br>
								<input type="text" id="duree" name="duree">
								</br>
								<label for="support">Support</label>
								</br>
								<select name="support" id="support">
									<option value="PC">PC</option>
									<option value="CD">CD</option>
									<option value="DVD">DVD</option>
									<option value="PC/DVD">PC/DVD</option>								   
								</select>
								</br></br>
								<input type="submit" name="ValiderFilm" value="Valider">
							</br>
						</form>	
					  </div>
					  <div id="3" style="display:none"> <!-- Manga -->
						<form method="post" action="">
								</br>
								<label for="nom">Nom</label>
								</br>
								<input type="text" id="nom" name="nom">
								</br>
								<label for="episode">Episode</label>
								</br>
								<input type="text" id="episode" name="episode">
								</br>
								<label for="saison">Saison</label>
								</br>
								<input type="text" id="saison" name="saison">
								</br>
								<label for="annee">Année</label>
								</br>
								<input type="text" id="annee" name="annee">
								</br>
								<label for="duree">Durée</label>
								</br>
								<input type="text" id="duree" name="duree">
								</br>
								<label for="support">Support</label>
								</br>
								<select name="support" id="support">
									<option value="PC">PC</option>
									<option value="CD">CD</option>
									<option value="DVD">DVD</option>
									<option value="PC/DVD">PC/DVD</option>								   
								</select>
								</br></br>
								<input type="submit" name="ValiderManga" value="Valider">
							</br>
						</form>	
					  </div>
					  <div id="4" style="display:none"> <!-- Séries -->
						<form method="post" action="">
								</br>
								<label for="nom">Nom</label>
								</br>
								<input type="text" id="nom" name="nom">
								</br>
								<label for="episode">Episode</label>
								</br>
								<input type="text" id="episode" name="episode">
								</br>
								<label for="saison">Saison</label>
								</br>
								<input type="text" id="saison" name="saison">
								</br>
								<label for="annee">Année</label>
								</br>
								<input type="text" id="annee" name="annee">
								</br>
								<label for="duree">Durée</label>
								</br>
								<input type="text" id="duree" name="duree">
								</br>
								<label for="support">Support</label>
								</br>
								<select name="support" id="support">
									<option value="PC">PC</option>
									<option value="CD">CD</option>
									<option value="DVD">DVD</option>
									<option value="PC/DVD">PC/DVD</option>								   
								</select>
								</br></br>
								<input type="submit" name="ValiderSerie" value="Valider">
							</br>
						</form>	
					  </div>
					  <div id="5" style="display:none"> <!-- Spectacle -->
						<form method="post" action="">
								</br>
								<label for="nom">Nom</label>
								</br>
								<input type="text" id="nom" name="nom">
								</br>
								<label for="auteur">Auteur</label>
								</br>
								<input type="text" id="auteur" name="auteur">
								</br>
								<label for="annee">Année</label>
								</br>
								<input type="text" id="annee" name="annee">
								</br>
								<label for="duree">Durée</label>
								</br>
								<input type="text" id="duree" name="duree">
								</br>
								<label for="support">Support</label>
								</br>
								<select name="support" id="support">
									<option value="PC">PC</option>
									<option value="CD">CD</option>
									<option value="DVD">DVD</option>
									<option value="PC/DVD">PC/DVD</option>								   
								</select>
								</br></br>
								<input type="submit" name="ValiderSpectacle" value="Valider">
							</br>
						</form>	
					  </div>
				</div>		
		</section>
	<div>	
</body>
