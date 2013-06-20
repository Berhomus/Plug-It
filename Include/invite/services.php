<?php
	if(!isset($_GET['mode']))
	{
		$_GET['mode'] = 'view';
	}

	
	mysql_connect('localhost', 'root', '');
	mysql_select_db ('plugit');
	
	switch($_GET['mode'])
	{
	
		case 'view':
			echo'<div style="margin:auto;width:70%;">
				<h2>DÉCOUVREZ L\'ENSEMBLE DE NOS SERVICES INFORMATIQUES LES PLUS POINTUS</h2>';
					
					$retour = mysql_query('SELECT * FROM services ORDER BY id DESC') or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo '<table cellspacing="20">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 0)
								echo '<tr>';
							
							echo '<td>
							<div class="blocksolution" onclick="location.href=\'Index.php?page=services&mode=viewone&id='.$donnees['id'].'\'">
								<img src="'.$donnees['image'].'" style="margin-left:5%;width:90%;"/><br/>
								<h3 style="text-align:center;font-size:18px;">'.$donnees['titre'].'</h3>
							</div></td>';
							
							$i++;
							if($i > 3)
							{
								$i=0;
								$j++;
								echo '</tr>';
							}
						}
					echo '</table>
				</div>';
		break;
			
		case 'viewone':
			
		break;
			
		default:
		break;
	}
	
	mysql_close();
