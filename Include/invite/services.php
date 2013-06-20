<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" /> 
		<title>Mon site version tp2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="/menu_assets/styles.css" rel="stylesheet" type="text/css">
		<link href="index.css" rel="stylesheet" type="text/css"/> 

	</head>

	<body>
	
		<div class="milieu">

			<h2>DÉCOUVREZ L'ENSEMBLE DE NOS SERVICES INFORMATIQUES LES PLUS POINTUS</h2>
			
						<?php
				mysql_connect('localhost', 'root', '');
				mysql_select_db ('plugit');
				$retour = mysql_query('SELECT * FROM services ORDER BY id DESC') or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					while ($donnees = mysql_fetch_array($retour))
						{
						$i=0; //délimite les colonnes
						$j=0; //délimite les lignes
						?>
					
					
						<?php
						}
						?>
					

		</div>
	</body>
	
</html>	