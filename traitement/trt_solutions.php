<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : trt_solutions.php => Plug-it
*********************************************************-->
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
				echo utf8_decode('<h2>Suppression Solution</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						mysql_query("DELETE FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						echo utf8_decode('<h2 style="color:green;">Solution Supprimé !</h2>');
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Solution inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Solution non spécifié !</h2>');
				}
			break;
			
			case 'modif':
				echo utf8_decode('<h2>Modification Solution</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);

					if($array['cpt'])
					{
						if(empty($_FILES['logosolu']['name'])or ($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','bmp'),'logosolu')) != '')
						{
						
							if(empty($_FILES['grandeimg']['name'])or ($path2 = upload('../images/',300*1024,array('.png', '.gif', '.jpg', '.jpeg','bmp'),'grandeimg')) != '')
							{
								$rq=mysql_query("SELECT * FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
								$array=mysql_fetch_array($rq);
								
								$titre = (!empty($_POST['nomsolu'])) ? $_POST['nomsolu']:$array['titre'];
								$desc = (!empty($_POST['desc'])) ? $_POST['desc']:$array['description'];
								$corps = (!empty($_POST['corps'])) ? $_POST['corps']:$array['corps'];
								$path = (isset($path)) ? $path:$array['image_sol'];
								$path2 = (isset($path2)) ? $path2:$array['image_car'];
								
								$titre = htmlspecialchars($titre);
								$desc = htmlspecialchars($desc);
								
								$corps = preg_replace('`\n`isU', '<br />', $corps);
								
								$titre = mysql_real_escape_string($titre);
								$desc = mysql_real_escape_string($desc);
								$corps = mysql_real_escape_string($corps);
								
								mysql_query("UPDATE solutions SET image_sol='$path', image_car='$path2', titre='$titre', description='$desc', corps='$corps' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
								echo utf8_decode('<h2 style="color:green;">Solution Modifié !</h2>');
							}
							else
							{
							?>
								
									<form method="POST" action="../index.php?page=admin_solutions&id=<?php echo $_GET['id']?>">
										<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
										<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['desc']);?>"/>
										<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
										<input type="submit" value="Retour Formulaire"/>
									</form>
							<?php
							}
						}
						else
						{
							?>
								
									<form method="POST" action="../index.php?page=admin_solutions&id=<?php echo $_GET['id']?>">
										<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
										<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['desc']);?>"/>
										<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
										<input type="submit" value="Retour Formulaire"/>
									</form>
							<?php
						}
					}
					else
					{
						echo utf8_decode('<h2 style="color:red;">Solution inexistante !</h2>');
					}
				}
				else
				{
					echo utf8_decode('<h2 style="color:red;">Solution non spécifié !</h2>');
				}
			break;
			
			case 'create':
				echo utf8_decode('<h2>Création Solution</h2>');
				if(isset($_POST) and !empty($_POST))
				{	
					
					if(($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','bmp'),'logosolu')) != '')
					{
						if(($path2 = upload('../images/',300*1024,array('.png', '.gif', '.jpg', '.jpeg','bmp'),'grandeimg')) != '')
						{
							$titre = htmlspecialchars($_POST['nomsolu']);
							$desc = htmlspecialchars($_POST['desc']);
							
							$titre = mysql_real_escape_string($titre);
							$desc = mysql_real_escape_string($desc);
							$corps = mysql_real_escape_string($_POST['corps']);
							$corps = preg_replace('`\n`isU', '<br />', $corps);
							
							mysql_query("INSERT INTO solutions VALUES (Null,'$titre','$corps','$path2','$path','$desc',Null)")or die('Erreur SQL !<br />'.mysql_error());
							echo utf8_decode('<h2 style="color:green;">Référence Créé !</h2>');
						}
						else
						{
							?>
								<form method="POST" action="../index.php?page=admin_solutions">
									<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
									<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['desc']);?>"/>
									<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
									<input type="submit" value="Retour Formulaire"/>
								</form>
							<?php
						}
					}
					else
					{
						?>	
							<form method="POST" action="../index.php?page=admin_solutions">
								<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
								<input type="hidden" name="desc" value="<?php echo htmlspecialchars($_POST['desc']);?>"/>
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
	
	echo utf8_decode('<center><a href="../index.php?page=solutions">Retour Solution</a></center>');
?>
</div>