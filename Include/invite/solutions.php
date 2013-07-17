<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : solutions.php => Plug-it
*********************************************************-->

<?php
	if(!isset($_GET['mode']))
	{
		$_GET['mode'] = 'view';
	}

	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
	mysql_set_charset( 'utf8' );
	
	switch($_GET['mode'])
	{
	
		case 'view':
			echo'<div style="margin:auto;width:1000px;">
				<h2>Découvrez toutes nos solutions innovantes pour vous satisfaire</h2>';
					
					$retour = mysql_query('SELECT * FROM solutions ORDER BY ordre') or die('Erreur SQL !<br />'.mysql_error());

					if(isset($_SESSION['id']))
					{
						echo '<br/><div style="margin-left:415px;" class="menuverti" onclick="location.href=\'Index.php?page=admin_solutions\'">Ajouter une solution</div>';
					}
					
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo '<table cellspacing="20">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 1)
								echo '<tr>';
							
							echo '<td>
							<div class="blocksolution" onclick="location.href=\'Index.php?page=solutions&mode=viewone&id='.$donnees['id'].'\'">';
							
							if(isset($_SESSION['id']))
							{
								echo'
								<span style="margin-left:10%;"><a class="bt" href="index.php?page=admin_solutions&mode=modifier&id='.$donnees['id'].'">Modifier</a> - 
								<a class="bt" href="traitement/trt_solutions.php?mode=delete&id='.$donnees['id'].'">Supprimer</a></span>';
							}
							
							echo'
								<img src="'.$donnees['image_sol'].'" style="margin-left:5%;width:90%;" width="280" height="170"/><br/>
								<h3 style="text-align:center;font-size:18px;">'.$donnees['titre'].'</h3>
								'.nl2br($donnees['description']).'
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
			if(isset($_GET['id']))
			{
				$retour = mysql_query("SELECT count(id) as cpt FROM solutions WHERE id='".$_GET["id"]."'")or die('Erreur SQL !<br />'.mysql_error());
				$donnees = mysql_fetch_array($retour);
				
				if($donnees['cpt'] == 1)
				{
					//affichage 
					$retour = mysql_query("SELECT * FROM solutions WHERE id='".$_GET['id']."'") or die('Erreur SQL !<br />'.mysql_error());
					$donnees = mysql_fetch_array($retour);
					
					echo '<div style="margin:auto;width:70%;">
							<img src="'.$donnees['image_sol'].'" style="float:right;" width="280" height="170" />
							'.nl2br($donnees['corps']);
							
					$j=mb_substr_count(nl2br($donnees['corps']),'<br />');

					for($i=15-$j;$i>0;$i--)
					{
						echo '<br/>';
					}
					
					
					echo '</div>';
						
					
					//affichage autres liens					
					$retour = mysql_query("SELECT * FROM solutions WHERE id<>'".$_GET['id']."' ORDER BY ordre LIMIT 10") or die('Erreur SQL !<br />'.mysql_error());
					
					$i=1; //délimite les colonnes
					$j=1; //délimite les lignes
					
					echo'<div style="margin:auto;width:60%;margin-top:20px;">
					<table cellspacing="10">';
					while ($donnees = mysql_fetch_array($retour))
						{
						
							if($i == 1)
								echo '<tr>';
							
							echo '<td>
							<div class="blocklink" onclick="location.href=\'Index.php?page=solutions&mode=viewone&id='.$donnees['id'].'\'">
								<p style="text-align:center;position:relative;top:30%;">
									<img src="images/fleche.png" style="vertical-align:middle;"/> <span style="font-size:13px;font-weight:bold;margin-left:5px;text-transform:uppercase;">'.$donnees['titre'].'</span>
								</p>
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