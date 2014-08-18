<?php
      require_once 'app/view/view.php';
      include_once 'app/view/session.php';
      
     $idc = $_GET["idc"]; 

     $vista->articleDetailsView($uid,$id);

      if(isset($_POST['title'])) {
        if(@$_POST['actualizar']) {
            $publish   = $_POST['publish'];
   
} 
        $title         =  $_POST['title'];
        $content       =  $_POST['content'];
        $idImg         =  $_POST['imagen'];
        $category      =  $_POST['category'];
        $tags          =  $_POST['tags'];
        $userEditorId  = $vista->userEditorId($uid);
        $insertarticle = new controllerAdmin();
        $date          = date("Y-m-d G:i:s");
        $insert        = $insertarticle->insertArticle($title,$content,$idImg,$userEditorId,$date, $category, $tags, $publish);
      }
  ?>

<!doctype html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <title>Articulos</title>
  <meta name="description" content="At">
  <script type="text/javascript" src="<?php echo $admin_url ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo $admin_url ?>js/articles.js"></script>
  <script src="<?php echo $admin_url ?>js/jquery.tagsinput.js"></script>
  <script src="<?php echo $admin_url ?>js/medium-editor.js"></script>
  <script src="<?php echo $admin_url ?>js/medium-editor-insert-plugin.all.min.js"></script>
  <script src="<?php echo $admin_url ?>js/jquery.filedrop.js"></script>
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

   <!-- Crear Articulo Nuevo -->

    <article class="contentApp">

      <div class="MediumContent">

        <!-- Div Preview Imagen -->
        <div id='preview'></div>


        <!-- Formulario Upload Imagen -->

        <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $admin_url ?>post_file.php'>
          Upload image: 
          <div id='imageloadstatus' style='display:none'><img src="<?php echo $admin_url ?>images/loader.gif" alt="Uploading...."/></div>
          
          <div id='imageloadbutton'>
            <input type="file" name="photoimg" id="photoimg" />
          </div>
        </form>


       <!--Formulario Medium  -->

        <form class="formEditable" method="post" accept-charset="UTF-8" name="editor">

          <textarea class="title" placeholder ="Titulo" name="title" cols="40" rows="1" ></textarea>
          <textarea class="content textarea" placeholder ="content" name="content" cols="40" rows="1" style="display:none"></textarea>
          
           <!--Editor Medium  -->

          <div class="editable" data-placeholder="Explaya tu conocimiento."></div>
          <input type="hidden" name="imagen" id="idImagenUpload" value="">

       
          <!-- Categorias-->

          <select name="category">

              <?php $vista->listCategory(); ?>


          </select> 

          <!-- Tags -->

            <input id="tag1" name="tags" value="Digital" />


          <!-- Submit Dates -->

          <input type="submit" id="bton" name="publish" value="visible">
          <input type="submit"  name="nopublish" value="hidden">
      
    </form>

    </article>
  </section>

 


</body>

</html>