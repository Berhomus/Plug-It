<?php

	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
	mysql_set_charset( 'utf8' );
	
	if(isset($_POST)&& !empty($_POST))
	{
		$i=1;
		foreach($_POST AS $meta)
		{
			$meta = htmlspecialchars($meta);
			$meta = mysql_real_escape_string($meta);
			MySQL_Query("UPDATE menu SET meta='$meta' WHERE position='$i'")or die('Erreur SQL !<br />'.mysql_error());
			$i++;
		}
	}
	
	echo '<center><h2>Modification des META</h2>';
	echo '<p style="color:green;">Les modifications ont bien été faite</p>';
	echo '<a href="../index.php?page=admin_gest_menu"><--</a></center>';
	
	MySQL_Close();
?>