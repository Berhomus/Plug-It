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
							<h2>L'�coute, le conseil</h2>
							<hr style="color:#dedede"/>
						</td>
						
						<td>
							<h2>Les solutions d�di�es</h2>
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
							notre �quipe commerciale est principalement
							issue du milieu technique et rompue aux
							nouvelles technologies de l�informatique.
						</td>
						
						<td>
							Premi�re et unique solution de Cloud Computing locale,
							nos solutions sont diff�renci�es en packs d�abonnement mensuel ou annuel.
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
							Premi�re et unique solution de Cloud Computing locale,nos solutions <br/>
							sont diff�renci�es en packs d�abonnement mensuel ou annuel.
							</h4>
							<br/>
							On y trouve en premier lieu notre solution de bureau virtuel sous serveurs Microsoft� Windows 2008 et <br/>
							suites Microsoft� Office Pro 2010 mais aussi des boites aux lettres Microsoft� Exchange avec toutes <br/>
							ses fonctionnalit�s de partage, du filtrage antispam, de la sauvegarde en ligne,de la Gestion <br/>
							commerciale, des logiciels de comptabilit�, etc.
							<br/>
							<br/>
							Le travail coop�ratif n�est pas en reste avec notre offre Wanashare o� nous mettons en �uvre Microsoft� Sharepoint 2010.
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
							Depuis 15 ans au service des entreprises, notre �quipe commerciale est <br/>
							principalement issue du milieu technique et rompue aux nouvelles <br/>
							technologies de l�informatique.
							</h4>
							<br/>
							Cette particularit� a pour avantage de mieux traduire les besoins exprim�s par nos clients et ainsi de <br/>
							naturellement d�effectuer une parfaite transmission des besoins � notre service technique.<br/>
							Nous sommes � m�me de proposer notre expertise en mati�re d�audit et de conseils en informatique et <br/>
							d��uvrer en tant que ma�tre d��uvre.
							<br/>
							<br/>
							De la r�daction de vos cahiers des charges au suivi de la r�alisation et � la recette de l�ensemble.
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