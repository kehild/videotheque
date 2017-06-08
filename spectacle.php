<body>
	<div class="bodySpectacle">
	<?php
	include_once "header.php";
	include_once "bdd/connexion.php";
        include_once "bdd/SpectacleManager.php";

	?>
		<section>
                        <?php
                            if (isset($_GET['id1'])){
                                $spectacle = new SpectacleManager($db);
                                $spectacle->deleteSpectacle($db);
                            }	
	
                            // appel modif	
                            if (isset($_GET['id6'])){
                                $spectacle = new SpectacleManager($db);    
                                $spectacle->modificationSpectacle($db);
                            }

                            if (isset($_POST['modifSpecacle'])){
                                $spectacle = new SpectacleManager($db);
                                $spectacle->UpdateSpectacle($db);
                            }
                        
                        ?>                  
				<div class="transbox" id="transboxspectacle">
				<?php
				$spectacle = new SpectacleManager($db);
                                $spectacle->ListeSpectacle($db);
				
                                
                                if (isset($_GET['id6'])){
					?>
					<script>
					afficher_cacher("transboxspectacle");
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