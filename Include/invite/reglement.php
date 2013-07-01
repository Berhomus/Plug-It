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
</script>

<h2 class="titre">Réglement en ligne</h2>

<form method="post" action="#">
	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
				<tr>
					<td><label for="num"><b>Numéro de facture <span class="red">*</span></b><br/><small id="lim_num">(10 caractères)</small></label></td>
					<td><input type="text" name="num" id="num" onblur="textLimit(this,10, lim_num);" required/></td>
				</tr>
				
				<tr>
					<td><label for="nom"><b>Nom du client <span class="red">*</span></b><br/><small id="lim_nom">(Max 50 caractères)</small></label></td>
					<td><input type="text" name="nom" id="nom" onblur="textLimit(this,50, lim_nom);" required/></td>
				</tr>
				
				<tr>
					<td><label for="societe"><b>Société </b><br/><small id="lim_soc">(Max 50 caractères)</small></label></td>
					<td><input type="text" name="societe" id="societe" onblur="textLimit(this,50, lim_soc);" /></td>
				</tr>
				
				<tr>
					<td><label for="courriel" id="email"><b>Courriel <span class="red">*</span></b></label></td>
					<td><input type="text" name="courriel" id="courriel" onblur="isEmail(this,email);" required/></td>
				</tr>
				
				<tr>	
					<td><label for="montant"><b>Montant <span class="red">*</span></b></label></td>
					<td><input type="text" name="montant" id="montant" required/></td>
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