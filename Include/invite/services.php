<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Bohrane/Villain Benoit
Last Update : 26/06/2013
Name : services.php => Plug-it
*********************************************************-->

<?php
	if(!isset($_GET['mode']))
	{
		$_GET['mode'] = 'view';
	}

	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
	
	switch($_GET['mode'])
	{
	
		case 'view':
			echo'<div style="margin:auto;width:70%;">
				<h2>DÉCOUVREZ L\'ENSEMBLE DE NOS SERVICES INFORMATIQUES LES PLUS POINTUS</h2>';
					
					$retour = mysql_query('SELECT * FROM services ORDER BY date DESC') or die('Erreur SQL !<br />'.mysql_error());
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo '<table cellspacing="20">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 1)
								echo '<tr>';
							
							echo '<td>
							<div class="blockservice" onclick="location.href=\'Index.php?page=services&mode=viewone&id='.$donnees['id'].'\'">';
							
							if(isset($_SESSION['id']))
							{
								echo'
								<span style="margin-left:10%;"><a class="bt" href="index.php?page=admin_services&mode=modifier&id='.$donnees['id'].'">Modifier</a> - 
								<a class="bt" href="traitement/trt_services.php?mode=delete&id='.$donnees['id'].'">Supprimer</a></span>';
							}
								
								
							echo'	
								<img src="'.$donnees['image'].'" style="margin-left:5%;width:90%;"/><br/>
								<h3 style="font-size:18px;">'.$donnees['titre'].'</h3>
								
							</div></td>';
							
							$i++;
							if($i > 3)
							{
								$i=1;
								$j++;
								echo '</tr>';
							}
						}
					echo '</table>
				</div>';
		break;
			
		case 'viewone':
			if(isset($_GET['id']))//verif existence id
			{
				$retour = mysql_query("SELECT count(id) as cpt FROM services WHERE id='".$_GET["id"]."'")or die('Erreur SQL !<br />'.mysql_error());
				$donnees = mysql_fetch_array($retour);
				
				if($donnees['cpt'] == 1)
				{
					//affichage 
					$retour = mysql_query("SELECT * FROM services WHERE id='".$_GET['id']."'") or die('Erreur SQL !<br />'.mysql_error());
					$donnees = mysql_fetch_array($retour);
					
					echo '<div style="margin:auto;width:70%;">
						<table>
							<tr>
								<td><img src="'.$donnees['image'].'" style="width:60%;"/></td>
								<td><h2>'.$donnees['titre'].'</h2></td>
							</tr>
						</table>
						<hr/>
						'.$donnees['corps'].'
						</div>';
						
					
					//affichage autres liens					
					$retour = mysql_query("SELECT * FROM services WHERE id<>'".$_GET['id']."' ORDER BY date DESC LIMIT 10")or die('Erreur SQL !<br />'.mysql_error());
					
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo'<div style="margin:auto;width:80%;">
					<table cellspacing="10">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 1)
								echo '<tr>';
							
							echo '<td>
							<div class="blocklink" onclick="location.href=\'Index.php?page=services&mode=viewone&id='.$donnees['id'].'\'">
								<p style="text-align:center;position:relative;top:30%;">
									<img src="images/fleche.png" style="vertical-align:middle;"/> <span style="font-size:13px;font-weight:bold;margin-left:5px;text-transform:uppercase;">'.$donnees['subtitre'].'</span>
								</p>
							</div></td>';
							
							$i++;
							if($i > 5)
							{
								$i=1;
								$j++;
								echo '</tr>';
							}
						}
					echo '</table>
				</div>';
					
				}
				else
					echo '<p>Erreur</p>';
			}
			else
				echo '<p>Erreur</p>';
		break;
			
		default:
		break;
	}
	
	mysql_close();
