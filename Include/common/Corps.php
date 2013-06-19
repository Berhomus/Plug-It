<?php
	if(!isset($_GET['page']))
	{
		$_GET['page'] = 'Accueil';
	}
	switch ($_GET['page'])
	{
		case 'accueil':
		INCLUDE("Accueil.php");
		break;
		
		case 'services':
		INCLUDE("Services.php");
		break;
		
		case 'solutions':
		INCLUDE("Solutions.php");
		break;
		
		case 'references':
		INCLUDE("References.php");
		break;
		
		case 'contact':
		INCLUDE("\include\invite\contact.php");
		break;
		
		case 'support':
		INCLUDE("\include\invite\support.php");
		break;
		
		case 'mentions':
		INCLUDE("Mentions.php");
		break;
		
		case 'admin':
		INCLUDE("\include\admin\admin.php");
		break;
		
		default :
		echo 'Page Inexistante';
		break;
	}
			
?>