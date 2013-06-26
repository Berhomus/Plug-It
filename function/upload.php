<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Bohrane/Villain Benoit
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
			 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
			 $erreur = 'Le fichier est trop gros...';
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
				  echo 'Upload effectué avec succès !';
				  return 'images/' . $fichier;
			 }
			 else //Sinon (la fonction renvoie FALSE).
			 {
				  echo 'Echec de l\'upload !';
				  return '';
			 }
		}
		else
		{
			 echo $erreur;
			 return '';
		}
	}
	else
		echo '<h2 style="color:red;">Pas de fichier existant</h2>';
	
	return -1;
}

?>