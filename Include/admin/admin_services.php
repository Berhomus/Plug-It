<script>
	
	if(isset($_POST) and !empty($_POST))
	{
		$id= (isset($_GET['id'])) ? $_GET['id']:0;
		$nomserv=$_POST['nomserv'];
		$soustitre=$_POST['soustitre'];
		$corps=$_POST['corps'];
	}
		
		$type = "modif&id=".$id;
		$type = "create";

>>>>>>> d72fe47a88212828ec1b3a8872f2d591c47c4210
