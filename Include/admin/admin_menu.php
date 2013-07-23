<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : admin_solutions.php => Plug-it
*********************************************************-->


<?php
if(isset($_SESSION['id']))
{
	if(!isset($_GET['mode']))
		$_GET['mode'] = 'view';
	
	
}
else
{
	echo '<h2 style="color:red">Access Forbidden !</h2>';
}
?>
