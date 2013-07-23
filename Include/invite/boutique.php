

<h2 class="titre">Boutique en ligne </h2>


<!--<ul id="panier">
        <li class="paniersuite">Panier
			<ul>
				<li class="paniersuite">CSS</li>
				<li class="paniersuite">Graphic design</li>
				<li class="paniersuite">Development tools</li>
				<li class="paniersuite">Payer</li>
			</ul>
        </li>
</ul>



<div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Action <span class="caret"></span> </a>
  <ul class="dropdown-menu">
    <li><a href="#">Dompteurs</a></li>
    <li><a href="#">Zoos</a></li>
    <li><a href="#">Chasseurs</a></li>
    <li class="divider"></li>
    <li><a href="#">Autres témoignages</a></li>
  </ul>
</div>
</div>-->

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
	   $(function(){
		
			$('#accordeon').accordion(); // appel du plugin
				
			$('#accordeon').accordion({
				event : 'click',
				collapsible : true,	
				active : 2
			});
		
		});
		window.onscroll = scroll;
		function scroll () {
		document.getElementById('accordeon').style.marginTop=50+window.pageYOffset+"px";	
		}
		/*window.onresize = retaille;
		function retaille() {
		document.getElementById('accordeon').style.right=0.1*document.body.clientWidth;	
		}*/
		
		function ajoutpanier(idprod) {
		var cont = document.getElementById('contenu');
		var nouvelem = document.creatElement('p');
		
		nouvelem.setAttribute('id','nouvel');
		nouvelem.innerHTML = '
		
		cont.appendChild();
		
		}
		</script>
	
<div id="accordeon"> <!-- Bloc principal, sur lequel nous appellerons le plugin -->
	<h3><img src="./images/e_commerce_caddie.gif" style="width:20px; height:20px; vertical-align:-18%;"/>Panier</h3>
	<div id="contenu">
		<p><table style="width:100%"><tr><td colspan="2">Nom</td><td>Qté</td><td>Prix</td></tr></table></p>
		<p><hr/></p>
		<p><span style="float:left; margin-left:5px;">Montant total : 0</span><a href="#"><span style="float:right; margin-right:5px;">Payer</span></a></p>
	</div>
</div>

<?php
	
?>

<?php
	if(!isset($_GET['mode']))
	{
		$_GET['mode'] = 'view';
	}
	
	mysql_connect('localhost', 'root', '')or die('Erreur SQL !<br />'.mysql_error());
	mysql_select_db ('plugit')or die('Erreur SQL !<br />'.mysql_error());
	mysql_set_charset( 'utf8' );
	
	switch($_GET['mode'])
	{	
		case 'view' :
		
			if(!isset($_GET['categ']))
			{
				$_GET['categ'] = 'destokage';
			}
			
			$nomcateg = $_GET['categ'];
	
			$rq = MySQL_Query("SELECT COUNT(nom) AS nombre FROM categorie WHERE nom = '$nomcateg'")or die('Erreur SQL !<br />'.mysql_error());
			$rq = MySQL_fetch_array($rq);
			
			if($rq['nombre'] >= 1)
			{
				$rq = MySQL_Query("SELECT * FROM produit WHERE categorie = '$nomcateg' ORDER BY priorite DESC")or die('Erreur SQL !<br />'.mysql_error());
				
				$i=1; //délimite les colonnes
				$j=1; //délimite les lignes
				
				echo'<div style="margin:auto;width:1000px;">';
					
				if(isset($_SESSION['id']))
				{
					echo '<br/><div style="margin-left:415px;" class="menuverti" onclick="location.href=\'Index.php?page=admin_boutique\'">Ajouter un produit</div>';
				}
				
				$ar=MySQL_fetch_array($rq);
				
				if(!empty($ar))
				{
				$rq = MySQL_Query("SELECT * FROM produit WHERE categorie = '$nomcateg' ORDER BY priorite DESC")or die('Erreur SQL !<br />'.mysql_error());
					echo '<table cellspacing="20">';
					while($ar=MySQL_fetch_array($rq))
					{
						if($i == 1)
							echo '<tr>';
						
						echo '<td>
						<div class="blockproduit" onclick="location.href=\'Index.php?page=boutique&mode=viewone&id='.$ar['id'].'\'"> ';
						
						if(isset($_SESSION['id']))
						{
							echo'
							<span style="margin-left:10%;"><a class="bt" href="index.php?page=admin_boutique&mode=modifier&id='.$ar['id'].'">Modifier</a> - 
							<a class="bt" href="traitement/trt_boutique.php?mode=delete&id='.$ar['id'].'">Supprimer</a></span>';
						}
						echo'
							<img src="'.$ar['images'].'" style="margin-left:5%;width:90%;" width="280" height="170"/>
						</div><span id="'.$ar['id'].'" class="boutprod" style="float:left;" onclick="alert(\'nya\');ajoutpanier();">Ajouter au panier </span><span class="boutprod2" style="float:left;"><select name="qte'.$ar['id'].'" id="qte'.$ar['id'].'">';
						for($k=1;$k<=10;$k++)
						{
							echo '<option value='.$k.'>'.$k.'</option>';
						}
						echo '</span>';
						
						echo '</td>';
						
						$i++;
						if($i > 3)
						{
							$i=1;
							$j++;
							echo '</tr>';
						}
					}
					echo '</table>';
				}
				else
				{
					echo '<h2>Aucun produit existant</h2>';
				}
				echo '</div>';
			}
			else
			{
				echo '<h1>Catégorie Inexistante</h1>';
			}
		break;
		
		case 'oneview' :
			
		break;
		
		default :
		echo '<h2>Page inexistante</h2>';
		break;
	}
	
?>