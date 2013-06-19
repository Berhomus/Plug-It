<?php
	session_start();
	
	include("function/disconnect_f.php");
	
	disconnect();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Accueil</title>
		<link type="text/css" rel="stylesheet" href="styles/index.css"/>
	</head>
	<body>
	
		<div class="Banniere">
			<?php
				INCLUDE("include\common\banniere.php");
			?>
		</div>
		
		<div class="Corps">
			<?php
				INCLUDE("include\common\corps.php");
			?>
		</div>
		
		<div class="Pied">
			<?php
				INCLUDE("include\common\pied.php");
			?>
		</div>
		
	</body>
</html>