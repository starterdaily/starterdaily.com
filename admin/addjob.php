<?php 
      include_once 'app/view/session.php';  
      require_once 'app/view/viewjobs.php';
      if(isset($_POST['titlejobs'])) {

        echo $vistaJobs->getJobAdd($_POST['titlejobs'],$_POST['typejob'],$_POST['yearexperience']);
      }

 ?>

<!doctype html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <title>Ofertas Laborales</title>
  <meta name="description" content="At">

  <script type="text/javascript" src="<?php echo $admin_url ?>js/jquery.js"></script>
  <script src="<?php echo $admin_url ?>js/jquery.tagsinput.js"></script>
  <script src="<?php echo $admin_url ?>js/medium-editor.js"></script>
  <script src="<?php echo $admin_url ?>js/script.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  
</head>

<body>
	
  <?php include 'app/view/header.php' ?>

  <section id="bodyApp">

   <?php $vista->UserInfo($uid); ?> 

    <article class="contentApp">

      <!-- Formulario Agregar Trabajo -->

    <form action=""  name="formulario" method="post" style="padding-left:300px;">

      <label for="">Ofeta</label><br>
      <input type="text" name="titlejobs" placeholder="Se necesita Diseñador"><br>



     <label for="">Tipo de Trabajo</label><br>
     <select name="typejob">
        <option value="Practica">En Practica</option>
        <option value="Completo">Tiempo Completo</option>
        <option value="Parcial">Tiempo Parcial</option>
        <option value="Remplazo">En Remplazo</option>
        <option value="Temporal">Temporal</option>

     </select><br>

     <label for="">Experiencia Previa</label><br>
     <select name="yearexperience">
        <option value="Sin-experiencia">Sin Experiencia</option>
        <option value="uno">Al menos 1 Año</option>
        <option value="dos">Al menos 2 Años</option>
        <option value="tres">Al menos 3 Años</option>
        <option value="cuatro">Al menos 4 Años</option>
        <option value="cinco">5 años o mas</option>
     </select><br>

      <label for="">Salario Mensual</label><br>
      <input type="text" placeholder="600.000" name="money"><br>

      <input type="hidden" value="" name="idPresenter" id="idPresenter">

      <label for="">Hasta cuando deseas publicar la Oferta</label><br>

       <select name="enddate">
          <option value=""></option>
          <option value="semana">Una Semana</option>
          <option value="dossemanas">Dos Semana</option>
          <option value="mes">Un Mes</option>
       </select><br><br>
       
       <label for="">Categoria</label><br>
         <select name="jobcategory">
          <option value=""></option>
          <option value="diseno">Diseño</option>
          <option value="socialmedia">Social Media</option>
          <option value="publicidad">Publicidad</option>
       </select><br><br>

        <label for="">Ciudad</label><br>
         <select name="city">
          <option value=""></option>
          <option value="santiago">Diseño</option>
          <option value="rancagua">Rancagua</option>
          <option value="concepcion">Concepcion</option>
       </select><br>


       <label for="">Descripción</label><br>
       <textarea name="jobdescription" id="" cols="30" rows="10"> </textarea><br>

              <!-- Formulario Ajax | Busqueda de empresas -->

          <input class="search_in" type="text" name="search" id="searchpro" placeholder="Presentado Por" autocomplete=off>

        <ul id="resultados">
        </ul>


        <label>Nombre de Contacto</label><br>
        <input name="namecontact" type="text"><br>

        <label>Email de Contacto</label><br>
        <input name="email" type="text"><br>

        <label>Sitio Web</label><br>
        <input  name="website" type="text" placeholder="www.startedaily.com"><br>

        <label>Telefono</label><br>
        <input  name="phone" type="text" placeholder="ek: 600 600 600"><br>

        <input name="publish" value="visible"  type="submit" value="Publicar" >
        <input name="nopublish" value="hidden" type="submit" value="Borrador" >

    </form>

  </article>
</section>


</body>

</html>