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
