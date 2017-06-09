<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/SerieManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
					<?php
                                        
                                        if (isset($_GET['id1'])){
                                            $serie = new SerieManager($db);
                                            $serie->deleteSerie($db);
                                        }	

                                        // appel modif	
                                        if (isset($_GET['id5'])){
                                            $serie = new SerieManager($db);
                                            $serie->modificationSerie($db);
                                        }

                                        if (isset($_POST['modifSerie'])){
                                            $serie = new SerieManager($db);
                                            $serie->UpdateSerie($db);
                                        }
                                        
					$serie = new SerieManager($db);
                                        $serie->searchSerie($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php

include_once "footer.php";	

?>
