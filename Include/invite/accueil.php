<?php
	if(!isset($_GET['sub']))
	{
		$_GET['sub'] = 'main';
	}

	switch($_GET['sub'])
	{
		case 'main':
?>
			<div style="background-color:#f9bd1a; height:475px; width:100%; margin-top:-5%;padding-top:1%;">
				<div id="iview">
					<div data-iview:image="images/slide_01.jpg" data-iview:transition="slice-top-fade,slice-right-fade">

					</div>

					<div data-iview:image="images/slide_02.jpg" data-iview:transition="zigzag-drop-top,zigzag-drop-bottom" >

					</div>

					<div data-iview:image="images/slide_03.jpg" data-iview:transition="strip-right-fade,strip-left-fade">
					
					</div>

					<div data-iview:image="images/slide_04.jpg">
						
					</div>

					<div data-iview:image="images/slide_05.jpg">
						
					</div>

					<div data-iview:image="images/slide_06.jpg">

					</div>
				</div>
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
						
						<?php
							mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
							mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
							
							$retour = mysql_query('SELECT * FROM services ORDER BY date DESC') or die('Erreur SQL !<br />'.mysql_error());
							echo '<table style="margin-left:auto; margin-right:auto; width:50%;">';
							while ($donnees = mysql_fetch_array($retour))
							{
								echo'<tr>
									<td><img style="margin-right:10px;" src="images/fleche.png" /><a class="mail" href="index.php?page=services&mode=viewone&id='.$donnees['id'].'">'.$donnees['subtitre'].'</a></td>
								</tr>';
							}
							echo '</table>';
							mysql_close();
						?>
							
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
			<div style="text-align:justify; margin-left:auto; margin-right:auto; width:80%;"> 
				<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
				Propri�taire du site Internet
				</h4>
				<p>
					<b>Plug-It</b> - 36 bis, rue Saint-Fuscien - 80000 AMIENS <br/>
					T�l. : 03 22 22 10 90 <br/>
					Fax : 03 22 80 76 52 <br/>
					Courriel : <a class="mail" href="mailto:contact@plug-it.com">contact@plug-it.com</a> <br/>
					SARL au capital de 201 000 � <br/>
					SIRET : 421 617 366 00032 <br/>
					TVA FR46421617366 <br/>
					NAF : 2620Z <br/>
				</p>
				
				<br/>
				
				<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
				Directeur de la publication
				</h4>
				<p>
					<b>Thierry Bochard</b> - Directeur
				</p>
				
				<br/>
				
				<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
				Conception du site Internet
				</h4>
				<p>
					<b>AS Informatique</b> - Antoine Bovin, Beno�t Villain, Borhane Bensaid <br/>
					IUT Amiens
				</p>
				
				<br/>
				
				<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
				H�bergeur du site Internet
				</h4>
				<p>
					<b>OVH</b> - 2, rue Kellermann - 59100 ROUBAIX
				</p>
				
				<br/>
				
				<h4 style="text-transform:uppercase;"><img src="images/fleche.png"/>
				Important
				</h4>
				<p>
					Toutes les informations pr�sentes sur le site (textes, photographies, etc.) sont la propri�t� exclusive de Plug-It. 
					Toute reproduction, m�me partielle, doit faire l'objet <br/>
					d'une demande sp�cifique aupr�s de Plug-It.
				</p>
			</div>
<?php
		break;
		
		default:
			echo '<h1>404 Page Introuvable</h1>';
		break;
	}
?>