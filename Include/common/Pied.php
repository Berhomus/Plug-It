<?php
				if(isset($_SESSION['id']))
					$x = 'index.php?page=accueil&dc=1';
				else
					$x = 'index.php?page=admin';
			?>

<p class="p"><span class="span">Plug-It &copy; 2013</span>


<table style="float:right; margin:-1%; margin-right:5%; height:40px;" cellspacing="1">
	<tr>
		<td class="boutbout" onclick="location.href='<?php echo $x;?>'">
			<?php
				if(isset($_SESSION['id']))
					echo 'Deconnexion';
				else
					echo 'Administration';
			?>
		</td>
		
		<td width="15px">
		</td>
		
		<td class="boutbout" onclick="location.href='index.php?page=accueil&sub=mentions'" >
			MENTIONS LEGALES
		</td>
	</tr>

</table>
</p>
