<?php 

	require_once 'app/Model/mdl_db.php';

	require_once 'app/Model/mdl_user.php';

	session_start();

	if($_SESSION['st_id']){
	
		$session_uid = $_SESSION['st_id']; 

		if(!empty($session_uid)) {
			
			header("location:dashboard");
		}
		
		}
	require_once 'app/Controller/ctrol_login.php';	

	?>


<!doctype html>

<html lang="es">

<head>

  <meta charset="utf-8">

  <title>Administrador</title>

  <meta name="description" content="At">

  <script type="text/javascript" src="<?php echo $admin_url ?>/js/jquery.js"></script>

  <script type="text/javascript" src="<?php echo $admin_url ?>/js/jquery.validate.js"></script>

  <!--<script type="text/javascript" src="<?php echo $admin_url ?>/js/script.js"></script>-->

  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/normalize.css">

  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/style.css">

  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

</head>

<body id="bodyLogin">

	<!-- Login -->

	<div class="contentboxLogin">

		<form action="" method="post" id="login" >

			<img src="<?php echo $admin_url ?>/images/logo.png"  alt="">	

			<input type="text" placeholder="Usuario" id="username" name="user"  autocomplete ="off">

			<input type="password" placeholder="Contraseña" id="password" name="passcode"  autocomplete ="off"> 
			
			<input type="submit" value="" class="submit" >

		</form>

	</div>

</body>

</html>