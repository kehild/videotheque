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
                                         // appel pour la suppression

                                            if (isset($_GET['id1'])){
                                               $anime = new AnimeManager($db);
                                               $anime->deleteAnime($db);
                                           }	

                                           // appel modif	
                                           if (isset($_GET['id2'])){
                                               $anime = new AnimeManager($db);
                                               $anime->modificationAnime($db);

                                           }	

                                           if (isset($_POST['modifAnime'])){
                                               $anime = new AnimeManager($db);
                                               $anime->UpdateAnime($db);
                                           }
                                        
                                        
                                        
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
