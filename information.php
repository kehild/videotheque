<body>
	<div class="bodyStandard">
		<?php
		include_once "header.php";
		include_once "webservice.php";
		
			if (isset($_POST['export'])) {

				dumpMySQL();	
			}
		
		?>
		<section>
				<div class="transbox">
				<form method="post" action="">
				</br>
				<input type="submit" name="export" value="Exporter la base de données">
			</form>
				</div>		
		</section>		
		<?php
		include_once "footer.php";
		?>
	</div>

<body>