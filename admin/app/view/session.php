<?php

	session_start();
	
	$session_uid = $_SESSION['st_id']; 
		
		if(!empty($session_uid)) {
		
		$uid   = $session_uid;

		}

	else
		{

		header("location:index.php");

		}
	?>
