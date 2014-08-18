<?php 

	require_once 'app/Model/mdl_db.php';	
	require_once 'app/Model/mdl_starterdaily.php';

	class controllerAdmin { 

			public $model;

			public function __construct() {
				
				$this->model = new starterDaily();
			}

			function datosAdmin($uid) {
				$data      = $this->model->adminDetails($uid);
				return $data;
			}

			function insertArticle($title,$content,$idImg,$userEditorId,$date, $category, $tags, $publish) {

				$title        = htmlentities($title, ENT_QUOTES, "UTF-8");
				$content      = htmlentities($content, ENT_QUOTES, "UTF-8",false);
				$idImg        = htmlentities($idImg, ENT_QUOTES, "UTF-8");
				$userEditorId = mysql_real_escape_string($userEditorId);
				$category     = mysql_real_escape_string($category);
				$tags         = mysql_real_escape_string($tags);
				$publish      = mysql_real_escape_string($publish);
				$content      = str_replace(array('&lt;','&gt;','&quot;'),array('<','>','"'), $content);
				$query        = mysql_query("INSERT INTO st_articles(st_article_title,st_article_content,st_image_thump,st_uid_editor,st_created, st_category,st_tags, st_visibility) VALUES('$title','$content','$idImg','$userEditorId','$date','$category','$tags','$publish')")or die( mysql_error());
			}

			function insertCategory($titleCategory, $desc, $created, $presented) {

				$titleCategory = mysql_real_escape_string(htmlentities($titleCategory, ENT_QUOTES, "UTF-8"));
				$slug          = str_replace(array(' ','&ntilde;'),array('-','n'), $titleCategory);
				$desc          = htmlentities($desc, ENT_QUOTES, "UTF-8",false);
				$desc          = str_replace(array('&lt;','&gt;','&quot;'),array('<','>','"'), $desc);
				$presented     = mysql_real_escape_string($presented);
				$q             = mysql_query("SELECT st_idc FROM st_category WHERE st_slug = '$slug'");
               
               if(mysql_num_rows($q)==0) {
					$query         = mysql_query("INSERT INTO st_category(st_category, st_desc,st_created, st_slug, st_presented) VALUES('$titleCategory','$desc','$created','$slug', '$presented')")or die( mysql_error()); 
               }
			}

			function articleDetailsController($uid,$id) {
				$data = $this->model->articleDetailsModel($uid,$id);
				return $data;
			}

			function infoTeam($uid) {
				$data = $this->model->adminTeamDetails($uid);
				return $data;
			}

			function getArticleList($uid,$directive) {

				switch ($directive) {
					case 'list':
						$data = $this->model->getArticleListModel($uid);
						return $data;
					break;
						
						default:
						
						break;
					}
			}

			function listCategoryC($directive,$uid) {

				switch ($directive) {
					case 'listArticle':
						$data = $this->model->listCategoryM();
						return $data;
						break;

					case 'listCategory':
						$data = $this->model->listCategoryM();
						return $data;
					break;

					default:
						# code...
						break;
				}
					
			}




	}

?>