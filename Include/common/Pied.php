<p class="p"><span class="span">Plug-It &copy; 2013</span>


<table style="position:absolute; right:5%;top:0; height:40px;" cellspacing="1">
	<tr>
		<?php
		if(isset($_SESSION['id']))
		{
			echo '<td class="boutbout" onclick="location.href=\'index.php?page=accueil&dc=1\'">
				Deconnexion
			</td>
			<td width="15px">
			</td>';
		}
		?>
		<td class="boutbout" onclick="location.href='index.php?page=admin'">
			Administration
		</td>
		
		<td width="15px">
		</td>
		
		<td class="boutbout" onclick="location.href='index.php?page=accueil&sub=mentions'" >
			MENTIONS LEGALES
		</td>
	</tr>

</table>
</p>
