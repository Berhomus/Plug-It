<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : admin_solutions.php => Plug-it
*********************************************************-->

<?php
if(isset($_SESSION['id']))
{
?>
<script type="text/javascript" src="js/fct_de_trt_txt.js"></script><?php	$id=0;	$nomsolu="";	$corps="";	$logosolu="";	$grandeimg="";	$desc="";
	$desc_origin="";
	$ordre=0;		if(isset($_POST) and !empty($_POST))	{		$id= (isset($_GET['id'])) ? $_GET['id']:0;		$nomsolu=$_POST['nomsolu'];		$desc=$_POST['desc'];		$corps=$_POST['corps'];
		$ordre=$_POST['ordre'];
		$desc_origin=$_POST['desc'];	}	if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());		mysql_set_charset( 'utf8' );
				$rq=mysql_query("SELECT COUNT(id) as cpt FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomsolu=$array['titre'];			$corps=$array['corps'];			$logosolu=$array['image_sol'];			$desc=$array['description'];			$grandeimg=$array['image_car'];
			$ordre=$array['ordre'];
			$desc_origin=$array['description'];		}		else		{			echo '<center><font color=red>Erreur solutions introuvable</font></center><br/>';		}				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'une solution</h2>			<br/><center>Tout champ vide ne sera pas modifié</center>';		$require = "";		$type = "modif&id=".$id;	}	else	{		echo '<h2>Ajout d\'une solution</h2>';		$require = "required";		$type = "create";	}	?><form method="post" enctype="multipart/form-data" action="traitement/trt_solutions.php?mode=<?php echo $type; ?>">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomsolu"><b>Nom de la solution <span class="red">*</span></b><br/><small id="lim_nom">(Max 20 caractères)</small></label></td>				<td><input size="50" type="text" name="nomsolu" id="nomsolu" value="<?php echo $nomsolu; ?>" <?php echo $require; ?> onblur="textLimit(this, 20, lim_nom);"/></td>			</tr>						<tr>				<td><label for="logosolu"><b>Logo de la solution <span class="red">*</span></b><br/><small>(Max 100Ko et uniquement jpg, png, gif et bmp<br/>(Taille conseillée 280x170)</small></label></td>				<td><input size="50" type="file" name="logosolu" id="logosolu" value="<?php echo $logosolu; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="grandeimg" id="grdimg"><b>Grande image pour l'accueil <span class="red">*</span></b><br/><small>(Max 300Ko et uniquement jpg, png, gif et bmp)<br/>(Taille conseillée 940x387)</small></label></td>				<td><input size="50" type="file" name="grandeimg" id="grandeimg" value="<?php echo $grandeimg; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="description"><b>Résumé de la solution <span class="red">*</span></b><br/><small id="lim_resu">(Max 3 Lignes)</small></label></td>				<td><div style="height: 100px; width:400px; overflow:scroll; margin-top:20px;" id="description" contenteditable="true" <?php echo $require; ?> onblur="textLimit3(this, lim_resu);required(this,grdimg,grandeimg);document.getElementById('desc').value = this.innerHTML;"><?php echo nl2br($desc); ?></div></td>			</tr>
			
			<tr>
				<td><label for="ordre"><b>Position</b><br/><small>(1ere position par défaut)</small></label></td>
				<td>
					<select name="ordre" id="ordre">
						<?php
							mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
							mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
							mysql_set_charset( 'utf8' );
							
							$rq=mysql_query("SELECT COUNT(id) AS nombre FROM solutions");
							$rq=mysql_fetch_array($rq);
							
							$var=($type=='create') ? $rq['nombre']+1 : $rq['nombre'];
							for($i=1;$i<=$var;$i++)
							{
								if(($ordre==0 && $i==1)|| $ordre==$i)
								{
									echo '<option value="'.$i.'" Selected="">'.$i.'</option>';
								}
								else
								{
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
							}
							MySQL_Close();
						?>
					</select>
				</td>
			</tr>						<tr>				<td colspan="2">					<div>						<p>							<input type="button" value="G" onclick="document.getElementById('ortf').focus(); document.execCommand('bold', false, '');" />
							<input type="button" value="I" onclick="document.getElementById('ortf').focus(); document.execCommand('italic', false, '');" />
							<input type="button" value="S" onclick="document.getElementById('ortf').focus(); document.execCommand('underline', false, '');" />
							<input type="button" value="Lien" onclick="document.getElementById('ortf').focus(); lien();" />
							<input type="button" value="Image" onclick="document.getElementById('ortf').focus(); img();" />
							<input type="button" value="Titre" onclick="document.getElementById('ortf').focus(); titre();" />
							<img src="images/fleche.png" alt="fleche" onclick="document.getElementById('ortf').focus(); document.execCommand('insertImage', false, 'images/fleche.png');" />
						</p>
						
					</div>
					
					<select name="cmbpolice" onchange="document.getElementById('ortf').focus(); document.execCommand('FontName', false ,this.value)">
						<option selected="" value="Arial">Police par défaut</option>
						<option value="Arial">Arial</option>
						<option value="Verdana">Verdana</option>
						<option value="Courier New">Courier New</option>
						<option value="Time New Roman">Time New Roman</option>
						<option value="Comic Sans MS">Comic Sans MS</option>
					</select>

					<select name="cmbtaille" onchange="document.getElementById('ortf').focus(); document.execCommand('FontSize',false,this.value)">
						<option selected="" value="3">Taille par défaut</option>
						<option value="1">1 (petite)</option>
						<option value="2">2</option>
						<option value="3">3 (normale)</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7 (grande)</option>
					</select>
								
					<select name="cmbcouleur" onchange="document.getElementById('ortf').focus(); document.execCommand('ForeColor',false,this.value)">
						<option selected="" value="555555">Couleur par défaut</option>
						<option value="ff0000">Rouge</option>
						<option value="0000ff">Bleu</option>
						<option value="00ff00">Vert</option>
						<option value="000000">Noir</option>
						<option value="FFFF00">Jaune</option>
						<option value="666666">Gris</option>
						<option value="FF6600">Orange</option>
					</select>
					
					<div style="height: 500px; width:800px; overflow:scroll; margin-top:20px;" id="ortf" contenteditable="true" onblur="document.getElementById('corps').value=this.innerHTML">
					<?php
						echo nl2br($corps);
					?>
					</div>
					<input type="hidden" value="" id="corps" name="corps" />					<input type="hidden" value="" id="desc" name="desc" />
				</td>			</tr>						<tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table></form>	

	<?php
	}
	else
	{
		echo '<h2 style="color:red">Access Forbidden !</h2>';
	}
	?>
