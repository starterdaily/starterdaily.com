<?php 

	class Articles  {

        public function info_articles()  {
               
          	$query = mysql_query("SELECT st_aid, st_article_title FROM st_articles");
      			while ($row = mysql_fetch_array($query))
      			$data[] = $row;
      			return $data;	

        }

         public function getArticlesModel($articles, $category)  {
               
          	$query = mysql_query("SELECT A.st_aid, A.st_article_title, A.st_article_content, A.st_image_thump, A.st_uid_editor, A.st_category, A.st_created, U.st_idu, U.upload FROM st_articles A, st_uploads U WHERE A.st_aid = '$articles' AND A.st_category = '$category' AND U.st_idu = A.st_image_thump")or die(mysql_error());
    				while ($row = mysql_fetch_array($query))
    					$data[] = $row;
    					return $data;	

        }

           public function getLastArticlesModel($articles, $category, $limit){
  
            $query = mysql_query("SELECT A.st_aid, A.st_article_title, A.st_category, A.st_created, A.st_uid_editor, A.st_image_thump, P.st_name, P.st_image_profile, P.st_iduser, U.st_idu, U.upload  FROM st_articles A, st_user_profile P, st_uploads U WHERE U.st_idu = A.st_image_thump AND A.st_category ='$category'AND A.st_aid != '$articles' ORDER BY  A.st_created DESC LIMIT $limit") or die(mysql_error());
            while ($row = mysql_fetch_array($query))
              $data[] = $row;
              return $data; 

        }



        public function getArticlesEditorModel($editor) {

        		$query = mysql_query("SELECT st_username,st_name, st_lastname, st_image_profile, st_firm FROM st_user_profile WHERE st_iduser='$editor'")or die(mysql_query());
        		while ($row = mysql_fetch_array($query))
  					$data[] = $row;
  					return $data;

        }

        public function getArticlesCategoryModel($category, $page, $getpage) {


            //** Consulta de los registros para paginar resultados **//

            $qp          = mysql_query("SELECT st_aid FROM st_articles");
            $numTotal    = mysql_num_rows($qp);
           
            if (!$getpage) {
                  $inicio  = 0;
                  $getpage = 1;}

            else {
                  $inicio = ($getpage - 1) * $page;}

            $total_paginas = ceil($numTotal / $page);

            //** Consulta  del id del articulo destacado de los editores del staff STARTERDAILY **//

            $q           = mysql_query("SELECT st_aid, st_category FROM st_articles WHERE st_uid_editor ='1' AND st_category = '$category' ORDER BY st_created DESC LIMIT 1");
            while ($row  = mysql_fetch_array($q))
            echo $idDestacado = $row[0];

            //** Consulta Union Entre el articulo destacado y resto de articulos regulares **//

            $query = mysql_query("(SELECT  st_aid, st_article_title, st_created, st_uid_editor FROM st_articles WHERE st_uid_editor ='1' AND st_category='$category' ORDER BY st_created DESC LIMIT 1) UNION  ALL (SELECT st_aid, st_article_title, st_uid_editor, st_created FROM st_articles WHERE st_aid !='$idDestacado' AND st_category ='$category' ORDER BY st_created DESC LIMIT "."$inicio ,"."$page)")or die(mysql_error());
            while ($row = mysql_fetch_array($query))
            $data[] = $row;
            return $data;
        }

        public function getThumnailArticleModel($thumnails) {
            $query = mysql_query("SELECT st_idu,  upload FROM st_uploads U WHERE st_idu = '$thumnails'")or die(mysql_error());
            while ($row = mysql_fetch_array($query))
            $data[] = $row;
            return $data;
        }

        // Modulo Categoria 

         public function getStarpagePresented($category) {
            $query = mysql_query("SELECT C.st_presented, C.st_slug, P.stp_pagename, P.stp_shortdes, P.stp_imageprofile, P.stp_stpage FROM st_category C, stp_startpage_profile P WHERE C.st_slug = '$category' AND C.st_presented = P.stp_stpage")or die(mysql_error());
            if(mysql_num_rows($query)==1) {
              while ($row = mysql_fetch_array($query))
              $data[] = $row;
              return $data;
            }

            else{
              return false;
            }
        }

        public function getCategoryModel($category) {
            $query = mysql_query("SELECT st_idc, st_category, st_created, st_desc, st_slug FROM st_category WHERE st_slug = '$category'");
            while ($row = mysql_fetch_array($query))
            $data[] = $row;
            return $data;
        }


      }

?>