<body>
	<div class="bodySerie">
		<?php
		include_once "header.php";
		include_once "bdd/connexion.php";
                include_once "bdd/SerieManager.php";

		?>
			<section>
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

                            ?>
                            
                                <div class="transbox" id="transboxserie">
                                    <?php
                                    $serie = new SerieManager($db);
                                    $serie->ListeSerie($db);

                                    if (isset($_GET['id5'])){
                                    ?>
                                    <script>
                                         afficher_cacher("transboxserie");
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