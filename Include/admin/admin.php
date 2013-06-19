<?php

include("function/connect_f.php");

$error_co = connect();



if(!isset($_SESSION['id']))
{
	$_GET['dc']=0;
		echo '
			<form action="#" method="POST" style="text-align:center;"> 
				<table cellspacing="0%" cellpadding="0%" style="margin:auto;">
					<tr>
						<td><p>Pseudo :</p></td>
						<td><input type="text" name="login" size="15" required="required"/></td>
					</tr>
					<tr>
						<td> <p>Mot de Passe :</p></td>
						<td><input type="password" size="15" name="pass" required="required"/></td>
					</tr>';
			
		if(isset($error_co) && $error_co != 0)
		{
			echo "<tr><td colspawn=2>Erreur : $error_co</td></tr>";
		}
					
					
		echo '			
					<tr>
						<td><input type="Submit" value="Valider"/></td>
						<td><input type="reset" value="Annuler" /></td>
					</tr>
				</table>
			</form>';
}

?>