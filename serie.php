<body>
	<div class="bodySerie">
		<?php
		include_once "header.php";
		include_once "webservice.php";

		?>
			<section>
					<div class="transbox" id="transboxserie">
					<?php
					ListeSerie();
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