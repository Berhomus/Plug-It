<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : upload.php => Plug-it
*********************************************************-->

<?php
function upload($dossier,$taille_maxi,$extensions,$nom)
{
	if(isset($_FILES) and !empty($_FILES))
	{
		$fichier = basename($_FILES[$nom]['name']);
		$taille = filesize($_FILES[$nom]['tmp_name']);
		$extension = strrchr($_FILES[$nom]['name'], '.'); 
		//Début des vérifications de sécurité...
		
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			 $erreur = '<span style="color:red;">Vous devez uploader un fichier de type png, gif, jpg, jpeg !</span><br/>';
		}
		if($taille>$taille_maxi)
		{
			 $erreur = '<span style="color:red;">Le fichier est trop important, max :  '.($taille_maxi/1024).' kiloctect !</span><br/>';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			 //On formate le nom du fichier ici...
			 $fichier = strtr($fichier, 
				  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			 if(move_uploaded_file($_FILES[$nom]['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			 {
				  echo ('Upload effectué avec succès !<br/>');
				  return 'images/' . $fichier;
			 }
			 else //Sinon (la fonction renvoie FALSE).
			 {
				  echo ('Echec de l\'upload '.$fichier.' !<br/>');
				  return '';
			 }
		}
		else
		{
			 echo ($erreur);
			 return '';
		}
	}
	else
		echo ('<h2 style="color:red;">Pas de fichier existant</h2><br/>');
	
	return -1;
}

?>