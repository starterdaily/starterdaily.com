   
<?php

	require 'app/controller/ctrol_articles.php';

	class view { 

		public $controller;

		public function __construct() {

			$this->controller = new controllerArticles();
		}

		function userEditorId($uid) {

			$data        = $this->controller->datosAdmin($uid);
			$userid		 = $data['st_uid_user'];
			return  $userid;
		}

		function UserInfo($uid){

			$data        = $this->controller->datosAdmin($uid);
			$nameAdmin   = $data['st_name'];
			$userid		 = $data['st_uid_user'];

			echo "	<div class='mainRight'>
					<li><a href='' class='userinfo'><img src=$avatarAdmin alt=''><p>$nameAdmin</p></a></li>
					<li>
						<a href=''></a>
						<ul>
							<li><a href=''></a>Ajustes</li>
						</ul>
					</li>
					<li>
						<a href=''>Notificaciones</a>
						<ul>
							<li><a href=''></a></li>
						</ul>
					</li>

					</div>";

		}

		function viewInfoTeam($uid) {

			$data = $this->controller->infoTeam($uid);
			foreach ($data as $data) {

				$idTeam		= $data['st_id'];		
				$nameTeam   = $data['st_name'];
				$cargoTeam  = $data['st_cargo'];
				$roleTeam   = $data['st_role'];
				$avatarTeam = $data['st_avatar'];


			echo "<div class='panel' >
			<div class='singleUser' id='$idTeam' >
				<div class='avatar'>
					<img src=$avatarTeam alt='$nameTeam'>
				</div>
					<p class='title_team'>$nameTeam</p>
					<p class='cargo_team'>$cargoTeam</p>
					<p class='roleTeam'>$roleTeam </p>

				<a class='btn_more' id='$idTeam' href=''>+</a>
			</div>
			</div>";
			}
		}

		function urlParse($section,$action) {	

			$admin_url='http://localhost/starterdaily/admin/';

			if($action) {}

			else  {
				$primary = "activeMain";}

			switch ($section) {

				case 'articles':

					$sec = "articles";
					$main ="<ul class='mainParse'>
								<li class='{$primary}'><a href='{$admin_url}articles/'>Articulos</a></li>
								<li><a href='{$admin_url}category/'>Categorias</a></li>
								<li><a href=''>Etiquetas</a></li>
							</ul>";
					return $main;
					break;

				case 'category':
					$main ="<ul class='mainParse'>
								<li><a href='{$admin_url}articles/'>Articulos</a></li>
								<li class='{$primary}'><a href=''>Categorias</a></li>
								<li><a href=''>Etiquetas</a></li>
							</ul>";
					return $main;
					break;
				
				default:
					$main = "";
					return $main;
					break;
			}

		}

		function getArticleListView($uid) {

				$directive = "list";
				$data = $this->controller->getArticleList($uid,$directive);

				foreach ($data as $data) {

				$st_aid         = $data['st_aid'];
				$titleArticle   = utf8_decode($data['st_article_title']);
				$editorArticle    = utf8_decode($data['st_name']).' '.utf8_decode($data['st_lastname']);
				$editorProfile    = $data['st_image_profile'];


			echo "<div class='panel' >
			<div class='singleUser' id='$st_aid' >
					<p class='title_article'>$titleArticle</p>
					<div class='editBox'>

						<p><img class='thumbnails_small' src='{$editorProfile}'><span>{$editorArticle}</span></p>

						<a class='editButton' href='edit/?articleid={$st_aid}' >Editar</a>

					</div>

			</div>
			</div>";


		}

				// <a class='btn_more' id='$st_aid' href=''>+</a>


	}

		public function dateSpanish($date) {

			$date = strtotime($date);
            $nom_mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'); // ...
            $diaArticulo = date('d',$date);
            $mesArticulo = date("m",$date);
            $yearArticulo = date('Y',$date);
            $mes=$nom_mes[date($mesArticulo)-1];
            $fecha = $diaArticulo.' '.$mes.' '.$yearArticulo;

            return $fecha;

		}

		public function chileanMoney($price) {

		    $valor = '$ '.number_format($price,0,",",".");
		    return $valor;
		}

		public function exit_status($str){

		    echo json_encode(array($str));
		    exit;
		}

		public function get_extension($file_name){

		    $ext = explode('.', $file_name);
		    $ext = array_pop($ext);
		    return strtolower($ext);
		}

		function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth){

			if($ext=="jpg" || $ext=="jpeg" ) {	
				$src = imagecreatefromjpeg($uploadedfile);}
				
			else if($ext=="png"){
			$src = imagecreatefrompng($uploadedfile);}

			else if($ext=="gif"){
			$src = imagecreatefromgif($uploadedfile);}

			else{
			$src = imagecreatefrombmp($uploadedfile);}
																			
			list($width,$height)=getimagesize($uploadedfile);
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = $path.$newwidth.'_'.$actual_image_name;
			imagejpeg($tmp,$filename,100);
			imagedestroy($tmp);
			return $filename;
		}

		function getExtension($str) {

		    $i = strrpos($str,".");
		    if (!$i) { return ""; } 
		    $l = strlen($str) - $i;
		    $ext = substr($str,$i+1,$l);
		    return $ext;
		}



		function listCategory() {

			$data = $this->controller->listCategoryC('listArticle');
			foreach ($data as $data) {
				echo "<option value='{$data['st_slug']}'>{$data['st_category']}</option>";
			}
		}

		// Modulo Vista Articles Admin

		function articleDetailsView($uid,$id) {

				$uid; $id;
				$data = $this->controller->articleDetailsController($uid,$id);

				foreach ($data as $data) {
					echo $st_aid         = $data['st_aid'];
					echo $titleArticle   = utf8_decode($data['st_article_title']);
				}

		}

		// Modulo Vista Category Admin

		function getCategoryListView($uid){

				$data = $this->controller->listCategoryC('listCategory',$uid);
			foreach ($data as $data) {
				echo"
					<div class='singleUser'>
						<p class='title_article'>{$data['st_category']}</p>
						<p class=''>{$data['st_created']}</p>
						<p class='subtitle_article'>{$data['st_desc']}</p>
						<a class='editButton' href='edit/{$data['st_idc']}' >Editar</a>

					</div>";
			}
		}

		function insertCategoryView($titleCategory){

				$titleCategory =  $_POST['titleCategory'];
		        $desc          =  $_POST['content'];
		        $created       =  date("Y-m-d G:i:s");
		        $presenter     =  $_POST['presenter'];

		        $this->controller->insertCategory($titleCategory,$desc,$created,$presenter);

		}
		
	}

	$vista = new view();




  		

  