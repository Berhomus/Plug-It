<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : Index.php => Plug-it
*********************************************************-->

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
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

		<title>Plug-it</title>
	
		<link rel="stylesheet" href="css/iview.css" />
		<link rel="stylesheet" href="css/skin 1/style.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link type="text/css" rel="stylesheet" href="styles/index.css"/>
		
		<script src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.js"></script>
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
		
		<script src="js/iview.js"></script>
		
		<script>
			$(document).ready(function(){
				$('#iview').iView({
					pauseTime: 3000,
					directionNav: false,
					controlNav: true,
					tooltipY: -15
				});
			});
			
			/*function getWindowHeight() {
			var windowHeight = 0;
			if (typeof(window.innerHeight) == 'number') {
				windowHeight = window.innerHeight;
			}
			else {
				if (document.documentElement && document.documentElement.clientHeight) {
					windowHeight = document.documentElement.clientHeight;
				}
				else {
					if (document.body && document.body.clientHeight) {
						windowHeight = document.body.clientHeight;
					}
				}
			}
			return windowHeight;
		}
		function setFooter() {
			if (document.getElementById) {
				var windowHeight = getWindowHeight();
				if (windowHeight > 0) {
					var contentHeight = document.getElementById('content').offsetHeight;
					var headHeight = document.getElementById('head').offsetHeight;
					var footerElement = document.getElementById('footer');
					var footerHeight  = footerElement.offsetHeight;
					if (windowHeight - (contentHeight + footerHeight + headHeight) >= 0) {
						footerElement.style.position = 'relative';
						footerElement.style.top = windowHeight - (contentHeight + footerHeight + headHeight*2)+'px';
					}
				}
			}
		}
		window.onload = function() {
			setFooter();
		}
		window.onresize = function() {
			setFooter();
		}*/
		</script>
	</head>
	<body>
		<div class="Banniere" id="head">
			<?php
				INCLUDE("include\common\banniere.php");
			?>
		</div>
		
		<div class="Corps" id="content"
		<?php
			if((isset($_GET['page']) and $_GET['page'] != 'accueil')or(isset($_GET['sub']) and $_GET['sub'] != 'main'))
				echo 'style="padding-top:5%;"';
		?>
		>
			<?php
				INCLUDE("include\common\corps.php");
			?>
		</div>
		
		<div class="Pied" id="footer">
			<?php
				INCLUDE("include\common\pied.php");
			?>
		</div>

	</body>
</html>