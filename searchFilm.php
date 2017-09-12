<body>
<div class="bodySeach">
<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/FilmManager.php";
?>
		<div class="transbox">
				</br>

					<?php
                                        // appel pour la suppression

                                        if (isset($_GET['id1'])){
                                            $film = new FilmManager($db);
                                            $film->deleteFilm($db);
                                        }	

                                        // appel modif	
                                        if (isset($_GET['id3'])){
                                            $film = new FilmManager($db);
                                            $film->modificationFilm($db);
                                        }

                                        if (isset($_POST['modifFilm'])){
                                            $film = new FilmManager($db);
                                            $film->UpdateFilm($db);
                                        }
                                        
                                           $film = new FilmManager($db);
                                           $film->searchFilm($db);
					?>
			</div>
            </div>
	</body>		
<?php
include_once "footer.php";	
?>
