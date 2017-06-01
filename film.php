<body>
	<div class="bodyFilm">
		<?php
		include_once "header.php";
		include_once "webservice.php"

		?>

		<section>
				<div class="transbox" id="transboxfilm">
				<?php
				ListeFilm();
				if (isset($_GET['id3'])){
					?>
					<script>
					afficher_cacher("transboxfilm");
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