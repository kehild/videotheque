<?php
include_once"header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
					<?php
                                         $manga = new MangaManager($db);
                                         $manga->searchManga($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
include_once "footer.php";	
?>
