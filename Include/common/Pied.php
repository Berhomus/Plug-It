<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : Pied.php => Plug-it
*********************************************************-->

<span style="position:absolute;top:40%;left:10%;">Plug-It &copy; 2013</span>


<table style="position:absolute; right:10%;top:0px; height:40px" cellspacing="0">
	<tr>
		<?php
		if(isset($_SESSION['id']))
		{
			echo '<td class="boutbout" onclick="location.href=\'index.php?page=accueil&dc=1\'">
				Deconnexion
			</td>';
		}
		?>
		<td class="boutbout" onclick="location.href='index.php?page=admin'">
			Administration
		</td>
		
		<td class="boutbout" onclick="location.href='index.php?page=accueil&sub=mentions'" >
			MENTIONS LEGALES
		</td>
		
		<td class="boutbout" onclick="location.href='http://www.rhinocerose.fr/'" >
			Design - Rhinoc&eacuterose
		</td>
	</tr>

</table>
