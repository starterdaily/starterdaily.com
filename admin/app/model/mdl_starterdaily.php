<?php
	
	class starterDaily {

		public function userDatos($uid) {
			
				$query     = mysql_query("SELECT st_id, st_name, st_uid_user FROM st_user_admin WHERE st_id = '$uid'") or die( mysql_error());
				while($row = mysql_fetch_array($query));
				$data[]    = $row;
				return $data;	
		} 

		public function adminDetails($uid){

				$query  = mysql_query("SELECT st_id, st_name, st_uid_user FROM st_user_admin WHERE st_id = '$uid'")or die(mysql_error());
			    $data   = mysql_fetch_array($query);
        		return $data;   

		}

		#/*Funciones Modulo Equipo #/* 

		public function adminTeamDetails($uid) {

				$query     = mysql_query("SELECT st_id, st_user, st_name, st_cargo, st_role, st_mail FROM st_user_admin WHERE st_id != '$uid'") or die(mysql_error());
				while($row = mysql_fetch_array($query))
				$data[]    = $row;
				return $data;
		}

		#/*Funciones Modulo Articulos #/* 

		public function getArticleListModel($uid) {
	
				$query     = mysql_query("SELECT A.st_aid, A.st_article_title, A.st_uid_editor, A.st_category, A.st_created, U.st_iduser, U.st_name, U.st_lastname,  U.st_image_profile  FROM st_articles A, st_user_profile U WHERE st_iduser = st_uid_editor ORDER BY A.st_created DESC") or die(mysql_error());
				while($row = mysql_fetch_array($query))
				$data[]    = $row;
				return $data;			
		}

		public function listCategoryM(){

				$query     = mysql_query("SELECT st_idc, st_category, st_created, st_desc, st_slug FROM st_category")or die(mysql_error());
				while($row = mysql_fetch_array($query))
				$data[]    = $row;
				return $data;		

		}

		public function articleDetailsModel($uid,$id){

				$query     = mysql_query("SELECT A.st_aid, A.st_article_title, A.st_article_content, A.st_image_thump, A.st_uid_editor, A.st_category, A.st_tags, A.st_visibility, U.st_idu, U.upload FROM st_articles A, st_uploads U WHERE A.st_aid = '$id' AND U.st_idu = A.st_image_thump")or die(mysql_error());
				while($row = mysql_fetch_array($query)){
				$data[]    = $row;
				return $data;}
		}
		

		
	}

	?>