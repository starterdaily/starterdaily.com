<?php

	//Login  Controller

	$login_error='';

	if(@$_POST['user'] && @$_POST['passcode'] ) {

		$User = new User();

		$email=$_POST['user'];

		$password=$_POST['passcode'];


		if (strlen($email)>0 && strlen($password)>0) {
			
			$login=$User->User_Login_admin($email,$password);

			if($login){

				 $_SESSION['st_id'] = $login;
				 echo "<script>window.location='dashboard'</script>";

				}	

				else {

						 $login_error="<span class='error'>Username or Password is invalid</span>";
						 echo $login_error;

					}
		}
	}

	//Registration Controller 
	
	if(@$_POST['email'] && $_POST['password'] ){
	
			$User = new User();

			$email=$_POST['email'];

			$password=$_POST['password'];

	if (strlen($password)>0 && strlen($email) ){

			$reg=$User->User_Registration($email,$password);

			if($reg) {

				$_SESSION['uid']=$reg;

				header("Location:index.php");

				}

			else {

				$reg_error="<span class='error'>Usuario existe</span>";

			}

		}
	
	}



?>