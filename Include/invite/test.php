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
	var visual = '<div id="visu">'+contenu+'</div>';
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

<?php
/* Informations du client */
$_SESSION['USER_ID']       = "1";
$_SESSION['USER_NOM']      = "Godin";
$_SESSION['USER_PRENOM']   = "Thierry";
$_SESSION['USER_COMPANY']  = "N1bus-Exp�riences";
$_SESSION['USER_ADRESSE']  = "1, rue Henri Desgranges";
$_SESSION['USER_VILLE']    = "La Rochelle";
$_SESSION['USER_ZIP']      = "17000";
$_SESSION['USER_PAYS']     = "France";
$_SESSION['USER_TEL']      = "33(0) 123 456 789";
$_SESSION['USER_EMAIL']    = "xxxx@xxxx.com";

/* Caddie */
$_SESSION['CADDIE_ID']          = "1";
$_SESSION['CADDIE_LOG_NOM']     = "PlanningFacile";
$_SESSION['CADDIE_LOG_VERSION'] = "1.1.0.0";
$_SESSION['CADDIE_AMOUNT']      = "3000"; //montant en euro sans s�parateur = 30,00 euros

// on construit le tableau du caddie en r�cup�rant les variables de la session
$TheCaddie = array();

// les infos du client
$TheCaddie[] =  $_SESSION['USER_ID'];
$TheCaddie[] =  $_SESSION['USER_NOM'];
$TheCaddie[] =  $_SESSION['USER_PRENOM'];
$TheCaddie[] =  $_SESSION['USER_COMPANY'];
$TheCaddie[] =  $_SESSION['USER_ADRESSE'];
$TheCaddie[] =  $_SESSION['USER_VILLE'];
$TheCaddie[] =  $_SESSION['USER_ZIP'];
$TheCaddie[] =  $_SESSION['USER_PAYS'];
$TheCaddie[] =  $_SESSION['USER_TEL'];
$TheCaddie[] =  $_SESSION['USER_EMAIL'];

//le contenu du caddie
$TheCaddie[] =  $_SESSION['CADDIE_ID'];
$TheCaddie[] =  $_SESSION['CADDIE_LOG_NOM'];
$TheCaddie[] =  $_SESSION['CADDIE_LOG_VERSION'];
$TheCaddie[] =  $_SESSION['CADDIE_AMOUNT'];

//on cr�e un num�ro de commande pour le fun
$NumCmd      = "CMD-" . date("YmdHis");
$TheCaddie[] =  $NumCmd ;

//pour envoyer le caddie � e-transaction sans probleme
//on serialize le tableau pour en faire 1 string et on le base64_encode()
//car certains caract�res sont interdits dans la valeur du parm caddie

$xCaddie = base64_encode(serialize($TheCaddie));

//Identifiant commer�ant
//Nous en sommes pour l'instant � la phase d'installation,
//Nous utiliserons donc l'identifiant commer�ant de test.
//Lorsque nous passerons en pr�-production, il faudra alors mettre ici
//l'identifiant commer�ant que votre fournisseur vous aura d�livr�
$parm = "merchant_id=013044876511111";

//Chemin du fichier pathfile + executable request
$parm .= " pathfile=/srv/www/htdocs/monsiteweb/xpay/pathfile";
$path_bin = "/srv/www/htdocs/empty/request_2.6.9_3.4.2";

//Pays du commer�ant
$parm .= " merchant_country=fr";

//Langage de l'interface de paiement
//Si votre site comporte plusieurs langages, vous pouvez pr�ciser dynamiquement ici
//le langage utilis� par le client
//cf : Dictionnaire des donn�es
$parm .= " language=fr";

//Le montant de la transaction
//Cette valeur ne doit pas comporter de ponctuation. Chiffres uniquement !
//Par exemple, le montant du caddie est de 30,00 euros, vous devez mettre 3000
$parm .= " amount=" .$_SESSION['CADDIE_AMOUNT'];

//Monnaie
//Ici c'est l'euro
//Si vous proposez le paiement en plusieurs monnaies,
//vous pouvez changer dynamiquement cette valeur selon la monnaie
//choisie par le client
//cf : Dictionnaire des donn�es
$parm .= " currency_code=978";

//Id de la transaction (6chiffres)
//Vous pouvez ne pas utiliser ce param�tre, auquel cas, le serveur du fournisseur
//cr�era un id de transaction automatiquement.
//Pour ma part, je pense qu'il peut �tre utile de le d�finir ici, notamment
//si on souhaite mettre � jour notre base de donn�es en ajoutant l'id de transaction au caddie enregistr�
//avant de proc�der � la transaction.
$parm .= " transaction_id=" . date ("His");

//Label sur le re�u de paiement
//Lorsque le paiement a �t� accept� par le fournisseur, un ticket est affich� � l'�cran.
//Vous pouvez ici rajouter un commentaire pour que le ticket affiche au moins le nom de
//votre boutique et le produit achet�.
//Ce param�tre est limit� � 3072 caract�res et ne doit pas contenir d'espace
//( vous les remplacez par leur �quivalent html : &nbsp;)
$Produit = "<tr><td>CHEZN1BUS&nbsp;:&nbsp;&nbsp;LOGICIEL&nbsp;PLANNINGFACILE</td></tr>";
$parm .= " receipt_complement=" . $Produit;

//Email client (no comment)
$parm .= " customer_email=" . $_SESSION['USER_EMAIL'];

//IP client
//Je ne vous mets pas le code pour r�cup�rer l'ip du client
//mais vous saurez trouver ce qu'il vous faut sur developpez.com
$parm .= " customer_ip_address=" . $IP;

//caddie
//On retrouve ici notre fameux caddie que nous avons pr�par� dans la section pr�c�dente.
//Ce champ est limit� � 2048 caract�res
$parm .= " caddie=" . $xCaddie ;


//Nous pouvons utiliser les param�tres ci-dessous si nous avons besoin de passer des param�tres dans l'url.
//Ici par exemple, nous transmettons l'id de session pour que le client puisse retourner sur son compte au
//retour de la transaction.
//Si vous d�finissez ces param�tres ici, il est pr�f�rable de passer les url en commentaire
//dans le fichier parmcom du commer�ant en ajoutant un di�se devant (#)

//url en cas d'annulation
$SUPERID = session_id();
$parm .= " cancel_return_url=http://www.monsite.com/response.php?SUPERID=" . $SUPERID;

// url r�ponse automatique
$parm .= " automatic_response_url=http://www.monsite.com/call_autoresponse.php";

//url de retour du client apr�s le paiement
$parm .= " normal_return_url=http://www.monsite.com/response.php?SUPERID=" . $SUPERID;


//et enfin, vous pouvez pr�ciser ici le template que vous souhaitez utiliser
//Voir la section plus bas pour la cr�ation du Template
$parm .= " templatefile=le_template_de_mon_site";

//Appel du binaire request
$result = exec("$path_bin $parm");

//On separe les differents champs et on les met dans un  tableau
$tableau = explode ("!", "$result");

//R�cup�ration des param�tres
$code    = $tableau[1];
$error   = $tableau[2];
$message = $tableau[3];

//Analyse du code retour

if (( $code == "" ) && ( $error == "" ) )
{
	//Si nous n'obtenons aucun retour de l'API c'est qu'il n'a pas �t� ex�cut� (CQFD)
	//Il s'agit la plupart du temps d'un probl�me dans le chemin vers le binaire request
	//Il peut s'agir d'un probl�me de droits : v�rifiez qu'il ait bien les droits d'ex�cution

	print ("<center><h1>Erreur appel request</h1></center>");
	print ("<p>&nbsp;</p>");
	print ("Executable request non trouve : $path_bin");
}


else if ($code != 0){

	//Erreur, affiche le message d'erreur
	//Ici le binaire request a bien �t� ex�cut� mais un ou plusieurs param�tres ne sont pas valides
	//En cas de doute, n'h�sitez pas � consulter le Dictionnaire des donn�es
    
	print ("<center><h1>Erreur appel API de paiement.</h1></center>");
	print ("<p>&nbsp;</p>");
	print ("<p>Message erreur : $error </p>");
}

else {

	//Ici, tout est OK, on affiche les cartes bancaires
	//Comme on est des programmeurs consciencieux, on va �galement afficher
	//quelques infos suppl�mentaire pour que le client se sente en confiance
	//en lui rappellant le montant de la transaction et le num�ro de commande
	//ainsi qu'un lien de retour au cas o� celui-ci changerait d'avis

	print ("<p>&nbsp;</p>");
	print ("$message");
	print ("<p>&nbsp;</p>");
	print("<p align='center'><strong>Montant � payer : </strong> ".
	substr($_SESSION['CADDIE_AMOUNT'],0,-2).",".substr($_SESSION['CADDIE_AMOUNT'] ,-2) . " Euros  - ");
	print("<strong>Num&eacute;ro de commande : </strong> " . $NumCmd  ."</p>");
	print("<p align='center'><a href='javascript:history.go(-1)'>RETOUR</a></p>");

	//Ici on peut v�rifier le contenu du parm caddie que l'on va envoyer
	//pour nous assurer que nous envoyons bien tout ce dont nous aurons besoin au retour
	//de la transaction (pour les tests ONLY !!!)
	//D�commentez les lignes ci-dessous pendant les tests
	//n'oubliez pas de les repasser en commentaire ou de les effacer ensuite

	/*
	$arrayCaddie = unserialize(base64_decode($xCaddie));
	for($i = 0 ; $i < count($arrayCaddie); $i++){
	echo $arrayCaddie[$i] . "<br />";
	}
	*/

}

//R�cup�ration du caddie
$TheCaddie = array();

$TheCaddie[] =  $_SESSION['USER_ID'];
$TheCaddie[] =  $_SESSION['USER_NOM'];
$TheCaddie[] =  $_SESSION['USER_PRENOM'];
$TheCaddie[] =  $_SESSION['USER_COMPANY'];
$TheCaddie[] =  $_SESSION['USER_ADRESSE'];
$TheCaddie[] =  $_SESSION['USER_VILLE'];
$TheCaddie[] =  $_SESSION['USER_ZIP'];
$TheCaddie[] =  $_SESSION['USER_PAYS'];
$TheCaddie[] =  $_SESSION['USER_TEL'];
$TheCaddie[] =  $_SESSION['USER_EMAIL'];

$TheCaddie[] =  $_SESSION['CADDIE_ID'];
$TheCaddie[] =  $_SESSION['CADDIE_LOG_NOM'];
$TheCaddie[] =  $_SESSION['CADDIE_LOG_VERSION'];
$TheCaddie[] =  $_SESSION['CADDIE_AMOUNT'];

//Num�ro de commande
$NumCmd      = "CMD-" . date("YmdHis");
$TheCaddie[] =  $NumCmd ;

$xCaddie = base64_encode(serialize($TheCaddie));

//Identifiant du commer�ant (TEST)
$parm = "merchant_id=013044876511111";

//Chemins binaire + pathfile
$parm .= " pathfile=/srv/www/htdocs/monsiteweb/xpay/pathfile";
$path_bin = "/srv/www/htdocs/empty/request_2.6.9_3.4.2";

//Langages
$parm .= " merchant_country=fr";
$parm .= " language=fr";

//Montant du caddie
$parm .= " amount=" .$_SESSION['CADDIE_AMOUNT'];

//Euro
$parm .= " currency_code=978";

//Num�ro de transaction
$parm .= " transaction_id=" . date ("His");

//Compl�ment du re�u
$Produit = "<tr><td>CHEZN1BUS&nbsp;:&nbsp;&nbsp;LOGICIEL&nbsp;PLANNINGFACILE</td></tr>";
$parm .= " receipt_complement=" . $Produit;

//Email du client
$parm .= " customer_email=" . $_SESSION['USER_EMAIL'];

//IP client
$parm .= " customer_ip_address=" . $IP;

//caddie
$parm .= " caddie=" . $xCaddie ;

//url en cas d'annulation
$SUPERID = session_id();
$parm .= " cancel_return_url=http://www.monsite.com/response.php?SUPERID=" . $SUPERID;

// url r�ponse automatique
$parm .= " automatic_response_url=http://www.monsite.com/call_autoresponse.php";

//url de retour du client apr�s le paiement
$parm .= " normal_return_url=http://www.monsite.com/response.php?SUPERID=" . $SUPERID;

//Template
$parm .= " templatefile=le_template_de_mon_site";


//Appel du binaire request
$result  = exec("$path_bin $parm");
$tableau = explode ("!", "$result");

//R�cup�ration des param�tres
$code    = $tableau[1];
$error   = $tableau[2];
$message = $tableau[3];

//Analyse du code retour

if (( $code == "" ) && ( $error == "" ) )
{
	//Erreur chemin ou droits
	print ("<center><h1>Erreur appel request</h1></center>");
	print ("<p>&nbsp;</p>");
	print ("<p>Executable request non trouve : $path_bin</p>");
}


else if ($code != 0){

	//Erreur param�tres
	print ("<center><h1>Erreur appel API de paiement.</h1></center>");
	print ("<p>&nbsp;</p>");
	print ("<p>Message erreur : $error </p>");
}


else {

	//OK, on affiche les cartes bancaires
	print ("<p>&nbsp;</p>");
	print ("$message");
	print ("<p>&nbsp;</p>");
	print("<p align='center'><strong>Montant � payer : </strong> ".
	substr($_SESSION['CADDIE_AMOUNT'],0,-2).",".substr($_SESSION['CADDIE_AMOUNT'] ,-2) . " Euros  - ");
	print("<strong>Num&eacute;ro de commande : </strong> " . $NumCmd  ."</p>");
	print("<p align='center'><a href='javascript:history.go(-1)'>RETOUR</a></p>");

	//V�rifier le contenu du parm caddie que l'on va envoyer

	/*
	$arrayCaddie = unserialize(base64_decode($xCaddie));
	for($i = 0 ; $i < count($arrayCaddie); $i++){
	echo $arrayCaddie[$i] . "<br />";
	}
	*/

}

?>