<body>
	<div class="BodyStandard">
		<?php
		include_once "header.php";
		include_once "webservice.php";
		?>
			<section>
					<div class="transbox">
						<p><?php
								echo "Dernières Anime Rentrée";
								DernierAnime();
								echo "</br></br>";
								echo "Dernier Film Rentrée";
								echo "</br></br>";
								DernierFilm();
								echo "</br></br>";
								echo "Dernier Manga Rentrée";
								echo "</br></br>";
								DernierManga();
								echo "</br></br>";
								echo "Dernier Série Rentrée";
								echo "</br></br>";
								DernierSerie();
								echo "</br></br>";
								echo "Dernier Spectacle Rentrée";
								echo "</br></br>";
								DernierSpectacle();
							?>
							</p>
					</div>		
			</section>		
		<?php
			include_once "footer.php";
		?>
		</div>
</body>
