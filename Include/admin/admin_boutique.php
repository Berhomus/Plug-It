<script type="text/javascript" src="js/fct_de_trt_txt.js"></script>

<?php
if(isset($_SESSION['id']))
{
?>

<?php
	$id=0;
	$nomserv="";
	$corps="";
	$logoserv="";
	$soustitre="";
	$ordre=0;
	
	if(isset($_POST) and !empty($_POST))
	{
		$id= (isset($_GET['id'])) ? $_GET['id']:0;
		$nomserv=$_POST['nomserv'];
		$soustitre=$_POST['soustitre'];
		$corps=$_POST['corps'];
		$ordre=$_POST['ordre'];
	}
	else if(isset($_GET['id']))
	{
		mysql_connect('mysql51-64.perso', 'plugitrhino','42cy0Dox')or die('Erreur SQL !<br />'.mysql_error());
		mysql_select_db ('plugitrhino')or die('Erreur SQL !<br />'.mysql_error());
		
		$rq=mysql_query("SELECT COUNT(id) as cpt FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
		$array=mysql_fetch_array($rq);
		mysql_set_charset( 'utf8' );
		
		if($array['cpt']==1)
		{
			$rq=mysql_query("SELECT * FROM produit WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
			$array=mysql_fetch_array($rq);
			
			$id=$array['id'];
			$nomserv=$array['titre'];
			$corps=$array['corps'];
			$logoserv=$array['image'];
			$soustitre=$array['subtitre'];
			$ordre=$array['ordre'];
		}
		else
		{
			echo '<center><font color=red>Erreur référence introuvable</font></center><br/>';
		}
		
		mysql_close();
	}
	
	if($id!=0)
	{
		echo '<h2>Modification d\'un Produit</h2>
			<br/><center>Tout champ vide ne sera pas modifié</center>';
		$require = "";
		$type = "modif&id=".$id;
	}
	else
	{
		echo '<h2>Ajout d\'un Produit</h2>';
		$require = "required";
		$type = "create";
	}
	
?>

<form method="post" enctype="multipart/form-data" action="traitement/trt_boutique.php?mode=<?php echo $type; ?>">
	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">				
			<tr>
				<td><label for="titre"><b>Nom du produit <span class="red">*</span></b><br/><small id="lim_nom">(Max 70 caractères)</small></label></td>
				<td><input size="50" type="text" name="titre" id="titre" value="<?php echo $titre; ?>" <?php echo $require; ?> onblur="textLimit(this,70, lim_nom);"/></td>
			</tr>
			
			<tr>
				<td><label for="logoprod"><b>Logo du produit <span class="red">*</span></b><br/><small>(Max 100Ko et uniquement jpg, png, gif et bmp)<br/>(Taille conseillée 280x157)</small></label></td>
				<td><input size="50" type="file" name="logoprod" id="logoprod" value="<?php echo $logoprod; ?>" <?php echo $require; ?>/></td>
			</tr>
			
			<tr>
				<td><label for="ordre"><b>Priorité</b><br/><small>(Bas 1/5 Haut)</small></label></td>
				<td>
					<select name="ordre" id="ordre">
						<?php
							for($i=1;$i<=5;$i++)
							{
								echo '<option value="'.$i.'">'.$i.'</option>';
							}

						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><label for="nomserv"><b>Prix du produit <span class="red">*</span></b><br/><small id="lim_nom">(Chiffre en €)</small></label></td>
				<td><input size="50" type="text" name="nomserv" id="nomserv" value="<?php echo $nomserv; ?>" <?php echo $require; ?> onblur="textLimit(this,70, lim_nom);"/></td>
			</tr>
			
			<tr>
				<td><label for="nomserv"><b>Catégorie du produit <span class="red">*</span></b><br/><small id="lim_nom">(Chiffre en €)</small></label></td>
				<td><input size="50" type="text" name="nomserv" id="nomserv" value="<?php echo $nomserv; ?>" <?php echo $require; ?> onblur="textLimit(this,70, lim_nom);"/></td>
			</tr>
			
			<tr>
				<td colspan="2">
					<div style="margin-bottom:5px;">
						<p>
							<b>Description du produit <span class="red">*</span></b>
							<br/>
							<br/>
							<input type="button" value="G" onclick="document.getElementById('ortf').focus(); document.execCommand('bold', false, '');" />
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
					
					<input type="hidden" value="" id="corps" name="corps" />
					 
				</td>
			</tr>
			
			<tr>
				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
			</tr>		
	</table>
	</form>	
	
<?php
}
else
{
	echo '<h2 style="color:red">Access Forbidden !</h2>';
}
?>