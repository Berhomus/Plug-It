<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : references.php => Plug-it
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
			echo'<div style="margin:auto;width:900px;">
				<h2>Ils nous font confiance</h2>';
				
				if(isset($_SESSION['id']))
				{
					echo '<br/><ul style="width:20%;margin:auto;"><li class="menuverti" onclick="location.href=\'Index.php?page=admin_ref\'">Ajouter une r&eacutef&eacuterence</li></ul>';
				}
				
					$retour = mysql_query("SELECT * FROM ref") or die('Erreur SQL !<br />'.mysql_error());
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo '<table cellspacing="20" callpadding="0">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 1)
								echo '<tr>';
							
							echo '<td>
							<div class="blockref">';
							
							if(isset($_SESSION['id']))
							{
								echo'
								<span style="margin-left:10%;"><a class="bt" href="index.php?page=admin_ref&id='.$donnees['id'].'">Modifier</a> - 
								<a class="bt" href="traitement/trt_ref.php?mode=delete&id='.$donnees['id'].'">Supprimer</a></span>';
							}
							
							echo'	
								<a href="'.$donnees['lien'].'" ><img src="'.$donnees['image'].'" style="width:100%;" width="220" height="161"/></a><br/>
								<h4>'.$donnees['titre'].'</h4>
								'.$donnees['sous_titre'].'
							</div></td>';
							
							$i++;
							if($i > 4)
							{
								$i=1;
								$j++;
								echo '</tr>';
							}
						}
					echo '</table>
				</div>';
		break;
			
		default:
		break;
	}
	
	mysql_close();