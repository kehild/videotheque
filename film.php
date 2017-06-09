<body>
	<div class="bodyFilm">
		<?php
		include_once "header.php";
		include_once "bdd/connexion.php";
                include_once 'bdd/FilmManager.php';

		?>
		<section>
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
                    
                    
                    ?>
			<div class="transbox" id="transboxfilm">
			<?php
			$film = new FilmManager($db);
                        $film->ListeFilm($db);

                                if (isset($_GET['id3'])){
					?>
					<script>
					afficher_cacher("transboxfilm");
					</script>
					<?php
				}	
				?>
                        </div>		
		</section>		
		<?php
			include_once "footer.php";
		?>
	</div>
</body>