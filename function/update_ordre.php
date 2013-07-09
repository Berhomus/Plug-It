<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 05/07/2013
Name : update_ordre.php => Plug-it
*********************************************************-->

<?php
	function update_ordre($deb,$fin,$pas,$bdd)
	{
		if($fin==0)
		{
			$rq=MySQL_Query("SELECT COUNT(id) AS nbre FROM ".$bdd."");
			$rq=MySQL_fetch_array($rq);
			$fin=$rq['nbre'];
		}
		
		if($pas<0)
		{
			$swap=$fin;
			$fin=max($deb,$fin);
			$deb=min($deb,$swap);
			for($i=$deb;$i<=$fin;$i=$i-$pas)
			{
				
				$rq = mysql_query("SELECT id FROM ".$bdd." WHERE ordre='".$i."'")or die("f1ail ".$i. " => Erreur SQL !<br />".mysql_error());
				$ar = mysql_fetch_array($rq);
				MySQL_Query("UPDATE ".$bdd." SET ordre='".($i+$pas)."' WHERE id='".$ar['id']."'") or die("fail ".$i. " => Erreur SQL !<br />".mysql_error());
			}
		}
		else
		{
			$swap=$fin;
			$fin=min($deb,$fin);
			$deb=max($deb,$swap);
			for($i=$deb;$i>=$fin;$i=$i-$pas)
			{
				$rq = mysql_query("SELECT id FROM ".$bdd." WHERE ordre='".$i."'")or die("f2ail ".$i. " => Erreur SQL !<br />".mysql_error());
				$ar = mysql_fetch_array($rq);
				MySQL_Query("UPDATE ".$bdd." SET ordre='".($i+$pas)."' WHERE id=".$ar['id']."") or die("fail ".$i. " => Erreur SQL !<br />".mysql_error());
			}
		}
		
	}
?>