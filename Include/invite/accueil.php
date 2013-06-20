<?php
	if(!isset($_GET['sub']))
	{
		$_GET['sub'] = 'main';
	}

	switch($_GET['sub'])
	{
		case 'main':
?>
			<div>

			</div>

			<div>
				<table class="table_accueil" border="0" cellspacing="10" cellpadding="10">
					<tr>
						<td>
							<h2>L'écoute, le conseil</h2>
							<hr style="color:#dedede"/>
						</td>
						
						<td>
							<h2>Les solutions dédiées</h2>
							<hr style="color:#dedede"/>
						</td>
						
						<td>
							<h2>Nos services</h2>
							<hr style="color:#dedede"/>
						</td>
					</tr>
					
					<tr>
						<td>
							Depuis 15 ans au service des entreprises,
							notre équipe commerciale est principalement
							issue du milieu technique et rompue aux
							nouvelles technologies de l’informatique.
						</td>
						
						<td>
							Première et unique solution de Cloud Computing locale,
							nos solutions sont différenciées en packs d’abonnement mensuel ou annuel.
						</td>
						
						<td>
							
						</td>
					</tr>
					
					<tr>
						<td onclick="location.href='index.php?page=accueil&sub=conseil'" style="cursor:pointer;">
							<p class="bouton">Lire la suite</p>
						</td>
							
						<td onclick="location.href='index.php?page=accueil&sub=sol'" style="cursor:pointer;">
							<p class="bouton">Lire la suite</p>
						</td>
						
						<td>
							
						</td>
					</tr>
				</table>
			</div>
<?php
		break;
	
		case 'sol':
?>
			<div style="margin-left:auto; margin-right:auto; width:80%;">	
				<img src="images/solutions_dediees.png" style="float:left;"/>

				<div style="float:left; margin-left:20px;">

					<p style="text-align: justify;">
							
							<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
							Première et unique solution de Cloud Computing locale,nos solutions <br/>
							sont différenciées en packs d’abonnement mensuel ou annuel.
							</h4>
							<br/>
							On y trouve en premier lieu notre solution de bureau virtuel sous serveurs Microsoft© Windows 2008 et <br/>
							suites Microsoft© Office Pro 2010 mais aussi des boites aux lettres Microsoft© Exchange avec toutes <br/>
							ses fonctionnalités de partage, du filtrage antispam, de la sauvegarde en ligne,de la Gestion <br/>
							commerciale, des logiciels de comptabilité, etc.
							<br/>
							<br/>
							Le travail coopératif n’est pas en reste avec notre offre Wanashare où nous mettons en œuvre Microsoft© Sharepoint 2010.
					</p>
				</div>
			</div>
			
<?php
		break;
		
		case 'conseil':
?>
			<div style="margin-left:auto; margin-right:auto; width:80%;">	
				<img src="images/ecoute_conseil.png" style="float:left;"/>

				<div style="float:left; margin-left:20px;">

					<p style="text-align: justify;">
							
							<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
							Depuis 15 ans au service des entreprises, notre équipe commerciale est <br/>
							principalement issue du milieu technique et rompue aux nouvelles <br/>
							technologies de l’informatique.
							</h4>
							<br/>
							Cette particularité a pour avantage de mieux traduire les besoins exprimés par nos clients et ainsi de <br/>
							naturellement d’effectuer une parfaite transmission des besoins à notre service technique.<br/>
							Nous sommes à même de proposer notre expertise en matière d’audit et de conseils en informatique et <br/>
							d’œuvrer en tant que maître d’œuvre.
							<br/>
							<br/>
							De la rédaction de vos cahiers des charges au suivi de la réalisation et à la recette de l’ensemble.
					</p>
				</div>
			</div>
<?php
		break;
		
		case 'mentions':
?>

<?php
		break;
		
		default:
			echo '<h1>404 Page Introuvable</h1>'
		break;
	}
?>