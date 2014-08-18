 <?php

	error_reporting(0);
	ob_start("ob_gzhandler");

	session_start();
	$_SESSION['st_uid']=''; 
	if(session_destroy()){
		//header("Location: index.php");
		echo "<script>window.location='/starterdaily/'</script>";
	}
?>