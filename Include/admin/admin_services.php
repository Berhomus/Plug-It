<?phpif(isset($_SESSION['id'])){?><script>/*####FONCTION D'INSERTION DE BALISES####*/			function insertTag(startTag, endTag, corpsId, tagType) {		var field  = document.getElementById(corpsId); 		var scroll = field.scrollTop; // On met en m�moire la position du scroll		field.focus(); // On remet le focus sur la zone de texte, suivant les navigateurs, on perd le focus en appelant la fonction. 	 	 /* === Partie 1 : on r�cup�re la s�lection === */	if (window.ActiveXObject) {			var textRange = document.selection.createRange();           			var currentSelection = textRange.text;	} else {			var startSelection   = field.value.substring(0, field.selectionStart);			var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);			var endSelection     = field.value.substring(field.selectionEnd);              	}	 	/* === Partie 2 : on analyse le tagType === */	if (tagType) {			switch (tagType) {					case "lien":							endTag = "</a>";							if (currentSelection) { // Il y a une s�lection									if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) {											// La s�lection semble �tre un lien. On demande alors le libell�											var label = prompt("Quel est le libell� du lien ?") || "";											startTag = "<a class=\"mail\" href=\"" + currentSelection + "\">";											currentSelection = label;									} else {											// La s�lection n'est pas un lien, donc c'est le libelle. On demande alors l'URL											var URL = prompt("Quelle est l'url ?");											startTag = "<a class=\"mail\" href=\"" + URL + "\">";									}							} else { // Pas de s�lection, donc on demande l'URL et le libelle									var URL = prompt("Quelle est l'url ?") || "";									var label = prompt("Quel est le libell� du lien ?") || "";									startTag = "<a class=\"mail\" href=\"" + URL + "\">";									currentSelection = label;                    							}					break;										case "image":							endTag = "";							if (currentSelection) { // Il y a une s�lection								startTag = "<img src=\"" + currentSelection + "\"/>";							}							else { // Pas de s�lection, donc on demande l'URL et le libelle									var URL = prompt("Quelle est le chemin de l'image ?\n (si elle est en local, exemple : images/nom_de_l_image.png)") || "";									startTag = "<img src=\"" + URL + "\"/>";									currentSelection = "";                    							}					break;			}	}	 	/* === Partie 3 : on ins�re le tout === */	if (window.ActiveXObject) {			textRange.text = startTag + currentSelection + endTag;			textRange.moveStart("character", -endTag.length - currentSelection.length);			textRange.moveEnd("character", -endTag.length);			textRange.select();    	} else {			field.value = startSelection + startTag + currentSelection + endTag + endSelection;			field.focus();			field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);	}	field.scrollTop = scroll;     	}/*####FONCTION PERMETTANT DE FAIRE DES REQUETES HTTP POUR RECUPERER DONNEES AU FORMAT XML####*/	function getXMLHttpRequest() {    var xhr = null;         if (window.XMLHttpRequest || window.ActiveXObject) 	{        if (window.ActiveXObject) 		{            try 			{                xhr = new ActiveXObject("Msxml2.XMLHTTP");            } 			catch(e) 			{                xhr = new ActiveXObject("Microsoft.XMLHTTP");            }        } 		else 		{            xhr = new XMLHttpRequest();        }    } 	else 	{        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");        return null;    }         return xhr;}/*####FONCTION DE VISUALISATION####*/function view(textareaId, viewDiv){    var content = encodeURIComponent(document.getElementById(textareaId).value);    var xhr = getXMLHttpRequest();         if (xhr && xhr.readyState != 0) {        xhr.abort();        delete xhr;    }         xhr.onreadystatechange = function() {        if (xhr.readyState == 4 && xhr.status == 200){            document.getElementById(viewDiv).innerHTML = xhr.responseText;        } else if (xhr.readyState == 3){            document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";        }    }         xhr.open("POST", "include/admin/view.php", true);    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    xhr.send("string=" + content);}/*####FONCTION LIMITATION DE CARACTERES####*/function textLimit(field, maxlen, idlimite) {   if (field.value.length > maxlen) {      field.value = field.value.substring(0, maxlen);      alert('D�passement de la limite de caracteres');	  idlimite.style.color='red';	  setTimeout(function(){idlimite.style.color='green';},2000);   }   else if((maxlen > field.value.length) && (field.value.length>0))   {	  setTimeout(function(){idlimite.style.color='green';},2000);   }   }</script><?php	$id=0;	$nomserv="";	$corps="";	$logoserv="";	$soustitre="";
	
	if(isset($_POST) and !empty($_POST))
	{
		$id= (isset($_GET['id'])) ? $_GET['id']:0;
		$nomserv=$_POST['nomserv'];
		$soustitre=$_POST['soustitre'];
		$corps=$_POST['corps'];
	}	else if(isset($_GET['id']))	{		mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());		mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());				$rq=mysql_query("SELECT COUNT(id) as cpt FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());		$array=mysql_fetch_array($rq);				if($array['cpt']==1)		{			$rq=mysql_query("SELECT * FROM services WHERE id='".$_GET['id']."'")or die('Erreur SQL !<br />'.mysql_error());			$array=mysql_fetch_array($rq);						$id=$array['id'];			$nomserv=$array['titre'];			$corps=$array['corps'];			$logoserv=$array['image'];			$soustitre=$array['subtitre'];		}		else		{			echo '<center><font color=red>Erreur r�f�rence introuvable</font></center><br/>';		}
				mysql_close();	}		if($id!=0)	{		echo '<h2>Modification d\'un service</h2>			<br/><center>Tout champ vide ne sera pas modifi�</center>';		$require = "";
		$type = "modif&id=".$id;	}	else	{		echo '<h2>Ajout d\'un service</h2>';		$require = "required";
		$type = "create";	}	?><form method="post" enctype="multipart/form-data" action="traitement/trt_services.php?mode=<?php echo $type; ?>">	<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">							<tr>				<td><label for="nomserv"><b>Nom du service <span class="red">*</span></b><br/><small id="lim_nom">(Max 70 caract�res)</small></label></td>				<td><input size="50" type="text" name="nomserv" id="nomserv" value="<?php echo $nomserv; ?>" <?php echo $require; ?> onblur="textLimit(this,70, lim_nom);"/></td>			</tr>						<tr>				<td><label for="logoserv"><b>Logo du service <span class="red">*</span></b><br/><small>(Max 100Ko et uniquement jpg, png, gif et bmp)<br/>(Taille conseill�e 280x157)</small></label></td>				<td><input size="50" type="file" name="logoserv" id="logoserv" value="<?php echo $logoserv; ?>" <?php echo $require; ?>/></td>			</tr>						<tr>				<td><label for="soustitre"><b>Sous-titre <span class="red">*</span></b><br/><small id="sous_titre">(Max 25 caract�res)</small></label></td>				<td><input size="50" type="text" name="soustitre" id="soustitre" value="<?php echo $soustitre; ?>" <?php echo $require; ?> onblur="textLimit(this, 25, sous_titre);"/></td>			</tr>						<tr>				<td colspan="2">					<div>						<p>							<b>Description du service <span class="red">*</span></b>							<br/>							<input type="button" value="G" onclick="insertTag('<b>','</b>','corps');" />							<input type="button" value="I" onclick="insertTag('<i>','</i>','corps');" />							<input type="button" value="S" onclick="insertTag('<u>','</u>','corps');" />							<input type="button" value="Lien" onclick="insertTag('','','corps','lien');" />							<input type="button" value="Image" onclick="insertTag('','','corps','image');" />							<input type="button" value="Titre" onclick="insertTag('<span class=&quot titre&quot>','</span>','corps');" />							<img src="images/fleche.png" alt="fleche" onclick="insertTag('<img src=&quot images/fleche.png&quot/>','','corps');" />						</p>											</div>										<textarea id="corps" name="corps" cols="65" rows="25"><?php echo $corps; ?></textarea>					 					<div id="previewDiv"></div>				 					<p>						<input type="button" value="Visualiser" onclick="view('corps','viewDiv');" />					</p>				 					<div id="viewDiv"></div>				</td>			</tr>						<tr>				<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>			</tr>			</table>	</form>		<?php}else{	echo '<h2 style="color:red">Access Forbidden !</h2>';}?>

