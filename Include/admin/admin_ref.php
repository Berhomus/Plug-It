<?php	$id=0;	$nomcli="";	$soustitre="";	$lien="";	$img="";		if(isset($_POST) and !empty($_POST))	{		$id= (isset($_GET['id'])) ? $_GET['id']:0;		$nomcli=$_POST['nomcli'];		$soustitre=$_POST['soustitre'];		$lien=$_POST['lien'];	}	else if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());				$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomcli=$array['titre'];			$soustitre=$array['sous_titre'];			$lien=$array['lien'];		}		else		{			echo 'Erreur r�f�rence introuvable';		}				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'une r�f�rence</h2>			<br/><center>Tout champ vide ne sera pas modifi�</center>';		$require = "";		$type = "modif&id=".$id;	}	else	{		echo '<h2>Ajout d\'une r�f�rence</h2>';		$require = "required";		$type = "create";	}	?><form method="post" enctype="multipart/form-data" action="traitement/trt_ref.php?mode=<?php echo $type; ?>">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomcli"><b>Nom du client <span class="red">*</span></b></label></td>				<td><input type="text" name="nomcli" id="nomcli" value="<?php echo $nomcli; ?>" <?php echo $require; ?> /></td>			</tr>						<tr>				<td><label for="soustitre"><b>Description rapide <span class="red">*</span></b></label></td>				<td><input type="text" name="soustitre" id="soustitre" value="<?php echo $soustitre; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="lien"><b>Lien vers le site du client <span class="red">*</span></b></label></td>				<td><input type="text" name="lien" id="lien" value="<?php echo $lien; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="logo"><b>Logo du client <span class="red">*</span></b></label></td>				<td><input type="file" name="logo" id="logo" <?php echo $require; ?>/></td>			</tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table></form>	

