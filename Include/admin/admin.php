<?php

include("function/connect_f.php");

$error_co = connect();

?>
	

<h2>Administration</h2>

<?php
if(!isset($_SESSION['id']))
{
	$_GET['dc']=0;
?>

	<form action="#" method="POST" style="text-align:left;"> 
		<table style="margin:auto;">
			<tr>
				<td><img src="images/cadena.jpg" style="float:left;" width="200px" height="200px"/></td>
				<td>
					<?php
						echo '
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
									
									
						echo '</table>';
					?>
				</td>
			</tr>
			<tr>							
				<td></td>
				<td style="text-align:right;"><input type="reset" value="Annuler" /><input type="Submit" value="Valider"/></td>
			</tr>
		</table>
	</form>
<?php
}
else
{
?>
	<ul style="width:20%;margin:auto;">
		<li><a href="Index.php?page=admin_services">Nouveau Service</a></li>
		<li><a href="Index.php?page=admin_solutions">Nouvelle Solution</a></li>
		<li><a href="Index.php?page=admin_ref">Nouvelle R&eacutef&eacuterence</a></li>
	</ul>
<?php
}
?>