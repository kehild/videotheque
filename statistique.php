<body>
	<div class="bodyStandard">
		<?php
		include_once "header.php";
		include_once "bdd/connexion.php";
                include_once "bdd/AnimeManager.php";
                include_once "bdd/FilmManager.php";
                include_once "bdd/MangaManager.php";
                include_once "bdd/SerieManager.php";
                include_once "bdd/SpectacleManager.php";
		?>
		<section>
				<div class="transbox">
				<?php
				$anime = new AnimeManager($db);
                                $anime->TotalAnime($db);
				$film = new FilmManager($db);
                                $film->TotalFilm($db);
				$manga = new MangaManager($db);
                                $manga->TotalManga($db);
				$serie = new SerieManager($db);
                                $serie->TotalSerie($db);
				$spectacle = new SpectacleManager($db);
                                $spectacle->TotalSpectacle($db);
				?>	
				</div>		
		</section>		
		<?php
		include_once "footer.php";
		?>
	</div>

<body>
