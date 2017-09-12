<body>
<div class="bodySeach">
<?php
include_once"header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
                <div class="transbox">
				</br>
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
</body>		
<?php
include_once "footer.php";	
?>
