<?php 
      include_once 'app/includes/session.php';	
      include_once 'app/Model/mdl_db.php'; 
      include_once 'app/Model/mdl_user.php'; 
      include_once 'app/Model/mdl_jobs.php'; 

      include_once 'app/controller/ctrol_articles.php'; 
      include_once 'app/controller/ctrol_jobs.php'; 
      include_once 'app/includes/header.php'; 
      ?>

      <section class="fullDisplaySecion">

            <h1>Tenemos <span><?php echo "1532"?></span> Ofertas de Trabajo Disponible</h1>
            <p>Es Starterdaily podrás encontrarofertas laborales para personas que se desarrollan en el rubro creativo, digital, estrategia y más
                  ¿Necestitas contratar? Publica tu empleo. ¿Buscas trabajo? Registrate y encuentra tu proximo trabajo.</p>

            <a class="buttonDisplay" href="">PUBLICA UNA OFERTA</a>

      </section>

      <section class="content-wrapper">
      <?php include_once 'app/includes/sidebar-jobs.php'; ?>

       <div class="contentArticle">

            <div class="searchJob">
                  <input name="searchJob" id="seachJob" placeholder="Buscas una oferta en particular...." type="text">
                  <input value="Buscar" type="submit">
                  <input type="checkbox" name="option1" value="tiempocompleto"> Tiempo Completo<br>
                  <input type="checkbox" name="option2" value="mediotiempo" checked> Medio Tiempo<br>
                  <input type="checkbox" name="option3" value="practica"> Practica<br>
                  <input type="checkbox" name="option3" value="practica"> Remplazo<br>

            </div>

            <?php    $data = $controllerJobs->jobsInfo(); ?>


            <div class="boxJobGeneral">

                  <figure>

                        <img src="">

                  </figure>

            </div>

      </div>



      <?php include_once 'app/includes/footer.php'; ?>
