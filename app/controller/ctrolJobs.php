<?php

	include_once 'app/Model/mdlJobs.php'; 

	class controllerJobs { 

			public $model;

			public function __construct() {
				
				$this->model = new Jobs();
			}


			function jobsInfo() {

				$data = $this->model->infoJobsMin();

				foreach ($data as $datas) {
						$nameJobs = $datas[0];
						$category = $datas['st_category'];
						$category = strtolower(str_replace(" ","-",$category));
						$category = str_replace("&","y",$category);
						$infps    = $datas['st_image_company'];
			      	echo "<a href='http://localhost/starterdaily/empleos/{$category}/{$nameJobs}'> {$datas[1]}</a><br>

			      		<img src='{$infps}'>";
			     }

			}

			function getJob($job) {

				$data = $this->model->getJobsModel($job);
				return $data;

			}

			function getCreator($startpage) {
				$data = $this->model->getCreatorModal($startpage);
				return $data;

			}

			function getpostRelated($id,$category) {
				$data = $this->model->getpostRelatedModel($id, $category);
				return $data;
			}


		}

		$controllerJobs = new controllerJobs();

?>