<?php  //date_default_timezone_set("Asia/Calcutta"); ?>
<?php
include_once("../../Model/DBConnection/Enum_Model.php");
include_once("../../Model/DBConnection/DbModel.php");
include '../../Model/User/LoginModel.php';
$ImagePath ="";
$ImagePath = "UserImage/".$_POST["userid"].".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $Imagename = $_POST["userid"].pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES['file']['tmp_name'],$ImagePath)) 
    {
         echo "success";  
    }
if($_POST["usertype"] == "VOLUNTEER")
{
    LoginModel::SaveVolunteerProfile($_POST["userid"], $_POST["about"], $Imagename, $_POST["causes"], $_POST["workprofile"], $_POST["workplace"]);
}
 else if($_POST["usertype"] == "NGO" || $_POST["usertype"] == "COMPANY"){
    LoginModel::SaveNGOCompanyProfile($_POST["userid"], $_POST["about"], $Imagename, $_POST["causes"]);
}
header("Location:index.php?uid=".$_POST["userid"]);
?>