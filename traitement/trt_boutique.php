<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : trt_Produit.php => Plug-it
*********************************************************-->

<div style="margin:auto;width:400px;">
<?php
	
	include("../function/upload.php");
	include("../function/trt_image.php");
	
	mysql_connect('mysql51-64.perso', 'plugitrhino','42cy0Dox' '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugitrhino')or die('Erreur SQL !<br />'.mysql_error());
	mysql_set_charset( 'utf8' );

	if(isset($_GET['mode']))
	{
		switch($_GET['mode'])
		{
			case 'delete':
				echo ('<h2>Suppression Produit</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						$rq = mysql_query("SELECT ordre FROM produit WHERE id='".$_GET['id']."'")or die("fail ".$i. " => Erreur SQL !<br />".mysql_error());
						$ar = mysql_fetch_array($rq);

						mysql_query("DELETE FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						echo ('<h2 style="color:green;">Produit Supprimée !</h2>');
					}
					else
					{
						echo ('<h2 style="color:red;">Produit inexistante !</h2>');
					}
				}
				else
				{
					echo ('<h2 style="color:red;">Produit non spécifiée !</h2>');
				}
			break;
			
			case 'modif':
				echo ('<h2>Modification Produit</h2>');
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);

					if($array['cpt'])
					{
						if(empty($_FILES['logosolu']['name'])or ($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','.bmp'),'logosolu')) != '')
						{
								$rq=mysql_query("SELECT * FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
								$array=mysql_fetch_array($rq);
								
								$titre = (!empty($_POST['nomsolu'])) ? $_POST['nomsolu']:$array['titre'];
								$corps = (!empty($_POST['corps'])) ? $_POST['corps']:$array['corps'];
								$path = (isset($path)) ? make_limg($path):$array['image_sol'];
								$ordre = $_POST['ordre'];
								
								$titre = htmlspecialchars($titre);
								
								$titre = mysql_real_escape_string($titre);
								$corps = mysql_real_escape_string($corps);							
								
								mysql_query("UPDATE produit SET priorite='$ordre', images='$path', nom='$titre', corps='$corps' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
								echo ('<h2 style="color:green;">Produit Modifiée !</h2>');
							}
							else
							{
							?>
								
									<form method="POST" action="../index.php?page=admin_boutique&id=<?php echo $_GET['id']?>">
										<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
										<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
										<input type="hidden" name="ordre" value="<?php echo $_POST['ordre'];?>"/>
										<input type="submit" value="Retour Formulaire"/>
									</form>
							<?php
							}
					}
					else
					{
						echo ('<h2 style="color:red;">Produit inexistante !</h2>');
					}
				}
				else
				{
					echo ('<h2 style="color:red;">Produit non spécifiée !</h2>');
				}
			break;
			
			case 'create':
				echo ('<h2>Création Produit</h2>');
				if(isset($_POST) and !empty($_POST))
				{	
					
					if(($path = upload('../images/',100000,array('.png', '.gif', '.jpg', '.jpeg','.bmp'),'logoprod')) != '')
					{
							$titre = htmlspecialchars($_POST['nomsolu']);

							
							$titre = mysql_real_escape_string($titre);
							$corps = mysql_real_escape_string($_POST['corps']);
							$ordre = $_POST['ordre'];
							
							$path = make_limg($path);
							
							mysql_query("INSERT INTO produit VALUES (Null,'$titre','$path','$corps',Null,'$ordre')")or die('Erreur SQL !<br />'.mysql_error());
							echo ('<h2 style="color:green;">Produit Créée !</h2>');
						}
						else
						{
							?>
								<form method="POST" action="../index.php?page=admin_boutique">
									<input type="hidden" name="nomsolu" value="<?php echo htmlspecialchars($_POST['nomsolu']);?>"/>
									<input type="hidden" name="corps" value="<?php echo htmlspecialchars($_POST['corps']);?>"/>
									<input type="hidden" name="ordre" value="<?php echo $_POST['ordre'];?>"/>
									<input type="submit" value="Retour Formulaire"/>
								</form>
							<?php
						}
				}
				else
				{
					echo ('<h2 style="color:red;">Donnée inexistante !</h2>');
				}
			break;
			
			default:
				echo ('<h2 style="color:red;">404 Page Introuvable !</h2>');
			break;
		}
	}
	else
	{
		echo ('<h2 style="color:red;">Mode Non spécifié !</h2>');
	}
	
	mysql_close();
	
	echo ('<center><a href="../index.php?page=boutique">Retour Produit</a></center>');
?>
</div>
