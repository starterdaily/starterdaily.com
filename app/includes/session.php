<?php

session_start();

$uid = '';

if(@$_SESSION['st_uid']){

	$session_uid = $_SESSION['st_uid']; 

	if(!empty($session_uid)) {
			
			$uid   = $session_uid;
	}
	
}

?>