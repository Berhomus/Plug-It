<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : admin_solutions.php => Plug-it
*********************************************************-->

<?php
if(isset($_SESSION['id']))
{
?>

<script>/*####FONCTION D'INSERTION DE BALISES####*/			function insertTag(startTag, endTag, corpsId, tagType) 
	{		var field  = document.getElementById(corpsId); 		var scroll = field.scrollTop; // On met en m�moire la position du scroll		field.focus(); // On remet le focus sur la zone de texte, suivant les navigateurs, on perd le focus en appelant la fonction. 	 	 /* === Partie 1 : on r�cup�re la s�lection === */	if (window.ActiveXObject) 
	{			var textRange = document.selection.createRange();           			var currentSelection = textRange.text;	} 
	else 
	{			var startSelection   = field.value.substring(0, field.selectionStart);			var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);			var endSelection     = field.value.substring(field.selectionEnd);              	}	 	/* === Partie 2 : on analyse le tagType === */	if (tagType) 
	{			switch (tagType) 
			{					case "lien":							endTag = "</a>";							if (currentSelection) 
							{ // Il y a une s�lection									if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) 
									{											// La s�lection semble �tre un lien. On demande alors le libell�											var label = prompt("Quel est le libell� du lien ?") || "";											startTag = "<a class=\"mail\" href=\"" + currentSelection + "\">";											currentSelection = label;									} 
									else 
									{											// La s�lection n'est pas un lien, donc c'est le libelle. On demande alors l'URL											var URL = prompt("Quelle est l'url ?");											startTag = "<a class=\"mail\" href=\"" + URL + "\">";									}							} 
							else 
							{ // Pas de s�lection, donc on demande l'URL et le libelle									var URL = prompt("Quelle est l'url ?") || "";									var label = prompt("Quel est le libell� du lien ?") || "";									startTag = "<a class=\"mail\" href=\"" + URL + "\">";									currentSelection = label;                    							}					break;										case "image":							endTag = "";							if (currentSelection) 
							{ // Il y a une s�lection								startTag = "<img src=\"" + currentSelection + "\"/>";							}							else 
							{ // Pas de s�lection, donc on demande l'URL et le libelle									var URL = prompt("Quelle est le chemin de l'image ?\n (si elle est en local, exemple : images/nom_de_l_image.png)") || "";									startTag = "<img src=\"" + URL + "\"/>";									currentSelection = "";                    							}					break;			}	}	 	/* === Partie 3 : on ins�re le tout === */	if (window.ActiveXObject) 
	{			textRange.text = startTag + currentSelection + endTag;			textRange.moveStart("character", -endTag.length - currentSelection.length);			textRange.moveEnd("character", -endTag.length);			textRange.select();    	} 
	else 
	{			field.value = startSelection + startTag + currentSelection + endTag + endSelection;			field.focus();			field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);	}	field.scrollTop = scroll;     	}/*####FONCTION PERMETTANT DE FAIRE DES REQUETES HTTP POUR RECUPERER DONNEES AU FORMAT XML####*/	function getXMLHttpRequest() 
{    var xhr = null;         if (window.XMLHttpRequest || window.ActiveXObject)
	{        if (window.ActiveXObject) 
		{            try
			{                xhr = new ActiveXObject("Msxml2.XMLHTTP");            }
			catch(e) 
			{                xhr = new ActiveXObject("Microsoft.XMLHTTP");            }        }
		else 
		{            xhr = new XMLHttpRequest();        }    } 
	else 
	{        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");        return null;    }         return xhr;}
/*####FONCTION DE VISUALISATION####*/function view(textareaId, viewDiv)
{    var content = encodeURIComponent(document.getElementById(textareaId).value);    var xhr = getXMLHttpRequest();         if (xhr && xhr.readyState != 0) 
	{        xhr.abort();        delete xhr;    }         xhr.onreadystatechange = function()
	{        if (xhr.readyState == 4 && xhr.status == 200)
		{            document.getElementById(viewDiv).innerHTML = xhr.responseText;        } 
		else if (xhr.readyState == 3)
		{            document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";        }    }         xhr.open("POST", "include/admin/view.php", true);    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    xhr.send("string=" + content);}

/*####FONCTION LIMITATION DE CARACTERES####*/

function textLimit(field, maxlen, idlimite)
 {
   if (field.value.length > maxlen)
   {
      field.value = field.value.substring(0, maxlen);
      alert('D�passement de la limite de caracteres');
	  idlimite.style.color='red';
	  setTimeout(function(){idlimite.style.color='green';},2000);
   }
   else if(maxlen > field.value.length > 0)
   {
	  setTimeout(function(){idlimite.style.color='grey';},2000);
   }
}

/*####FONCTION LIEN####*/

function lien()
{
 // Pas de s�lection, donc on demande l'URL et le libelle
		var URL = prompt("Quelle est l'url ?") || "";
		var label = prompt("Quel est le libell� du lien ?") || "";
		document.execCommand('insertHTML', false, '<a class="mail" href="'+URL+'">'+label+'</a>');
		document.getElementById('ortf').focus();
}

/*####FONCTION TITRE####*/

function titre()
{
	/*
	var titre = prompt("Quelle est le titre ?") || "";
	document.execCommand('insertHTML', false, '<span class="titre">'+titre+'</span>');
	document.getElementById('ortf').focus();
	*/
	
	document.execCommand('bold', false, '');
	document.execCommand('FontSize', false, '3');
	document.getElementById('ortf').focus(); 
}

/*####FONCTION IMAGE####*/

function img()
{
	var img = prompt("Quel est le chemin de l'image ?\nExemple : /images/nom_de_l_image.png\nPour les images en locales, sinon chemin absolu.");
	document.execCommand('insertHTML', false, '<img src="'+img+'" />');
	document.getElementById('ortf').focus();
}

document.execCommand('stylewithCSS',true, null);
</script><?php	$id=0;	$nomsolu="";	$corps="";	$logosolu="";	$grandeimg="";	$desc="";		if(isset($_POST) and !empty($_POST))	{		$id= (isset($_GET['id'])) ? $_GET['id']:0;		$nomsolu=$_POST['nomsolu'];		$desc=$_POST['desc'];		$corps=$_POST['corps'];	}	if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());				$rq=mysql_query("SELECT COUNT(id) as cpt FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM solutions WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomsolu=$array['titre'];			$corps=$array['corps'];			$logosolu=$array['image_sol'];			$desc=$array['description'];			$grandeimg=$array['image_car'];		}		else		{			echo '<center><font color=red>Erreur solutions introuvable</font></center><br/>';		}				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'une solution</h2>			<br/><center>Tout champ vide ne sera pas modifi�</center>';		$require = "";		$type = "modif&id=".$id;	}	else	{		echo '<h2>Ajout d\'une solution</h2>';		$require = "required";		$type = "create";	}	?><form method="post" enctype="multipart/form-data" action="traitement/trt_solutions.php?mode=<?php echo $type; ?>">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomsolu"><b>Nom de la solution <span class="red">*</span></b><br/><small id="lim_nom">(Max 20 caract�res)</small></label></td>				<td><input size="50" type="text" name="nomsolu" id="nomsolu" value="<?php echo $nomsolu; ?>" <?php echo $require; ?> onblur="textLimit(this, 20, lim_nom);"/></td>			</tr>						<tr>				<td><label for="logosolu"><b>Logo de la solution <span class="red">*</span></b><br/><small>(Max 100Ko et uniquement jpg, png, gif et bmp<br/>(Taille conseill�e 280x170)</small></label></td>				<td><input size="50" type="file" name="logosolu" id="logosolu" value="<?php echo $logosolu; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="grandeimg"><b>Grande image pour l'accueil <span class="red">*</span></b><br/><small>(Max 300Ko et uniquement jpg, png, gif et bmp)<br/>(Taille conseill�e 940x387)</small></label></td>				<td><input size="50" type="file" name="grandeimg" id="grandeimg" value="<?php echo $grandeimg; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="desc"><b>R�sum� de la solution <span class="red">*</span></b><br/><small id="lim_resu">(Max 400 caract�res)</small></label></td>				<td><textarea name="desc" id="desc" rows="5" cols="40" style="resize:none" <?php echo $require; ?> onblur="textLimit(this, 400, lim_resu);"/><?php echo $desc; ?></textarea></td>			</tr>						<tr>				<td colspan="2">					<div>						<p>							<input type="button" value="G" onclick="document.getElementById('ortf').focus(); document.execCommand('bold', false, '');" />
							<input type="button" value="I" onclick="document.getElementById('ortf').focus(); document.execCommand('italic', false, '');" />
							<input type="button" value="S" onclick="document.getElementById('ortf').focus(); document.execCommand('underline', false, '');" />
							<input type="button" value="Lien" onclick="document.getElementById('ortf').focus(); lien();" />
							<input type="button" value="Image" onclick="document.getElementById('ortf').focus(); img();" />
							<input type="button" value="Titre" onclick="document.getElementById('ortf').focus(); titre();" />
							<img src="images/fleche.png" alt="fleche" onclick="document.getElementById('ortf').focus(); document.execCommand('insertImage', false, 'images/fleche.png');" />
						</p>
						
					</div>
					
					<select name="cmbpolice" onchange="document.getElementById('ortf').focus(); document.execCommand('FontName', false ,this.value)">
						<option selected="" value="Arial">Police par d�faut</option>
						<option value="Arial">Arial</option>
						<option value="Verdana">Verdana</option>
						<option value="Courier New">Courier New</option>
						<option value="Time New Roman">Time New Roman</option>
						<option value="Comic Sans MS">Comic Sans MS</option>
					</select>

					<select name="cmbtaille" onchange="document.getElementById('ortf').focus(); document.execCommand('FontSize',false,this.value)">
						<option selected="" value="3">Taille par d�faut</option>
						<option value="1">1 (petite)</option>
						<option value="2">2</option>
						<option value="3">3 (normale)</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7 (grande)</option>
					</select>
								
					<select name="cmbcouleur" onchange="document.getElementById('ortf').focus(); document.execCommand('ForeColor',false,this.value)">
						<option selected="" value="555555">Couleur par d�faut</option>
						<option value="ff0000">Rouge</option>
						<option value="0000ff">Bleu</option>
						<option value="00ff00">Vert</option>
						<option value="000000">Noir</option>
						<option value="FFFF00">Jaune</option>
						<option value="666666">Gris</option>
						<option value="FF6600">Orange</option>
					</select>
					
					<div style="height: 500px; width:800px; overflow:scroll; margin-top:20px;" id="ortf" contenteditable="true" onblur="document.getElementById('corps').value=this.innerHTML">
					<?php
						echo nl2br($corps);
					?>
					</div>
					
					<input type="hidden" value="" id="corps" name="corps" />				 
				</td>			</tr>						<tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table></form>	

	<?php
	}
	else
	{
		echo '<h2 style="color:red">Access Forbidden !</h2>';
	}
	?>


