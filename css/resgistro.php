<?php
	include 'includes/model/mdl_db.php';
	include 'includes/model/mdl_user.php';
	$action = $_REQUEST["action"];

switch($action){

	case "fblogin":
	include 'includes/model/facebook.php';
	$appid 		= "652013241497016";
	$appsecret  = "a958dfe9867fd1e92a312f1d87349fe4";
	$facebook   = new Facebook(array(

  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));

	$fbuser = $facebook->getUser();
}

	if ($fbuser) {

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
		$check_select = mysql_query("SELECT id FROM users WHERE fb_id ='$user_fbid'");

		if(mysql_num_rows($check_select)==0){
			mysql_query("INSERT INTO users (firstname, email, imageprofile, fb_id) VALUES ('$user_fnmae', '$user_email', '$user_image','$user_fbid')");
		}

		else{

			$User = new User();
			$login=$User->User_Login_fb($user_email,$user_fbid);

			if($login){
				$_SESSION['id'] = $login;
				echo "<script>window.location='index.php'</script>";

				}	

		}



	// 	echo '<ul>';
 //        foreach ($user_friends["data"] as $value) {

 //        	$url = 'http://www.facebook.com/dialog/send?
 //  					app_id=123050457758183
 //  					&link=http://www.nytimes.com/2011/06/15/arts/people-argue-just-to-win-scholars-assert.html/
  	
 // 					&redirect_uri=https://www.bancsabadell.com/cs/Satellite/SabAtl/
	// 				&to='.$value["id"].'
 // 					';


 //            echo '<li>';

 //            echo '<div class="pic">';

 //            echo '<img src="https://graph.facebook.com/'.$value["id"] . '/picture"/>';



 //            echo '</div>';

 //            echo '<div class="picName"><a href="'.$url.'">'.$value["name"].'</a></div>'; 

 //            echo '</li>';
 //        }
 //        echo '</ul>';


	// 	  //  $total_friends = count($user_friends['data']);
 //    // echo 'Total friends: '.$total_friends.'.<br />';
 //    // $start = 0;
 //    // while ($start < $total_friends) {
 //    //     echo $user_friends['data'][$start]['name'];
 //    //     echo '<br />';
 //    //     $start++;
 
	}
	

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gracias por registrarte en Ohmygift!</title>
<title>Asif18 tutorial about facebook login for mywebsite using php sdk</title>
<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '682001965199663', // replace your app id here
	channelUrl : 'http://localhost/ohmygift/', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

		function FBLogin(){
				FB.login(function(response){
					if(response.authResponse){
						window.location.href = "http://localhost/ohmygift/actions.php?action=fblogin";
					}
				}, {scope: 'email,user_likes'});
			}


};
</script>
<style>
body{
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.mytable{
	margin:0 auto;
	width:600px;
	border:2px dashed #17A3F7;
}
a{
	color:#0C92BE;
	cursor:pointer;
}
</style>

<link rel="stylesheet" href="<?php echo $base_url?>css/bootstrap.css">	
<link rel="stylesheet" href="<?php echo $base_url?>css/style.css">



	<!-- Facebook Conversion Code for Primero usuarios Ohmygift! -->
	<script type="text/javascript">
	// var fb_param = {};
	// fb_param.pixel_id = '6016571857107';
	// fb_param.value = '1.00';
	// fb_param.currency = 'CLP';
	// (function(){
	// var fpw = document.createElement('script');
	// fpw.async = true;
	// fpw.src = '//connect.facebook.net/en_US/fp.js';
	// var ref = document.getElementsByTagName('script')[0];
	// ref.parentNode.insertBefore(fpw, ref);
	// })();
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6016571857107&amp;value=1&amp;currency=CLP" /></noscript>

</head>

<body class="gracias">



<!--<h1>Asif18 tutorial for facebook ling using php, javascript sdk dymaically</h1>
<h3>here is the user details, for more details </h3>
<table class="mytable">
<tr>
	<td colspan="2" align="left"><h2>Hi <?php echo $user_fnmae; ?>,</h2><a onClick="FBLogout();">Logout</a></td>
</tr>
<tr>
	<td><b>Fb id:<?php echo $user_fbid; ?></b></td>
    <td valign="top" rowspan="2"><img src="<?php echo $user_image; ?>" height="100"/></td>
</tr>
<tr>
	<td><b>Email:<?php echo $user_email; ?></b></td>
</tr>
</table>-->

<section>
        <figure><img src="images/logo_gracias.png" alt="Gracias por Registrarte"></figure>
        <h1>Gracias <?php echo $user_fnmae ?>, por registrarte en Ohmygift!</h1>
        <h2>Ya estas participando por una GiftCard de $20.000, ahora podrás indicarnos tus gustos para no recibir más calcetines de regalo.</h2>
        <a href="javascript:location.reload()">Volver a Ohmygift!</a>
    </section>


</body>
</html>