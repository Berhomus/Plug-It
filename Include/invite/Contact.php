

	<h2>Contactez-Nous</h2>
	
	<table border="0" cellspacing="5" cellpadding="5">
		<form method="post" action="traitement.php" name="monformulaire">
			<p>
				<tr>
					<td><b>Civilit�</b></td>
					<td><select name="liste">
						<option value="M">M.</option>
						<option value="Mme">Mme</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td><label for="pseudo"><b>Nom </b></label></td>
					<td><input type="text" name="nom" id="nom" /></td>
				</tr>
				
				<tr>
					<td><label for="pseudo"><b>Pr�nom </b></label></td>
					<td><input type="text" name="prenom" id="prenom" /></td>
				</tr>
				
				<tr>
					<td><label for="pass"><b>Soci�t� </b></label></td>
					<td><input type="text" name="societe" id="societe" /></td>
				</tr>
				
				<tr>
					<td><label for="pass"><b>Courriel </b></label></td>
					<td><input type="text" name="courriel" id="courriel" /></td>
				</tr>
				
				<tr>	
					<td><label for="pass"><b>Objet </b></label></td>
					<td><input type="text" name="objet" id="objet" /></td>
				</tr>
		</form>			
	</table>

</br><input type="submit" name="envoyer" value="Envoyer" />			
</p>