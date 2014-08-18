<?php
      require_once 'app/view/view.php';
      include_once 'app/view/session.php';

      if(isset($_POST['titleCategory']) && isset($_POST['content'])) {
        $vista->insertCategoryView($_POST['titleCategory']);
      }
  ?>

<!doctype html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <title>Add Category</title>
  <meta name="description" content="At">

  <script type="text/javascript" src="<?php echo $admin_url ?>js/jquery.js"></script>
  <script src="<?php echo $admin_url ?>js/jquery.tagsinput.js"></script>
  <script src="<?php echo $admin_url ?>js/medium-editor.js"></script>
  <script src="<?php echo $admin_url ?>js/script.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $admin_url ?>/css/jquery.tagsinput.css">
  <link rel="stylesheet" href="<?php echo $admin_url ?>css/medium-editor.css">
  <link rel="stylesheet" href="<?php echo $admin_url ?>css/default.css" id="medium-editor-theme">
  <link rel="stylesheet" href="<?php echo $admin_url ?>css/medium-editor-insert-plugin.css">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'> 

</head>

<body class="sectionAdd">

	 <?php include 'app/view/header.php' ?>

  <section id="bodyApp">

    <ul class='mainSecondary'>

      <?php $vista->UserInfo($uid); ?>

    </ul>

   <!-- Crear Categoria Nueva -->
 
    <article class="contentApp">

      <!-- Formulario Ajax | Busqueda de empresas -->

        <form method="post" name="search_form" class="formsearch" id="searchpre">

          <input class="search_in" type="text" name="search" id="searchpro" placeholder="Presentado Por" autocomplete=off>

        </form>

        <ul id="resultados">
        </ul>


       <!--Formulario Medium CAtegoria -->

         <form class="formEditable" method="post" accept-charset="UTF-8" name="editor"> 

          <input placeholder ="Categoria" name="titleCategory" >

          <textarea class="content textarea" placeholder ="content" name="content" cols="40" rows="1" style="display:none"></textarea>

           <!--ID Pagina Empresa  -->
          
          <input type="hidden" id="idPresenter" name="presenter" value="">

           <!--Editor Medium  -->

          <div class="editablecategory" data-placeholder="Descripcion Categoria"></div>

          <!-- Submit Dates -->

          <input type="submit" id="btoncategory" name="publish">
      
    </form>

    </article>
    
  </section>

      <script>
        $('.mediumInsert').remove();
  </script>
</body>
</html>