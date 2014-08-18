<?php
    require_once 'app/Model/mdl_db.php'; 
    require_once 'app/Model/mdl_articles.php';
    include_once 'app/Model/mdl_user.php'; 
    require_once 'app/controller/ctrol_user.php'; 


    class controllerArticles { 

		 public $model;
         public $base_url;
         public $pag;

		 public function __construct() {

            $this->model  = new Articles();
            $this->pag    = 2;
            
		}

		function articlesInfo() {

			$data = $this->model->info_articles();
			return $data;

		}

		function getArticles($articles, $category) {

			$data = $this->model->getArticlesModel($articles, $category);
			return $data;

		}


        function getLastArticles($articles, $category,$limit) {

            $data = $this->model->getLastArticlesModel($articles, $category,$limit);

            return $data;

        }

		function getArticlesEditor($editor) {

			$data = $this->model->getArticlesEditorModel($editor);
			return $data;

		}

		function categoryArticle($category, $getpage) {


            $category = mysql_real_escape_string($category);
            $page = $this->pag;
			$data = $this->model->getArticlesCategoryModel($category, $page, $getpage);
			return $data;
		}

        function getThumnailArticle($thumnails){

            $data = $this->model->getThumnailArticleModel($thumnails);
            return $data;
        }

	    function dateSpanish($date) {

			$date = strtotime($date);
            $nom_mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'); // ...
            $diaArticulo = date('d',$date);
            $mesArticulo = date("m",$date);
            $yearArticulo = date('Y',$date);
            $mes=$nom_mes[date($mesArticulo)-1];
            $fecha = $diaArticulo.' '.$mes.' '.$yearArticulo;
            return $fecha;
		}

        function sidebar($type) {
            switch ($type) {
                case 'sidebarArticle':
                    $base_url = 'http://localhost/starterdaily';
                    include ('app/includes/sidebar-articles.php');
                    break;
                
                default:
                    # code...
                    break;
            }
        }


        function footer($type) {
            if($type = 'general') {
                    $base_url = 'http://localhost/starterdaily';
                    include('app/includes/footer.php');
            }
        }

        function getStarpagePC($category, $directive){

            switch ($directive) {
                case 'presentado':
                    $data = $this->model->getStarpagePresented($category);
                    return $data;

                case 'details':
                    $data = $this->model->getCategoryModel($category);
                    return $data;


                    break;
                
                default:
                    # code...
                    break;
            }

        


        }

    }

	$controllerArticles = new controllerArticles();

?>