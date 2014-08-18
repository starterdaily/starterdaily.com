<?php 
      include_once 'app/includes/session.php';	
      include_once 'app/Model/mdl_db.php'; 
      include_once 'app/Model/mdl_user.php'; 
      include_once 'app/Model/mdl_articles.php';
      include_once 'app/controller/ctrol_user.php'; 
      include_once 'app/controller/ctrol_articles.php'; 
      include_once 'app/includes/header.php'; 

      $getInfo  =  explode('/', $_GET["category"]); 
      $category =  $getInfo[0];
      if(@$getInfo[1]) {
        $getpage  =  explode('=', $getInfo[2]);
        $total_paginas = 10;

           if(!$getpage){
              $getpage = 0;
           }

          else{
            $getpage  = $getpage[1];
          }
      }

        else {
          $getpage  = 1;
          $total_paginas = 10;

        }

      ?>
      
      <!-- Template Single-Article -->

      <section id="categorydesc" class="categorydesc">
            <figure>
                  <img src="images/digital.jpg">
                  <figcaption>
                        <h2></h2>
                        <div class="des">

                        </div>
                  </figcaption>
            </figure>
      </section>

      <section id="content" role="main">
                <section id="wrapper" class="especial" role="main">
                    <div class="row">

                     <?php include_once 'app/includes/sidebar-category.php'; ?>

                        <!-- Contenido Noticias -->
                        <section class="medium-8 large-9 columns">

                              <div class="tabs">

                              <?php 
                                    $articleDestacado = $controllerArticles->categoryArticle($category, $getpage);

                                    foreach ($articleDestacado as $destacle): {

                                           echo $destacle['st_article_title'].'</br>';

                                    }

                                    endforeach;

                                      if ($getpage != 0){

                                              echo '<a href="'.$base_url.'/category/'. $category.'/page/'.($getpage-1).'"><img src="images/izq.gif" border="0"></a>';

                                              $iP = $getpage+1;
                                              $iN = $getpage-1;

                                              echo ('<a href="'.$base_url.'/category/'.$category.'/page/'.$iN.'">'.$iN.'</a>');

                                              echo ($getpage);

                                              echo ('<a href="'.$base_url.'/category/'.$category.'/page/'.$iP.'">'.$iP.'</a>');
                                            

                                            if ($getpage != $total_paginas)
                                              echo '<a href="'.$base_url.'/category/'.$category.'/page/'.($getpage+1).'"><img src="images/der.gif" border="0"></a>';
                                          }
                                          echo '</p>';

                              ?>

                              </div>
                        
                        </section>
                         

                    </div>
                </section>
    
    <?php $controllerArticles->footer('general'); ?>


      

?>
