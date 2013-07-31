<?php
	if(isset($_POST['categ']))
	{
		require_once('../../connexionbddplugit.class.php');
		
		try{
			$bdd = connexionbddplugit::getInstance();
			$rq = $bdd->prepare("INSERT INTO categorie VALUE ('',?,'1')");
			$rq->execute(array($_POST['categ']));
			
			$rq = $bdd->prepare("SELECT id FROM menu WHERE baseName=?");
			$rq->execute(array('boutique'));
			$ar = $rq->fetch();

			$rq = $bdd->prepare("SELECT * FROM sousmenu WHERE menu=? ORDER BY position DESC");
			$rq->execute(array($ar['id']));
			$ar2 = $rq->fetch();

			$ar2['position'] = (isset($ar2['position']))? 1+$ar2['position']:1;
			
			$lien = 'index.php?page=boutique&categ='.$_POST['categ'];
			
			$rq = $bdd->prepare("INSERT INTO sousmenu VALUE ('',?,?,?,?)");
			$rq->execute(array($_POST['categ'],$lien,$ar['id'],$ar2['position']));
			
			echo 'success';
		}catch(Exception $e){
				echo 'Erreur SQL :'.$e->getMessage();
		}
	}
?>