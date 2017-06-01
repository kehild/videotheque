<body>
	<div class="bodySpectacle">
	<?php
	include_once "header.php";
	include_once "webservice.php";

	?>
		<section>
				<div class="transbox" id="transboxspectacle">
				<?php
				ListeSpectacle();
				if (isset($_GET['id6'])){
					?>
					<script>
					afficher_cacher("transboxspectacle");
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