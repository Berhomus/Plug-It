<?php


//incrustage slider

function make_img($src,$title,$desc){
	echo $src;
	if(file_exists("../".$src))
	{
		$extension=strrchr($src,'.');
		
		if($extension == ".png")
			$destination = imagecreatefrompng("../".$src);
		else
			$destination = imagecreatefromjpeg("../".$src);
			
		$dossier = imagecreatefrompng("../images/dossier_g.png");
		$border = imagecreatefrompng("../images/border_g.png");

		$largeur_dossier = imagesx($dossier);
		$hauteur_dossier = imagesy($dossier);
		$largeur_border = imagesx($border);
		$hauteur_border = imagesy($border);
		$largeur_destination = imagesx($destination);
		$hauteur_destination = imagesy($destination);
		
		$d = imagecreatetruecolor(940, 387);			 
		imagecopyresampled($d, $destination, 0, 0, 0, 0, 940, 387, $largeur_destination, $hauteur_destination);	
		 
		 // On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
		$destination_x = 50;
		$destination_y =  150;
		$noir = imagecolorallocate($destination, 52, 52, 52);
		$orange = imagecolorallocate($destination, 242, 200, 78);
		 
		imagecopymerge($d, $border, $destination_x, $destination_y, 0, 0, $largeur_border, $hauteur_border, 90);
		 
		// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
		$destination_x = 110;
		$destination_y =  160;

		imagecopymerge($d, $dossier, $destination_x, $destination_y, 0, 0, $largeur_dossier, $hauteur_dossier, 100);

		$label_t = $title; 
		$labelfont = 25;

		ImageTTFText($d, $labelfont, 0, 120, 310, $noir, 'c:/windows/fonts/arialbd.ttf', 
					 $label_t);

		$label_t = nl2br($desc); 
		$labelfont = 11;

		ImageTTFText($d, $labelfont, 0, 120, 330, $noir, 'c:/windows/fonts/arialbd.ttf', 
					 $label_t);
			
		$name = array();
		$name = preg_split("/[\.]+/",$src);

		imagejpeg($d,"../".$name[0]."_make.".$name[1]);
		
		return ($name[0]."_make.".$name[1]);
	}
	else
		echo "Echec Création Image !";
	return "Echec Création Image !";
}

//incrustage mini image
function make_limg($src){	
	if(file_exists("../".$src))
	{ 
		$extension=strrchr($src,'.');
		
		if($extension == ".png")
			$destination = imagecreatefrompng("../".$src);
		else
			$destination = imagecreatefromjpeg("../".$src);
			
		$dossier = imagecreatefrompng("../images/dossier.png");
		$border = imagecreatefrompng("../images/border.png");

		$largeur_dossier = imagesx($dossier);
		$hauteur_dossier = imagesy($dossier);
		$largeur_border = imagesx($border);
		$hauteur_border = imagesy($border);
		$largeur_destination = imagesx($destination);
		$hauteur_destination = imagesy($destination);
		 
		$d = imagecreatetruecolor(280, 170);			 
		imagecopyresampled($d, $destination, 0, 0, 0, 0, 280, 170, $largeur_destination, $hauteur_destination);	
		 
		 // On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
		$destination_x = 0;
		$destination_y =  121;
		 
		imagecopymerge($d, $border, $destination_x, $destination_y, 0, 0, $largeur_border, $hauteur_border, 70);
		 
		// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
		$destination_x = 39;
		$destination_y =  122;

		imagecopymerge($d, $dossier, $destination_x, $destination_y, 0, 0, $largeur_dossier, $hauteur_dossier, 100);	

		$name = array();
		$name = preg_split("/[\.]+/",$src);

		imagejpeg($d,"../".$name[0]."_make.".$name[1]);
		
		return ($name[0]."_make.".$name[1]);
	}
	else
		return "Echec Création Image !";
	return "Echec Création Image !";
}	
			 

?>