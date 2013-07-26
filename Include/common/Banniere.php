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
	<div style="margin-left:auto; width:950px; margin-right:auto"><a href="index.php?page=accueil"><img src="images/logotype_plug_it.png" style="position:absolute; float:left; bottom:25%; "/></a>
	<table style="position:relative; float:right; margin-left:10px;" height="137px" class="menu" cellspacing="0">
		<tr>
		<?php
		mysql_connect('mysql51-64.perso', 'plugitrhino','42cy0Dox')or die('Erreur SQL !<br />'.mysql_error());
		mysql_select_db ('plugitrhino')or die('Erreur SQL !<br />'.mysql_error());
		mysql_set_charset( 'utf8' );
		
		$rq = mysql_query("SELECT * FROM menu ORDER BY position")or die('Erreur SQL !<br />'.mysql_error());
		
		while($ar=mysql_fetch_array($rq))
		{
			if($ar['active'] == true)
			{
				// echo '<div id="accordeon">';
				// echo '<h3 onclick="location.href=\''.$ar['lien'].'\'">'.$ar['nom'].'</h3>';
				// echo '';
				// echo '';
				// echo '';
				// echo '';
				
				echo '
				<td onclick="location.href=\''.$ar['lien'].'\'"';
					if($ar['interne'] and $_GET['page'] == $ar['baseName'])
						echo 'class="menu_selected"';
					else
						echo 'class="menu_unselected"';
				echo '>'.$ar['nom'].'</td>';
			}
		}
		
		mysql_close();
		?>
		</tr>
	</table></div>
</div>

