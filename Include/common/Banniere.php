<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Bohrane/Villain Benoit
Last Update : 26/06/2013
Name : Banniere.php => Plug-it
*********************************************************-->

<div style="overflow:hidden;">
	<a href="index.php?page=accueil"><img src="images/logotype_plug_it.png" style="float:left;margin-top:3%;margin-left:15%;"/></a>
	<table style="float:right;margin-left:5%;margin:-1%;margin-right:16%;" height="164px" class="menu" cellspacing="0">
		<tr>
			<td onclick="location.href='Index.php?page=accueil&sub=main'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'accueil')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?> >Accueil</td>
			<td onclick="location.href='Index.php?page=services&mode=view'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'services')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Services</td>
			<td onclick="location.href='Index.php?page=solutions&mode=view'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'solutions')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Solutions</td>
			<td onclick="location.href='Index.php?page=references&mode=view'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'references')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Références</td>
			<td onclick="location.href='Index.php?page=contact'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'contact')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Contact</td>
			<td onclick="location.href='Index.php?page=support'"
			<?php
				if(isset($_GET['page']) && $_GET['page'] == 'support')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Support</td>
		</tr>
	</table>
</div>

