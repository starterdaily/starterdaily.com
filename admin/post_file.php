<?php
    
    include_once 'app/view/session.php';     
    require_once 'app/view/view.php';
    chdir('../upload/');

    $path = "articles/";
    $actual_image_name="";
    $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

    $imagename = $_FILES['photoimg']['name'];
    $size = $_FILES['photoimg']['size'];
                    
    if(strlen($imagename)){

        $ext = strtolower($vista->getExtension($imagename));
        if(in_array($ext,$valid_formats))
        {
            if($size<(1024*1024)){
                
                $actual_image_name = time().substr(str_replace(" ", "_", $ext), 5).".".$ext;
                $uploadedfile = $_FILES['photoimg']['tmp_name'];
                $widthArray = array(300,100,50);
                            
                foreach($widthArray as $newwidth){  
                    $filename=$vista->compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);}

                if(move_uploaded_file($uploadedfile, $path.$actual_image_name)){    
                    $infoDir  = 'http://localhost/starterdaily/upload/articles/'.$actual_image_name;
                    $ins      = mysql_query("INSERT INTO st_uploads(upload,st_uid_upload) VALUES('$infoDir',$uid)");
                    $sql      = mysql_query("SELECT st_idu, upload FROM st_uploads WHERE upload='$infoDir'");             
                    $row      = mysql_fetch_array($sql);
                    $msg      =  '<div class= message style="display:none">'.$row["st_idu"].'</div>';
                    echo "<img src='".$infoDir."' class='preview'>";
                    echo $msg;
                }
                
                else
                echo "Fail upload folder with read access.";
            }
            else
            echo "Image file size max 1 MB";                    
        }
        else
        echo "Invalid file format..";   
    }
    else
    echo "Please select image..!";
    exit;
}
?>

?>