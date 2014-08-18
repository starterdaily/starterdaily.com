<!doctype html>
<html lang="es">
<head>
 <meta charset="utf-8_general_ci">
  <title>StarterDaily | Comunicación, Innovación & Negocios</title>

  <meta name="description" content="At">
   

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url ?>/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo $base_url ?>/js/moment.js"></script>
  <script type="text/javascript" src="<?php echo $base_url ?>/js/livestamp.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url ?>/js/starterdaily.js"></script>

  
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/style.css">
  <link href="http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200italic,200,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/demo.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/icons.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/component.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/foundation.css" />

  <meta class="foundation-data-attribute-namespace">
  <meta class="foundation-mq-xxlarge">
  <meta class="foundation-mq-xlarge">
  <meta class="foundation-mq-large">
</head>

<body>
  <header class="ContentHeader">
      <section class="content">
            <ul class="top-bar-section">
              <li class="name">
                            <h1>
                                <a href="index.html"><img src="<?php echo $base_url?>/images/logo.png" alt="Logo StarterDaily"></a>
                            </h1>
                        </li>
              <li class="main-rest has-dropdown not-click">
                                <a class="mains" href="#">Noticias</a>
                                <ul class="dropdown">
                                    <li><a href="#">Campañas</a></li>
                                    <li><a href="#">Escuelas</a></li>
                                    <li><a href="#">Estudios</a></li>
                                    <li><a href="#">Festivales</a></li>
                                    <li><a href="#">Inspiracion</a></li>
                                    <li><a href="#">Movimientos</a></li>
                                    <li><a href="#">Webinars</a></li>
                                </ul>


               </li>

                <li class="main-rest has-dropdown not-click">
                                <a class="mains" href="#">Articulos</a>
                                <ul class="dropdown">
                                    <li><a href="#">Consejos</a></li>
                                    <li><a href="#">Entrevistas</a></li>
                                    <li><a href="#">Opinión</a></li>
                                    <li><a href="#">Tips Laborales</a></li>
                                </ul>
               </li>
     

                <li class="main-rest has-dropdown not-click">
                                <a class="mains" href="#">Tendencias</a>
                                <ul class="dropdown">
                                    <li><a href="#">Digital</a></li>
                                    <li><a href="#">Diseño</a></li>
                                    <li><a href="#">Innovación</a></li>
                                    <li><a href="#">Capacitación</a></li>
                                    <li><a href="#">Media</a></li>
                                    <li><a href="#">Mobile</a></li>
                                    <li><a href="#">Negocios</a></li>
                                    <li><a href="#">Startup</a></li>
                                    <li><a href="#">Tecnología</a></li>
                                </ul>
               </li>

                <li class="main-rest has-dropdown not-click">
                                <a class="mains" href="#">Empleo</a>
                                <ul class="dropdown">
                                    <li><a href="#">Networking </a></li>
                                    <li><a href="#">Capacitación</a></li>
                                    <li><a href="#">Webinars</a></li>
                                </ul>
               </li>
     
     
            </ul>

          <?php if($uid!=='') {

          $controllerUser = new ControllerUserProfile;
          $data =  $controllerUser->infoProfile($uid);
          
          foreach ($data as $datas ) {
            $name    =  $datas['st_name'];
            $profile = $datas['st_imageprofile'];
          }
          ?>

          <div class="boxProfile">          
              <figure class="boxProfileImg">
                <img src="<?php echo $profile ?>">
              </figure>
              <p class="titleName"><?php echo $name?></p>

            <div class="dropdown">
            <a data-toggle="dropdown" class="icon-dropdown" href="#">v</a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="">Mi Perfil</a></li>
                <li><a href="">Leer Despues</a></li>
                <li><a href="">Configuarcion</a></li>
                <li><a href="">Salir</a></li>
                <li><a href="">Crear Perfil Empresa</a></li>
              </ul>
            </div>
          </div>

          <?php } else { ?>

          <ul class="mainregister">
            <li><a href="" data-toggle="modal" data-target="#registerLogin" >Entra</a></li>
            <li><a href="" class="btn btn-primary btn-lg resalte" data-toggle="modal" data-target="#registerModal" >Unete</a></li>
          </ul>
          <?php }?>
      
        </section> 
       </header>

  










































    
<!-- Modal de Registro -->

  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="overlay-dialog ">

        <figure class="logotipoB"> 
          <img src="<?php echo $base_url ?>/images/logo_bn.png">
        </figure>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>

        <div class="modal-body registro">
          <h3>Bienvenido a Starterdaily, ¿Listo para empezar?</h3>
          <span>Elige tu forma de entrar favorita</span>

          <div class="socialRegister">
            <div class="twitterRegister"><a href="">Registrarse con Twitter</a></div><br>
            <div class="faceRegister"><a class="btn_face" onClick="FBLogin();">Registrarse con Facebook</a></div>
          </div>  
          <form action="" method="post" id="registerForm">
            <input type="text" placeholder="Email" id="username" name="email"  autocomplete ="off">
            <input type="password" placeholder="Contraseña" id="password" name="password"  autocomplete ="off">     
            <input type="submit" value="Unirse" class="submit" id="enviar" >
            <?php echo $reg_error ?>
          </form>
        </div>
      </div>
    </div>

  </div>

<!-- Fin Modal de Registro -->

<!-- Modal Login -->

  <div class="modal fade" id="registerLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="overlay-dialog ">

        <h2>Bienvenido de Vuelta</h2>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>

        <div class="modal-body">
          <!-- Formulario de registro Index -->
          <form action="" method="post" id="registerForm">
            <input type="text" placeholder="Email" id="username" name="emaillogin"  autocomplete ="off">
            <input type="password" placeholder="Contraseña" id="password" name="passcode"  autocomplete ="off">     
            <input type="submit" value="Entrar" class="submit" id="enviar" >
  
          </form>
        </div>
      </div>
    </div>

  </div>


