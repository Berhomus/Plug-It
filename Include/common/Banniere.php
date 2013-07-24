<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : Banniere.php => Plug-it
*********************************************************-->

<?php
	if(!isset($_GET['page']))
		$_GET['page'] = 'accueil';
		
	header( 'content-type: text/html; charset=utf-8' );

?>


<div style="overflow:hidden;">
	<a href="index.php?page=accueil"><img src="images/logotype_plug_it.png" style="position:absolute;bottom:25%;left:16%;"/></a>
	<table style="position:absolute;right:13%;" height="137px" class="menu" cellspacing="0">
		<tr>
<?php
		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
		mysql_set_charset( 'utf8' );
		
		$rq = mysql_query("SELECT * FROM menu ORDER BY position")or die('Erreur SQL !<br />'.mysql_error());
		
		while($ar=mysql_fetch_array($rq))
		{
			if($ar['active'] == true)
			{		
				echo '
				<td onclick="location.href=\''.$ar['lien'].'\'"';
					/*if($ar['interne'] and $_GET['n'] == $ar['position'])
						echo 'class="menu_selected"';
					else*/
						echo 'class="menu_unselected"';
				echo '>'.$ar['nom'].'</td>';
			}
		}
		
		mysql_close();
?>
		</tr>
	</table>
</div>

