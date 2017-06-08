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
