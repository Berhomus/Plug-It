<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 01/07/2013
Name : reglement.php => Plug-it
*********************************************************-->

<script>
	function isEmail(adr, id){
     // �tape consistant � d�finir l'expression r�guli�re d'une adresse email
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
      alert('D�passement de la limite de caracteres');
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
      alert('Nombre de caract�res invalide !');
	  idlimite.style.color='red';
   }
   else
   {
	  idlimite.style.color='green';
   }
}

function isNumber(field,id){
	var regNbr = new RegExp('^[0-9]*([\.,][0-9]{0,2})?$','i');
	
	if (!regNbr.test(field.value) || field.value.length == 0) //cas o� la valeur n'est pas du tout un nombre
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

var nbr_fac = 0;


    function creerElement(ID)
    {
		  var Conteneur = document.createElement('tr');
		  Conteneur.setAttribute('id', 'element' + ID);
		  
		  var td1 = document.createElement('td')
		  var label_num = document.createElement('label');
		  label_num.setAttribute('for', 'num'+ID);
		  label_num.setAttribute('id', 'label_num'+ID);
		  label_num.innerHTML = '<b>Num�ro de facture <span class="red">*</span></b><br/><small id="lim_num_'+ID+'">(10 caract�res)</small>';
		  
		  var td2 = document.createElement('td')
		  var Input_num = document.createElement('input');
		  Input_num.setAttribute('type', 'text');
		  Input_num.setAttribute('name', 'num' + ID);
		  Input_num.setAttribute('id', 'num' + ID);
		  Input_num.setAttribute('onblur', 'textLimit2(this,10, lim_num_'+ID+');');
		  Input_num.setAttribute('required', '');
		  //Input_num.style.text-align = "right";

		  var td3 = document.createElement('td')
		  var label_date = document.createElement('label');
		  label_date.setAttribute('for', 'date'+ID);
		  label_num.setAttribute('id', 'label_date'+ID);
		  label_date.innerHTML = '<b>Date <span class="red">*</span></b><br/><small id="lim_date_'+ID+'">(JJ/MM/AA)</small>';
		  
		  var td4 = document.createElement('td')
		  var Input_date = document.createElement('input');
		  Input_date.setAttribute('type', 'date');
		  Input_date.setAttribute('name', 'date' + ID);
		  Input_date.setAttribute('id', 'date' + ID);
		  Input_date.setAttribute('onblur', 'textLimit2(this,10, lim_date_'+ID+');');
		  Input_date.setAttribute('required', '');
		  //Input_date.style.text-align = "right";
		  
		  var td5 = document.createElement('td')
		  var label_montant = document.createElement('label');
		  label_montant.setAttribute('for', 'montant'+ID);
		  label_montant.setAttribute('id', 'lim_montant_'+ID);
		  label_montant.innerHTML = '<b>Montant TTC <span class="red">*</span></b>';
		  
		  var td6 = document.createElement('td')
		  var Input_montant = document.createElement('input');
		  Input_montant.setAttribute('type', 'text');
		  Input_montant.setAttribute('name', 'montant' + ID);
		  Input_montant.setAttribute('id', 'montant' + ID);
		  Input_montant.setAttribute('onblur', 'isNumber(this,lim_montant_'+ID+');add_total();');
		  Input_montant.setAttribute('required', '');
		  //Input_montant.style.text-align = "right";
		  
		  var td7 = document.createElement('td')
		  var Delete = document.createElement('input');
		  Delete.setAttribute('type', 'button');
		  Delete.setAttribute('value', 'X');
		  Delete.setAttribute('id', 'delete' + ID);
		  Delete.onclick = supprimerElement;
		  
		  
		  td1.appendChild(label_num);
		  td2.appendChild(Input_num);
		  td3.appendChild(label_date);
		  td4.appendChild(Input_date);
		  td5.appendChild(label_montant);
		  td6.appendChild(Input_montant);
		  td7.appendChild(Delete);
		  
		  Conteneur.appendChild(td1);
		  Conteneur.appendChild(td2);
		  Conteneur.appendChild(td3);
		  Conteneur.appendChild(td4);
		  Conteneur.appendChild(td5);
		  Conteneur.appendChild(td6);
		  Conteneur.appendChild(td7);
		  
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
				// Ici, on v�rifie qu'on peut r�cup�rer les attributs, si ce n'est pas possible, on renvoit false, sinon l'attribut
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
					nbr_fac++;
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
				nbr_fac--;
				
                updateElements();
				add_total();
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
							document.getElementById('label_num'+elementNo).setAttribute('id','label_num'+n);
							document.getElementById('label_num'+elementNo).setAttribute('for','num'+n);
							document.getElementById('num'+elementNo).setAttribute('id','num'+n);
							document.getElementById('num'+elementNo).setAttribute('name','num'+n);
							document.getElementById('label_date'+elementNo).setAttribute('id','label_date'+n);
							document.getElementById('label_date'+elementNo).setAttribute('for','date'+n);
							document.getElementById('date'+elementNo).setAttribute('id','date'+n);
							document.getElementById('date'+elementNo).setAttribute('name','date'+n);
							document.getElementById('lim_montant'+elementNo).setAttribute('id','lim_montan'+n);
							document.getElementById('lim_montan'+elementNo).setAttribute('for','montant'+n);
							document.getElementById('montant'+elementNo).setAttribute('id','montant'+n);
							document.getElementById('montant'+elementNo).setAttribute('name','montant'+n);
							document.getElementById('delete'+elementNo).setAttribute('id','delete'+n);
						}
					}
				}
			}
		  }
    }

/*####FONCTION MODIF PRIX TOTAL####*/

	function add_total(){
		
		var i;
		var somme = 0.00;
		
		for(i=1;i<=nbr_fac;i++)
		{
			
			somme += (document.getElementById('montant'+i).value != "") ? parseFloat(document.getElementById('montant'+i).value):0;
		}
	
		document.getElementById('montanttot').value = somme;
	}

</script>

<h2 class="titre">Paiement en ligne</h2>

<?php
	if(isset($_POST) and !empty($_POST))
	{
		$_POST['societe'] = (!empty($_POST['societe'])) ? $_POST['societe']:"/";
		$_POST['commentaire'] = (!empty($_POST['commentaire'])) ? $_POST['commentaire']:"/";
		
?>		
		<h2 class="titre">R�capitulatif</h2>
		<table border="0" cellspacing="20" cellpadding="5" style="margin:auto;">
			
				<b>Num�ro de facture</b>
				<?php echo $_POST['num']; ?>
			
			
			
				<b>Nom du client</b>
				<?php echo $_POST['nom']; ?>
			
			
			
				<b>Soci�t�</b>
				<?php echo $_POST['societe']; ?>
			
			
			
				<b>Courriel</b>
				<?php echo $_POST['courriel']; ?>
			
			
				
				<b>Montant</b>
				<?php echo $_POST['montant']; ?>�
			
			
			
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
		<div class="formulaire">
			
			<br/>			
			<hr/>
			<br/>
			<b><center>Vos coordonn�es</center></b>
			<br/>
			<hr/>
			<br/>
			
			<label class="lab" for="nom"><b>Nom du client <span class="red">*</span></b><input  style="text-align:right;"type="text" name="nom" id="nom" onblur="textLimit(this,50, lim_nom);" required/>
			<br/><small id="lim_nom">(Max 50 caract�res)</small></label>
			<br/>
			<label class="lab" for="societe" ><b>Soci�t� </b><input style="text-align:right;" type="text" name="societe" id="societe" onblur="textLimit(this,50, lim_soc);" />
			<br/><small id="lim_soc">(Max 50 caract�res)</small></label>
			<br/>
			<label class="lab" for="courriel" id="email"><b>Courriel <span class="red">*</span></b></label><input style="text-align:right;" type="text" name="courriel" id="courriel" onblur="isEmail(this,email);" required/>

			<br/>
			<hr/>
			<br/>
			<b><center>Vos factures</center></b>
			<br/>
			<hr/>
			<br/>
			
			<table style="margin:auto;" id="conteneur">	
			</table>
			
			<input type="button" value="+" id="plus" onclick="ajouterElement();"/>
		
			<label class="lab" for="montanttot" ><b>Montant Total</b></label><input style="text-align:right;" type="text" name="montanttot" id="montanttot" value="0.00" readonly /> �
			
			<br/>
			<hr/>	
			<br/>
			<b><center>Informations compl�mentaires</center></b>
			<br/>
			<hr/>
			<br/>
			
			<label class="lab" for="commentaire"><b>Commentaire </b><textarea name="commentaire" id="commentaire" rows="10" cols="40" style="resize:none" ></textarea>
			<br/><small>(facultatif)</small></label>
			<br/>
			<input type="submit" name="envoyer" value="Envoyer" />
		</div>
		</form>	
<?php
	}
?>

<script>

	ajouterElement();
	
</script>