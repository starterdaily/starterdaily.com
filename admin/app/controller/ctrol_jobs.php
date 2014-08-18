<?php 

	require_once 'app/model/mdljobs.php';

	class controllerJobs  { 

			public $model;

			public function __construct() {

				$this->model = new jobsModel();
			}

			public function insertJobController($titlejob, $typejob, $yearexperience,$money,$jobdescription,$empresa,$namecontact,$website,$phone,$start,$end, $publish, $category, $city, $email){

				$titlejob       =  htmlentities($titlejob, ENT_QUOTES, "UTF-8");
				$typejob        =  htmlentities($typejob, ENT_QUOTES, "UTF-8");
				$yearexperience =  htmlentities($yearexperience, ENT_QUOTES, "UTF-8");
				$money          =  htmlentities($money);
				$jobdescription =  htmlentities($jobdescription);
				$empresa        =  htmlentities($empresa);
				$namecontact    =  htmlentities($namecontact);
				$website        =  htmlentities($website);
				$phone          =  htmlentities($phone);
				$city           =  htmlentities($city);
				$publish        =  mysql_real_escape_string($publish);

				if($end =="semana"){
					$end   =  date("Y-m-d", strtotime('+1 week'));
				}

				elseif ($end =="dossemanas") {
					$end   =  date("Y-m-d", strtotime('+1 week'));
				}

				elseif ($end =="mes") {
					$end   =  date("Y-m-d", strtotime('+1 month'));
				}


				$respond = $this->model->insertJobModel($titlejob,$typejob,$yearexperience,$money,$jobdescription,$empresa,$namecontact,$website,$phone, $start,$end,$publish,$category, $city, $email);
				return $respond;

			}

		}

