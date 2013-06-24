<?php

	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());

	if(isset($_GET['mode']))
	{
		switch($_GET['mode'])
		{
			case 'delete':
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						mysql_query("DELETE FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					}
					else
					{
					
					}
				}
				else
				{

				}
			break;
			
			case 'modif':
				if(isset($_GET['id']))
				{
					$rq=mysql_query("SELECT COUNT(id) as cpt FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					$array=mysql_fetch_array($rq);
					
					if($array['cpt'])
					{
						$rq=mysql_query("SELECT * FROM ref WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
						$array=mysql_fetch_array($rq);
						
						$titre = (!empty($_POST['nomcli'])) ? $_POST['nomcli']:$array['titre'];
						$soustitre = (!empty($_POST['soustitre'])) ? $_POST['soustitre']:$array['sous_titre'];
						$lien = (!empty($_POST['lien'])) ? $_POST['lien']:$array['lien'];
						
						
						mysql_query("UPDATE ref SET titre='$titre', sous_titre='$soustitre', lien='$lien' WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());
					}
					else
					{
					
					}
				}
				else
				{

				}
			break;
			
			case 'create':
			
			break;
			
			default:
			break;
		}
	}
	else
	{
	
	}
	
	mysql_close();
?>