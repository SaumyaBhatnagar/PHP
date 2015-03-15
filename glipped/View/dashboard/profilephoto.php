<?php
session_start();
$ImagePath ="";
if($_FILES['fileToUpload']['name'] == ""){
    
}
 else {
    $ImagePath = "UserImage/".$_SESSION['LoginId'].".".pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    echo $ImagePath;
    unlink($ImagePath);
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$ImagePath)) 
    {
         echo "success";  
    }
}

?>