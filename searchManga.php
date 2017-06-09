<?php
include_once"header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div id="slider" style=color:black;>
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
                                        
                                         $manga = new MangaManager($db);
                                         $manga->searchManga($db);
					?>
					</div>
				</div>		
		</section>		
</body>		
<?php
include_once "footer.php";	
?>
