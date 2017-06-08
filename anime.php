<body>
	<div class="bodyAnime">
		<?php
		include_once "header.php";
		include_once "bdd/AnimeManager.php";
                include_once 'bdd/connexion.php';
		?>
		<section>
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
                        
                        ?>
                    
                            <div class="transbox" id="transboxanime">
				<?php
				$anime = new AnimeManager($db);
                                $anime->ListeAnime($db);
     
				// Masquer la div transbox
				if (isset($_GET['id2'])){
					?>
					<script>
					afficher_cacher("transboxanime");
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
<body>


<!-- <link rel="stylesheet" media="all" title="style de la page" href="afficher_cacher_div.css" /> -->		 		
<!-- <span class="bouton" id="bouton_texte" onclick="javascript:afficher_cacher('texte');">Afficher le texte</span>	-->
			
			
	
