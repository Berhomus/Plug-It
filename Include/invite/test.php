<!--#########################################################
#                                                           #
#                PARTIE DE TEST (JS, PHP)                   #
#                                                           #
##########################################################-->

<script TYPE="text/javascript">

/*####INFERIEUR OU SUPERIEUR####*/	

	function PpouPg(Min, Max, Nbcoups, valeur)
	{	
		while((reponse < Min)||(reponse > Max))
		{
			reponse = Prompt("Valeur comprise entre "+Min+" et "+Max+"");
		}
		if(reponse < valeur)
		{
			Prompt("Plus Grand");
			Min = reponse;
			Nbcoups++;
			PpouPg(Min, Max, Nbcoups, valeur);
		} 
		else if (reponse > valeur)
			{
				Prompt("Plus Petit");
				Max = reponse;
				Nbcoups++;
				PpouPg(Min, Max, Nbcoups, valeur);
			}
			else
			{
				Prompt("Valeur Correct");
			}
			
	}
	
	function debutPpouPg()
	{
		var Min = Prompt("Entrer le Minimum");
		var Max = Prompt("Entrer le Maximum");
		
		var Nbcoups = 1;
		
		NbreCoupsMoy = (Max - Min) / Math.Pow(4,((Max - Min) / 4);
		
		
		PpouPg(Min, Max, Nbcoups, valeur);
		
		Prompt("Valeur trouv�e en "+Nbcoups+", la moyenne est de "+NbreCoupsMoy+"");
	}
	
/*####FONCTION D'INSERTION DE BALISES####*/	
	
	function insertTag(startTag, endTag, corpsId, tagType) 
	{
		var field  = document.getElementById(corpsId); 
		var scroll = field.scrollTop; // On met en m�moire la position du scroll
		field.focus(); // On remet le focus sur la zone de texte, suivant les navigateurs, on perd le focus en appelant la fonction. 
	 
		 /* === Partie 1 : on r�cup�re la s�lection === */
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
								{ // Il y a une s�lection
										if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) 
										{
												// La s�lection semble �tre un lien. On demande alors le libell�
												var label = prompt("Quel est le libell� du lien ?") || "";
												startTag = "<a class=\"mail\" href=\"" + currentSelection + "\">";
												currentSelection = label;
										} 
										else 
										{
												// La s�lection n'est pas un lien, donc c'est le libelle. On demande alors l'URL
												var URL = prompt("Quelle est l'url ?");
												startTag = "<a class=\"mail\" href=\"" + URL + "\">";
										}
								} 
								else 
								{ // Pas de s�lection, donc on demande l'URL et le libelle
										var URL = prompt("Quelle est l'url ?") || "";
										var label = prompt("Quel est le libell� du lien ?") || "";
										startTag = "<a class=\"mail\" href=\"" + URL + "\">";
										currentSelection = label;                    
								}
						break;
						
						case "image":
								endTag = "";
								if (currentSelection) 
								{ // Il y a une s�lection
									startTag = "<img src=\"" + currentSelection + "\"/>";
								}
								else 
								{ // Pas de s�lection, donc on demande l'URL et le libelle
										var URL = prompt("Quelle est le chemin de l'image ?\n (si elle est en local, exemple : images/nom_de_l_image.png)") || "";
										startTag = "<img src=\"" + URL + "\"/>";
										currentSelection = "";                    
								}
						break;
				}
		}
		 
		/* === Partie 3 : on ins�re le tout === */
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

/*####FONCTION EXTERNALISATION####*/
/*Secondaire*/

function extern(field,Idcorps)
{
	var cpt=0;
	
	if(field.value != this)
	{
		xhr.send("Area = " + content);
	}
	xhr.onreadystatechange = function()
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
	while(Idcorps != this.value)
	{
		this.value=this.value -> next;
		cpt++;
	}
	for(i=1;i<cpt;i++)
	{
		Idcorps.field = "<table class=\"tableau\"><tr><td>"+xhr.send("Area = ", content)+"</td></tr>";
		xhr = new ActiveXObject("Msxml2.XMLHTTP");
		
		try
		{
			delete xhr;
		}
		catch(e)
		{
			Alert("Impossible de supprimer");
		}
	}
}

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

/*####FONCTION DE VERIFICATION DE MAIL####*/

function isEmail(adr, id)
{
    // �tape consistant � d�finir l'expression r�guli�re d'une adresse email
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

    if(regEmail.test(adr.value))
	{
		id.style.color='green';
	}
	else
	{
		id.style.color='red';
		adr.value='';
		alert('Mail Invalide');
	}
}

</script>
<html>
	<head>Menu</head>
	<body>
		<p>
		<img src="images/fleche.png"/><h2>WanaShare est une plateforme de gestion de l'information et de <br/>
		collaboration professionnelle bas�e sur le produit Microsoft� SharePoint <br/>
		2010 qui vous aide � am�liorer votre productivit� et � g�rer votre contenu, <br/>
		en utilisant un navigateur Internet.<br/></h2>
		<br/>
		Les fonctionnalit�s int�gr�es de WanaShare, optimis�es par des technologies d'indexation et de <br/>
		recherche, vous permettent de vous adapter rapidement � l'�volution de vos besoins m�tier.<br/>
		Vous pouvez ainsi prendre des d�cisions fond�es sur des donn�es m�tier consolid�es et d�ployer des <br/>
		applications m�tiers de fa�on rapide et s�curis�e afin de renforcer la collaboration dans et hors de votre <br/>
		entreprise.<br/>
		<br/>
		<img src="images/fleche.png"/><h2>WanaShare, pour quels usages ? WanaShare vous permet d'accro�tre la productivit� via un ensemble int�gr� de <br/>
		fonctionnalit�s innovantes. Parmi elles, on peut citer :<br/></h2>
		<br/>
		- Accessibilit�.<br/>
		- Affichage d'informations.<br/>
		- Prise en main de WSS 3.0.<br/>
		- Conservation de plusieurs versions de fichiers et d'�l�ments.<br/>
		- Cr�ation de sites, de listes et de biblioth�ques.<br/>
		- Formules et fonctions.<br/>
		- Gestion de sites et de param�tres.<br/>
		- Int�gration du courrier �lectronique aux sites, listes et biblioth�ques.<br/>
		- Organisation de r�unions.<br/>
		- Partage de fichiers et de documents.<br/>
		- Partage d'informations.<br/>
		- Personnalisation de sites, de pages, de listes et de biblioth�ques.<br/>
		- Utilisation des environnements internationaux.<br/>
		- Utilisation des flux de travail pour g�rer les processus.<br/>
		<br/>
		</p>
	</body>
</html>