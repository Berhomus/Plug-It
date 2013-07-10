<script>
/*####FONCTION D'INSERTION DE BALISES####*/	
	
	function insertTag(startTag, endTag, corpsId, tagType) 
	{
		var field  = document.getElementById(corpsId); 
		var scroll = field.scrollTop; // On met en mémoire la position du scroll
		field.focus(); // On remet le focus sur la zone de texte, suivant les navigateurs, on perd le focus en appelant la fonction. 
	 
		 /* === Partie 1 : on récupère la sélection === */
		if (window.ActiveXObject) 
		{
				var textRange = document.selection.createRange();           
				var currentSelection = textRange.text;
		} 
		else 
		{
				var startSelection   = field.value.substring(0, field.selectionStart);
				var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
				var endSelection     = field.value.substring(field.selectionEnd);              
		}
		 
		/* === Partie 2 : on analyse le tagType === */
		if (tagType) 
		{
				switch (tagType) 
				{
						case "lien":
								endTag = "</a>";
								if (currentSelection) 
								{ // Il y a une sélection
										if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) 
										{
												// La sélection semble être un lien. On demande alors le libellé
												var label = prompt("Quel est le libellé du lien ?") || "";
												startTag = "<a class=\"mail\" href=\"" + currentSelection + "\">";
												currentSelection = label;
										} 
										else 
										{
												// La sélection n'est pas un lien, donc c'est le libelle. On demande alors l'URL
												var URL = prompt("Quelle est l'url ?");
												startTag = "<a class=\"mail\" href=\"" + URL + "\">";
										}
								} 
								else 
								{ // Pas de sélection, donc on demande l'URL et le libelle
										var URL = prompt("Quelle est l'url ?") || "";
										var label = prompt("Quel est le libellé du lien ?") || "";
										startTag = "<a class=\"mail\" href=\"" + URL + "\">";
										currentSelection = label;                    
								}
						break;
						
						case "image":
								endTag = "";
								if (currentSelection) 
								{ // Il y a une sélection
									startTag = "<img src=\"" + currentSelection + "\"/>";
								}
								else 
								{ // Pas de sélection, donc on demande l'URL et le libelle
										var URL = prompt("Quelle est le chemin de l'image ?\n (si elle est en local, exemple : images/nom_de_l_image.png)") || "";
										startTag = "<img src=\"" + URL + "\"/>";
										currentSelection = "";                    
								}
						break;
				}
		}
		 
		/* === Partie 3 : on insère le tout === */
		if (window.ActiveXObject) 
		{
				textRange.text = startTag + currentSelection + endTag;
				textRange.moveStart("character", -endTag.length - currentSelection.length);
				textRange.moveEnd("character", -endTag.length);
				textRange.select();    
		} 
		else 
		{
				field.value = startSelection + startTag + currentSelection + endTag + endSelection;
				field.focus();
				field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
		}

		field.scrollTop = scroll;     
	}

/*####FONCTION PERMETTANT DE FAIRE DES REQUETES HTTP POUR RECUPERER DONNEES AU FORMAT XML####*/
	
function getXMLHttpRequest() 
{
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject)
	{
        if (window.ActiveXObject) 
		{
            try
			{
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }
			catch(e) 
			{
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
		else 
		{
            xhr = new XMLHttpRequest();
        }
    } 
	else 
	{
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}

/*####FONCTION DE VISUALISATION####*/

function view(textareaId, viewDiv)
{
    var content = encodeURIComponent(document.getElementById(textareaId).value);
    var xhr = getXMLHttpRequest();
     
    if (xhr && xhr.readyState != 0) 
	{
        xhr.abort();
        delete xhr;
    }
     
    xhr.onreadystatechange = function()
	{
        if (xhr.readyState == 4 && xhr.status == 200)
		{
            document.getElementById(viewDiv).innerHTML = xhr.responseText;
        } 
		else if (xhr.readyState == 3)
		{
            document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
        }
    }
     
    xhr.open("POST", "include/admin/view.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("string=" + content);
}

/*####FONCTION LIMITATION DE CARACTERES####*/

function textLimit(field, maxlen, idlimite)
 {
   if (field.value.length > maxlen)
   {
      field.value = field.value.substring(0, maxlen);
      alert('Dépassement de la limite de caracteres');
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
 // Pas de sélection, donc on demande l'URL et le libelle
		var URL = prompt("Quelle est l'url ?") || "";
		var label = prompt("Quel est le libellé du lien ?") || "";
		document.execCommand('insertHTML', false, '<a class="mail" href="'+URL+'">'+label+'</a>');
		document.getElementById('ortf').focus();
}

/*####FONCTION TITRE####*/

function titre()
{
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

 try {
	Editor.execCommand("styleWithCSS", 0, false);
} catch (e) {
	try {
		Editor.execCommand("useCSS", 0, true);
	} catch (e) {
		try {
			Editor.execCommand('styleWithCSS', false, false);
		}
		catch (e) {
		}
	}
}

</script>

<?php

if(isset($_SESSION['id']))
{
	echo '<h2>E-Mail de Masse</h2>';
?>
	
		<form method="post" action="#">
		<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">				
				<tr>
					<td><label for="titre"><b>Titre <span class="red">*</span></b><br/><small id="lim_nom">(Max 20 caractères)</small></label></td>
					<td><input size="50" type="text" name="titre" id="titre" required="" onblur="textLimit(this, 20, lim_nom);"/></td>
				</tr>
				
	
				<tr>
					<td colspan="2">
						<div>
							<p>
								<input type="button" value="G" onclick="document.getElementById('ortf').focus(); document.execCommand('bold', false, '');" />
								<input type="button" value="I" onclick="document.getElementById('ortf').focus(); document.execCommand('italic', false, '');" />
								<input type="button" value="S" onclick="document.getElementById('ortf').focus(); document.execCommand('underline', false, '');" />
								<input type="button" value="Lien" onclick="document.getElementById('ortf').focus(); lien();" />
								<input type="button" value="Image" onclick="document.getElementById('ortf').focus(); img();" />
								<input type="button" value="Titre" onclick="document.getElementById('ortf').focus(); document.execCommand('bold', false, '');document.execCommand('FontSize', false, '3');" />
								<img src="images/fleche.png" alt="fleche" onclick="document.getElementById('ortf').focus(); document.execCommand('insertImage', false, 'images/fleche.png');" />
							</p>
							
						</div>
						
						<select name="cmbpolice" onchange="document.getElementById('ortf').focus(); document.execCommand('FontName', false ,this.value)">
							<option selected="" value="Arial">Police par défaut</option>
							<option value="Arial">Arial</option>
							<option value="Verdana">Verdana</option>
							<option value="Courier New">Courier New</option>
							<option value="Time New Roman">Time New Roman</option>
							<option value="Comic Sans MS">Comic Sans MS</option>
						</select>

						<select name="cmbtaille" onchange="document.getElementById('ortf').focus(); document.execCommand('FontSize',false,this.value)">
							<option selected="" value="3">Taille par défaut</option>
							<option value="1">1 (petite)</option>
							<option value="2">2</option>
							<option value="3">3 (normale)</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7 (grande)</option>
						</select>
									
						<select name="cmbcouleur" onchange="document.getElementById('ortf').focus(); document.execCommand('ForeColor',false,this.value)">
							<option selected="" value="555555">Couleur par défaut</option>
							<option value="ff0000">Rouge</option>
							<option value="0000ff">Bleu</option>
							<option value="00ff00">Vert</option>
							<option value="000000">Noir</option>
							<option value="FFFF00">Jaune</option>
							<option value="666666">Gris</option>
							<option value="FF6600">Orange</option>
						</select>
						
						<div style="height: 500px; width:800px; overflow:scroll; margin-top:20px;" id="ortf" contenteditable="true" onblur="document.getElementById('corps').value=this.innerHTML">
						</div>
						
						<input type="hidden" value="" id="corps" name="corps" />
					 
					</td>
				</tr>
				
				<tr>
					<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
				</tr>		
		</table>
	</form>	
	
<?php
}
else
{
	echo '<h2>Access Forbidden</h2>';
}

?>