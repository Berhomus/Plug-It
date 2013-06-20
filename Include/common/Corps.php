<?php
	if(!isset($_GET['page']))
	{
		$_GET['page'] = 'accueil';
	}
	
	switch ($_GET['page'])
	{
		case 'accueil':
		INCLUDE("\include\invite\accueil.php");
		break;
		
		case 'services':
		INCLUDE("\include\invite\services.php");
		break;
		
		case 'solutions':
		INCLUDE("\include\invite\solutions.php");
		break;
		
		case 'references':
		INCLUDE("include/invite/references.php");
		break;
		
		case 'contact':
		INCLUDE("\include\invite\contact.php");
		break;
		
		case 'support':
		INCLUDE("\include\invite\support.php");
		break;

		case 'admin':
		INCLUDE("\include\admin\admin.php");
		break;
		
		default :
		echo 'Page Inexistante';
		break;
	}
			
?>