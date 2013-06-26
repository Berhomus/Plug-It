<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : connect_f.php => Plug-it
*********************************************************-->

<?php
function connect()
{	
	if(isset($_POST['login']) and isset($_POST['pass']))
	{
		$_POST['login'] = htmlspecialchars($_POST['login']);
		$_POST['pass'] = htmlspecialchars($_POST['pass']); 
		//securité
		$_POST['login'] = mysql_real_escape_string($_POST['login']);
		$_POST['pass'] = mysql_real_escape_string($_POST['pass']); 
		
		//connection bdd
		$connexion = mysql_connect('localhost', 'root', '') OR die('Erreur de connexion');
		mysql_select_db('plugit') OR die('Sélection de la base impossible'); 
		$login = $_POST["login"];
		$rq = mysql_query("SELECT COUNT(login) AS cpt FROM admin WHERE login ='$login'");//selection données
		$array = mysql_fetch_assoc($rq);
		if($array['cpt'] == 0) 
		{
			return -1;//pas de pseudo
		}
		else
		{
			$rq = mysql_query("SELECT * FROM admin WHERE login ='$login'");
			$array = mysql_fetch_assoc($rq);
			if(MD5($_POST['pass']) == $array['mdp_md5'])//verification password
			{
				$_SESSION['id'] = $array['id'];
				$_SESSION['login'] = $array['login'];		
				
				return 0;//ok
			}
			else
			{
				return -2;//mauvais pass
			}
		}
		mysql_close();
	}
}
?>