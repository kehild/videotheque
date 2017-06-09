<?php
include_once"header.php";
include_once "bdd/connexion.php";
include_once "bdd/SpectacleManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
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
                                        
					$spectacle = new SpectacleManager($db);
                                        $spectacle->searchSpectacle($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
include_once "footer.php";	

?>
