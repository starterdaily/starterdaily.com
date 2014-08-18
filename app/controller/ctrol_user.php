<?php

	//Login  Controller
	
	$login_error = '';
	$reg_error   = '';
 
	if(@$_POST['emaillogin'] && @$_POST['passcode'] ) {

		$User     = new User();
		$email    = $_POST['emaillogin'];
		$password = $_POST['passcode'];

		if (strlen($email)>0 && strlen($password)>0) {
			
			$login=$User->User_Login($email,$password);

			if($login){
				
				$_SESSION['st_uid'] = $login;

				return $_SESSION['st_uid'];

				 echo "<script type='text/javascript'>location.reload(); console.log('funciona')</script>";
			}	

			else {
				$login_error="<span class='error'>Username or Password is invalid</span>";
				}
		}
	}

//Registration Controller 
	
	if(@$_POST['email'] && $_POST['password'] ){
	
			$User     = new User();
			$email    =$_POST['email'];
			$password =$_POST['password'];

	if (strlen($password)>0 && strlen($email)>0 ){

			$reg=$User->User_Registration($email,$password);

			if($reg) {

				$_SESSION['st_uid'] = $reg;

				echo "<script>window.location.href = 'http://localhost/starterdaily/registro.php?action=stemail';</script>";

				}

			else {

				$reg_error="<span class='error'>Usuario existe</span>";

			}

		}
	
	}


	class ControllerUserProfile  {


		 public $modelUser;

		 public function __construct() {
			$this->modelUser = new User;
		}


		function infoProfile($uid) {

			$data = $this->modelUser->userDetails($uid);
			return $data;
		}


	}


	



?>