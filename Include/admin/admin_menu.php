<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 12/07/2013
Name : admin_solutions.php => Plug-it
*********************************************************-->


<?php
if(isset($_SESSION['id']))
{
	if(!isset($_GET['mode']))
		$_GET['mode'] = 'view';
	
	
}
else
{
	echo '<h2 style="color:red">Access Forbidden !</h2>';
}
?>


<style>
		.droph
		{
			width:700px;
			height: 280px;
			border-style:solid;
			border-width:5px;
			position:relative;	
			margin-left:20%;
			margin-top:-2%;
		}
		
		.dropv
		{
			postion: relative;
			margin-top: 1%;
			margin-left:20%;
			width:150px;
			height:500px;
			border-style:solid;
			border-width:5px;
		}
		
		#accordeon
			{
				background-color:rgb(77,118,237);
				width:150px;
			}
			
			#accordeon h3
			{
				background-color:rgb(16,55,160);
				color: white;
				width:150px;
				text-align: center;
			}
			#accordeon div p a
			{
				text-decoration: none;
				color:black;
			}
			#accordeon div p a:visited
			{
				text-decoration: none;
				color:black;
			}
			#accordeon div p a:hover
			{
				text-decoration: none;
				color:white;
			}
			#accordeon div p
			{
				text-align: center;
			}
	</style>

	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript">
	   $(function(){
		
			$('#accordeon').accordion(); // appel du plugin
				
			$('#accordeon').accordion({
				event : 'mouseover',
				collapsible : true				
			});
		
		});
   </script>
	
<div id="accordeon"> <!-- Bloc principal, sur lequel nous appellerons le plugin -->
			<h3>Section 1</h3>
			<div>
				<p><a href="#">Sous-menu 1</a></p>
			</div>
		 
			<h3>Section 2</h3>
			<div>
				<p><a href="#">Sous-menu 2</a></p>
				<p><a href="#">Sous-menu 3</a></p>
			</div>
		 
			<h3>Section 3</h3>
			<div>
				<p><a href="#">Sous-menu 4</a></p>
				<p><a href="#">Sous-menu 5</a></p>
			</div>
		</div>
	</div>