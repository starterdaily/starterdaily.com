<?php

     class User  {

          public function User_Login($email,$password)  {
               
               $email        =     mysql_real_escape_string($email);          
               $password     =     mysql_real_escape_string($password);
               $md5_password =     md5($password);
               $query=mysql_query("SELECT st_uid FROM st_user WHERE st_username='$email' and st_password ='$md5_password'");

               if(mysql_num_rows($query)==1) {

                    $row=mysql_fetch_array($query);
                    return $row['st_uid'];
               }

               else {
                    return false;
               }

          }

            public function User_Login_fb($user_email,$user_fbid)  {

               $user_email =  mysql_real_escape_string($user_email);
               $user_fbid  =  mysql_real_escape_string($user_fbid);
               $query      =  mysql_query("SELECT st_uid FROM st_user WHERE st_username='$user_email' and fb_id='$user_fbid'");

               if(mysql_num_rows($query)==1) {
                    $row=mysql_fetch_array($query);
                    return $row['st_uid'];
                    }

               else {
                    return false;
               }

          }

          public function User_Registration($email,$password) {

               $email        =mysql_real_escape_string($email);
               $password     =mysql_real_escape_string($password);
               $md5_password =md5($password);
               $q            =mysql_query("SELECT st_uid FROM st_user WHERE st_username='$email' ");
               
               if(@mysql_num_rows($q)==0) {

                    $query=mysql_query("INSERT INTO st_user(st_username, st_password)VALUES('$email','$md5_password')");
                    $sql=mysql_query("SELECT st_uid FROM st_user WHERE st_username='$email'");
                    $row=mysql_fetch_array($sql);
                    $uid=$row['st_uid'];
                    $friend_query=mysql_query("INSERT INTO st_friends(friend_one,friend_two,role)VALUES('$uid','$uid','me')");
                    return $uid ;
               }

               else {

                    return false;
               }
          }


          public function userDetails($uid) {

               $query=mysql_query("SELECT st_iduser, st_username, st_name, st_imageprofile FROM st_user_profile WHERE st_iduser='$uid'");
               while ($row = mysql_fetch_array($query))
                    $data[] = $row; 

                    return $data;

          }


          
    
     }  // Fin Clase User
 
?>