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
			$fin=$rq;
		}
		
		if($pas>0)
		{
			$swap=$fin;
			$fin=min($deb,$fin);
			$deb=max($deb,$swap);
		}
		else
		{
			$swap=$fin;
			$fin=max($deb,$fin);
			$deb=min($deb,$swap);
		}
		
		for($i=$deb;$i<=$fin;$i=$i-$pas)
		{
			MySQL_Query("UPDATE ".$bdd." SET ordre='".$i."+".$pas."' WHERE ordre=".$i."");
		}
		

	}
?>