<?php
	if(!isset($_GET['page']))
		$_GET['page'] = 'accueil';
?>


<div style="overflow:hidden;">
	<a href="index.php?page=accueil"><img src="images/logotype_plug_it.png" style="float:left;margin-top:40px;margin-left:200px;"/></a>
	<table style="float:right;margin-left:5%;margin-right:16%;" height="137px" class="menu" cellspacing="0">
		<tr>
			<td onclick="location.href='Index.php?page=accueil&sub=main'"
			<?php
				if($_GET['page'] == 'accueil')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?> >Accueil</td>
			<td onclick="location.href='Index.php?page=services&mode=view'"
			<?php
				if($_GET['page'] == 'services')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Services</td>
			<td onclick="location.href='Index.php?page=solutions&mode=view'"
			<?php
				if($_GET['page'] == 'solutions')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Solutions</td>
			<td onclick="location.href='Index.php?page=references&mode=view'"
			<?php
				if($_GET['page'] == 'references')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Références</td>
			<td onclick="location.href='Index.php?page=contact'"
			<?php
				if($_GET['page'] == 'contact')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Contact</td>
			<td onclick="location.href='Index.php?page=support'"
			<?php
				if($_GET['page'] == 'support')
					echo 'class="menu_selected"';
				else
					echo 'class="menu_unselected"';
			?>>Support</td>
		</tr>
	</table>
</div>

