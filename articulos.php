<?php 
      include_once 'app/includes/session.php';	
      include_once 'app/Model/mdl_db.php'; 
      include_once 'app/Model/mdl_user.php'; 
      include_once 'app/Model/mdl_jobs.php';
      include_once 'app/Model/mdl_articles.php';
      include_once 'app/controller/ctrol_user.php'; 
      include_once 'app/controller/ctrol_jobs.php'; 
      include_once 'app/controller/ctrol_articles.php'; 

      include_once 'app/includes/header.php'; 

      $data = $controllerArticles->articlesInfo();

      foreach ($data as $datas) {

      	$idArticle = $datas[0];

      	echo "<a href='{$base_url}/articulos/{$idArticle}'> {$datas[1]}</a><br>";
      }

      include_once 'app/includes/footer.php'; 

?>
