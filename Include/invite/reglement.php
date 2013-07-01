<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 01/07/2013
Name : reglement.php => Plug-it
*********************************************************-->

<h2 class="titre">Réglement en ligne</h2>

<form method="post" action="#">
	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
				<tr>
					<td><label for="num"><b>Numéro de facture <span class="red">*</span></b></label></td>
					<td><input type="text" name="num" id="num" required/></td>
				</tr>
				
				<tr>
					<td><label for="nom"><b>Nom du client <span class="red">*</span></b></label></td>
					<td><input type="text" name="nom" id="nom" required/></td>
				</tr>
				
				<tr>
					<td><label for="societe"><b>Société </b></label></td>
					<td><input type="text" name="societe" id="societe" /></td>
				</tr>
				
				<tr>	
					<td><label for="montant"><b>Montant <span class="red">*</span></b></label></td>
					<td><input type="text" name="montant" id="montant" required/></td>
				</tr>
				
				<tr>
					<td><label for="commentaire"><b>Commentaire </b><br/><small>(facultatif)</small></label></td>
					<td><textarea name="commentaire" id="commentaire" rows="15" cols="40" style="resize:none" ></textarea></td>
				</tr>
				
				<tr>
					<td>
					</td>
					<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
				</tr>		
		</table>
	</form>	