<body>
	<div class="bodyStandard">
		<?php
		include_once "header.php";
		include_once "webservice.php";
		?>
		<section>
				<div class="transbox">
				<?php
				TotalAnime();
				TotalFilm();
				TotalManga();
				TotalSerie();
				TotalSpectacle();
				?>	
				</div>		
		</section>		
		<?php
		include_once "footer.php";
		?>
	</div>

<body>
