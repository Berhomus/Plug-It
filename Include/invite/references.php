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
				<h2>Ils nous font confiance</h2>';
					
					$retour = mysql_query("SELECT * FROM references") or die('Erreur SQL !<br />'.mysql_error());
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo '<table cellspacing="20">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 0)
								echo '<tr>';
							
							echo '<td>
							<div class="blockref">
								<a href="'.$donnees['lien'].'" ><img src="'.$donnees['image'].'" style="margin-left:5%;width:90%;border:2px solid #f9bd1a;"/></a><br/>
								<h3 style="text-align:center;font-size:18px;">'.$donnees['titre'].'</h3>
								'.$donnees['sous_titre'].'
							</div></td>';
							
							$i++;
							if($i > 4)
							{
								$i=0;
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