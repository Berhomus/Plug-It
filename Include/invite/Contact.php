<div style="overflow:hidden;">

<div style="width:60%;float:left;">

<h2 class="titre">Contactez-nous</h2>

<form method="post" action="#">
	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
				<tr>
					<td><b>Civilité <span class="red">*</span></b></td>
					<td><select name="liste">
						<option value="M">M.</option>
						<option value="Mme">Mme</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td><label for="nom"><b>Nom <span class="red">*</span></b></label></td>
					<td><input type="text" name="nom" id="nom" required/></td>
				</tr>
				
				<tr>
					<td><label for="prenom"><b>Prénom <span class="red">*</span></b></label></td>
					<td><input type="text" name="prenom" id="prenom" required/></td>
				</tr>
				
				<tr>
					<td><label for="societe"><b>Société </b></label></td>
					<td><input type="text" name="societe" id="societe" /></td>
				</tr>
				
				<tr>
					<td><label for="courriel"><b>Courriel <span class="red">*</span></b></label></td>
					<td><input type="text" name="courriel" id="courriel" required/></td>
				</tr>
				
				<tr>	
					<td><label for="objet"><b>Objet </b></label></td>
					<td><input type="text" name="objet" id="objet" /></td>
				</tr>
					<td><label for="message"><b>Message <span class="red">*</span></b></label></td>
					<td><textarea name="message" id="message" rows="15" cols="40" style="resize:none" required></textarea></td>
				</tr>
				
				<tr>
					<td></td>
					<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
				</tr>		
		</table>
	</form>	
</div>

<div style="float:left;">
<hr class="separation" />
</div>

<div style="float:left; margin-left:2%;">
	<h2>Notre agence</h2>
	<br/>
	<p><b>
		Plug-It
		<br/>
		36 bis, rue Saint-Fuscien
		<br/>
		80000 Amiens
	
	</b></p>
	<br/>
	<p>
	Tél. : 03 22 22 10 90
	<br/>
	Fax : 03 22 80 76 52
	<br/>
	<a class="mail" href="mailto:contact@plug-it.com">contact@plug-it.com</a>
	</p>
	<br/>
	
	<!--Carte google API-->
	
		<html lang="fr">
		<head>
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
			
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			function initCarte(){
			// création de la carte
			var oMap = new google.maps.Map( document.getElementById( 'div_carte'),{
			'center' : new google.maps.LatLng( 46.80, 1.70),
			'zoom' : 6,
			'mapTypeId' : google.maps.MapTypeId.ROADMAP
			});
			}
			// init lorsque la page est chargée
			google.maps.event.addDomListener( window, 'load', initCarte);
			</script>
		</head>
		<body>
			<div id="div_carte"></div>
		</body>
		</html>
</div>

</div>