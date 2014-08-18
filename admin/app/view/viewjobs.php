   
<?php

	require 'app/controller/ctrol_jobs.php';
	require 'app/view/view.php';

	class vistaJobs extends view { 

		public $controller;

		public function __construct() {

			$this->controller = new controllerJobs();
		}

		function jobsList(){
			
			$query = mysql_query("SELECT st_id, st_job FROM st_jobs");
			while ($row = mysql_fetch_array($query)) {
			echo $row[1].'<br>';
		}
		}

		public function getJobAdd($titlejob,$typejob,$yearexperience){

				if(@$_POST['publish']) {

		            $publish   = $_POST['publish'];
		         }

		        else if($_POST['nopublish']){

		            $publish   = 'hidden';
		        }

				$titlejob       =  mysql_real_escape_string($_POST['titlejobs']);
				$city           =  mysql_real_escape_string($_POST['city']);
				$category		=  mysql_real_escape_string($_POST['jobcategory']);
				$typejob        =  mysql_real_escape_string($_POST['typejob']);
				$yearexperience =  mysql_real_escape_string($_POST['yearexperience']);
				$money          =  mysql_real_escape_string($_POST['money']);
				$jobdescription =  mysql_real_escape_string($_POST['jobdescription']);
				$empresa        =  mysql_real_escape_string($_POST['idPresenter']);
				$namecontact    =  mysql_real_escape_string($_POST['namecontact']);
				$website        =  mysql_real_escape_string($_POST['website']);
				$email        =  mysql_real_escape_string($_POST['email']);
				$phone          =  mysql_real_escape_string($_POST['phone']);
				$start          =  date("Y-m-d G:i:s");
				$end            =  mysql_real_escape_string($_POST['enddate']);

		        $respond = $this->controller->insertJobController($titlejob,$typejob,$yearexperience,$money,$jobdescription,$empresa,$namecontact,$website,$phone, $start, $end, $publish, $category, $city, $email);
		        return $respond;
		}

	}

	$vistaJobs = new vistaJobs();




  		

  