<?php

     class User  {

          public function User_Login_admin($email,$password)  {

                    $email                    = mysql_real_escape_string($email);             
                    $password                 = mysql_real_escape_string($password);       
                    // $md5_password           = md5($password);         
                    $query                    = mysql_query("SELECT st_id FROM st_user_admin WHERE st_user='$email' and st_password='$password'");
                    
                    if(mysql_num_rows($query) == 1) {
                    
                         $row  = mysql_fetch_array($query);  
                         return $row['st_id'];

                         }
                    
                    else {
                          return false;
                    }

          }

          // public function User_Registration_admin($email,$password) {


          //           $email                 = mysql_real_escape_string($email);     
          //           $password              = mysql_real_escape_string($password);
          //           $md5_password          = md5($password);
          //           $q                     = mysql_query("SELECT id FROM users WHERE email='$email' ");

          //           if(mysql_num_rows($q) ==0) {
                    
          //           $query                 = mysql_query("INSERT INTO users(email, password)VALUES('$email','$md5_password')");     
          //           $sql                   = mysql_query("SELECT id FROM users WHERE email='$email'")              
          //           $row                   = mysql_fetch_array($sql);
          //           $uid                   = $row['id'];
          //           $friend_query          = mysql_query("INSERT INTO friends(friend_one,friend_two,role)VALUES('$uid','$uid','me')");
                    
          //           return $uid ;
          //      }

          //      else {

          //           return false;

          //      }

          // }
    
     }  // Fin Clase User

?>