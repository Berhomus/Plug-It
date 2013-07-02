<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 01/07/2013
Name : reglement.php => Plug-it
*********************************************************-->

<script>
	function isEmail(adr, id){
     // étape consistant à définir l'expression régulière d'une adresse email
     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

     if(regEmail.test(adr.value) && adr.value.length < 50)
	 {
		id.style.color='green';
	 }
	 else
	 {
		id.style.color='red';
		adr.value='';
		alert('Mail Invalide');
	 }
   }
   
   /*####FONCTION LIMITATION DE CARACTERES####*/

function textLimit(field, maxlen, idlimite) {
   if (field.value.length > maxlen) {
      field.value = field.value.substring(0, maxlen);
      alert('Dépassement de la limite de caracteres');
	  idlimite.style.color='red';
	  setTimeout(function(){idlimite.style.color='green';},2000);
   }
   else if((maxlen > field.value.length) && (field.value.length>0))
   {
	  setTimeout(function(){idlimite.style.color='green';},2000);
   }
   
}

function textLimit2(field, maxlen, idlimite) {
	if (field.value.length != maxlen) {
      field.value = "";
      alert('Nombre de caractères invalide !');
	  idlimite.style.color='red';
   }
   else
   {
	  idlimite.style.color='green';
   }
}

function isNumber(field,id){
	var regNbr = new RegExp('^[0-9]*([\.,][0-9]{0,2})?$','i');
	
	if (!regNbr.test(field.value) || field.value.length == 0) //cas où la valeur n'est pas du tout un nombre
	{
		field.value = ""; // la valeur devient nulle
		id.style.color = "red";
		alert("Valeur incorrecte !");
	}
	else
	{
		id.style.color = "green";
		
		var value = field.value.replace(",",".");
		
		var entiere = parseInt(value);
		var decimale = field.value.substring(value.lastIndexOf("."));
		if(decimale != entiere)
		{
			var i;
			for(i = decimale.length;i<3;i++)
				value += "0";
		}
		else
		{
			value += ".00";
		}
		
		field.value = value;
	}
}
</script>

<h2 class="titre">Paiement en ligne</h2>

<?php
	if(isset($_POST) and !empty($_POST))
	{
		$_POST['societe'] = (!empty($_POST['societe'])) ? $_POST['societe']:"/";
		$_POST['commentaire'] = (!empty($_POST['commentaire'])) ? $_POST['commentaire']:"/";
		
?>		
		<h2 class="titre">Récapitulatif</h2>
		<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
			<tr>
				<td><b>Numéro de facture</b></td>
				<td><?php echo $_POST['num']; ?></td>
			</tr>
			
			<tr>
				<td><b>Nom du client</b></td>
				<td><?php echo $_POST['nom']; ?></td>
			</tr>
			
			<tr>
				<td><b>Société</b></td>
				<td><?php echo $_POST['societe']; ?></td>
			</tr>
			
			<tr>
				<td><b>Courriel</b></td>
				<td><?php echo $_POST['courriel']; ?></td>
			</tr>
			
			<tr>	
				<td><b>Montant</b></td>
				<td><?php echo $_POST['montant']; ?>€</td>
			</tr>
			
			<tr>
				<td><b>Commentaire</b></td>
				<td><?php echo $_POST['commentaire']; ?></td>
			</tr>	
		</table>
		
<?php
		$_POST['montant'] = str_replace('.',"",$_POST['montant']);
		include("include/webaffaires/call_request.php");
	}
	else
	{
?>
		<form method="post" action="#">
			<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
						<tr>
							<td><label for="num"><b>Numéro de facture <span class="red">*</span></b><br/><small id="lim_num">(10 caractères)</small></label></td>
							<td><input style="text-align:right;" type="text" name="num" id="num" onblur="textLimit2(this,10, lim_num);" required/></td>
						</tr>
						
						<tr>
							<td><label for="nom"><b>Nom du client <span class="red">*</span></b><br/><small id="lim_nom">(Max 50 caractères)</small></label></td>
							<td><input  style="text-align:right;"type="text" name="nom" id="nom" onblur="textLimit(this,50, lim_nom);" required/></td>
						</tr>
						
						<tr>
							<td><label for="societe"><b>Société </b><br/><small id="lim_soc">(Max 50 caractères)</small></label></td>
							<td><input style="text-align:right;" type="text" name="societe" id="societe" onblur="textLimit(this,50, lim_soc);" /></td>
						</tr>
						
						<tr>
							<td><label for="courriel" id="email"><b>Courriel <span class="red">*</span></b></label></td>
							<td><input style="text-align:right;" type="text" name="courriel" id="courriel" onblur="isEmail(this,email);" required/></td>
						</tr>
						
						<tr>
							<td><label for="num"><b>Numéro de facture <span class="red">*</span></b><br/><small id="lim_num">(10 caractères)</small></label></td>
							<td><input type="text" name="num" id="num" onblur="textLimit2(this,10, lim_num);" required/></td>
						</tr>
						
						<tr>	
							<td><label for="montant" id="lim_montant"><b>Montant <span class="red">*</span></b></label></td>
							<td><input style="text-align:right;" type="text" name="montant" id="montant" onblur="isNumber(this,lim_montant);" required/> €</td>
						</tr>
						
						<tr>
							<td><label for="commentaire"><b>Commentaire </b><br/><small>(facultatif)</small></label></td>
							<td><textarea name="commentaire" id="commentaire" rows="10" cols="40" style="resize:none" ></textarea></td>
						</tr>
						
						<tr>
							<td>
							</td>
							<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
						</tr>		
				</table>
			</form>	
<?php
	}
?>