<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : trt_ref.php => Plug-it
*********************************************************-->

<?php
	
	include("../function/upload.php");
	
	header( 'content-type: text/html; charset=utf-8' );
	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());

	if(isset($_GET['mode']))
	{
		switch($_GET['mode'])
		{
			case 'delete':
				echo '<h2>Suppression Référence</h2>';
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						mysql_query("DELETE FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						echo '<h2 style="color:green;">Référence Supprimé !</h2>';
					}
					else
					{
						echo '<h2 style="color:red;">Référence inexistante !</h2>';
					}
				}
				else
				{
					echo '<h2 style="color:red;">Référence non spécifié !</h2>';
				}
			break;
			
			case 'modif':
				echo '<h2>Modification Référence</h2>';
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);

					if($array['cpt'])
					{
						if(empty($_FILES['logo']['name']) or ($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg'),'logo')) != '')
						{
							$rq=mysql_query("SELECT * FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							$array=mysql_fetch_array($rq);
							
							$titre = (!empty($_POST['nomcli'])) ? $_POST['nomcli']:$array['titre'];
							$soustitre = (!empty($_POST['soustitre'])) ? $_POST['soustitre']:$array['sous_titre'];
							$lien = (!empty($_POST['lien'])) ? $_POST['lien']:$array['lien'];
							$path = (isset($path)) ? $path:$array['image'];
							
							$titre = htmlspecialchars($titre);
							$soustitre = htmlspecialchars($soustitre);
							$lien = htmlspecialchars($lien);
							
							$titre = mysql_real_escape_string($titre);
							$soustitre = mysql_real_escape_string($soustitre);
							$lien = mysql_real_escape_string($lien);
							
							mysql_query("UPDATE ref SET image='$path', titre='$titre', sous_titre='$soustitre', lien='$lien' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							echo '<h2 style="color:green;">Référence Modifié !</h2>';
						}
						else
						{
							echo '
								<form method="POST" action="../index.php?page=admin_ref&id='.$_GET['id'].'">
									<input type="hidden" name="nomcli" value="'.$_POST['nomcli'].'"/>
									<input type="hidden" name="soustitre" value="'.$_POST['soustitre'].'"/>
									<input type="hidden" name="lien" value="'.$_POST['lien'].'"/>
									<input type="submit" value="Retour Formulaire"/>
								</form>
							';
						}
					}
					else
					{
						echo '<h2 style="color:red;">Référence inexistante !</h2>';
					}
				}
				else
				{
					echo '<h2 style="color:red;">Référence non spécifié !</h2>';
				}
			break;
			
			case 'create':
				echo '<h2>Création Référence</h2>';
				if(isset($_POST) and !empty($_POST))
				{	
					
					if(($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg'),'logo')) != '')
					{
						$titre = htmlspecialchars($_POST['nomcli']);
						$soustitre = htmlspecialchars($_POST['soustitre']);
						$lien = htmlspecialchars($_POST['lien']);
						
						$titre = mysql_real_escape_string($titre);
						$soustitre = mysql_real_escape_string($soustitre);
						$lien = mysql_real_escape_string($lien);
						
						mysql_query("INSERT INTO ref VALUES (Null,'$path','$titre','$lien','$soustitre',Null)")or die('Erreur SQL !<br />'.mysql_error());
						echo '<h2 style="color:green;">Référence Créé !</h2>';
					}
					else
					{
						echo '
								<form method="POST" action="../index.php?page=admin_ref">
									<input type="hidden" name="nomcli" value="'.$_POST['nomcli'].'"/>
									<input type="hidden" name="soustitre" value="'.$_POST['soustitre'].'"/>
									<input type="hidden" name="lien" value="'.$_POST['lien'].'"/>
									<input type="submit" value="Retour Formulaire"/>
								</form>
							';
					}
				}
				else
				{
					echo '<h2 style="color:red;">Donnée inexistante !</h2>';
				}
			break;
			
			default:
				echo '<h2 style="color:red;">404 Page Introuvable !</h2>';
			break;
		}
	}
	else
	{
		echo '<h2 style="color:red;">Mode Non spécifié !</h2>';
	}
	
	mysql_close();
	
	echo '<center><a href="../index.php?page=references">Retour Référence</a></center>';
?>