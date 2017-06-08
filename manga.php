<body>
	<div class="bodyManga">
		<?php
		include_once "header.php";
		include_once "bdd/connexion.php";
                include_once "bdd/MangaManager.php";

		?>
		<section>
			                    
                    <?php                              
                                if (isset($_GET['id1'])){
                                    $manga = new MangaManager($db);
                                    $manga->deleteManga($db);
                                }	
                             
                                // appel modif	
                                if (isset($_GET['id4'])){
                                    $manga = new MangaManager($db);
                                    $manga->modificationManga($db);
                                }	
                                   
                                if (isset($_POST['modifManga'])){
                                    $manga = new MangaManager($db);
                                    $manga->UpdateManga($db);
                                }
 
                    ?>	
                    
                            <div class="transbox" id="transboxmanga">
				<?php
				$manga = new MangaManager($db);
                                $manga->ListeManga($db);
	
                                if (isset($_GET['id4'])){
					?>
					<script>
                                	afficher_cacher("transboxmanga");
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
