<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/AnimeManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
					<?php
                                        $anime = new AnimeManager($db);
                                        $anime->searchAnime($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
include_once "footer.php";
?>
