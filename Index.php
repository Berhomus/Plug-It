<?php
	session_start();
	
	include("function/disconnect_f.php");
	
	disconnect();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="icon" type="image/png" href="./images/favicon.png">
		<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
	
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>Plug-it</title>
		<link type="text/css" rel="stylesheet" href="styles/index.css"/>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			var pos = new google.maps.LatLng(49.8853893, 2.3037014);
			function initCarte(){
				// création de la carte
				var oMap = new google.maps.Map( document.getElementById( 'div_carte'),{
				'center' : pos,
				'zoom' : 17,
				'mapTypeId' : google.maps.MapTypeId.ROADMAP
				});
				
				var myMarker = new google.maps.Marker({
					// Coordonnées du cinéma
					position: pos,
					map: oMap,
					title: "Plug-it"
				});
				
				var myWindowOptions = {
					content:
					'<h6>Plug-it</h6>'
				};
				var myInfoWindow = new google.maps.InfoWindow(myWindowOptions);
			}
			// init lorsque la page est chargée
			google.maps.event.addDomListener( window, 'load', initCarte);
			</script>
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