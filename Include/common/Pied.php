<p class="p"><span class="span">Plug-It &copy; 2013</span>

<?php
	if(isset($_SESSION['id']))
		echo '<a href="index.php?page=accueil&dc=1" style="margin-right:3%;">Deconnexion</a>';
	else
		echo '<a href="index.php?page=admin" style="margin-right:3%;">Administration</a>';
?>

<a href="index.php?page=accueil&sub=mentions" style="margin-right:3%;">MENTIONS LEGALES</a></p>