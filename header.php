<header>
	<title>Videothèque</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/jpg" href="image/videotheque.jpg"/>
	<script type="text/javascript" src="afficher_cacher_div.js"></script>
	<table id="test">	
		<tr>
			<td></td>
			<td><h1 id="titre">Videothèque</h1></td>
		</tr>
	</table>
</header>

<nav>
	<ul id="menu-deroulant">
		<li style="float: left"><a class="active" href="index.php">Home</a></li>
		<li style="float: left"><a href="saisie.php">Saisir</a></li>
		<li style="float: left"><a href="anime.php">Anime</a></li>
		<li style="float: left"><a href="film.php">Film</a></li>			
		<li style="float: left"><a href="manga.php">Manga</a></li>
		<li style="float: left"><a href="serie.php">Serie</a></li>	
		<li style="float: left"><a href="spectacle.php">Spectacle</a></li>
		<li style="float: left"><a href="statistique.php">Statistique</a></li>
		
		<li style="float: left"><a href="#">Recherche</a>
			<ul>
			<li> <!-- Recherche Anime -->
			<form style="width:400px; float: left; margin-top: 10px;" action="searchAnime.php" method="post">
                            <span style=" color:white; text-align: center;">Anime :</span> </br>
					<input type="text" id="search" name="search"/>
			</form>		
			</li>
			<li> <!-- Recherche Film -->
			<form style="width:400px; float: left; margin-top: 10px;" action="searchFilm.php" method="post">
					<span style=" color:white; text-align: center;">Film :</span> </br>
					<input type="text" id="search" name="search"/>
			</form>		
			</li>				
			<li> <!-- Recherche Manga -->
				<form style="width:400px; float: left; margin-top: 10px;" action="searchManga.php" method="post">
					<span style=" color:white; text-align: center;">Manga :</span> </br>
					<input type="text" id="search" name="search"/>
				</form>		
			</li>
			 <!-- Recherche Serie -->
			<li> 
			<form style="width:400px; float: left; margin-top: 10px;" action="searchSerie.php" method="post">
					<span style=" color:white; text-align: center;">Serie :</span> </br>
					<input type="text" id="search" name="search"/>
			</form>		
			</li>
			<li> <!-- Recherche Spectacle -->
			<form style="width:400px; float: left; margin-top: 10px;" action="searchSpectacle.php" method="post">
					<span style=" color:white; text-align: center;">Spectacle :</span> </br>
					<input type="text" id="search" name="search"/>
			</form>		
			</li>
			</ul>
		</li>		

	</ul>
</nav>