<!--#########################################################
#                                                           #
#                PARTIE DE TEST (JS, PHP)                   #
#                                                           #
##########################################################-->
<script TYPE="text/javascript">
	function PpouPg(reponse, Min, Max){
		
		Prompt("Entrer Une Valeur Entre "+Min+" et "+Max+"");
		
		while((reponse < Min)||(reponse > Max))
		{
			Prompt("Valeur comprise entre "+Min+" et "+Max+"");
		}
		if(reponse < valeur)
		{
			Prompt("Plus Grand");
			Min=reponse;
			PpouPg(reponse, Min, Max);
			Nbcoups++;
		} 
		else if (reponse > valeur)
			{
				Prompt("Plus Petit");
				Max=reponse;
				PpouPg(reponse, Min, Max);
				Nbcoups++;
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
		
		NbreCoupsMoy = (Max - Min) / Math.Pow(4,((Max - Min) / 4);
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