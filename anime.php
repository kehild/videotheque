<body>
	<div class="bodyAnime">
		<?php
		include_once "header.php";
		include_once "webservice.php";
		?>
		<section>
				<div class="transbox" id="transboxanime">
				<?php
				ListeAnime();
				// Masquer la div transbox
				if (isset($_GET['id2'])){
					?>
					<script>
					afficher_cacher("transboxanime");
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
<body>


<!-- <link rel="stylesheet" media="all" title="style de la page" href="afficher_cacher_div.css" /> -->		 		
<!-- <span class="bouton" id="bouton_texte" onclick="javascript:afficher_cacher('texte');">Afficher le texte</span>	-->
			
			
	
