<body>
	<div class="bodyManga">
		<?php
		include_once "header.php";
		include_once "webservice.php";

		?>
		<section>
				<div class="transbox" id="transboxmanga">
				<?php
				ListeManga();
				if (isset($_GET['id4'])){
					?>
					<script>
					afficher_cacher("transboxmanga");
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
