<?php
if(isset($_SESSION['id']))
{
?>

<script>
	/*function spoil(){
		var div = document.getElementById('conteneur');
		
		if(div.style.display == 'none')
		{
			div.style.display = 'block';
		}
		else
		{
			div.style.display = 'none';
		}
	}*/
	
	function popup()
    {
    window.open('./include/admin/conseil.html','Pop-up','toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=430,left=75,top=60');
    }

</script>

<h2>Gestion du référencement</h2>
<br/>
	<p><a href="javascript:popup()" style="margin:auto;" class="boutprod">Conseils</a></p>

<?php

	mysql_connect('mysql51-64.perso', 'plugitrhino','42cy0Dox')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugitrhino')or die('Erreur SQL !<br />'.mysql_error());
	mysql_set_charset( 'utf8' );
	
	$rq = mysql_query("SELECT * FROM menu ORDER BY position")or die('Erreur SQL !<br />'.mysql_error());
	$i=1;
	
	echo '<form action="./traitement/trt_gest_meta.php" method="POST">';
	echo '<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">';
	while ($donnees = mysql_fetch_array($rq))
	{
		echo '<tr><td>La description pour <b>'.$donnees['nom'].'</b></td>';
		echo '<td><textarea name="meta'.$i.'" rows="4" cols="60" style="resize:none">'.$donnees['meta'].'</textarea></td></tr>';
		$i++;
	}
	echo '<tr><td><input type="submit" value="Valider"/></td></tr>';
	echo '</table></form>';
?>
	
<?php
}
else
{
	echo '<h2 style="color:red">Access Forbidden !</h2>';
}
?>
