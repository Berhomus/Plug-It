<!--#########################################################
#                                                           #
#                PARTIE DE TEST (JS, PHP)                   #
#                                                           #
##########################################################-->

<script TYPE="text/javascript">
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
		
		Prompt("Valeur trouvée en "+Nbcoups+", la moyenne est de "+NbreCoupsMoy+"");
	}
</script>
<html>
	<head>Menu</head>
	<body>
		<p>
		<img src="images/fleche.png"/><h2>WanaShare est une plateforme de gestion de l'information et de <br/>
		collaboration professionnelle basée sur le produit Microsoft© SharePoint <br/>
		2010 qui vous aide à améliorer votre productivité et à gérer votre contenu, <br/>
		en utilisant un navigateur Internet.<br/></h2>
		<br/>
		Les fonctionnalités intégrées de WanaShare, optimisées par des technologies d'indexation et de <br/>
		recherche, vous permettent de vous adapter rapidement à l'évolution de vos besoins métier.<br/>
		Vous pouvez ainsi prendre des décisions fondées sur des données métier consolidées et déployer des <br/>
		applications métiers de façon rapide et sécurisée afin de renforcer la collaboration dans et hors de votre <br/>
		entreprise.<br/>
		<br/>
		<img src="images/fleche.png"/><h2>WanaShare, pour quels usages ? WanaShare vous permet d'accroître la productivité via un ensemble intégré de <br/>
		fonctionnalités innovantes. Parmi elles, on peut citer :<br/></h2>
		<br/>
		- Accessibilité.<br/>
		- Affichage d'informations.<br/>
		- Prise en main de WSS 3.0.<br/>
		- Conservation de plusieurs versions de fichiers et d'éléments.<br/>
		- Création de sites, de listes et de bibliothèques.<br/>
		- Formules et fonctions.<br/>
		- Gestion de sites et de paramètres.<br/>
		- Intégration du courrier électronique aux sites, listes et bibliothèques.<br/>
		- Organisation de réunions.<br/>
		- Partage de fichiers et de documents.<br/>
		- Partage d'informations.<br/>
		- Personnalisation de sites, de pages, de listes et de bibliothèques.<br/>
		- Utilisation des environnements internationaux.<br/>
		- Utilisation des flux de travail pour gérer les processus.<br/>
		<br/>
		</p>
	</body>
</html>