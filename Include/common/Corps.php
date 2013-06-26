<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : Corps.php => Plug-it
*********************************************************-->


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
		
		case 'admin_solutions':
		if(isset($_SESSION['id']))
		{
			INCLUDE("\include\admin\admin_solutions.php");
		}
		else
			echo 'erreur';
		break;
		
		case 'admin_services':
		if(isset($_SESSION['id']))
		{
			INCLUDE("\include\admin\admin_services.php");
		}
		else
			echo 'erreur';
		break;
		
		case 'admin_ref':
		if(isset($_SESSION['id']))
		{
			INCLUDE("\include\admin\admin_ref.php");
		}
		else
			echo 'erreur';
		break;
		
		default :
		echo 'Page Inexistante';
		break;
	}
			
?>