<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 27/06/2013
Name : admin.php => Plug-it
*********************************************************-->	
<?php

	if(!isset($_GET['sub']))
	{
		$_GET['sub'] = 'main';
	}

	
	switch($_GET['sub'])
	{
		case 'main':
			echo '<h2>Back-Up</h2>
			<center>
				<ul style="width:20%;margin:auto;">
					<li class="menuverti" onclick="location.href=\'Index.php?page=backup&sub=save\'">Sauvegarder</li>
					<li class="menuverti" onclick="location.href=\'Index.php?page=backup&sub=load\'">Restaurer</li>
				</ul>
			</center>';
		break;
		
		case 'save':
			$path = 'backup/backup_'.date('Y_m_d').'_v1';
			$i = 2;
			while(file_exists($path))
			{
				$path = str_replace('_v'.($i-1),'_v'.$i,$path);
				$i++;
			}
			
			mkdir($path);
			
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$db = 'plugit';
			$table = 'table1 table2'; //Nom des tables � sauvegarder - Optionnel
			$rep = './'.$path; //R�pertoire o� sauvegarder le dump de la base de donn�es

			system("mysqldump --host=".$host." --user=".$username." --password=".$password." 
			".$db."  > ".$rep.$db."-".date("d-m-Y-H\hi").".sql");
		  
		break;
		
		case 'load':
		
		break;
		
		default:
		break;
	}

?>
