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
		INCLUDE("services.php");
		break;
		
		case 'solutions':
		INCLUDE("solutions.php");
		break;
		
		case 'references':
		INCLUDE("references.php");
		break;
		
		case 'contact':
		INCLUDE("\include\invite\contact.php");
		break;
		
		case 'support':
		INCLUDE("\include\invite\support.php");
		break;
		
		case 'mentions':
		INCLUDE("mentions.php");
		break;
		
		case 'admin':
		INCLUDE("\include\admin\admin.php");
		break;
		
		case 'lecoute-le-conseil':
		INCLUDE("\include\invite\lecoute-le-conseil.php");
		break;
		
		case 'les-solutions-dediees':
		INCLUDE("\include\invite\les-solutions-dediees.php");
		break;
		
		default :
		echo 'Page Inexistante';
		break;
	}
			
?>