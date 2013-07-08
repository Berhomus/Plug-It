<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : trt_ref.php => Plug-it
*********************************************************-->

<div style="margin:auto;width:80%;">
<?php
	
	include("../function/upload.php");
	include("../function/update_ordre.php");
	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());

	if(isset($_GET['mode']))
	{
		switch($_GET['mode'])
		{
			case 'delete':
				echo utf8_decode('<h2>Suppression Référence</h2>');
				if(isset($_GET['id']))
				{
					$ordre = $_POST['ordre'];
					
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						$rq = mysql_query("SELECT ordre FROM ref WHERE id='".$_GET['id']."'")or die("fail ".$i. " => Erreur SQL !<br />".mysql_error());
						$ar = mysql_fetch_array($rq);
						update_ordre($ar['ordre'],0,-1,'ref');
						mysql_query("DELETE FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						echo utf8_decode('<h2 style="color:green;">Référence Supprimée !</h2>');
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Référence inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Référence non spécifiée !</h2>');
				}
			break;
			
			case 'modif':
				echo utf8_decode('<h2>Modification Référence</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);

					if($array['cpt'])
					{
						if(empty($_FILES['logo']['name']) or ($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','bmp'),'logo')) != '')
						{
							$rq=mysql_query("SELECT * FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							$array=mysql_fetch_array($rq);
							
							$titre = (!empty($_POST['nomcli'])) ? $_POST['nomcli']:$array['titre'];
							$soustitre = (!empty($_POST['soustitre'])) ? $_POST['soustitre']:$array['sous_titre'];
							$lien = (!empty($_POST['lien'])) ? $_POST['lien']:$array['lien'];
							$path = (isset($path)) ? $path:$array['image'];
							$ordre = $_POST['ordre'];
							
							
							$titre = htmlspecialchars($titre);
							$soustitre = htmlspecialchars($soustitre);
							$lien = htmlspecialchars($lien);
							
							$titre = mysql_real_escape_string($titre);
							$soustitre = mysql_real_escape_string($soustitre);
							$lien = mysql_real_escape_string($lien);
							
							if($ordre>$array['ordre'])
							{
								$pas=-1;
							}
							else
							{
								$pas=1;
							}
							
							if($ordre!=$array['ordre'])
								update_ordre($array['ordre']-$pas,$ordre,$pas,'ref');
							
							mysql_query("UPDATE ref SET ordre='$ordre', image='$path', titre='$titre', sous_titre='$soustitre', lien='$lien' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							echo utf8_decode('<h2 style="color:green;">Référence Modifiée !</h2>');
						}
						else
						{
							?>
								<form method="POST" action="../index.php?page=admin_ref&id=<?php echo $_GET['id']?>">
									<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomcli']);?>"/>
									<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['soustitre']);?>"/>
									<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['lien']);?>"/>
									<input type="hidden" name="ordre" value="<?php echo $_POST['ordre'];?>"/>
									<input type="submit" value="Retour Formulaire"/>
								</form>
							<?php
						}
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Référence inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Référence non spécifiée !</h2>');
				}
			break;
			
			case 'create':
				echo utf8_decode('<h2>Création Référence</h2>');
				if(isset($_POST) and !empty($_POST))
				{	
					
					if(($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg'),'logo','.bmp')) != '')
					{
						$titre = htmlspecialchars($_POST['nomcli']);
						$soustitre = htmlspecialchars($_POST['soustitre']);
						$lien = htmlspecialchars($_POST['lien']);
						
						$titre = mysql_real_escape_string($titre);
						$soustitre = mysql_real_escape_string($soustitre);
						$lien = mysql_real_escape_string($lien);
						$ordre = $_POST['ordre'];
						
						update_ordre($ordre,0,1,'ref');
						
						mysql_query("INSERT INTO ref VALUES (Null,'$path','$titre','$lien','$soustitre',Null,'$ordre')")or die('Erreur SQL !<br />'.mysql_error());
						echo utf8_decode('<h2 style="color:green;">Référence Créée !</h2>');
					}
					else
					{
						?>
							<form method="POST" action="../index.php?page=admin_ref">
								<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomcli']);?>"/>
								<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['soustitre']);?>"/>
								<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['lien']);?>"/>
								<input type="hidden" name="ordre" value="<?php echo $_POST['ordre'];?>"/>
								<input type="submit" value="Retour Formulaire"/>
							</form>
						<?php
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Donnée inexistante !</h2>');
				}
			break;
			
			default:
				echo utf8_decode('<h2 style="color:red;">404 Page Introuvable !</h2>');
			break;
		}
	}
	else
	{
		echo utf8_decode('<h2 style="color:red;">Mode Non spécifié !</h2>');
	}
	
	mysql_close();
	
	echo utf8_decode('<center><a href="../index.php?page=references">Retour Référence</a></center>');
?>
</div>
