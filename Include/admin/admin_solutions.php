<?php	$id=0;	$nomsolu="";	$corps="";	$logosolu="";	$grandeimg="";	$desc="";	if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());				$rq=mysql_query("SELECT COUNT(id) as cpt FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomsolu=$array['titre'];			$corps=$array['corps'];			$logosolu=$array['image_sol'];			$desc=$array['description'];			$grandeimg=$array['image_car'];		}		else		{			echo '<center><font color=red>Erreur solutions introuvable</font></center><br/>';		}				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'une solution</h2>			<br/><center>Tout champ vide ne sera pas modifi�</center>';		$require = "";	}	else	{		echo '<h2>Ajout d\'une solution</h2>';		$require = "required";	}	?><form method="post" enctype="multipart/form-data" action="#">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomsolu"><b>Nom de la solution <span class="red">*</span></b></label></td>				<td><input size="50" type="text" name="nomsolu" id="nomsolu" value="<?php echo $nomsolu; ?>" <?php echo $require; ?> /></td>			</tr>						<tr>				<td><label for="logosolu"><b>Logo de la solution <span class="red">*</span></b></label></td>				<td><input size="50" type="file" name="logosolu" id="logosolu" value="<?php echo $logosolu; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="grandeimg"><b>Grande image pour l'accueil <span class="red">*</span></b></label></td>				<td><input size="50" type="file" name="grandeimg" id="grandeimg" value="<?php echo $grandeimg; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="desc"><b>R�sum� de la solution <span class="red">*</span></b></label></td>				<td><textarea name="desc" id="desc" rows="5" cols="40" style="resize:none" <?php echo $require; ?>/><?php echo $desc; ?></textarea></td>			</tr>						<tr>				<td><label for="corps"><b>Description de la solution <span class="red">*</span></b></label><br/><small>(en html)</small></td>				<td><textarea name="corps" id="corps" rows="35" cols="65" style="resize:none" <?php echo $require; ?>><?php echo $corps; ?></textarea></td>			</tr>						<tr>				<td><label for="corps"><b>Pr�visualisation </b></label></td>				<td></td>			</tr>						<tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table></form>	