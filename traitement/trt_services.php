<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : trt_services.php => Plug-it
*********************************************************-->

<?php
if(isset($_SESSION['id']))
{
?>

<div style="margin:auto;width:400px;">
<?php
	
	include("../function/upload.php");
	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());

	if(isset($_GET['mode']))
	{
		switch($_GET['mode'])
		{
			case 'delete':
				echo utf8_decode('<h2>Suppression Service</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						mysql_query("DELETE FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						echo utf8_decode('<h2 style="color:green;">Service Supprimé !</h2>');
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Service inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Service non spécifié !</h2>');
				}
			break;
			
			case 'modif':
				echo utf8_decode('<h2>Modification Service</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);

					if($array['cpt'])
					{
						if(empty($_FILES['logoserv']['name']) or ($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','.bmp'),'logoserv')) != '')
						{
							$rq=mysql_query("SELECT * FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							$array=mysql_fetch_array($rq);
							
							$titre = (!empty($_POST['nomserv'])) ? $_POST['nomserv']:$array['titre'];
							$soustitre = (!empty($_POST['soustitre'])) ? $_POST['soustitre']:$array['subtitre'];
							$corps = (!empty($_POST['corps'])) ? $_POST['corps']:$array['corps'];
							$path = (isset($path)) ? $path:$array['image'];
							
							$titre = htmlspecialchars($titre);
							$soustitre = htmlspecialchars($soustitre);
							
							$titre = mysql_real_escape_string($titre);
							$soustitre = mysql_real_escape_string($soustitre);
							$corps = mysql_real_escape_string($corps);
							
							mysql_query("UPDATE services SET image='$path', titre='$titre', subtitre='$soustitre', corps='$corps' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
							echo utf8_decode('<h2 style="color:green;">Service Modifié !</h2>');
						}
						else
						{	
							?>		
									<form method="POST" action="../index.php?page=admin_services&id=<?php echo $_GET['id'];?>">
										<input type="hidden" name="nomserv" value="<?php echo htmlspecialchars($_POST['nomserv']);?>"/>
										<input type="hidden" name="soustitre" value="<?php echo htmlspecialchars($_POST['soustitre']);?>"/>
										<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
										<input type="submit" value="Retour Formulaire"/>
									</form>
							<?php
						}
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Service inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Service non spécifié !</h2>');
				}
			break;
			
			case 'create':
				echo utf8_decode('<h2>Création Service</h2>');
				if(isset($_POST) and !empty($_POST))
				{	
					
					if(($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','.bmp'),'logoserv')) != '')
					{
						$titre = htmlspecialchars($_POST['nomserv']);
						$soustitre = htmlspecialchars($_POST['soustitre']);
						
						$titre = mysql_real_escape_string($titre);
						$soustitre = mysql_real_escape_string($soustitre);
						$corps = mysql_real_escape_string($_POST['corps']);
						
						mysql_query("INSERT INTO services VALUES (Null,'$titre','$corps','$path','$soustitre',Null)")or die('Erreur SQL !<br />'.mysql_error());
						echo utf8_decode('<h2 style="color:green;">Référence Créé !</h2>');
					}
					else
					{
						?>
								
									<form method="POST" action="../index.php?page=admin_services">
										<input type="hidden" name="nomserv" value="<?php echo htmlspecialchars($_POST['nomserv']);?>"/>
										<input type="hidden" name="soustitre" value="<?php echo htmlspecialchars($_POST['soustitre']);?>"/>
										<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
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
	
	echo utf8_decode('<center><a href="../index.php?page=services">Retour Services</a></center>');
?>
</div>

	<?php
	}
	else
	{
		echo '<h2 style="color:red">Access Forbidden !</h2>';
	}
	?>