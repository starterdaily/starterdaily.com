<?php
	include_once 'app/model/mdl_db.php';
	include_once 'app/model/mdl_user.php';
	require_once 'app/includes/session.php';

	$action = $_REQUEST["action"];

	switch($action){

		case "fblogin":
		include 'app/model/facebook.php';
		$appid 		= "1379201438990837";
		$appsecret  = "0c684fcfca171bec256b5d082a56f846";
		$facebook   = new Facebook(array(

	  		'appId' => $appid,
	  		'secret' => $appsecret,
	  		'cookie' => TRUE,
		));

		$fbuser = $facebook->getUser();	

	}

	if(@$fbuser) {

		try {
			$user_profile = $facebook->api('/me');
			$user_friends = $facebook->api('/me/friends');
        	$access_token = $facebook->getAccessToken();
		}

		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}

		$user_fbid	= $fbuser;
		$user_email = $user_profile["email"];
		$user_fnmae = $user_profile["first_name"];
		$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
		$check_select = mysql_query("SELECT st_uid FROM st_user WHERE fb_id ='$user_fbid'");

		if(mysql_num_rows($check_select)==0){
			mysql_query("INSERT INTO st_user (st_username, fb_id) VALUES ('$user_fnmae', '$user_fbid')");
		}

		else{
			$User = new User();
			$login=$User->User_Login_fb($user_email,$user_fbid);

			if($login){
				$_SESSION['st_uid'] = $login;
				echo "<script>window.location='/'</script>";
			}	

		}
	}

	else{

	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenido a Starterdaily</title>


</head>
<body></body>





</body>
</html>