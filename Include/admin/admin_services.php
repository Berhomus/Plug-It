<?php	$id=0;	$nomserv="";	$corps="";	$logoserv="";	$soustitre="";	if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());				$rq=mysql_query("SELECT COUNT(id) as cpt FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomserv=$array['titre'];			$corps=$array['corps'];			$logoserv=$array['image'];			$soustitre=$array['subtitre'];		}		else		{			echo '<center><font color=red>Erreur référence introuvable</font></center><br/>';		}				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'un service</h2>			<br/><center>Tout champ vide ne sera pas modifié</center>';		$require = "";	}	else	{		echo '<h2>Ajout d\'un service</h2>';		$require = "required";	}	?><form method="post" enctype="multipart/form-data" action="#">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomserv"><b>Nom du service <span class="red">*</span></b></label></td>				<td><input size="50" type="text" name="nomserv" id="nomserv" value="<?php echo $nomserv; ?>" <?php echo $require; ?> /></td>			</tr>						<tr>				<td><label for="logoserv"><b>Logo du service <span class="red">*</span></b></label></td>				<td><input size="50" type="file" name="logoserv" id="logoserv" value="<?php echo $logoserv; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="soustitre"><b>Sous-titre <span class="red">*</span></b></label></td>				<td><input size="50" type="text" name="soustitre" id="soustitre" value="<?php echo $soustitre; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="corps"><b>Description du service <span class="red">*</span></b></label><br/><small>(en html)</small></td>				<td><textarea name="corps" id="corps" rows="35" cols="65" style="resize:none" <?php echo $require; ?>><?php echo $corps; ?></textarea></td>			</tr>						<tr>				<td><label for="corps"><b>Prévisualisation </b></label></td>				<td></td>			</tr>						<tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table></form>	