<body>
	<div class="BodyStandard">
		<?php
		include_once "header.php";
		include_once "bdd/AnimeManager.php";
                include_once "bdd/FilmManager.php";
                include_once "bdd/MangaManager.php";
                include_once "bdd/SerieManager.php";
                include_once "bdd/SpectacleManager.php";
                include_once "bdd/connexion.php";
		?>
			<section>
					<div class="transbox">
						<p><?php
                                                    echo "Dernières Anime Rentrée";
                                                    $anime = new AnimeManager($db);
                                                    $anime->DernierAnime($db);
                                                    echo "</br></br>";
                                                    echo "Dernier Film Rentrée";
                                                    echo "</br></br>";
                                                    $film = new FilmManager($db);
                                                    $film->DernierFilm($db);
                                                    echo "</br></br>";
                                                    echo "Dernier Manga Rentrée";
                                                    echo "</br></br>";
                                                    $manga = new MangaManager($db);
                                                    $manga->DernierManga($db);
                                                    echo "</br></br>";
                                                    echo "Dernier Série Rentrée";
                                                    echo "</br></br>";
                                                    $serie = new SerieManager($db);
                                                    $serie->DernierSerie($db);
                                                    echo "</br></br>";
                                                    echo "Dernier Spectacle Rentrée";
                                                    echo "</br></br>";
                                                    $spectacle = new SpectacleManager($db);
                                                    $spectacle->DernierSpectacle($db);
                                                    
                                                    // delete anime
                                                    
                                            /*        if (isset($_GET['id1'])){
                                                       $anime = new AnimeManager($db);
                                                       $anime->deleteAnime($db);
                                                   }*/
                                                     //  modif	anime
                                                   
                                               /*     if (isset($_GET['id2'])){
                                                        $anime = new AnimeManager($db);
                                                        $anime->modificationAnime($db);

                                                    }*/
                                                    
                                                    
                                                    
						?>
						</p>
					</div>		
			</section>		
		<?php
			include_once "footer.php";
		?>
		</div>
</body>
