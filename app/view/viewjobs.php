   
<?php

	include_once 'app/controller/ctrolJobs.php'; 
	require_once 'app/view/view.php';

	/** view modulo Jobs Application  **/

	class vistaJobs extends view { 

		public $controller;

		public function __construct() {

			$this->controller = new controllerJobs();
		}

		function singleJobShow($category, $job){

			$category = $_GET["category"];
			$job      = $_GET["nameJobs"]; 
			$data     = $this->controller->getJob($job);
			return $data;
		}

		function buttonFollow(){

			echo "<a class='followButton'>Seguir</a>";
		}

		function buttonAplicar($id){

			echo "<a class='buttonAplicar'>Postular a Esta oferta</a>";
		}

		function getCreatorShow($starpage, $directive ){

			$data = $this->controller->getCreator($starpage);
			switch ($directive) {

				// En caso de estar en Single PHP

				case 'single':

					foreach ($data as $data) {

						echo "<div class='boxpagejob'>

								<figure>
									<img src={$data['stp_imageprofile']}>

									<figcaption>
										<p class='title'>{$data['stp_pagename']}</p>
										<p>{$data['stp_shortdes']}</p>
										{$this->buttonFollow()}
									</figcaption>
								</figure>

								<div class='list'>

									<ul class='info'>

										<li>1533 Seguidores</li>
										<li>{$data['stp_city']}, {$data['stp_country']}</li>
										<li>{$data['stp_url']}</li>
										<li>51-100 empleados</li>

									</ul>
								</div>
						</div>";

					}

					break;
				

				// En caso de estar en el contendedor
				
				case 'name':

					foreach ($data as $data) {
					     $name = $data['stp_pagename'];
					}

					return $name;

				break;
				
				default:
					# code...
					break;
			}



		}


		function getpostRelatedShow($id,$category){

			$data = $this->controller->getpostRelated($id,$category);

			foreach ($data as $data ) {
				echo $data['st_job'];
				echo $data['st_type'];
				echo $data['st_start'];
			}

		}



	}

	$vistaJobs = new vistaJobs();




  		

  