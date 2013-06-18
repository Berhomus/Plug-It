<?php
	if(!isset($_GET['page']))
	{
		$_GET['page'] = 'Accueil';
	}
	switch ($_GET['page'])
	{
		case 'Accueil':
		INCLUDE("Accueil.php");
		break;
		
		case 'Services':
		INCLUDE("Services.php");
		break;
		
		case 'Solutions':
		INCLUDE("Solutions.php");
		break;
		
		case 'References':
		INCLUDE("References.php");
		break;
		
		case 'Contact':
		INCLUDE("Contact.php");
		break;
		
		case 'Support':
		INCLUDE("Support.php");
		break;
		
		case 'Mentions':
		INCLUDE("Mentions.php");
		break;
		
		default :
		echo 'Page Inexistante';
		break;
	}
			
?>