<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 01/07/2013
Name : reglement.php => Plug-it
*********************************************************-->

<script>
	function isEmail(adr, id){
     // étape consistant à définir l'expression régulière d'une adresse email
     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

     if(regEmail.test(adr.value) && adr.value.length < 50)
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
   
   /*####FONCTION LIMITATION DE CARACTERES####*/

function textLimit(field, maxlen, idlimite) {
   if (field.value.length > maxlen) {
      field.value = field.value.substring(0, maxlen);
      alert('Dépassement de la limite de caracteres');
	  idlimite.style.color='red';
	  setTimeout(function(){idlimite.style.color='green';},2000);
   }
   else if((maxlen > field.value.length) && (field.value.length>0))
   {
	  setTimeout(function(){idlimite.style.color='green';},2000);
   }
   
}

function textLimit2(field, maxlen, idlimite) {
	if (field.value.length != maxlen) {
      field.value = "";
      alert('Nombre de caractères invalide !');
	  idlimite.style.color='red';
   }
   else
   {
	  idlimite.style.color='green';
   }
}

function isNumber(field,id){
	var regNbr = new RegExp('^[0-9]*([\.,][0-9]{0,2})?$','i');
	
	if (!regNbr.test(field.value) || field.value.length == 0) //cas où la valeur n'est pas du tout un nombre
	{
		field.value = ""; // la valeur devient nulle
		id.style.color = "red";
		alert("Valeur incorrecte !");
	}
	else
	{
		id.style.color = "green";
		
		var value = field.value.replace(",",".");
		
		var entiere = parseInt(value);
		var decimale = field.value.substring(value.lastIndexOf("."));
		if(decimale != entiere)
		{
			var i;
			for(i = decimale.length;i<3;i++)
				value += "0";
		}
		else
		{
			value += ".00";
		}
		
		field.value = value;
	}
}

/*####FONCTION AJOUT DE FACTURE####*/

var nbr_fac = 1;

function ajoutfacture(n)
{
	var array = document.getElementById("facture").innerHTML.split("");
	
	var chaine = "";
	
	nbr_fac++;
	
	var i;
	for(i=0;i<(8+n);i++)
	{
		chaine += (array[i]+"");
	}
	chaine +=
	' \
		<label for="num_'+n+'"><b>Numéro de facture <span class="red">*</span></b><br/><small id="lim_num_'+n+'">(10 caractères)</small></label> \
		<input style="text-align:right;" type="text" name="num_'+n+'" id="num_'+n+'" onblur="textLimit2(this,10, lim_num_'+n+');" required/> \
		<label for="date'+n+'"><b>Date <span class="red">*</span></b><br/><small id="lim_date_'+n+'">(JJ/MM/AA)</small></label> \
		<input type="date" name="date_'+n+'" id="date_'+n+'" onblur="textLimit2(this,10, lim_date_'+n+');" required/> \
		<label for="montant" id="lim_montant_'+n+'"><b>Montant TTC <span class="red">*</span></b></label> \
		<input style="text-align:right;" type="text" name="montant_'+n+'" id="montant_'+n+'" onblur="isNumber(this,lim_montant_'+n+');" required/> € \
		<input type="button" value="X" id="moins" onclick="deletefacture('+n+');"/> \
	';

	array[i] = '<input type="button" value="+" id="plus" onclick="ajoutfacture('+(n+1)+');"/>';
	
	for(i=(8+n);i<array.length-1;i++)
		chaine += (array[i]+"");
		
	chaine += array[i];
	
	document.getElementById("facture").innerHTML = chaine;
		
}

function deletefacture(n){

	var array = document.getElementById("facture").innerHTML.split("");
	
	var chaine = "";

	array[(nbr_fac+9)] = '<input type="button" value="+" id="plus" onclick="ajoutfacture('+(nbr_fac)+');"/>';
	
	nbr_fac--;
	
	var i;
	for(i=0;i<array.length-1;i++)
	{
		if(i != (n+8))
			chaine += (array[i]+"");
	}

	chaine += array[i];
	
	document.getElementById("facture").innerHTML = chaine;
	
}

    function creerElement(ID)
    {
      var Conteneur = document.createElement('div');
      Conteneur.setAttribute('id', 'element' + ID);
      var Input = document.createElement('input');
      Input.setAttribute('type', 'text');
      Input.setAttribute('name', 'input' + ID);
      Input.setAttribute('id', 'input' + ID);
      var Delete = document.createElement('input');
      Delete.setAttribute('type', 'button');
      Delete.setAttribute('value', 'Supprimer n°' + ID + ' !');
      Delete.setAttribute('id', 'delete' + ID);
      Delete.onclick = supprimerElement;
      Conteneur.appendChild(Input);
      Conteneur.appendChild(Delete);
      return Conteneur;
    }

	    function dernierElement()
    {
      var Conteneur = document.getElementById('conteneur'), n = 0;
      if(Conteneur)
      {
        var elementID, elementNo;
        if(Conteneur.childNodes.length > 0)
        {
          for(var i = 0; i < Conteneur.childNodes.length; i++)
          {
            // Ici, on vérifie qu'on peut récupérer les attributs, si ce n'est pas possible, on renvoit false, sinon l'attribut
            elementID = (Conteneur.childNodes[i].getAttribute) ? Conteneur.childNodes[i].getAttribute('id') : false;
            if(elementID)
            {
				var elementPattern=new RegExp("element([0-9]*)","g");
              elementNo = parseInt(elementID.replace(elementPattern, '$1'));
              if(!isNaN(elementNo) && elementNo > n)
              {
                n = elementNo;
              }
            }
          }
        }
      }
      return n;
    }

	    function ajouterElement()
    {
            var Conteneur = document.getElementById('conteneur');
            if(Conteneur)
            {	
                    Conteneur.appendChild(creerElement(dernierElement() + 1))
            }
    }

    function supprimerElement()
    {
		var deletePattern=new RegExp("delete([0-9]*)","g");
      var Conteneur = document.getElementById('conteneur');
      var n = parseInt(this.id.replace(deletePattern, '$1'));
      if(Conteneur && !isNaN(n))
      {
        var elementID, elementNo;
        if(Conteneur.childNodes.length > 0)
        {
          for(var i = 0; i < Conteneur.childNodes.length; i++)
          {
            elementID = (Conteneur.childNodes[i].getAttribute) ? Conteneur.childNodes[i].getAttribute('id') : false;
            if(elementID)
            {
				var elementPattern=new RegExp("element([0-9]*)","g");
              elementNo = parseInt(elementID.replace(elementPattern, '$1'));
              if(!isNaN(elementNo) && elementNo  == n)
              {
                Conteneur.removeChild(Conteneur.childNodes[i]);
                updateElements(); // A supprimer si tu ne veux pas la màj
                return;
              }
            }
          }
        }
      }  
    }

	
	    function updateElements()
    {
      var Conteneur = document.getElementById('conteneur'), n = 0;
      if(Conteneur)
      {
        var elementID, elementNo;
        if(Conteneur.childNodes.length > 0)
        {
          for(var i = 0; i < Conteneur.childNodes.length; i++)
          {
            elementID = (Conteneur.childNodes[i].getAttribute) ? Conteneur.childNodes[i].getAttribute('id') : false;
            if(elementID)
            {
				var elementPattern=new RegExp("element([0-9]*)","g");
              elementNo = parseInt(elementID.replace(elementPattern, '$1'));
              if(!isNaN(elementNo))
              {
                n++
                Conteneur.childNodes[i].setAttribute('id', 'element' + n);
                document.getElementById('input' + elementNo).setAttribute('name', 'input' + n);
                document.getElementById('input' + elementNo).setAttribute('id', 'input' + n);
                document.getElementById('delete' + elementNo).setAttribute('id', 'delete' + n);
              }
            }
          }
        }
      }
    }

</script>

<h2 class="titre">Paiement en ligne</h2>

<?php
	if(isset($_POST) and !empty($_POST))
	{
		$_POST['societe'] = (!empty($_POST['societe'])) ? $_POST['societe']:"/";
		$_POST['commentaire'] = (!empty($_POST['commentaire'])) ? $_POST['commentaire']:"/";
		
?>		
		<h2 class="titre">Récapitulatif</h2>
		<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
			
				<b>Numéro de facture</b>
				<?php echo $_POST['num']; ?>
			
			
			
				<b>Nom du client</b>
				<?php echo $_POST['nom']; ?>
			
			
			
				<b>Société</b>
				<?php echo $_POST['societe']; ?>
			
			
			
				<b>Courriel</b>
				<?php echo $_POST['courriel']; ?>
			
			
				
				<b>Montant</b>
				<?php echo $_POST['montant']; ?>€
			
			
			
				<b>Commentaire</b>
				<?php echo $_POST['commentaire']; ?>
				
		</table>
		
<?php
		$_POST['montant'] = str_replace('.',"",$_POST['montant']);
		include("include/webaffaires/call_request.php");
	}
	else
	{
?>
		<form method="post" action="#">
			<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;" id="facture">
						
							<td colspan="6"><hr/>
						
						
						
							<td colspan="6" style="text-align:center;"><b>Vos coordonnées</b>
						
						
						
							<td colspan="6"><hr/>
						
						
						
							<label for="nom"><b>Nom du client <span class="red">*</span></b><br/><small id="lim_nom">(Max 50 caractères)</small></label>
							<input  style="text-align:right;"type="text" name="nom" id="nom" onblur="textLimit(this,50, lim_nom);" required/>
						
						
						
							<label for="societe"><b>Société </b><br/><small id="lim_soc">(Max 50 caractères)</small></label>
							<input style="text-align:right;" type="text" name="societe" id="societe" onblur="textLimit(this,50, lim_soc);" />
						
						
						
							<label for="courriel" id="email"><b>Courriel <span class="red">*</span></b></label>
							<input style="text-align:right;" type="text" name="courriel" id="courriel" onblur="isEmail(this,email);" required/>
						
						
						
							<td colspan="6"><hr/>
						
						
						
							<td style="text-align:center;" colspan="6"><b>Vos factures</b>
						
						
						
							<td colspan="6"><hr/>
							
					</table>
						<div id="conteneur">
						
						<div id="element1">
							<label for="num_1"><b>Numéro de facture <span class="red">*</span></b><br/><small id="lim_num_1">(10 caractères)</small></label>
							<input style="text-align:right;" type="text" name="num_1" id="num_1" onblur="textLimit2(this,10, lim_num_1);" required/>
						
							<label for="date_1"><b>Date <span class="red">*</span></b><br/><small id="lim_date_1">(JJ/MM/AA)</small></label>
							<input type="date" name="date_1" id="date_1" onblur="textLimit2(this,10, lim_date_1);" required/>
							
							<label for="montant_1" id="lim_montant_1"><b>Montant TTC <span class="red">*</span></b></label>
							<input style="text-align:right;" type="text" name="montant_1" id="montant_1" onblur="isNumber(this,lim_montant_1);" required/> €
						</div>	
						
						</div>
						
							<input type="button" value="+" id="plus" onclick="ajouterElement();"/>
						
					<table>	
						
							<td style="text-align:right;" colspan="5"><label for="montanttot" ><b>Montant Total</b></label>
							<td colspan="6"><input style="text-align:right;" type="text" name="montanttot" id="montanttot" value="0.00" readonly /> €
						
						
						
							<td colspan="6"><hr/>
						
						
						
							<td style="text-align:center;" colspan="6"><b>Informations complémentaires</b>
						
						
						
							<td colspan="6"><hr/>
						
						
						
							<label for="commentaire"><b>Commentaire </b><br/><small>(facultatif)</small></label>
							<td colspan="3"><textarea name="commentaire" id="commentaire" rows="10" cols="40" style="resize:none" ></textarea>
						
						
						
							
							
							<td style="text-align:right;"><input type="submit" name="envoyer" value="Envoyer" />
								
				</table>
			</form>	
<?php
	}
?>