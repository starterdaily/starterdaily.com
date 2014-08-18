<?php 
      include_once 'app/view/session.php';      
      require_once 'app/view/view.php';
 ?>

<!doctype html>

<html lang="es">

<head>

  <meta charset="utf-8">
  <title>Administrador</title>
  <meta name="description" content="At">

  <script type="text/javascript" src="<?php echo $admin_url ?>/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo $admin_url ?>/js/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo $admin_url ?>/js/script.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

</head>

<body>
	 <?php include 'app/view/header.php' ?>
  <section id="bodyApp">
    <?php $vista->UserInfo($uid); ?>
  </section>
</body>

</html>