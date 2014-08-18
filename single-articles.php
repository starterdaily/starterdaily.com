<?php 
      include_once 'app/includes/session.php';	
      include_once 'app/controller/ctrol_articles.php'; 
      include_once 'app/includes/header.php'; 

      $category = $_GET["category"];
      $articles = $_GET["idArticle"];
      $data = $controllerArticles->getArticles($articles,$category);

      foreach ($data as $datas) {
          $img      = $datas['upload'];
          $title    = $datas['st_article_title'];
          $category = $datas['st_category'];
          $content  = $datas['st_article_content'];
          $editor   = $datas['st_uid_editor'];
          $date    = $datas['st_created'];}

          $date = $controllerArticles->dateSpanish($date);
          $dataEditor = $controllerArticles->getArticlesEditor($editor);

      foreach ($dataEditor as $editordte) {          
          $editorName = $editordte['st_name'].' '.$editordte['st_lastname'];
          $editorImage =  $editordte['st_image_profile'];
          $editorFirma =  $editordte['st_firm'];}
      ?>


      <!-- Template Single-Article -->

      <section id="content" role="main">
                <section id="wrapper" class="especial" role="main">
                    <div class="row">

                     <?php include_once 'app/includes/sidebar-articles.php'; ?>

                        <!-- Contenido Noticias -->
                        <section id="singleArticle" class="medium-8 large-9 columns">

                            <div id="breadcrumb" class="row">
                                <ul class="large-12 columns">
                                    <li><a href="#"><span>StarterDaily</span> </a></li>
                                    <li><a href="#"><span><?php echo utf8_decode($category) ?></span> </a></li>
                                </ul>
                            </div>
                            
                            <!-- Articulos Home Primero -->
                            <article class="itemArticle row">
                                <div class="large-12 columns">
                                    <figure><img src="<?php echo utf8_decode($img) ?>" alt=""></figure>
                                    <div class="headArticle">
                                        <h1><?php echo utf8_decode($title); ?></h1>
                                    </div>

                                    <div class="contentArticle">
                                        <div class="sidebarArticleUserInfo">
                                            <div class="triangulo"></div>
                                            <div class="trianguloBorder"></div>

                                            <figure class="avatar">
                                                <img src="<?php echo $editorImage?>"/>
                                             </figure>
                                            <p class="nameUser"><?php echo $editorName?></p>
                                            <a href="<?php echo $base_url.'/category/'.$category ?>"><p class="Usercategory"><span>En </span><span class="Usercategory"><?php echo $category ?></span><br><?php echo $date ?></p></a>
                                        <a class="FallowUser" href="javascript:void(0)" class="buttonFollow">Seguir</a>
                                    
                                    <div id="shared">
                                          <div id="shareme" data-url="http://starterdaily.fosco.cl/single.html" data-text="<?php echo utf8_decode($title); ?>"></div>
                                          </div>
                                    </div>

                                        <article class="fluidContent">

                                        <?php echo $content ?>

                                         <div class="boxrecomended">

                                          <a href="javascript:void(0)">Recomendar</a>

                                          <div class="recomendar">

                                            <img src="" title>

                                          </div>

                                        </div>

                                        <div class="firmaUser">
                                            <figure> 
                                                <img src="<?php echo $editorImage?>">
                                            </figure> 

                                            <p class="nameFirma"><?php echo $editorName?></p>
                                            <a href="javascript:void(0)" class="FallowUser">Seguir</a><br>
                                            <p class="firm"><?php echo $editorFirma ?></p>

                                        </div>

                                        </article>

                                       
                                    </div>
                                  </div>
                            </article>

                        </section> 

                    </div>
                </section>
    
    <?php $controllerArticles->footer('general'); ?>
