<?php
	function disconnect()
	{
		if(isset($_GET['dc']) and $_GET['dc'] == 1)
		{
			session_destroy();
			session_start();
		}
	}
?>