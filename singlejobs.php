<?php 
      include_once 'app/includes/session.php';	
      include_once 'app/view/viewjobs.php'; 
      include_once 'app/includes/header.php'; 

      $data = $vistaJobs->singleJobShow($_GET['category'], $_GET['nameJobs']);
      foreach ($data as $data){
      $title = $data['st_job'];
      $startpage= $data['st_startpage_uid'];
      }     
?>

<!-- Template Single-jOBS -->
      
     <section id="content" role="main">
                <section id="wrapper" class="especial" role="main">
                    <div class="row">

                     <?php include_once 'app/includes/sidebarjobs.php'; ?>

                        <!-- Contenido Noticias -->
                        <section class="medium-8 large-9 columns">

                            <div id="breadcrumb" class="row">
                                <ul class="large-12 columns">
                                  
                                </ul>
                            </div>
                            
                            <!-- Articulos Home Primero -->
                            <article class="itemArticle row">
                                <div class="large-12 columns">
                                    <div class="headArticle">
                                        <h1><?php echo utf8_decode($title)."</h1> <p> para ".$vistaJobs->getCreatorShow($startpage,'name'); ?></h1></p>
                                        <p><?php echo "Publicado el ".$vistaJobs->dateSpanish($data['st_start'])." en ".str_replace("-", " ", $data['st_category']); ?></h1>

                                    </div>

                                    <div class="contentArticle">
                                    
                                    <div id="shared">
                                          <div id="shareme" data-url="http://starterdaily.fosco.cl/single.html" data-text="<?php echo utf8_decode($title); ?>"></div>
                                          </div>
                                    </div>

                                        <article class="fluidContent">

                                          <ul>
                                              <li>Salarion mensual: <span><?php echo $vistaJobs->chileanMoney($data['st_money']); ?></span></li>
                                                <li>Tipo de Trabajo: <span><?php echo $data['st_type'] ?></span></li>
                                                <li>Experiencia Requerida: <span><?php echo $data['st_years'] ?></span></li>
                                                <li>Fecha para Postular    <span><?php echo $vistaJobs->dateSpanish($data['st_end']) ?></span></li>
                                          </ul>

                                          <div><?php echo "Descripcion :".$data['st_desc']; ?></div>

                                        </article>

                                        <?php $vistaJobs->buttonAplicar($data['st_id']); ?>
                                       
                                    </div>

                                    <h3>Encuentra mas opciones en <?php echo str_replace("-", " ", $data['st_category']);?></h3>

                                    <?php  $vistaJobs->getpostRelatedShow($data['st_id'], $_GET['category'])?>
                                  </div>
                            </article>

                        </section> 

                    </div>
       </section>


      <?php $controllerArticles->footer('general'); ?>
