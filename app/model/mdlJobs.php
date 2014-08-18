<?php 

	//** Model  Jobs Applications **//

	include_once 'app/Model/mdl_db.php'; 

	class Jobs {

        public function infoJobsMin()  {
               
          	$query = mysql_query("SELECT T.st_id, T.st_job, T.st_type, T.st_country, T.st_city, T.st_category, T.st_startpage_uid, I.stp_user_uid, I.stp_name FROM st_jobs T, st_startpage I WHERE I.st_startpage_uid = T.st_startpage_uid");
			while ($row = mysql_fetch_array($query))
				$data[] = $row;
				return $data;	

        }

         public function getJobsModel($job)  {
               
          	$query = mysql_query("SELECT st_id, st_job, st_type, st_years, st_money, st_start, st_end, st_desc, st_category, st_state, st_startpage_uid FROM st_jobs WHERE st_id = '$job'")or die(mysql_error());
			while ($row = mysql_fetch_array($query))
				$data[] = $row;
				return $data;	
        }

        public function getCreatorModal($starpage){

        	$query = mysql_query("SELECT P.stp_id, S.stp_pagename, S.stp_imageprofile, S.stp_url, S.stp_stpage,  S.stp_shortdes, S.stp_city, S.stp_country FROM st_startpage P, stp_startpage_profile S  WHERE P.stp_id ='$starpage' AND P.stp_id = S.stp_stpage") or die(mysql_error());
        	while ($row = mysql_fetch_array($query))
				$data[] = $row;
				return $data;

        }

        public function getpostRelatedModel($id,$category){

        	$query = mysql_query("SELECT st_id, st_job, st_type, st_start, st_end, st_category FROM st_jobs WHERE  st_id !='$id' AND st_category ='$category' ORDER BY st_end DESC LIMIT 3")or die(mysql_error());
        	while ($row = mysql_fetch_array($query))
				$data[] = $row;
				return $data;
        }



    }









?>