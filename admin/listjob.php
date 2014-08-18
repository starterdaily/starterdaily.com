<?php 
      include_once 'app/view/session.php';  
      require_once 'app/view/view.php';
      require_once 'app/view/viewjobs.php';
 ?>

<!doctype html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <title>Ofertas Laborales</title>
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


    <article class="contentApp">

      <div class="headerApp">
      
      <h2>Ofertas Laborales</h2>

      <p class="subtitle">Trabajos</p>

      </div>

    <?php $vistaJobs->jobsList() ?>

   <?php 

     // $query = mysql_query("INSERT INTO st_jobs (st_cargo, st_user_id) VALUES('xupalo', '1')")or die (mysql_error());

     if($query){

        echo "funciona";

     }

     else{

      echo "no lo hace";
     }


   ?>

    <br><br><br>


    <form action=""  name="formulario" method="post" style="padding-left:300px;">

      <label for="">Ofeta</label><br>
      <input type="text" name="oferta" placeholder="Se necesita Diseñador"><br>

     <label for="">Tipo de Trabajo</label><br>
     <select>
        <option value="Practica">En Practica</option>
        <option value="Completo">Tiempo Completo</option>
        <option value="Parcial">Tiempo Parcial</option>
        <option value="Remplazo">En Remplazo</option>
        <option value="Temporal">Temporal</option>

     </select><br>

     <label for="">Experiencia Previa</label><br>
     <select>
        <option value="Sexperiencia">Sin Experiencia</option>
        <option value="uno">Al menos 1 Año</option>
        <option value="dos">Al menos 2 Años</option>
        <option value="tres">Al menos 3 Años</option>
        <option value="cuatro">Al menos 4 Años</option>
        <option value="cinco">5 años o mas</option>
     </select><br>

      <label for="">Salario Mensual</label><br>
      <input type="text" placeholder="600.000"><br>

      <label for="">Hasta cuando deseas publicar la Oferta</label><br>

       <select>
          <option value="Sexperiencia">Una Semana</option>
          <option value="uno">Dos Semana</option>
          <option value="uno">Un Mes</option>
       </select><br>

       <label for="">Descripción</label><br>
       <textarea name="" id="" cols="30" rows="10"> </textarea><br>

        <label>Nombre de la empresa</label><br>
        <input type="text" placeholder="ej:Fosco"><br>

        <label>Nombre de Contacto</label><br>
        <input type="text"><br>

        <label>Sitio Web</label><br>
        <input type="text" placeholder="www.startedaily.com"><br>

        <label>Telefono</label><br>
        <input type="text" placeholder="ek: 600 600 600"><br>

        <input type="submit" value="Publicar" >

        <input type="submit" value="Borrador" >

    </form>

  </article>

   </section>


</body>

</html>