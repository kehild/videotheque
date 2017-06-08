<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/FilmManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
					<?php
                                           $film = new FilmManager($db);
                                           $film->searchFilm($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
include_once "footer.php";	
?>
