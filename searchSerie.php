<body>
<div class="bodySeach">
<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/SerieManager.php";
?>
		<div class="transbox">
				</br>
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
</body>		
<?php

include_once "footer.php";	

?>
