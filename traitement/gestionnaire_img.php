<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 27/06/2013
Name : admin.php => Plug-it
*********************************************************-->
<?php
if(isset($_SESSION['id']))
{
?>
<h2>Gestionnaire d'images</h2>

<div style="text-align:center;">
<?php
	if(isset($_FILES) and !empty($_FILES))
	{
		include("function/upload.php");
		upload('images/',1024*1024*2,array('.png','.jpg','.bmp','.gif','.jpeg'),'fichier');
	}
	
	if(isset($_GET['path']))
	{
		if(file_exists($_GET['path']) and filetype($_GET['path']) != 'dir')
		{
			unlink($_GET['path']);
			echo '<center style="color:green;">Suppression Réussite</center>';
		}
		else
		{
			echo '<center style="color:red;">Suppression Impossible</center>';
		}
	}
?>

</div>

<br/>
<br/>
<center>
	<form action="index.php?page=gestionnaire_img" method="POST" enctype="multipart/form-data" id="form-demo">
		<label for="fichier">Upload image : </label><input type="file" name="fichier" id="fichier" />
		<input type="submit" value="Valider"/>
		<br/>
		<small>(Max 2Mo)</small>
		<br/>
	</form>
<br/>
<?php
function mkmap($dir){
    echo "<table>";   
    $folder = opendir ($dir);
    $cpt=0;
	
    while ($file = readdir ($folder)) {  
		$pathfile = $dir.'/'.$file; 
        if ($file != "." && $file != ".." && filetype($pathfile) != 'dir') {           
            
			if($cpt==0)
			{
				echo'<tr>';
			}
			
			$fichier = basename($pathfile);
			$extension = strrchr($pathfile, '.'); 
			
            echo "<td><a class='menuverti' href=$pathfile title=$file>";
			
			if(strlen($fichier) <= 20)
			{
				echo $fichier."</a></td>";
			}
			else
			{
				echo substr($fichier,0,20-strlen($extension)-1)."...".$extension."</a></td>"; 
			}
			
			echo "<td><a class='croixred' href='index.php?page=gestionnaire_img&path=".$pathfile."'>X</a></td>"; 
			$cpt++;
			
			if($cpt>2)
			{
				echo'</tr>';
				$cpt=0;
			}
        }       
    }
    closedir ($folder);    
    echo "</table>";   
}

?>
<?php mkmap('./images'); ?>
</center>
<?php
}
else
{
	echo '<h2 style="color:red">Access Forbidden !</h2>';
}
?>