<?php

	//** Model  Jobs Admin **//

	class jobsModel {

		public function jobsDetails() {
			
				$query      = mysql_query("SELECT st_idj, st_cargo FROM st_jobs");
				while ($row = mysql_fetch_array($query)) {
				$data       = $row['st_cargo'];
				return $data;
			}
		}

		public function insertJobModel($titlejob,$typejob,$yearexperience,$money,$jobdescription,$empresa,$namecontact,$website,$phone,$start,$end, $publish, $category, $city, $email) {

				$query       = mysql_query("INSERT INTO st_jobs(st_job, st_type, st_years, st_money, st_start, st_end, st_desc, st_startpage_uid, st_contact,st_email, st_website, st_phone, st_state,st_category, st_city) VALUES('$titlejob','$typejob','$yearexperience','$money' , '$start','$end', '$jobdescription' , '$empresa' , '$namecontact' ,'$email', '$website' , '$phone','$publish', '$category','$city')")or die( mysql_error());

				if($query){
					$respond = 'Trabajo Registrado';
				}

				else {
					$query = 'Trabajo no Registrado';
				}

				return $respond;
		}

}